@extends('layouts.user_template')

@section('js')
    @parent
    {{ Html::script('js/user_campaign.js') }}
    <script type="text/javascript">
        $( document ).ready(function() {
            var approve = new Approve(
                '{{ action('CampaignController@approveOrRemove') }}',
                '{{ trans('campaign.approve') }}',
                '{{ trans('campaign.remove') }}',
                '{{ action('ContributionController@confirmContribution') }}',
                '{{ trans('campaign.confirm') }}',
                '{{ trans('campaign.message_confirm') }}',
                '{{ trans('user.request_status.joined') }}',
                '{{ trans('user.request_status.waiting') }}',
                '{{ trans('campaign.confirmed') }}',
                '{{ trans('campaign.waiting') }}'
                );
            approve.init();
        });
    </script>
@endsection

@section('content')

<div class="Grid-cell u-lg-size2of3" data-test-selector="ProfileTimeline">
    <div class="ProfileHeading">
        <div class="ProfileHeading-spacer"></div>
        <div class="ProfileHeading-content">
            <h2 id="content-main-heading" class="ProfileHeading-title u-hiddenVisually">{{ trans('user.timeline') }}</h2>
            <ul class="ProfileHeading-toggle">
                <li class="ProfileHeading-toggleItem u-textUserColor" data-element-term="tweets_toggle">
                    <a class="ProfileHeading-toggleLink js-nav" href="{{ action('UserController@show', $userTimeline->id) }}" data-nav="tweets_with_replies_toggle">{{ trans('user.timeline') }}</a>
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
                    <li class="js-stream-item stream-item stream-item">
                        <div class="tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable dismissible-content original-tweet js-original-tweet">
                            <div class="col-xs-3">
                                <img src="{{ $campaignInfo->image->image }}" class="max-width-height height-200" alt="{{ $campaignInfo->name }}">
                            </div>
                            <div class="col-xs-9">
                                <a href="{{ action('CampaignController@show', ['id' => $campaignInfo->id]) }}">
                                    <i class="fa fa-eye"></i>
                                    <span class="campaign-name-custom">{{ $campaignInfo->name }}</span>
                                </a>
                                <p>
                                    <i class="fa fa-map-marker"></i>
                                    {{ $campaignInfo->address }}
                                </p>
                                @foreach ($campaignInfo->categories as  $value)
                                    <span><i class="fa fa-circle-o"></i> {{ $value->name }} : <strong>{{ $value->goal }}</strong>: <small>{{ $value->unit }}</small></span><br>
                                @endforeach
                                <p>
                                    <i class="fa fa-calendar"></i>
                                    {{ $campaignInfo->timeDay('start_time') }}
                                </p>
                                <p>
                                    <i class="fa fa-calendar"></i>
                                    {{ $campaignInfo->timeDay('end_time') }}
                                </p>
                            </div>
                        </div>
                    </li>
                    @if ($contributions->count())
                        <li class="AdaptiveStreamUserGallery AdaptiveSearchTimeline-separationModule">
                            <div class="AdaptiveSearchPage-moduleHeader">
                                <h3 class="AdaptiveSearchPage-moduleTitle">
                                    {{ trans('campaign.contribute') }}
                                    <a href="" class="AdaptiveSearchPage-moduleLink u-textUserColor">{{ trans('user.view-all') }}</a>
                                </h3>
                            </div>
                            <div class="Grid Grid--withGutter">
                                @foreach ($contributions as $key => $contribution)
                                    <div class="Grid-cell u-size1of2">
                                        <div class="AdaptiveStreamUserGallery-user js-stream-item">
                                            <div class="ProfileCard js-actionable-user">
                                                <a class="ProfileCard-bg js-nav" href="{{ action('UserController@show', ['id' => $contribution->user->id]) }}">
                                                    <img src="{{ $contribution->user->cover }}" alt="">
                                                </a>
                                                <div class="ProfileCard-content">
                                                    <a class="ProfileCard-avatarLink js-nav js-tooltip" href="{{ action('UserController@show', ['id' => $contribution->user->id]) }}" title="{{ $contribution->user->name }}">
                                                        <img class="ProfileCard-avatarImage js-action-profile-avatar" src="{{ $contribution->user->avatar }}" alt="">
                                                    </a>
                                                    <div class="ProfileCard-actions">
                                                        <div class="ProfileCard-userActions with-rightCaret js-userActions">
                                                            <div class="UserActions UserActions--small u-textLeft">
                                                                <div class="user-actions btn-group not-following not-muting">
                                                                    <span class="user-actions-follow-button js-follow-btn follow-button" data-contribution-id="{{ $contribution->id }}">
                                                                        @if (!$contribution->status)
                                                                            <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--small follow-text confirm">
                                                                                <span class="fa fa-user-plus"></span>
                                                                                <span>{{ trans('campaign.approve') }}</span>
                                                                            </button>
                                                                        @else
                                                                            <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small following-text confirm">
                                                                                <span class="fa fa-user-times"></span>
                                                                                <span>{{ trans('campaign.remove') }}</span>
                                                                            </button>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ProfileCard-userFields">
                                                        <div class="ProfileNameTruncated account-group">
                                                            <div class="u-textTruncate u-inlineBlock ProfileNameTruncated-withBadges ProfileNameTruncated-withBadges--1">
                                                                <a class="fullname ProfileNameTruncated-link u-textInheritColor js-nav" href="{{ action('UserController@show', ['id' => $contribution->user->id]) }}">
                                                                    {{ $contribution->user->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <span class="ProfileCard-screenname">
                                                            <a href="mailto:{{ $contribution->user->email }}" class="ProfileCard-screennameLink u-linkComplex js-nav" data-aria-label-part="">
                                                                <span class="username u-dir" dir="ltr">@<b class="u-linkComplex-target">{{ $contribution->user->email }}</b>
                                                                </span>
                                                            </a>
                                                        </span>
                                                        <br>
                                                        @foreach ($contribution->categoryContributions as $value)
                                                            <span>{{ $value->category->name }} : <strong>{{ $value->amount }}</strong> {{ $value->category->unit }}</span>
                                                            <br>
                                                        @endforeach
                                                        <span>{{ $contribution->description }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
@if ($campaignUsers->count())
    <div class="Grid-cell u-size1of3">
        <div class="Grid Grid--withGutter">
            <div class="Grid-cell">
                <div class="ProfileSidebar ProfileSidebar--withRightAlignment">
                    <div class="MoveableModule">
                        <div class="SidebarCommonModules">
                            <div class="WhoToFollow module is-visible">
                                <div class="WhoToFollow-header">
                                    <h3 class="WhoToFollow-title">{{ trans('campaign.members') }}</h3>
                                </div>
                                <div class="WhoToFollow-users">
                                    @foreach ($campaignUsers as $element)
                                        <div class="UserSmallListItem account-summary">
                                            <div class="dismiss js-action-dismiss">
                                                <span class="fa fa-times close-user-follow"></span>
                                            </div>
                                            <div class="content">
                                                <a class="account-group js-recommend-link js-user-profile-link user-thumb" href="{{ action('UserController@show', $element->id) }}" rel="noopener">
                                                    <img class="avatar js-action-profile-avatar" src="{{ $element->avatar }}" alt="{{ $element->fullname }}">
                                                    <span class="account-group-inner">
                                                        <strong class="fullname">{{ $element->fullname }}</strong>
                                                    </span>
                                                </a>
                                                <div class="user-actions not-following not-muting">
                                                    <span class="user-actions-follow-button js-follow-btn follow-button" data-campaign-id="{{ $campaignInfo->id }}" data-user-id="{{ $element->id }}" data-size="small">
                                                        @if (!$element->userCampaign->status)
                                                            <button type="button" class="EdgeButton EdgeButton--secondary EdgeButton--small follow-text approve">
                                                                <span class="fa fa-user-plus"></span>
                                                                <span>{{ trans('campaign.approve') }}</span>
                                                            </button>
                                                        @else
                                                            <button type="button" class="EdgeButton EdgeButton--danger EdgeButton--small following-text approve">
                                                                <span class="fa fa-user-times"></span>
                                                                <span>{{ trans('campaign.remove') }}</span>
                                                            </button>
                                                        @endif
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
@endif
@stop
