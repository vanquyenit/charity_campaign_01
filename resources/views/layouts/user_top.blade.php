<div class="ProfileCanopy ProfileCanopy--withNav ProfileCanopy--large js-variableHeightTopBar">
    <div class="ProfileCanopy-inner">
        <div class="ProfileCanopy-header u-bgUserColor">
            <div class="ProfileCanopy-headerBg">
                <img alt="{{ $user->cover }}" src="{{ $user->cover }}">
            </div>
            <div class="AppContainer">
                <div class="ProfileCanopy-avatar">
                    <div class="ProfileAvatar">
                        <a class="ProfileAvatar-container u-block js-tooltip profile-picture" href="#" title="{{ $user->fullname }}" target="_blank">
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
                                <a class="ProfileCardMini-avatar profile-picture js-tooltip" href="#" title="{{ $user->fullname }}" target="_blank">
                                    <img class="ProfileCardMini-avatarImage" alt="{{ $user->fullname }}" src="">
                                </a>
                                <div class="ProfileCardMini-details">
                                    <div class="ProfileNameTruncated account-group">
                                        <div class="u-textTruncate u-inlineBlock ProfileNameTruncated-withBadges ProfileNameTruncated-withBadges--1">
                                            <a class="fullname ProfileNameTruncated-link u-textInheritColor js-nav" href="#" >{{ $user->fullname }}</a>
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
                            <div class="ProfileNav">
                                <ul class="ProfileNav-list">
                                    <li class="ProfileNav-item ProfileNav-item--tweets">
                                        <a href="{{ action('UserController@show', $user->id) }}" class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.timeline') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.timeline') }}</span>
                                            <span class="ProfileNav-value">{{ count($userTimeline->timelines) }}</span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--following">
                                        <a href="{{ action('UserController@following', $user->id) }}" class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav u-textUserColor" href="#">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.following') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.following') }}</span>
                                            <span class="ProfileNav-value">{{ count($following) }}</span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--followers">
                                        <a href="{{ action('UserController@follower', $user->id) }}" class="ProfileNav-stat ProfileNav-stat--link u-borderUserColor u-textCenter js-tooltip js-nav u-textUserColor" href="#">
                                            <span class="ProfileNav-label" aria-hidden="true">{{ trans('user.followers') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.followers') }}</span>
                                            <span class="ProfileNav-value">{{ count($followers) }}</span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--more dropdown is-hidden">
                                        <a class="ProfileNav-stat ProfileNav-stat--link ProfileNav-stat--moreLink js-dropdown-toggle" role="button" href="#more" aria-haspopup="true">
                                            <span class="ProfileNav-label">&nbsp;</span>
                                            <span class="ProfileNav-value">{{ trans('user.more') }} <span class="ProfileNav-dropdownCaret Icon Icon--medium Icon--caretDown"></span></span>
                                        </a>
                                    </li>
                                    <li class="ProfileNav-item ProfileNav-item--userActions u-floatRight u-textRight with-rightCaret">
                                        <div class="UserActions u-textLeft">
                                            <div class="user-actions btn-group following not-muting including">
                                                <span class="user-actions-follow-button js-follow-btn follow-button">
                                                    @if (auth()->id() != $user->id)
                                                        @if (auth()->guest())
                                                            <a class="EdgeButton EdgeButton--secondary EdgeButton--medium button-text follow-text" href="{{ action('Auth\UserLoginController@getLogin') }}"><i class="fa fa-user-plus"></i> {{ trans('user.follow') }}</a>
                                                        @else
                                                            <div data-user-id="{{ $user->id }}" data-size="medium">
                                                                @if (auth()->user()->checkFollow($user->id))
                                                                    <button type="button" class="EdgeButton EdgeButton--primary EdgeButton--medium button-text following-text follow">{{ trans('user.following') }}</button>
                                                                    <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--medium button-text unfollow-text follow">{{ trans('user.unfollow') }}</button>
                                                                @else
                                                                    <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--medium follow-text follow">
                                                                        <i class="fa fa-user-plus"></i> <span>{{ trans('user.follow') }}</span>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
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
