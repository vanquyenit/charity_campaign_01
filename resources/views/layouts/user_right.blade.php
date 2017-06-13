<div class="Grid-cell u-size1of3">
    <div class="Grid Grid--withGutter">
        <div class="Grid-cell">
            <div class="ProfileSidebar ProfileSidebar--withRightAlignment">
                <div class="MoveableModule">
                    <div class="SidebarCommonModules">
                        <div class="WhoToFollow module is-visible">
                            <div class="WhoToFollow-header">
                                <h3 class="WhoToFollow-title">{{ trans('user.who-to-follow<') }}</h3> ·
                                <button class="btn-link js-refresh-suggestions" type="button">{{ trans('user.refresh') }}</button>·
                                <a class="js-view-all-link" href="https://twitter.com/who_to_follow/suggestions" data-element-term="view_all_link" rel="noopener">{{ trans('user.view-all') }}</a>
                            </div>
                            <div class="WhoToFollow-users js-recommended-followers" data-section-id="wtf">
                                <div class="UserSmallListItem js-account-summary account-summary js-actionable-user " data-user-id="32959253" data-feedback-token="117" data-impression-id="">
                                    <div class="dismiss js-action-dismiss"><span class="Icon Icon--close"></span>
                                    </div>
                                    <div class="content">
                                        <a class="account-group js-recommend-link js-user-profile-link user-thumb" href="https://twitter.com/khloekardashian" data-user-id="32959253" rel="noopener">
                                            <img class="avatar js-action-profile-avatar " src="profile_files/micE09zi_normal.jpg" alt="">
                                            <span class="account-group-inner" data-user-id="32959253">
                                                <strong class="fullname">{{ trans('user.Khloé') }}</strong>
                                                <span class="UserBadges">
                                                    <span class="Icon Icon--verified"><span class="u-hiddenVisually">{{ trans('user.verified-account') }}</span></span>
                                                </span>
                                                <span class="UserNameBreak">&nbsp;</span><span class="username u-dir" dir="ltr">@<b>{{ trans('user.khloekardashian') }}</b></span>
                                            </span>
                                        </a>
                                        <small class="metadata social-context">
                                        </small>
                                        <div class="user-actions not-following not-muting" data-screen-name="khloekardashian" data-user-id="32959253">
                                            <span class="user-actions-follow-button js-follow-btn follow-button">
                                                <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--small button-text follow-text">
                                                    <span class="Icon Icon--follow"></span>
                                                    <span>{{ trans('user.follow') }}</span>
                                                </button>
                                                <button type="button" class="EdgeButton EdgeButton--primary EdgeButton--small button-text following-text"> {{ trans('user.following') }}</button>
                                                <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small button-text unfollow-text">{{ trans('user.unfollow') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="WhoToFollow-footer">
                                <a href="#" class="js-find-friends-link" data-element-term="import_link" rel="noopener">{{ trans('user.find-friends') }}</a>
                            </div>
                        </div>
                        <div class="module Trends trends">
                            <div class="trends-inner">
                                <div class="flex-module trends-container context-trends-container">
                                    <div class="flex-module-header">
                                        <h3><span class="trend-location js-trend-location">{{ trans('user.trends') }}</span></h3>
                                        <span class="middot" aria-hidden="true">·</span>
                                        <a role="button" href="#" data-modal="change-trends" class="btn-link change-trends js-trend-toggle">
                                            <span aria-hidden="true">{{ trans('user.change') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.change-trend-settings') }}</span>
                                        </a>
                                    </div>
                                    <div class="flex-module-inner">
                                        <ul class="trend-items js-trends">
                                            <li class="trend-item js-trend-item  context-trend-item" data-trend-name="#USMNT" data-trends-id="-2540836992965456695" data-trend-token=":tailored_request:hashtag_trend:recservice_source:social_context_2_metadescription:">
                                                <a class="pretty-link js-nav js-tooltip u-linkComplex " href="" data-query-source="trend_click">
                                                    <span class="u-linkComplex-target trend-name" dir="ltr">#{{ trans('user.usmt') }}</span>
                                                    <div class="js-nav trend-item-context"></div>
                                                    <div class="js-nav trend-item-stats">{{ trans('user.espn-are-tweeting-about-this') }}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Footer module roaming-module Footer--slim Footer--blankBackground">
                            <div class="flex-module">
                                <div class="flex-module-inner js-items-container">
                                    <ul class="u-cf">
                                        <li class="Footer-item Footer-copyright copyright">{{ trans('user.2017-twitter') }}</li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="#" rel="noopener">{{ trans('user.about') }}</a>
                                        </li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="W" rel="noopener">{{ trans('user.help -center') }}</a>
                                        </li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="W" rel="noopener">{{ trans('user.terms') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
