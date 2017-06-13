@extends('layouts.user_template')

@section('content')

<div class="Grid-cell">
    <div class="js-profileClusterFollow"></div>
</div>
<div class="Grid-cell u-lg-size2of3" data-test-selector="ProfileTimeline">
    <div class="ProfileHeading">
        <div class="ProfileHeading-spacer"></div>
        <div class="ProfileHeading-content">
            <h2 id="content-main-heading" class="ProfileHeading-title u-hiddenVisually ">{{ trans('user.tweets') }}</h2>
            <ul class="ProfileHeading-toggle">
                <li class="ProfileHeading-toggleItem  is-active" data-element-term="tweets_toggle">
                    <span aria-hidden="true">{{ trans('user.tweets') }}</span>
                </li>
                <li class="ProfileHeading-toggleItem  u-textUserColor" data-element-term="tweets_with_replies_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="" data-nav="tweets_with_replies_toggle">{{ trans('user.tweets-eplies') }}</a>
                </li>
                <li class="ProfileHeading-toggleItem  u-textUserColor" data-element-term="photos_and_videos_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="https://twitter.com/BarackObama/media" data-nav="photos_and_videos_toggle">
                        {{ trans('user.media') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="timeline" class="ProfileTimeline ">
        <div class="stream-container  " data-max-position="870695481290117120" data-min-position="793183793993519104">
            <div class="stream-item js-new-items-bar-container"></div>
            <div class="stream">
                <ol class="stream-items js-navigable-stream" id="stream-items-id">
                    <li class="js-stream-item stream-item stream-item" data-item-id="870695481290117120" id="stream-item-tweet-870695481290117120" data-item-type="tweet" data-suggestion-json="{&quot;suggestion_details&quot;:{},&quot;tweet_ids&quot;:&quot;870695481290117120&quot;,&quot;scribe_component&quot;:&quot;tweet&quot;}">
                        <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet has-cards  has-content" data-tweet-id="870695481290117120" data-item-id="870695481290117120" data-permalink-path="/BarackObama/status/870695481290117120" data-conversation-id="870695481290117120" data-tweet-nonce="870695481290117120-3e1228fc-1180-4a8a-a9c5-7df09bc7f69b" data-screen-name="BarackObama" data-name="Barack Obama" data-user-id="813286" data-you-follow="true" data-follows-you="false" data-you-block="false" data-reply-to-users-json="[{&quot;id_str&quot;:&quot;813286&quot;,&quot;screen_name&quot;:&quot;BarackObama&quot;,&quot;name&quot;:&quot;Barack Obama&quot;,&quot;emojified_name&quot;:{&quot;text&quot;:&quot;Barack Obama&quot;,&quot;emojified_text_as_html&quot;:&quot;Barack Obama&quot;}}]" data-disclosure-type="" data-has-cards="true" data-tweet-stat-initialized="true">
                            <div class="context"> </div>
                            <div class="content">
                                <div class="stream-item-header">
                                    <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="#" data-user-id="813286">
                                        <img class="avatar js-action-profile-avatar" src="profile_files/5g0FC8XX_bigger.jpg" alt="">
                                        <span class="FullNameGroup">
                                            <strong class="fullname show-popup-with-id " data-aria-label-part="">{{ trans('user.barack-obama') }}</strong><span>‏</span><span class="UserBadges"><span class="Icon Icon--verified"><span class="u-hiddenVisually">{{ trans('user.verified-account') }}</span></span>
                                        </span><span class="UserNameBreak">&nbsp;</span></span><span class="username u-dir" dir="ltr" data-aria-label-part="">@<b>{{ trans('user.barackobama') }}</b></span>
                                    </a>
                                    <small class="time">
                                        <a href="#" class="tweet-timestamp js-permalink js-nav js-tooltip" title="10:35 AM - 2 Jun 2017" data-conversation-id="870695481290117120"><span class="_timestamp js-short-timestamp " data-aria-label-part="last" data-time="1496424954" data-time-ms="1496424954000" data-long-form="true">{{ trans('user.jun-2') }}</span></a>
                                    </small>
                                    <div class="ProfileTweet-action ProfileTweet-action--more js-more-ProfileTweet-actions">
                                       <div class="dropdown">
                                        <button class="dropdown-toggle" type="" data-toggle="dropdown">
                                          <span class="glyphicon glyphicon-option-vertical"></span></button>
                                          <ul class="dropdown-menu">
                                              <li><a href="#"></a></li>
                                              <li><a href="#"></a></li>
                                              <li><a href="#"></a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="js-tweet-text-container">
                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text" data-aria-label-part="0" lang="en">{{ trans('user.content') }}
                                    <a href="#" class="twitter-timeline-link u-hidden" data-pre-embedded="true" dir="ltr">{{ trans('user.pic-twitter-com') }}</a>
                                </p>
                            </div>
                            <div class="AdaptiveMediaOuterContainer">
                                <div class="AdaptiveMedia is-square">
                                    <div class="AdaptiveMedia-container">
                                        <div class="AdaptiveMedia-singlePhoto">
                                            <div class="AdaptiveMedia-photoContainer js-adaptive-photo " data-image-url="" data-element-context="platform_photo_card" data-dominant-color="rgba(64,59,51,1.0)">
                                                <img data-aria-label-part="" src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stream-item-footer">
                                <div class="ProfileTweet-actionCountList u-hiddenVisually">
                                    <span class="ProfileTweet-action--reply u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="10952">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-reply-count-aria-870695481290117120" data-aria-label-part="">{{ trans('user.10-952-replie') }}</span>
                                        </span>
                                    </span>
                                    <span class="ProfileTweet-action--retweet u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="67779">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-retweet-count-aria-870695481290117120" data-aria-label-part="">{{ trans('user.10-952-replie') }}</span>
                                        </span>
                                    </span>
                                    <span class="ProfileTweet-action--favorite u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="336834">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-favorite-count-aria-870695481290117120" data-aria-label-part="">{{ trans('user.10-952-replie') }}</span>
                                        </span>
                                    </span>
                                </div>
                                <div class="ProfileTweet-actionList js-actions" role="group" aria-label="Tweet actions">
                                    <div class="ProfileTweet-action ProfileTweet-action--reply">
                                        <button class="ProfileTweet-actionButton js-actionButton js-actionReply" data-modal="ProfileTweet-reply" type="button" aria-describedby="profile-tweet-action-reply-count-aria-870695481290117120">
                                            <div class="IconContainer js-tooltip" title="Reply">
                                                <span class="Icon Icon--reply"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="10952">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.11k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--retweet js-toggleState js-toggleRt">
                                        <button class="ProfileTweet-actionButton  js-actionButton js-actionRetweet" data-modal="ProfileTweet-retweet" type="button" aria-describedby="profile-tweet-action-retweet-count-aria-870695481290117120">
                                            <div class="IconContainer js-tooltip" title="Retweet">
                                                <span class="Icon Icon--retweet"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="67779">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.11k') }}</span>
                                            </span>
                                        </button>
                                        <button class="ProfileTweet-actionButtonUndo js-actionButton js-actionRetweet" data-modal="ProfileTweet-retweet" type="button">
                                            <div class="IconContainer js-tooltip" title="Undo retweet">
                                                <span class="Icon Icon--retweet"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="67779">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.11k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--favorite js-toggleState">
                                        <button class="ProfileTweet-actionButton js-actionButton js-actionFavorite" type="button" aria-describedby="profile-tweet-action-favorite-count-aria-870695481290117120">
                                            <div class="IconContainer js-tooltip" title="Like">
                                                <div class="HeartAnimationContainer">
                                                    <div class="HeartAnimation"></div>
                                                </div>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="336834">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.11k') }}</span>
                                            </span>
                                        </button>
                                        <button class="ProfileTweet-actionButtonUndo u-linkClean js-actionButton js-actionFavorite" type="button">
                                            <div class="IconContainer js-tooltip" title="Undo like">
                                                <div class="HeartAnimationContainer">
                                                    <div class="HeartAnimation"></div>
                                                </div>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="336834">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.11k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--dm">
                                        <button class="ProfileTweet-actionButton u-textUserColorHover js-actionButton js-actionShareViaDM" type="button" data-nav="share_tweet_dm">
                                            <div class="IconContainer js-tooltip" title="Direct message">
                                                <span class="Icon Icon--dm"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.direct-message') }}</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dismiss-module">
                        <div class="dismissed-module">
                            <div class="feedback-action" data-feedback-type="DontLike">
                                <div class="action-confirmation">{{ trans('user.thanks') }}<span class="undo-action u-textUserColor">{{ trans('user.Undo') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="js-stream-item stream-item stream-item" data-item-id="868455601663332353" id="stream-item-tweet-868455601663332353" data-item-type="tweet" data-suggestion-json="{&quot;suggestion_details&quot;:{},&quot;tweet_ids&quot;:&quot;868455601663332353&quot;,&quot;scribe_component&quot;:&quot;tweet&quot;}">
                    <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet" data-tweet-id="868455601663332353" data-item-id="868455601663332353" data-permalink-path="/BarackObama/status/868455601663332353" data-conversation-id="868455601663332353" data-tweet-nonce="868455601663332353-aa541eb3-ad3b-4a4e-a817-dc0ebef3aa81" data-screen-name="BarackObama" data-name="Barack Obama" data-user-id="813286" data-you-follow="true" data-follows-you="false" data-you-block="false" data-reply-to-users-json="[{&quot;id_str&quot;:&quot;813286&quot;,&quot;screen_name&quot;:&quot;BarackObama&quot;,&quot;name&quot;:&quot;Barack Obama&quot;,&quot;emojified_name&quot;:{&quot;text&quot;:&quot;Barack Obama&quot;,&quot;emojified_text_as_html&quot;:&quot;Barack Obama&quot;}}]" data-disclosure-type="" data-tweet-stat-initialized="true">
                        <div class="context">
                        </div>
                        <div class="content">
                            <div class="stream-item-header">
                                <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="#" data-user-id="813286">
                                    <img class="avatar js-action-profile-avatar" src="profile_files/5g0FC8XX_bigger.jpg" alt="">
                                    <span class="FullNameGroup">
                                        <strong class="fullname show-popup-with-id ">{{ trans('user.barack-obama') }}</strong>
                                        <span>‏</span>
                                        <span class="UserBadges">
                                            <span class="Icon Icon--verified"><span class="u-hiddenVisually">{{ trans('user.verified-account') }}</span></span>
                                        </span>
                                        <span class="UserNameBreak">&nbsp;</span>
                                    </span>
                                    <span class="username u-dir" dir="ltr">@<b>{{ trans('user.barackobama') }}</b></span>
                                </a>
                                <small class="time">
                                    <a href="#" class="tweet-timestamp js-permalink js-nav js-tooltip" title="6:15 AM - 27 May 2017" data-conversation-id="868455601663332353">
                                        <span class="_timestamp js-short-timestamp " data-aria-label-part="last" data-time="1495890925" data-time-ms="1495890925000" data-long-form="true">May 27</span>
                                    </a>
                                </small>
                                <div class="ProfileTweet-action ProfileTweet-action--more js-more-ProfileTweet-actions">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="" data-toggle="dropdown">
                                          <span class="glyphicon glyphicon-option-vertical"></span></button>
                                          <ul class="dropdown-menu">
                                              <li><a href="#"></a></li>
                                              <li><a href="#"></a></li>
                                              <li><a href="#"></a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <p class="u-hiddenVisually" aria-hidden="true" data-aria-label-part="1">{{ trans('user.barack-obama-retweeted') }}</p>
                              <div class="js-tweet-text-container">
                                <p class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text" data-aria-label-part="4" lang="en">{{ trans('user.content') }}
                                    <a href="" rel="nofollow noopener" dir="ltr" data-expanded-url="" class="twitter-timeline-link u-hidden" target="_blank" title="">
                                        <span class="tco-ellipsis"></span><span class="invisible">{{ trans('user.https://') }}</span>
                                        <span class="js-display-url">{{ trans('user.twitter.com/kensingtonroya') }}</span><span class="invisible">{{ trans('user.abc') }}</span><span class="tco-ellipsis"><span class="invisible">&nbsp;</span>…</span>
                                    </a>
                                </p>
                            </div>
                            <p class="u-hiddenVisually" aria-hidden="true" data-aria-label-part="3">{{ trans('user.barack-obama-added,') }}</p>
                            <div class="QuoteTweet u-block js-tweet-details-fixer">
                                <div class="QuoteTweet-container">
                                    <a class="QuoteTweet-link js-nav" href="https://twitter.com/KensingtonRoyal/status/868418451970379776" data-conversation-id="868418451970379776" aria-hidden="true"></a>
                                    <div class="QuoteTweet-innerContainer u-cf js-permalink js-media-container" data-item-id="868418451970379776" data-item-type="tweet" data-screen-name="KensingtonRoyal" data-user-id="2812768561" href="/KensingtonRoyal/status/868418451970379776" data-conversation-id="868418451970379776" tabindex="0">
                                        <div class="tweet-content">
                                            <div class="QuoteMedia">
                                                <div class="QuoteMedia-container js-quote-media-container">
                                                    <div class="QuoteMedia-singlePhoto">
                                                        <div class="QuoteMedia-photoContainer js-quote-photo" data-image-url="" data-element-context="platform_photo_card" data-dominant-color="rgba(38,32,33,1.0)">
                                                            <img data-aria-label-part="" src="" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="QuoteTweet-authorAndText u-alignTop">
                                                <div class="QuoteTweet-originalAuthor u-cf u-textTruncate stream-item-header account-group js-user-profile-link">
                                                    <b class="QuoteTweet-fullname u-linkComplex-target">{{ trans('user.kensington-palace') }}</b>
                                                    <span class="UserBadges">
                                                        <span class="Icon Icon--verified"><span class="u-hiddenVisually">{{ trans('user.verified-account') }}</span></span>
                                                    </span>
                                                    <span class="UserNameBreak">&nbsp;</span><span class="username u-dir" dir="ltr">@<b>{{ trans('user.kensingtonRoyal') }}</b></span>
                                                </div>
                                                <div class="QuoteTweet-text tweet-text u-dir" data-aria-label-part="2" dir="ltr" lang="en">{{ trans('user.prince-harry-hosted') }}
                                                    <span class="twitter-atreply pretty-link js-nav" dir="ltr" data-mentioned-user-id="813286"><s>@</s><b>{{ trans('user.barackobama') }}</b></span>{{ trans('user. at-kensington-palace-today') }}
                                                    <span class="twitter-timeline-link u-hidden" data-pre-embedded="true" dir="ltr">{{ trans('user.pic-twitter-com-9SWfSRY4FH') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stream-item-footer">
                                <div class="ProfileTweet-actionCountList u-hiddenVisually">
                                    <span class="ProfileTweet-action--reply u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="6252">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-reply-count-aria-868455601663332353" data-aria-label-part="">{{ trans('user.6-replies') }}</span>
                                        </span>
                                    </span>
                                    <span class="ProfileTweet-action--retweet u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="74657">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-retweet-count-aria-868455601663332353" data-aria-label-part="">{{ trans('user.6-replies') }}</span>
                                        </span>
                                    </span>
                                    <span class="ProfileTweet-action--favorite u-hiddenVisually">
                                        <span class="ProfileTweet-actionCount" data-tweet-stat-count="472581">
                                            <span class="ProfileTweet-actionCountForAria" id="profile-tweet-action-favorite-count-aria-868455601663332353" data-aria-label-part="">{{ trans('user.6-replies') }}</span>
                                        </span>
                                    </span>
                                </div>
                                <div class="ProfileTweet-actionList js-actions" role="group" aria-label="Tweet actions">
                                    <div class="ProfileTweet-action ProfileTweet-action--reply">
                                        <button class="ProfileTweet-actionButton js-actionButton js-actionReply" data-modal="ProfileTweet-reply" type="button" aria-describedby="profile-tweet-action-reply-count-aria-868455601663332353">
                                            <div class="IconContainer js-tooltip" title="Reply">
                                                <span class="Icon Icon--reply"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="6252">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.63-k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--retweet js-toggleState js-toggleRt">
                                        <button class="ProfileTweet-actionButton  js-actionButton js-actionRetweet" data-modal="ProfileTweet-retweet" type="button" aria-describedby="profile-tweet-action-retweet-count-aria-868455601663332353">
                                            <div class="IconContainer js-tooltip" title="Retweet">
                                                <span class="Icon Icon--retweet"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="74657">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.63-k') }}</span>
                                            </span>
                                        </button>
                                        <button class="ProfileTweet-actionButtonUndo js-actionButton js-actionRetweet" data-modal="ProfileTweet-retweet" type="button">
                                            <div class="IconContainer js-tooltip" title="Undo retweet">
                                                <span class="Icon Icon--retweet"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="74657">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.63-k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--favorite js-toggleState">
                                        <button class="ProfileTweet-actionButton js-actionButton js-actionFavorite" type="button" aria-describedby="profile-tweet-action-favorite-count-aria-868455601663332353">
                                            <div class="IconContainer js-tooltip" title="Like">
                                                <div class="HeartAnimationContainer">
                                                    <div class="HeartAnimation"></div>
                                                </div>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="472581">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.63-k') }}</span>
                                            </span>
                                        </button>
                                        <button class="ProfileTweet-actionButtonUndo u-linkClean js-actionButton js-actionFavorite" type="button">
                                            <div class="IconContainer js-tooltip" title="Undo like">
                                                <div class="HeartAnimationContainer">
                                                    <div class="HeartAnimation"></div>
                                                </div>
                                                <span class="u-hiddenVisually">{{ trans('user.reply') }}</span>
                                            </div>
                                            <span class="ProfileTweet-actionCount" data-tweet-stat-count="472581">
                                                <span class="ProfileTweet-actionCountForPresentation" aria-hidden="true">{{ trans('user.63-k') }}</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ProfileTweet-action ProfileTweet-action--dm">
                                        <button class="ProfileTweet-actionButton u-textUserColorHover js-actionButton js-actionShareViaDM" type="button" data-nav="share_tweet_dm">
                                            <div class="IconContainer js-tooltip" title="Direct message">
                                                <span class="Icon Icon--dm"></span>
                                                <span class="u-hiddenVisually">{{ trans('user.direct-message') }}</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dismiss-module">
                        <div class="dismissed-module">
                            <div class="feedback-action" data-feedback-type="DontLike">
                                <div class="action-confirmation">{{ trans('user.thanks') }}
                                    <span class="undo-action u-textUserColor">{{ trans('user.undo') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
            <div class="stream-footer">
                <div class="timeline-end has-items has-more-items">
                    <div class="stream-end">
                        <div class="stream-end-inner">
                            <span class="Icon Icon--large Icon--logo"></span>
                            <p class="empty-text">
                                {{ trans('user.barackObama-hasnt-tweeted-yet') }}
                            </p>
                        </div>
                    </div>
                    <div class="stream-loading">
                        <div class="stream-end-inner">
                            <span class="spinner" title="Loading..."></span>
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
