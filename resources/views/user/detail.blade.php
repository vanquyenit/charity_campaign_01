@extends('layouts.user_template')

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
                <li class="ProfileHeading-toggleItem is-active" data-element-term="tweets_toggle">
                    <span aria-hidden="true">{{ trans('user.timeline') }}</span>
                </li>
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="tweets_with_replies_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@listUserCampaign', $userTimeline->id) }}" data-nav="tweets_with_replies_toggle">{{ trans('user.campaigns') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="photos_and_videos_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@listUserEvent', $userTimeline->id) }}" data-nav="photos_and_videos_toggle">{{ trans('user.events') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="photos_and_videos_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@listUserBlog', $userTimeline->id) }}" data-nav="photos_and_videos_toggle">{{ trans('user.blogs') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="timeline" class="ProfileTimeline">
        <div class="stream-container">
            <div class="stream-item js-new-items-bar-container"></div>
            <div class="stream">
                <ol class="stream-items js-navigable-stream" id="stream-items-id">
                    @foreach ($userTimeline->timelines as $timeline)
                        @if ($timeline->data_type == config('settings.campaign'))
                            @if (auth()->id() == $userTimeline->id)
                                <li class="js-stream-item stream-item stream-item">
                                    <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet has-cards  has-content">
                                        <div class="content">
                                            <div class="stream-item-header">
                                                <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{ action('UserController@show', $userTimeline->id) }}">
                                                    <img class="avatar js-action-profile-avatar" src="{{ $userTimeline->avatar }}">
                                                    <span class="FullNameGroup">
                                                        <strong class="fullname show-popup-with-id">{{ $userTimeline->fullname }}</strong>
                                                        <span class="UserNameBreak">&nbsp;</span>
                                                    </span>
                                                    <span class="username u-dir" >@<b>{{ trans('user.campaigns') }}</b></span>
                                                </a>
                                                <small class="time">
                                                    <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                        <span class="_timestamp js-short-timestamp">{{ $timeline->created_at }}</span>
                                                    </a>
                                                </small>
                                                <div class="ProfileTweet-action ProfileTweet-action--more js-more-ProfileTweet-actions">
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                            <div class="IconContainer js-tooltip" >
                                                                @if ($timeline->campaign->status)
                                                                    <span class="badge label-primary">{{ trans('campaign.active') }}</span>
                                                                @else
                                                                    <span class="badge label-warning-custom">{{ trans('campaign.close') }}</span>
                                                                @endif
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="js-tweet-text-container">
                                                <a href="{{ action('CampaignController@show', $timeline->campaign_id) }}" class="twitter-timeline-link">{{ $timeline->campaign->name }}</a>
                                                <p>
                                                    <i class="fa fa-calendar"></i>
                                                    <span>{{ $timeline->campaign->timeDay('start_time') }}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-calendar"></i>
                                                    <span>{{ $timeline->campaign->timeDay('end_time') }}</span>
                                                </p>
                                                <p>
                                                    <i class="fa fa-map-marker"></i>
                                                    <a href="#" title="">{{ $timeline->campaign->address }}</a>
                                                </p>
                                            </div>
                                            <div class="AdaptiveMediaOuterContainer">
                                                <div class="AdaptiveMedia is-square">
                                                    <div class="AdaptiveMedia-container">
                                                        <div class="AdaptiveMedia-singlePhoto">
                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo" data-element-context="platform_photo_card">
                                                                <img src="{{ $timeline->campaign->image->image }}" alt="{{ $timeline->campaign->image->image }}" class="height-379">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                @if ($timeline->campaign->status)
                                    <li class="js-stream-item stream-item stream-item">
                                        <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet has-cards  has-content">
                                            <div class="content">
                                                <div class="stream-item-header">
                                                    <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{ action('UserController@show', $userTimeline->id) }}">
                                                        <img class="avatar js-action-profile-avatar" src="{{ $userTimeline->avatar }}">
                                                        <span class="FullNameGroup">
                                                            <strong class="fullname show-popup-with-id">{{ $userTimeline->fullname }}</strong>
                                                            <span class="UserNameBreak">&nbsp;</span>
                                                        </span>
                                                        <span class="username u-dir" >@<b>{{ trans('user.campaigns') }}</b></span>
                                                    </a>
                                                    <small class="time">
                                                        <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                            <span class="_timestamp js-short-timestamp">{{ $timeline->created_at }}</span>
                                                        </a>
                                                    </small>
                                                    <div class="ProfileTweet-action ProfileTweet-action--more js-more-ProfileTweet-actions">
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                                <div class="IconContainer js-tooltip" >
                                                                    <span class="badge label-primary">{{ trans('campaign.active') }}</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="js-tweet-text-container">
                                                    <a href="{{ action('CampaignController@show', $timeline->campaign_id) }}" class="twitter-timeline-link">{{ $timeline->campaign->name }}</a>
                                                    <p>
                                                        <i class="fa fa-calendar"></i>
                                                        <span>{{ $timeline->campaign->timeDay('start_time') }}</span>
                                                    </p>
                                                    <p>
                                                        <i class="fa fa-calendar"></i>
                                                        <span>{{ $timeline->campaign->timeDay('end_time') }}</span>
                                                    </p>
                                                    <p>
                                                        <i class="fa fa-map-marker"></i>
                                                        <a href="#" title="">{{ $timeline->campaign->address }}</a>
                                                    </p>
                                                </div>
                                                <div class="AdaptiveMediaOuterContainer">
                                                    <div class="AdaptiveMedia is-square">
                                                        <div class="AdaptiveMedia-container">
                                                            <div class="AdaptiveMedia-singlePhoto">
                                                                <div class="AdaptiveMedia-photoContainer js-adaptive-photo" data-element-context="platform_photo_card">
                                                                    <img src="{{ $timeline->campaign->image->image }}" alt="{{ $timeline->campaign->image->image }}" class="height-379">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endif
                        @elseif ($timeline->data_type == config('settings.event'))
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
                                                <span class="username u-dir">@<b>{{ trans('user.events') }}</b></span>
                                            </a>
                                            <small class="time">
                                                <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                    <span class="_timestamp js-short-timestamp">{{ $timeline->created_at }}</span>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="js-tweet-text-container">
                                            <a href="{{ action('EventController@show', $timeline->event_id) }}" class="twitter-timeline-link">{{ $timeline->event->title }}</a>
                                            <p>
                                                <i class="fa fa-calendar"></i>
                                                <span>{{ $timeline->event->timeDay('start_time') }}</span>
                                            </p>
                                            <p>
                                                <i class="fa fa-calendar"></i>
                                                <span>{{ $timeline->event->timeDay('end_time') }}</span>
                                            </p>
                                            <p>
                                                <i class="fa fa-map-marker"></i>
                                                <a href="#" title="">{{ $timeline->event->address }}</a>
                                            </p>
                                        </div>
                                        <div class="AdaptiveMediaOuterContainer">
                                            <div class="AdaptiveMedia is-square">
                                                <div class="AdaptiveMedia-container">
                                                    <div class="AdaptiveMedia-singlePhoto">
                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo" data-element-context="platform_photo_card">
                                                            <img src="{{ $timeline->event->imgPath() }}" class="height-379">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @elseif ($timeline->data_type == config('settings.blog'))
                            @php($images = json_decode($timeline->blog->content))
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
                                                <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                    <span class="_timestamp js-short-timestamp" data-aria-label-part="last" data-long-form="true">{{ $timeline->created_at }}</span>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="js-tweet-text-container">
                                            @if ($timeline->blog->type == config('settings.video'))
                                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text">{{ trans('user.upload-video') }}</p>
                                            @else
                                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text">{{ trans('user.add-image') }}</p>
                                            @endif
                                            <strong>{{ $timeline->blog->title }}</strong>
                                            @if (count($images) >= 5)
                                                <strong class="hover_count_image">
                                                    + {{ count($images) - 4 }}
                                                </strong>
                                            @endif
                                        </div>
                                        @if ($timeline->blog->type == config('settings.video'))
                                            <div class="AdaptiveMediaOuterContainer">
                                                <div class="AdaptiveMedia is-square">
                                                    <div class="AdaptiveMedia-container">
                                                        <div class="AdaptiveMedia-singlePhoto">
                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo" data-element-context="platform_photo_card">
                                                                <iframe class="max-width-height" src="{{ str_replace('watch?v=', 'embed/', $timeline->blog->content) }}"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="AdaptiveMediaOuterContainer">
                                                <div class="AdaptiveMedia">
                                                    <div class="AdaptiveMedia-container">
                                                        <div class="AdaptiveMedia-quadPhoto">
                                                            @if (count($images) == 1)
                                                                @foreach ($images as $element)
                                                                    <div class="AdaptiveMedia-threeQuartersWidthPhoto max-width-height">
                                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo "  data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img src="{{ config('path.images') . $element }}" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @elseif(count($images) == 2)
                                                                    @foreach ($images as $element)
                                                                        <div class="col-xs-6 no-padding max-height height-379">
                                                                            <div class="AdaptiveMedia-photoContainer"  data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                                <img src="{{ config('path.images') . $element }}" class="max-width-height">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                            @elseif(count($images) == 3)
                                                                @php($getFirst = $images[0])
                                                                    <div class="col-xs-6 no-padding max-height height-379">
                                                                        <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjtyUMAEasfW.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                            <img data-aria-label-part="" src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                        </div>
                                                                    </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                <div class="col-xs-6 no-padding max-height height-379">
                                                                    @foreach ($images as $element)
                                                                        <div class="AdaptiveMedia-thirdHeightPhoto height-50">
                                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjt8UMAAeyax.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(61,43,36,1.0)" data-preloading="true" data-preloaded="true" loaded="true">
                                                                                <img data-aria-label-part="" src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @elseif(count($images) == 4)
                                                                @php($getFirst = $images[0])
                                                                <div class="AdaptiveMedia-threeQuartersWidthPhoto">
                                                                    <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjtyUMAEasfW.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                        <img data-aria-label-part="" src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                <div class="AdaptiveMedia-thirdHeightPhotoContainer">
                                                                    @foreach ($images as $element)
                                                                        <div class="AdaptiveMedia-thirdHeightPhoto">
                                                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjt8UMAAeyax.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(61,43,36,1.0)" data-preloading="true" data-preloaded="true" loaded="true">
                                                                                <img data-aria-label-part="" src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @elseif(count($images) >= 5)
                                                                @php($getFirst = $images[0])
                                                                <div class="AdaptiveMedia-threeQuartersWidthPhoto">
                                                                    <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjtyUMAEasfW.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(64,35,10,1.0)" style="background-color:rgba(64,35,10,1.0);" loaded="true" data-preloading="true" data-preloaded="true">
                                                                        <img data-aria-label-part="" src="{{ config('path.images') . $getFirst }}" alt="" class="max-width-height">
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    unset($images[0]);
                                                                @endphp
                                                                @foreach ($images as $element)
                                                                    <div class="AdaptiveMedia-thirdHeightPhotoContainer">
                                                                        @foreach ($images as $element)
                                                                            <div class="AdaptiveMedia-thirdHeightPhoto">
                                                                                <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="https://pbs.twimg.com/media/DCktjt8UMAAeyax.jpg" data-element-context="platform_photo_card" data-dominant-color="rgba(61,43,36,1.0)" data-preloading="true" data-preloaded="true" loaded="true">
                                                                                    <img src="{{ config('path.images') . $element }}" alt="" class="max-width-height">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @elseif ($timeline->data_type == config('settings.follow'))
                            <li class="js-stream-item stream-item stream-item">
                                <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet">
                                    <div class="content">
                                        <div class="stream-item-header">
                                            <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{ action('UserController@show', $userTimeline->id) }}">
                                                <img class="avatar js-action-profile-avatar" src="{{ $userTimeline->avatar }}" alt="{{ $userTimeline->fullname }}" class="max-width-height">
                                                <span class="FullNameGroup">
                                                    <strong class="fullname show-popup-with-id">{{ $userTimeline->fullname }}</strong>
                                                    <span class="UserNameBreak">&nbsp;</span>
                                                </span>
                                                <span class="username u-dir">@<b>{{ trans('user.follow-user') }}</b></span>
                                            </a>
                                            <small class="time">
                                                <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                    <span class="_timestamp js-short-timestamp">{{ $timeline->created_at }}</span>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="js-tweet-text-container">
                                            <p class="">
                                                {{ trans('user.follow-user') }}
                                                {{ $timeline->friend->fullname }}
                                            </p>
                                        </div>
                                        <div class="QuoteTweet u-block js-tweet-details-fixer">
                                            <div class="QuoteTweet-container">
                                                <div class="QuoteTweet-innerContainer u-cf js-permalink js-media-container" href="{{ action('CampaignController@show', $timeline->friends_id) }}">
                                                    <div class="tweet-content">
                                                        <div class="QuoteMedia">
                                                            <div class="QuoteMedia-container js-quote-media-container">
                                                                <div class="QuoteMedia-singlePhoto">
                                                                    <div class="QuoteMedia-photoContainer js-quote-photo" data-element-context="platform_photo_card">
                                                                        <a href="{{ action('UserController@show', $timeline->friends_id) }}">
                                                                            <img src="{{ $timeline->friend->avatar }}" alt="{{ $timeline->friend->avatar }}" class="max-width-height">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="QuoteTweet-authorAndText u-alignTop">
                                                            <div class="QuoteTweet-originalAuthor u-cf u-textTruncate stream-item-header account-group js-user-profile-link">
                                                                <a href="{{ action('UserController@show', $timeline->friends_id) }}" title="{{ $timeline->friend->fullname }}">
                                                                    <b class="QuoteTweet-fullname u-linkComplex-target">{{ $timeline->friend->fullname }}</b>
                                                                </a>
                                                                <span class="UserNameBreak">&nbsp;</span><span class="username u-dir">@<b>{{ $timeline->friend->name }}</b></span>
                                                            </div>
                                                            <div>
                                                                <span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $timeline->friend->address }}</span>
                                                                <span><a href="mailto:{{ $timeline->friend->email }}">{{ $timeline->friend->email }}</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @elseif ($timeline->data_type == config('settings.unfollow'))
                            <li class="js-stream-item stream-item stream-item">
                                <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet">
                                    <div class="content">
                                        <div class="stream-item-header">
                                            <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{ action('UserController@show', $userTimeline->id) }}">
                                                <img class="avatar js-action-profile-avatar" src="{{ $userTimeline->avatar }}" alt="{{ $userTimeline->fullname }}" class="max-width-height">
                                                <span class="FullNameGroup">
                                                    <strong class="fullname show-popup-with-id">{{ $userTimeline->fullname }}</strong>
                                                    <span class="UserNameBreak">&nbsp;</span>
                                                </span>
                                                <span class="username u-dir">@<b>{{ trans('user.unfollow-user') }}</b></span>
                                            </a>
                                            <small class="time">
                                                <a class="tweet-timestamp js-permalink js-nav js-tooltip" title="{{ $timeline->created_at }}">
                                                    <span class="_timestamp js-short-timestamp">{{ $timeline->created_at }}</span>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="js-tweet-text-container">
                                            <p class="">
                                                {{ trans('user.unfollow-user') }}
                                                {{ $timeline->friend->fullname }}
                                            </p>
                                        </div>
                                        <p class="u-hiddenVisually" aria-hidden="true">{{ trans('user.barack-obama-added,') }}</p>
                                        <div class="QuoteTweet u-block js-tweet-details-fixer">
                                            <div class="QuoteTweet-container">
                                                <a class="QuoteTweet-link js-nav" href="{{ action('UserController@show', $timeline->friends_id) }}">{{ $timeline->friend->fullname }}</a>
                                                <div class="QuoteTweet-innerContainer u-cf js-permalink js-media-container" href="{{ action('CampaignController@show', $timeline->friends_id) }}">
                                                    <div class="tweet-content">
                                                        <div class="QuoteMedia">
                                                            <div class="QuoteMedia-container js-quote-media-container">
                                                                <div class="QuoteMedia-singlePhoto">
                                                                    <div class="QuoteMedia-photoContainer js-quote-photo" data-element-context="platform_photo_card">
                                                                        <img src="{{ $timeline->friend->avatar }}" alt="{{ $timeline->friend->avatar }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="QuoteTweet-authorAndText u-alignTop">
                                                            <div class="QuoteTweet-originalAuthor u-cf u-textTruncate stream-item-header account-group js-user-profile-link">
                                                                <b class="QuoteTweet-fullname u-linkComplex-target">{{ $timeline->friend->fullname }}</b>
                                                                <span class="UserBadges">
                                                                    <span class="Icon Icon--verified"><span class="u-hiddenVisually">{{ trans('user.verified-account') }}</span></span>
                                                                </span>
                                                                <span class="UserNameBreak">&nbsp;</span><span class="username u-dir">@<b>{{ $timeline->friend->name }}</b></span>
                                                            </div>
                                                            <div class="QuoteTweet-text tweet-text u-dir">{{ $timeline->friend->address }}
                                                                <span class="twitter-atreply pretty-link js-nav"><b>{{ $timeline->friend->email }}</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
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
