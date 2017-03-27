@section('css')
    @parent
    {{ Html::style('bower_components/bootstrap-star-rating/css/star-rating.css') }}
    {{ Html::style('bower_components/bootstrap-star-rating/css/theme-krajee-fa.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css') }}
    {{ Html::style('https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css') }}
@stop

@section('js')
    @parent
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js') }}
    {{ Html::script('bower_components/bootstrap-star-rating/js/star-rating.js') }}
    {{ Html::script('js/user_profile.js') }}

    <script type="text/javascript">
        $( document ).ready(function() {
            var userProfile = new UserProfile(
                '{{ action('RatingController@ratingUser') }}',
                '{{ $averageRankingUser['average'] }}',
                '{{ trans('user.rating_your_self') }}',
                '{{ trans('campaign.close') }}',
                '{{ action('FollowController@followOrUnFollowUser') }}',
                '{{ trans('user.follow') }}',
                '{{ trans('user.un_follow') }}'
            );
            userProfile.init();
        });
    </script>
@stop

<div class="sidebar theiaStickySidebar">
    <aside class="widget widget_events">
        <div class="thim-widget-events thim-widget-events-base">
            <div class="thim-events style3">
                <div class="events archive-content">
                    <h3 class="widget-title">
                        <span>{{ trans('user.your_profile') }}</span>
                    </h3>
                    <article class="post-4934 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry">
                        <div class="content-inner">
                            <div class="event-content">
                                <div class="entry-meta">
                                    <div class="img-circle col-xs-8 col-xs-offset-1">
                                        <img src="{{ $user->avatar }}" alt="avatar" class="img-responsive img-circle">
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="entry-header ">
                                            <h3 class="blog_title">
                                                <a href="{{ action('UserController@show', ['id' => $user->id]) }}">{{ $user->name }}</a></h3>
                                            </div>
                                            <span><i class="color fa fa-envelope"></i> <span>{{ $user->email }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </aside>
        <aside id="campaign-categories-1" class="widget widget_campaign-categories">
            <div class="thim-widget-campaign-categories thim-widget-campaign-categories-base">
                <li class="dn_campaign_cat">
                    <h3 class="widget-title"><span>{{ trans('user.profile') }}</span></h3>
                    <div class="user-info-social">
                        <ul class="list-group">
                            @if (auth()->id() != $user->id)
                                <li  class="list-group-item btn-follow">
                                    <div class="profile-userbuttons">
                                        <div data-user-id="{{ $user->id }}">
                                            @if ($follow && $follow->status)
                                                {!! Form::button('<i class="fa fa-users"></i>' . trans('user.un_follow'), ['class' => 'btn btn-raised btn-success' , 'id' => 'follow']) !!}
                                            @else
                                                {!! Form::button('<i class="fa fa-users"></i>' . trans('user.follow'), ['class' => 'btn btn-raised btn-default', 'id' => 'follow']) !!}
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endif
                            <li class="cat-item rating-user">
                                @if (Auth::user()->id != $user->id)
                                    {!! Form::hidden('target_id', $user->id, ['id' => 'target_id']) !!}
                                    {!! Form::hidden('input-1', '', ['id' => 'allow-rating-user', 'class' => 'rating rating-loading', 'data-min' => '0', 'data-step' => '1', 'data-size' => '5']) !!}
                                @else
                                    {!! Form::hidden('input-1', '', ['id' => 'not-allow-rating-user', 'class' => 'rating rating-loading', 'data-min' => '0', 'data-step' => '1', 'data-size' => 'xs']) !!}
                                @endif
                            </li>
                            <li class="cat-item">
                                <div class="reviews-stats"> {{ trans('campaign.total') }}
                                    <span class="glyphicon glyphicon-user color"></span>
                                    <span class="reviews-num-user">{{ $averageRankingUser['amount'] }}</span>
                                </div>
                            </li>
                            <li class="cat-item">
                                <a href="" data-toggle="modal" data-target="#campaigns">
                                    <span class="title">{{ trans('campaign.campaigns') }}</span>
                                    <span class="badge">{{ $countCampaign }}</span>
                                </a>
                            </li>
                            <li class="cat-item">
                                <a href="" data-toggle="modal" data-target="#followingUser">
                                    <span class="title">{{ trans('user.following') }}</span>
                                    <span class="badge">{{ $following->count() }}</span>
                                </a>
                            </li>
                            <li class="cat-item" >
                                <a href="" data-toggle="modal" data-target="#followerUser">
                                    <span class="title">{{ trans('user.followers') }}</span>
                                    <span class="badge">{{ $followers->count() }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </div>
        </aside>
        @if ($user->isCurrent())
        <aside id="categories-3" class="widget widget_categories">
            <h3 class="widget-title"><span>{{ trans('user.setting') }}</span></h3>
            <ul>
                <li class="cat-item">
                    <a href="{{ action('UserController@edit', ['id' => $user->id]) }}">
                        <span class="glyphicon glyphicon-user color"></span>
                        <span>{{ trans('user.setting') }}</span>
                    </a>
                </li>
                <li class="cat-item">
                    <a href="{{ action('UserController@listUserCampaign', ['userId' => $user->id]) }}">
                        <span class="glyphicon glyphicon-heart-empty color"></span>
                        <span>{{ trans('user.your_campaign') }}</span>
                    </a>
                </li>
            </ul>
        </aside>
        @endif
    </div>
</div>
@include('layouts.following')
@include('layouts.follower')
@include('layouts.campaigns')
