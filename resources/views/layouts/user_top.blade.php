<div class="ProfileCanopy ProfileCanopy--withNav ProfileCanopy--large js-variableHeightTopBar">
    <div class="ProfileCanopy-inner">
        <div class="ProfileCanopy-header u-bgUserColor">
            <div class="ProfileCanopy-headerBg">
                <img alt="{{ $user->cover }}" src="{{ asset('uploads/images/' . $user->cover) }}">
            </div>
            <div class="AppContainer">
                <div class="ProfileCanopy-avatar">
                    <div class="ProfileAvatar">
                        <a class="ProfileAvatar-container u-block js-tooltip profile-picture" href="#" title="{{ $user->fullname }}" data-resolved-url-large="#" data-url="#" target="_blank" rel="noopener">
                            <img class="ProfileAvatar-image" src="{{ $user->avatar }}" alt="{{ $user->fullname }}">
                        </a>
                    </div>
                </div>
                <div class="ProfileCanopy-headerPromptAnchor"></div>
            </div>
        </div>
        <div class="ProfileCanopy-navBar u-boxShadow">
            <div class="AppContainer">
                <div class="Grid Grid--withGutter">
                    <div class="Grid-cell u-size1of3 u-lg-size1of4">
                        <div class="ProfileCanopy-card" role="presentation" aria-hidden="true">
                            <div class="ProfileCardMini">
                                <a class="ProfileCardMini-avatar profile-picture js-tooltip" href="#" title="{{ $user->fullname }}" data-resolved-url-large="#" data-url="#" target="_blank" rel="noopener" tabindex="-1">
                                    <img class="ProfileCardMini-avatarImage" alt="{{ $user->fullname }}" src="">
                                </a>
                                <div class="ProfileCardMini-details">
                                    <div class="ProfileNameTruncated account-group">
                                        <div class="u-textTruncate u-inlineBlock ProfileNameTruncated-withBadges ProfileNameTruncated-withBadges--1">
                                            <a class="fullname ProfileNameTruncated-link u-textInheritColor js-nav" href="#" data-aria-label-part="" tabindex="-1">{{ $user->fullname }}</a>
                                        </div>
                                    </div>
                                    <div class="ProfileCardMini-screenname">
                                        <a href="#" class="ProfileCardMini-screennameLink u-linkComplex js-nav u-dir" dir="ltr" tabindex="-1">
                                            <span class="username u-dir" dir="ltr">@<b class="u-linkComplex-target">{{ $user->fullname }}</b></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Grid-cell u-size2of3 u-lg-size3of4">
                        <div class="ProfileCanopy-nav">
                            <div class="ProfileNav" role="navigation" data-user-id="813286">
                                <ul class="ProfileNav-list">
                                    <li class="ProfileNav-item ProfileNav-item--tweets is-active" style="">
                                        <a class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav" title="15,451 Tweets" data-nav="tweets" tabindex="0">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.timeline') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.timeline') }}</span>
                                            <span class="ProfileNav-value" data-count="15451" data-is-compact="true">{{ count($userTimeline->timelines) }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--following" style="">
                                        <a class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav u-textUserColor" href="#">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.following') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.following') }}</span>
                                            <span class="ProfileNav-value" data-count="629581" data-is-compact="true">{{ count($following) }}</span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--followers" style="">
                                        <a class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav u-textUserColor" href="#">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.followers') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.followers') }}</span>
                                            <span class="ProfileNav-value" data-count="90520436" data-is-compact="true">{{ count($followers) }}</span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--more dropdown is-hidden" style="">
                                        <a class="ProfileNav-stat ProfileNav-stat--link ProfileNav-stat--moreLink js-dropdown-toggle" role="button" href="#more" aria-haspopup="true">
                                            <span class="ProfileNav-label">&nbsp;</span>
                                            <span class="ProfileNav-value">{{ trans('user.more') }} <span class="ProfileNav-dropdownCaret Icon Icon--medium Icon--caretDown"></span></span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--userActions u-floatRight u-textRight with-rightCaret">
                                        <div class="UserActions u-textLeft">
                                            <div class="user-actions btn-group following not-muting including">
                                                <span class="user-actions-follow-button js-follow-btn follow-button">
                                                    <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--medium button-text follow-text">
                                                        <span class="Icon Icon--follow"></span>
                                                        <span>{{ trans('user.followers') }}</span>
                                                    </button>
                                                    <button type="button" class="EdgeButton EdgeButton--primary EdgeButton--medium button-text following-text">{{ trans('user.following') }}</button>
                                                    <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--medium button-text unfollow-text">{{ trans('user.unfollow') }}</button>
                                                </span>
                                              </div>
                                          </div>
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
