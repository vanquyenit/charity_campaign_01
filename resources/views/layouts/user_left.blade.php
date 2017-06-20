<div class="Grid-cell u-size1of3 u-lg-size1of4">
    <div class="Grid Grid--withGutter">
        <div class="Grid-cell">
            <div class="ProfileSidebar ProfileSidebar--withLeftAlignment">
                <div class="ProfileHeaderCard">
                    <h1 class="ProfileHeaderCard-name">
                        <a href="{{ action('UserController@show', $user->id) }}" class="ProfileHeaderCard-nameLink u-textInheritColor js-nav">{{ $user->fullname }}</a>
                    </h1>
                    <h2 class="ProfileHeaderCard-screenname u-inlineBlock u-dir" dir="ltr">
                        <a class="ProfileHeaderCard-screennameLink u-linkComplex js-nav" href="{{ action('UserController@show', $user->id) }}">
                            <span class="username u-dir" dir="ltr">@<b class="u-linkComplex-target">{{ $user->name }}</b></span>
                        </a>
                    </h2>
                    <div class="ProfileHeaderCard-joinDate">
                        <span class="fa fa-calendar"></span>
                        <span class="ProfileHeaderCard-joinDateText js-tooltip u-dir" dir="ltr" title="{{ $user->birthday }}">{{ $user->birthday }}</span>
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        <span class="fa fa-map-marker"></span>
                        <a href="" title="">
                            <span class="ProfileHeaderCard-joinDateText js-tooltip u-dir" dir="ltr" title="{{ $user->address }}">{{ $user->address }}</span>
                        </a>
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        <span class="fa fa-phone"></span>
                        <a href="" title="">
                            <span class="ProfileHeaderCard-joinDateText js-tooltip u-dir" dir="ltr" title="{{ $user->phone_number }}">{{ $user->phone_number }}</span>
                        </a>
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        <span class="fa fa-envelope"></span>
                        <a href="" title="">
                            <span class="ProfileHeaderCard-joinDateText js-tooltip u-dir" dir="ltr" title="{{ $user->email }}">{{ $user->email }}</span>
                        </a>
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        <i class="fa fa-handshake-o"></i>
                        <span class="ProfileHeaderCard-joinDateText js-tooltip u-dir" dir="ltr" title="{{ trans('user.joined') . ' ' . $user->created_at }}">{{ trans('user.joined') . ' ' . $user->created_at }}</span>
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        @if (Auth::user()->id != $user->id)
                            {!! Form::hidden('target_id', $user->id, ['id' => 'target_id']) !!}
                            {!! Form::hidden('input-1', '', ['id' => 'allow-rating-user', 'class' => 'rating rating-loading', 'data-min' => '0', 'data-step' => '1', 'data-size' => '5']) !!}
                        @else
                            {!! Form::hidden('input-1', '', ['id' => 'not-allow-rating-user', 'class' => 'rating rating-loading', 'data-min' => '0', 'data-step' => '1', 'data-size' => 'xs']) !!}
                        @endif
                    </div>
                    <div class="ProfileHeaderCard-joinDate">
                        <div class="reviews-stats"> {{ trans('campaign.total') }}
                            <span class="glyphicon glyphicon-user color"></span>
                            <span class="reviews-num-user">{{ $averageRankingUser['amount'] }}</span>
                        </div>
                    </div>
                    @if ($user->id == auth()->id())
                        <div class="ProfileMessagingActions">
                            <div class="ProfileMessagingActions-actionsContainer">
                                <div class="ProfileMessagingActions-buttonWrapper u-sizeFull">
                                    <button data-toggle="modal" href='#modal-id' class="NewTweetButton u-sizeFull js-tooltip EdgeButton EdgeButton--primary  u-textTruncate" type="button" title="{{ $user->name }}">
                                        <span class="NewTweetButton-content button-text tweeting-text">
                                            <span class="NewTweetButton-text" aria-hidden="true">{{ trans('user.update-user') }}</span>
                                            <span class="u-hiddenVisually">{{ trans('user.update-user') }}</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="ProfileUserList ProfileUserList--socialProof">
                    <div class="ProfileUserList-heading">
                        <div class="ProfileUserList-title">
                            <span class="fa fa-group"></span>
                            <span class="ProfileUserList-listName">
                                <a href="#" class="ProfileUserList-permalink u-textUserColor js-nav">{{ count($followers) . ' ' . trans('user.followers-that-you-know') }}</a>
                            </span>
                        </div>
                    </div>
                    <ul class="ProfileUserList-facepile u-cf">
                        @foreach ($followers as $element)
                            <li class="ProfileUserList-facepileItem">
                                <a class="u-block js-tooltip js-nav" href="{{ action('UserController@show', $element->follower->id) }}" original-title="{{ $element->follower->fullname }}" title="{{ $element->follower->fullname }}" data-nav="avatar">
                                    <img class="Avatar Avatar--size48" src="{{ $element->follower->avatar }}" alt="{{ $element->follower->avatar }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="PhotoRail" data-loaded="true">
                    <div class="PhotoRail-heading">
                        <span class="fa fa-video-camera"></span>
                        <span class="PhotoRail-headingText PhotoRail-headingText--withCount">
                            <a href="{{ action('UserController@listUserBlog', $user->id) }}" class="PhotoRail-headingWithCount js-nav">{{ trans('user.video-images') }}</a>
                        </span>
                    </div>
                    @if (count($listImage))
                        <div class="PhotoRail-mediaBox">
                            @foreach (json_decode($listImage->content) as $element)
                                <span class="tweet-media-img-placeholder js-nav">
                                    <div class="media-overlay"></div>
                                    <img src="{{ config('path.images') . $element }}" class="max-width-height">
                                </span>
                                <span class="js-photoRailInsertPoint"></span>
                             @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
