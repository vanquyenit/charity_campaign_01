@extends('layouts.user_template')

@section('js')
    @parent
    {{ Html::script('js/active_campaign.js') }}
    {{ Html::script('js/version1/show-image.js') }}
    <script type="text/javascript">
        $( document ).ready(function() {
            var active = new Active(
                '{{ trans('campaign.active') }}',
                '{{ trans('campaign.close') }}',
                '{{ action('CampaignController@activeOrCloseCampaign') }}',
                '{{ trans('campaign.message_confirm') }}',
            );
            active.init();
        });
    </script>
@endsection

@section('content')

<div class="Grid-cell">
    <div class="js-profileClusterFollow"></div>
</div>
<div class="Grid-cell u-lg-size2of3" data-test-selector="ProfileTimeline">
    <div class="ProfileHeading">
        <div class="ProfileHeading-spacer"></div>
        <div class="ProfileHeading-content">
            <h2 id="content-main-heading" class="ProfileHeading-title u-hiddenVisually">{{ trans('user.timeline') }}</h2>
            <ul class="ProfileHeading-toggle">
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="tweets_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@show', $user->id) }}" data-nav="tweets_with_replies_toggle">{{ trans('user.timeline') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="tweets_with_replies_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@listUserCampaign', $user->id) }}" data-nav="photos_and_videos_toggle">{{ trans('user.campaigns') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="photos_and_videos_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@listUserEvent', $user->id) }}" data-nav="photos_and_videos_toggle">{{ trans('user.events') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem is-active" data-element-term="photos_and_videos_toggle">
                    <span aria-hidden="true">{{ trans('user.blogs') }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div id="timeline" class="ProfileTimeline">
        <div class="stream-container">
            <div class="stream-item js-new-items-bar-container"></div>
            <div class="stream">
                <ol class="stream-items js-navigable-stream scroll-load" id="stream-items-id">
                    @if ($listBlog->count())
                        @foreach ($listBlog as $key => $blog)
                            @php($images = json_decode($blog->content))
                            <li class="js-stream-item stream-item stream-item">
                                <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet has-cards has-content">
                                    <div class="content">
                                        <div class="stream-item-header">
                                            <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{ action('UserController@show', $userTimeline->id) }}">
                                                <img class="avatar js-action-profile-avatar" src="{{ $userTimeline->avatar }}">
                                                <span class="FullNameGroup">
                                                    <strong class="fullname show-popup-with-id">{{ $userTimeline->fullname }}</strong>
                                                    <span class="UserNameBreak">&nbsp;</span>
                                                </span>
                                                <span class="username u-dir">@<b>{{ trans('user.blogs') }}</b></span>
                                            </a>
                                            <small class="time">
                                                <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $blog->created_at }}">
                                                    <span class="_timestamp js-short-timestamp" data-aria-label-part="last" data-long-form="true">{{ $blog->created_at }}</span>
                                                </a>
                                            </small>
                                            @if (auth()->id() == $user->id)
                                                <div class="ProfileTweet-action ProfileTweet-action--more js-more-ProfileTweet-actions">
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                            <div class="IconContainer js-tooltip" >
                                                                <i class="fa fa-cog"></i>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu is-autoCentered">
                                                            <div class="dropdown-caret">
                                                                <div class="caret-outer"></div>
                                                                <div class="caret-inner"></div>
                                                            </div>
                                                            <ul tabindex="-1" role="menu" class="no-margin-left no-margin-right" aria-labelledby="menu-0" aria-hidden="true">
                                                                <li class="embed-link js-actionEmbedTweet" data-nav="embed_tweet" role="presentation">
                                                                    <a href="{{ action('OrtherController@blog') }}" class="dropdown-link" title="">{{ trans('user.manager.view') }}</a>
                                                                </li>
                                                                <li class="embed-link text-center" data-nav="embed_tweet" role="presentation">
                                                                    {!! Form::open(['action' => ['OrtherController@deleteBlog', $blog->id ], 'method' => 'DELETE']) !!}
                                                                        {!! Form::submit(trans('user.manager.delete'), ['class' => 'dropdown-link unstyle-button-submit']) !!}
                                                                    {!! Form::close() !!}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="js-tweet-text-container">
                                            @if ($blog->type == config('settings.video'))
                                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text">{{ trans('user.upload-video') }}</p>
                                            @else
                                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text">{{ trans('user.add-image') }}</p>
                                            @endif
                                            <strong>{{ $blog->title }}</strong>
                                            @if (count($images) >= 5)
                                                <strong class="hover_count_image">
                                                    + {{ count($images) - 4 }}
                                                </strong>
                                            @endif
                                        </div>
                                        @if ($blog->type == config('settings.video'))
                                            <div class="AdaptiveMediaOuterContainer">
                                                <div class="AdaptiveMedia is-square">
                                                    <div class="AdaptiveMedia-container">
                                                        <div class="AdaptiveMedia-singlePhoto">
                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo" data-element-context="platform_photo_card">
                                                                <iframe class="max-width-height" src="{{ str_replace('watch?v=', 'embed/', $blog->content) }}"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="AdaptiveMediaOuterContainer">
                                                <div class="AdaptiveMedia">
                                                    <div class="AdaptiveMedia-container">
                                                        @if (count($images) == 1)
                                                            <div class="AdaptiveMedia-quadPhoto find_id" id="preview_{{ $blog->id }}">
                                                                @foreach ($images as $element)
                                                                    <div class="AdaptiveMedia-threeQuartersWidthPhoto max-width-height quick_view" data-count="{{ count($images) }}" >
                                                                        <div class="AdaptiveMedia-photoContainer"  data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img src="{{ config('path.images') . $element }}" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @elseif(count($images) == 2)
                                                            <div class="AdaptiveMedia-quadPhoto find_id" id="preview_{{ $blog->id }}">
                                                                @foreach ($images as $element)
                                                                    <div class="col-xs-6 no-padding max-height quick_view height-379" data-count="{{ count($images) }}">
                                                                        <div class="AdaptiveMedia-photoContainer"  data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img src="{{ config('path.images') . $element }}" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @elseif(count($images) == 3)
                                                            <div class="AdaptiveMedia-quadPhoto find_id" id="preview_{{ $blog->id }}">
                                                                @php($getFirst = $images[0])
                                                                    <div class="col-xs-6 no-padding max-height quick_view height-379" data-count="{{ count($images) }}" >
                                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjtyUMAEasfW.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                <div class="col-xs-6 no-padding max-height quick_view height-379">
                                                                    @foreach ($images as $element)
                                                                        <div class="AdaptiveMedia-thirdHeightPhoto quick_view height-50">
                                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo">
                                                                                <img src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @elseif(count($images) == 4)
                                                            <div class="AdaptiveMedia-quadPhoto find_id" id="preview_{{ $blog->id }}">
                                                                @php($getFirst = $images[0])
                                                                    <div class="AdaptiveMedia-threeQuartersWidthPhoto quick_view" data-count="{{ count($images) }}" >
                                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjtyUMAEasfW.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                <div class="AdaptiveMedia-thirdHeightPhotoContainer">
                                                                    @foreach ($images as $element)
                                                                        <div class="AdaptiveMedia-thirdHeightPhoto quick_view">
                                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo">
                                                                                <img src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @elseif(count($images) >= 5)
                                                            <div class="AdaptiveMedia-quadPhoto find_id" id="preview_{{ $blog->id }}">
                                                                @php($getFirst = $images[0])
                                                                    <div class="AdaptiveMedia-threeQuartersWidthPhoto quick_view">
                                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo">
                                                                            <img src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                @foreach ($images as $element)
                                                                    <div class="AdaptiveMedia-thirdHeightPhotoContainer quick_view">
                                                                        @foreach ($images as $element)
                                                                            <div class="AdaptiveMedia-thirdHeightPhoto">
                                                                                <div class="AdaptiveMedia-photoContainer js-adaptive-photo">
                                                                                    <img src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ol>
                {{ $listBlog->links() }}
                <div class="stream-footer">
                    <div class="timeline-end has-items has-more-items">
                        <div class="stream-loading">
                            <div class="stream-end-inner">
                                <span class="spinner"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="hidden-replies-container"></ol>
            </div>
        </div>
    </div>
</div>

@include('layouts.user_right')

@stop
