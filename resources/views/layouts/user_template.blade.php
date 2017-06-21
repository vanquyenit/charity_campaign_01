<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ trans('message.page_titles.welcome') }}">
    <title>{{ trans('message.project') }}</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="shortcut icon" href="{{ asset('/img/001-world.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('css')
        {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,italic,600,600italic,700,700italic,800,800italic&#038;subset=greek-ext,greek,cyrillic-ext,latin-ext,latin,vietnamese,cyrillic') }}
        {{ Html::style('http://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&#038;subset=greek-ext,greek,cyrillic-ext,latin-ext,latin,vietnamese,cyrillic') }}
        {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}
        {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
        {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css') }}
        {{ Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') }}
        {{ Html::style('bower_components/datatables/media/css/dataTables.bootstrap.min.css') }}
        {{ Html::style('bower_components/bootstrap-star-rating/css/star-rating.css') }}
        {{ Html::style('bower_components/bootstrap-star-rating/css/theme-krajee-fa.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/autoptimize.css') }}
        {{ Html::style('css/master.css') }}
        {{ Html::style('css/user_profile.css') }}
    @show

</head>

<body class="archive post-type-archive post-type-archive-dn_campaign group-blog tp_event-template-default single single-tp_event home page-template
page-template-page-templates page-template-homepage page-template-page-templateshomepage-php page page-id-4967
siteorigin-panels siteorigin-panels-home group-blog loading thim_header_custom_style thim_header_style2 thim_fixedmenu ">
@include('layouts.header')
<div class="hide" data-token="{{ csrf_token() }}"></div>
<div dir="ltr" data-fouc-class-names="swift-loading" class="three-col logged-in user-style-BarackObama enhanced-mini-profile ProfilePage ProfilePage--withWarning supports-drag-and-drop">
    <div id="doc" class="route-profile">
        <div id="page-outer">
            <div id="page-container">
                @include('layouts.user_top')
                <div class="AppContainer">
                    <div class="AppContent-main content-main u-cf" role="main" aria-labelledby="content-main-heading">
                        <div class="Grid Grid--withGutter">
                            @include('layouts.user_left')
                            @include('layouts.alert')
                            @include('layouts.message')
                            <div class="Grid-cell u-size2of3 u-lg-size3of4">
                                <div class="Grid Grid--withGutter">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="search_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="search">
                {!! Form::open(['role' => 'search']) !!}
                {!! Form::text('search', '', [
                    'class'=>'searchTerm searchAll typeahead-search search-field',
                    'placeholder'=> trans('campaign.search_campaign'),
                    'id' => 'typeahead-search',
                    ]) !!}
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ trans('user.panel_head.edit') }}</h4>
                </div>
                <div class="modal-body">
                    @include('user.edit_user')
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    @section('js')
        {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
        {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('bower_components/jquery-migrate/jquery-migrate.min.js') }}
        {{ Html::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}
        {{ Html::script('bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js') }}
        {{ Html::script('js/version1/styling.min.js') }}
        {{ Html::script('js/version1/main.min.js') }}
        {{ Html::script('js/version1/custom-script.js') }}
        {{ Html::script('js/version1/custom-scroll.min.js') }}
        {{ Html::script('js/multiple_language.js') }}
        {{ Html::script('bower_components/datatables/media/js/jquery.dataTables.min.js') }}
        {{ Html::script('bower_components/bootstrap-star-rating/js/star-rating.js') }}
        {{ Html::script('js/version1/search.js') }}
        {{ Html::script('js/custom.js') }}
        {{ Html::script('js/follow_user.js') }}
        {{ Html::script('js/user_profile.js') }}
        {{ Html::script('js/version1/user-right-bar.js') }}
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery(document).ready(function($) {
                var search = new Search();
                search.init();
            });
            $(document).ready(function () {
                var follow = new Follow(
                    '{{ action('FollowController@followOrUnFollowUser') }}',
                    '{{ trans('user.follow') }}',
                    '{{ trans('user.unfollow') }}'
                );
                follow.init();
                var userProfile = new UserProfile(
                    '{{ action('RatingController@ratingUser') }}',
                    '{{ $averageRankingUser['average'] }}',
                    '{{ trans('user.rating_your_self') }}',
                    '{{ trans('campaign.close') }}',
                    '{{ action('FollowController@followOrUnFollowUser') }}',
                    '{{ trans('user.follow') }}',
                    '{{ trans('user.un_follow') }}'
                );
                userProfile.init();
            });
        </script>
    @show

</body>

</html>
