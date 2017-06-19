<div class="Grid-cell u-size1of3">
    <div class="Grid Grid--withGutter">
        <div class="Grid-cell">
            <div class="ProfileSidebar ProfileSidebar--withRightAlignment">
                <div class="MoveableModule">
                    <div class="SidebarCommonModules">
                        <div class="WhoToFollow module is-visible">
                            <div class="WhoToFollow-header">
                                <h3 class="WhoToFollow-title">{{ trans('user.followers-that-you-know') }}</h3> ·
                                <a class="js-view-all-link" href="{{ action('UserController@following', $user->id) }}" rel="noopener">{{ trans('user.view-all') }}</a>
                            </div>
                            <div class="WhoToFollow-users">
                                @foreach ($UserList as $element)
                                    <div class="UserSmallListItem account-summary">
                                        <div class="dismiss js-action-dismiss">
                                            <span class="fa fa-times close-user-follow"></span>
                                        </div>
                                        <div class="content">
                                            <a class="account-group js-recommend-link js-user-profile-link user-thumb" href="{{ action('UserController@show', $element->id) }}" rel="noopener">
                                                <img class="avatar js-action-profile-avatar" src="{{ $element->avatar }}" alt="{{ $element->fullname }}">
                                                <span class="account-group-inner">
                                                    <strong class="fullname">{{ $element->fullname }}</strong>
                                                    <span class="UserNameBreak">&nbsp;</span>
                                                    <span class="username u-dir" dir="ltr">@<b>{{ $element->name }}</b></span>
                                                </span>
                                            </a>
                                            <small class="metadata social-context">
                                            </small>
                                            <div class="user-actions not-following not-muting">
                                                <span class="user-actions-follow-button js-follow-btn follow-button" data-user-id="{{ $element->id }}" data-size="small">
                                                    <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--small button-text follow-text follow">
                                                        <span class="fa fa-user-plus"></span>
                                                        <span>{{ trans('user.follow') }}</span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="WhoToFollow-footer">
                                <a href="#" class="show_all_follow" rel="noopener">{{ trans('user.view-all') }}</a>
                            </div>
                        </div>
                        <div class="Footer module roaming-module Footer--slim Footer--blankBackground">
                            <div class="flex-module">
                                <div class="flex-module-inner js-items-container">
                                    <ul class="u-cf">
                                        <li class="Footer-item Footer-copyright copyright">&copy;{{ trans('user.2017-charity') }}</li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="{{ action('OrtherController@aboutUs') }}" rel="noopener">{{ trans('user.abouts') }}</a>
                                        </li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="{{ action('OrtherController@contact') }}" rel="noopener">{{ trans('user.help-center') }}</a>
                                        </li>
                                        <li class="Footer-item">
                                            <a class="Footer-link" href="{{ action('OrtherController@member') }}" rel="noopener">{{ trans('user.terms') }}</a>
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
