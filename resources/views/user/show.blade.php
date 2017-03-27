@extends('layouts.master')

@section('content')

<section class="content-area">
    <div class="container site-content">
        <div class="row">
            <div id="sidebar" class="widget-area col-sm-3" role="complementary">
                @include('user.profile')
                <main id="main" class="site-main col-sm-9">
                    <div class="archive-content">
                        @foreach ($actions as $action)
                            @if ($action->action_type == config('constants.ACTION.ACTIVE_CAMPAIGN'))
                                @if ($action->action_type == config('constants.ACTION.ACTIVE_CAMPAIGN'))
                                    @php ($message = trans('campaign.action_active_campaign'))
                                    @php ($campaign = $action->actionable->campaign($action->actionable->id))
                                @elseif ($action->action_type == config('constants.ACTION.CONTRIBUTE'))
                                    @php ($message = trans('campaign.action_contribute_campaign'))
                                    @php ($campaign = $action->actionable->campaign($action->actionable->campaign_id))
                                @endif
                                <article class="col-xs-12 col-md-6">
                                    <div class="content-inner">
                                        <div class="thumbnail">
                                            <a href="{{ action('CampaignController@show', ['id' => $campaign->id]) }}" title="{{ $campaign->name }}">
                                                <img src="{{ $campaign->image->image }}" alt="{{ $campaign->name }}" title="{{ $campaign->name }}">
                                            </a>
                                        </div>
                                        <header class="col-xs-12 user">
                                            <div class="col-xs-3">
                                                <a href="{{ action('UserController@show', ['id' => $campaign->owner->user->id]) }}">
                                                    <img src="{{ $campaign->owner->user->avatar }}"
                                                    class="img-responsive img-circle" alt="image">
                                                </a>
                                            </div>
                                            <div class="col-xs-9">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <span>{{ $campaign->owner->user->name }}</span><br>
                                                <i class="fa fa-envelope"></i>
                                                <span>{{ $campaign->owner->user->email }}</span>
                                            </div>
                                        </header>
                                        <header class="col-xs-12 date-time">
                                            <ul class="entry-meta color">
                                                <li class="date">
                                                    <span><a href="{{ action('CampaignController@show', ['id' => $campaign->id]) }}">{{{ $campaign->name }}}</a></span>
                                                </li>
                                            </ul>
                                            <ul class="entry-meta">
                                                <li class="date">
                                                    <i class="fa fa-map-marker color"></i>
                                                    <span>{{ $campaign->address }}</span>
                                                </li>
                                            </ul>
                                            <ul class="entry-meta">
                                                <li class="date">
                                                    <i class="fa fa-calendar color"></i>
                                                    <span>{{ date('H:i', strtotime($campaign->start_time)) }} - {{ date('H:i', strtotime($campaign->end_time)) . '  (' . date('d/m/Y', strtotime($campaign->end_time)) . ')' }}</span>
                                                </li>
                                                <li class="comment-total">
                                                    <span class="color">{{  Carbon\Carbon::now()->subSeconds(time() - $action->time)->diffForHumans() }}</span>
                                                </li>
                                            </ul>
                                            <span>{{ trans('campaign.message_end_campaign', ['time' => Carbon\Carbon::now()->addSeconds(strtotime($campaign->end_time) - time())->diffForHumans()]) }}</span>
                                        </header>
                                        <div class="entry-content col-xs-12">
                                            <div class="entry-summary">
                                                <p>{!! str_limit($campaign->description, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</p>
                                            </div>
                                            <a class="readmore" href="{{ action('CampaignController@show', ['id' => $campaign->id]) }}" target="_self">{{ trans('index.read-more') }}</a>
                                            <i class="color fa fa-comments"></i>
                                            <a href="javascript:void(0)">{{ $campaign->countComment($campaign->id) }}</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            @else
                                <article class="col-xs-12 col-md-6">
                                    <div class="content-inner">
                                        <div class="thumbnail">
                                            <a href="{{ action('CampaignController@show', ['id' => $campaign->id]) }}" title="{{ $campaign->name }}">
                                                <img src="{{ $campaign->image->image }}" alt="{{ $campaign->name }}" title="{{ $campaign->name }}">
                                            </a>
                                        </div>
                                        <header class="col-xs-12 user">
                                            <div class="col-xs-3">
                                                <a href="{{ action('UserController@show', ['id' => $campaign->owner->user->id]) }}">
                                                    <img src="{{ $campaign->owner->user->avatar }}"
                                                    class="img-responsive img-circle" alt="image">
                                                </a>
                                            </div>
                                            <div class="col-xs-9">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <span>{{ $campaign->owner->user->name }}</span><br>
                                                <i class="fa fa-envelope"></i>
                                                <span>{{ $campaign->owner->user->email }}</span>
                                            </div>
                                        </header>
                                        <header class="col-xs-12 date-time">
                                            <ul class="entry-meta color">
                                                <li class="date">
                                                    <span><a href="{{ action('CampaignController@show', ['id' => $campaign->id]) }}">{{{ $campaign->name }}}</a></span>
                                                </li>
                                            </ul>
                                            <ul class="entry-meta">
                                                <li class="date">
                                                    <i class="fa fa-map-marker color"></i>
                                                    <span>{{ $campaign->address }}</span>
                                                </li>
                                            </ul>
                                            @php($contributions = $action->actionable->contribution($action->actionable->id))
                                            @foreach ($contributions as $contribution)
                                            <ul class="entry-meta">
                                                <li class="date">
                                                    <i class="fa fa-caret-square-o-right color"></i>
                                                    <span>{{ $contribution->category->name }}</span>
                                                </li>
                                                <li class="comment-total">
                                                    <span  class="color">{{ $contribution->amount }}</span><span>({{ $contribution->category->unit }})</span>
                                                </li>
                                            </ul>
                                            @endforeach
                                            <span>{!! str_limit($contribution->contribution->description, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</span>
                                        </header>
                                        <div class="entry-content col-xs-12">
                                            <i class="color fa fa-comments"></i>
                                            <a href="javascript:void(0)">{{ $campaign->countComment($campaign->id) }}</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    {{ $actions->links() }}
                </main>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>
@stop
