@extends('layouts.user_template')

@section('content')

<div class="Grid-cell">
    <div class="js-profileClusterFollow"></div>
</div>
<div class="Grid-cell">
    <div class="ProfileHeading">
        <div class="ProfileHeading-spacer"></div>
    </div>
    <div>
        <div class="stream-item js-new-items-bar-container"> </div>
        <div class="GridTimeline-items has-items" role="list">
            <div class="Grid Grid--withGutter">
                @foreach ($following as $element)
                    <div class="Grid-cell u-size1of2 u-lg-size1of3 u-mb10">
                        <div class="js-stream-item" role="listitem">
                            <div class="ProfileCard js-actionable-user">
                                <a class="ProfileCard-bg js-nav" href="{{ action('UserController@show', $element->following->id) }}">
                                    <img class="ProfileCard-bg js-nav" src="{{ $element->following->cover }}">
                                </a>
                                <div class="ProfileCard-content">
                                    <a class="ProfileCard-avatarLink js-nav js-tooltip" href="{{ action('UserController@show', $element->following->id) }}">
                                        <img class="ProfileCard-avatarImage js-action-profile-avatar" src="{{ $element->following->avatar }}">
                                    </a>
                                    <div class="ProfileCard-actions">
                                        <div class="ProfileCard-userActions with-rightCaret js-userActions">
                                            <div class="UserActions UserActions--small u-textLeft">
                                                <div class="user-actions btn-group not-muting including following">
                                                    <span class="user-actions-follow-button js-follow-btn follow-button">
                                                        @if (auth()->id() != $element->target_id)
                                                            @if (auth()->guest())
                                                                <a class="EdgeButton EdgeButton--secondary EdgeButton--small button-text follow-text" href="{{ url('/login') }}"><i class="fa fa-user-plus"></i> {{ trans('user.follow') }}</a>
                                                            @else
                                                                <div data-user-id="{{ $element->target_id }}" data-size="small">
                                                                    @if (auth()->user()->checkFollow($element->target_id))
                                                                        <button type="button" class="EdgeButton EdgeButton--primary EdgeButton--small button-text following-text follow">{{ trans('user.following') }}</button>
                                                                        <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small button-text unfollow-text follow"> <span>{{ trans('user.unfollow') }}</span></button>
                                                                    @else
                                                                        <button type="button" name="" class="EdgeButton EdgeButton--secondary EdgeButton--small button-text follow-text follow">
                                                                            <i class="fa fa-user-plus"></i> <span>{{ trans('user.follow') }}</span>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ProfileCard-userFields">
                                        <div class="ProfileNameTruncated account-group">
                                            <div class="u-textTruncate u-inlineBlock ProfileNameTruncated-withBadges ProfileNameTruncated-withBadges--1">
                                                <a class="fullname ProfileNameTruncated-link u-textInheritColor js-nav" href="{{ action('UserController@show', $element->following->id) }}">{{ $element->following->fullname }}</a>
                                            </div>
                                        </div>
                                        <span class="ProfileCard-screenname">
                                            <a href="{{ action('UserController@show', $element->following->id) }}" class="ProfileCard-screennameLink u-linkComplex js-nav">
                                                <span class="username u-dir">@<b class="u-linkComplex-target">{{ $element->following->name }}</b></span>
                                            </a>
                                            <span>‏</span>
                                        </span>
                                        <p class="ProfileCard-bio u-dir">{{ $element->following->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
