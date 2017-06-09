@extends('layouts.template')

@section('css')
    @parent
    {{ Html::style('css/custom.css') }}
@stop

@section('javascript')
    @parent
    {{ Html::script('js/version1/google-map.js') }}
    {{ Html::script('js/version1/jquery.plugin.min.js') }}
    {{ Html::script('js/version1/jquery.countdown.min.js') }}
    {{ Html::script('js/version1/events.min.js') }}
    {{ Html::script('js/comment.js') }}
    {{ Html::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyDluWcImjhXgQDLQcDvGi3Glu1TOYG6oew&callback=initMap', ['async', 'defer']) }}
    <script type="text/javascript">
        $(document).ready(function () {
            var comment = new Comment('{{ action('CommentController@store') }}',
                '{{ config('path.to_avatar_default') }}',
                '{{ action('CampaignController@joinOrLeaveCampaign') }}',
                '{{ trans('campaign.request_sent') }}',
                '{{ trans('campaign.request_join') }}'
                );
            comment.init();

            var contribute = new Contribute('{{ action('ContributionController@store') }}');
            contribute.init();
        });
    </script>
@stop

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.campaigns') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs" itemscope >
                            <li class="item-home" itemprop="itemListElement" itemscope >
                                <a itemprop="item" class="bread-link bread-home" href="{{ action('CampaignController@index') }}" title="Home">
                                    <span itemprop="name">{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-cat item-custom-post-type-tp_event">
                                <a itemprop="item" class="bread-cat bread-custom-post-type-tp_event" href="{{ action('CampaignController@showCampaigns') }}" title="Events">
                                    <span itemprop="name">{{ trans('index.campaigns') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="not-heading-sidebar"></div>
    <div class="container site-content">
        <div class="row">
            <main id="main" class="site-main col-sm-9">
                <article id="tp_event-4934" class="tp_single_event post-4934 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry">
                    <div class="entry-header">
                        <h1 class="blog_title">{{ $detailCampaign->name }}</h1>
                    </div>
                    <div class="summary entry-summary">
                        <div class='post-formats-wrapper'>
                            <a class="post-image" href="">
                                <img src="{{ $detailCampaign->image->image }}" class="attachment-full size-full wp-post-image fix-img-cp" alt="{{ $detailCampaign->name }}" srcset="{{ $detailCampaign->image->image }} 870w, {{ $detailCampaign->image->image }} 300w, {{ $detailCampaign->image->image }} 768w" sizes="(max-width: 870px) 100vw, 870px" />
                            </a>
                        </div>
                        <div class="entry-countdown">
                            <div class="tp_event_counter" data-time="{{ $detailCampaign->start_time }} +0000"></div>
                        </div>
                    </div>
                    <div class="entry-content">
                        <div id="pl-4934">
                            <div class="panel-grid" id="pg-4934-0">
                               <div class="panel-grid-cell col-xs-12 col-sm-7">
                                <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-4934-0-0-0" data-index="0">
                                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                        <div class="siteorigin-widget-tinymce textwidget">
                                            <h5>{{ trans('campaign.description') }}</h5>
                                            <p>{{ $detailCampaign->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid-cell col-xs-12 col-sm-5">
                                <div class="so-panel widget widget_event-info panel-first-child panel-last-child" id="panel-4934-0-1-0" data-index="1">
                                    <div  class="panel-widget-style">
                                        <div class="thim-widget-event-info thim-widget-event-info-base">
                                            <div class="thim-event-info">
                                                <div class="inner-box">
                                                    <div class="box start">
                                                        <div class="icon"><i class="fa fa-clock-o"></i> </div>
                                                        <div class="info-detail">
                                                            <div class="title"><strong>{{ trans('campaign.label_for.start_time') }}</strong> </div>
                                                            <div class="info-content">
                                                             <div class="time">{{ date('h:i A', strtotime($detailCampaign->start_time)) }}</div>
                                                             <div class="date">{{ date('D , F d , Y', strtotime($detailCampaign->start_time)) }}</div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="box finish">
                                                    <div class="icon"><i class="fa fa-flag"></i> </div>
                                                    <div class="info-detail">
                                                        <div class="title"><strong>{{ trans('campaign.label_for.end_time') }}</strong> </div>
                                                        <div class="info-content">
                                                            <div class="time">{{ date('h:i A', strtotime($detailCampaign->end_time)) }}</div>
                                                            <div class="date">{{ date('D , F d , Y', strtotime($detailCampaign->end_time)) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box address">
                                                    <div class="icon"><i class="fa fa-map-marker"></i> </div>
                                                    <div class="info-detail">
                                                        <div class="title"><strong>{{ trans('campaign.address') }}</strong> </div>
                                                        <div class="info-content">{{ $detailCampaign->address }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <h5>{{ trans('event.map') }}</h5>
                        <div id="googleMap" data-lat="{{ $detailCampaign->lat }}" data-lng="{{ $detailCampaign->lng }}"
                            data-address="{{ $detailCampaign->address }}">
                        </div>
                    </div>
                    @if (count($members))
                        <div class="panel-grid" id="pg-4934-1">
                            <div class="panel-grid-cell" id="pgc-4934-1-0">
                                <h5>{{ trans('campaign.member') }}</h5>
                                <div class="so-panel widget widget_team panel-first-child panel-last-child bg-white" id="panel-4934-1-0-0" data-index="2">
                                    <div class="thim-widget-team thim-widget-team-base">
                                        <div class="thim-our-team template-carousel" id="id_58ef60515ddf6">
                                            <div class="members">
                                                @foreach ($members as $element)
                                                    <div class="member">
                                                        <div class="inner">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar-inner">
                                                                    <img src="{{ $element->user->avatar }}" alt="{{ $element->user->name }}" title="{{ $element->user->name }}" />
                                                                </div>
                                                                <div class="social">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="{{ action('UserController@show', ['id' => $element->user->id]) }}"><i class="fa fa-link"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="info">
                                                                <div class="name">
                                                                    <a href="{{ action('UserController@show', ['id' => $element->user->id]) }}">{{ $element->user->name }}</a>
                                                                </div>
                                                                <div class="regency">{{ $element->user->name }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="event-location"></div>
        </article>
        <div class="block">
            <div class="block-title themed-background-dark">
                <h4 class="block-title-light campaign-title">
                    <strong>{{ trans('campaign.action') }}</strong>
                </h4>
            </div>
            <div class="widget-extra">
                <div class="timeline col-sm-5">
                    <div class="request-join">
                        @if ($detailCampaign->status)
                            @if (auth()->check())
                                {!! Form::open(['method' => 'POST', 'id' => 'formRequest']) !!}
                                    {!! Form::hidden('campaign_id', $detailCampaign->id) !!}
                                    @if (empty($userCampaign))
                                        {!! Form::submit(trans('campaign.request_join'), ['class' => 'btn btn-raised btn-success joinOrLeave']) !!}
                                    @elseif (empty($userCampaign->status) && empty($userCampaign->is_owner))
                                        {!! Form::submit(trans('campaign.request_sent'), ['class' => 'btn btn-raised btn-success joinOrLeave']) !!}
                                    @elseif ($userCampaign->status && empty($userCampaign->is_owner))
                                        {!! Form::submit(trans('campaign.leave_campaign'), ['class' => 'btn btn-raised btn-success joinOrLeave']) !!}
                                    @endif
                                {!! Form::close() !!}
                            @else
                                <a href="{{ action('Auth\UserLoginController@getLogin') }}"
                                class="btn btn-raised btn-primary join">{{ trans('campaign.request_join') }}</a>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="fb-like"
                    data-href="{{ URL::action('EventController@show', $detailCampaign->id) }}"
                    data-layout="standard" data-action="like"
                    data-size="small" data-show-faces="true"
                    data-share="true"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <h3>{{ trans('campaign.comments') }}</h3>
        <div class="tab__comment">
            <div>
                <div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{ trans('event.account') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('event.socilate') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div id="comments" class="comments-area">
                                <div class="comment-respond-area">
                                    <div id="respond" class="comment-respond">
                                        {!! Form::open(['method' => 'post', 'action' => 'EventController@store', 'id' => 'commentform', 'class' => 'comment-form']) !!}
                                        <p class="comment-form-comment">
                                            {!! Form::textarea('comment', '', [
                                                'id' => 'comment',
                                                'class' => 'comment_area',
                                                'cols' => '45', 'rows' => '8',
                                                'placeholder' => trans('campaign.comments'),
                                                ]) !!}
                                            </p>
                                            <p class="form-submit">
                                                {!! Form::submit(trans('campaign.comments'), ['data-id' => $detailCampaign->id, 'id' => 'submit-comment', 'class' => 'submit', 'disabled']) !!}
                                            </p>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    @if (count($detailCampaign->comments) > 0)
                                    @include('campaign.comment')
                                    @endif
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="fb-comments" data-href="{{ URL::action('CampaignController@show', $detailCampaign->id) }}" data-order-by="reverse_time" data-numposts="5" data-width="100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.right_bar')

        <div class="clear"></div>
    </div>
</section>
@stop
