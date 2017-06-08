    <div class="thim-loading">
        <img src="{{ asset('img/loading.gif') }}" alt="{{ trans('message.project') }}" />
    </div>
    <div class="thim-menu line mobile-not-line">
        <span class="close-menu"><i class="fa fa-times"></i></span>
        <div class="main-menu">
            <ul class="nav navbar-nav">
                <li class="menu-item menu-item-has-children drop_to_right standard current-menu-item ">
                    <a href="{{ action('CampaignController@index') }}">
                        <span data-hover="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                    </a>
                </li>
                <li class="menu-item menu-item-has-children drop_to_right standard">
                    <a href="{{ action('CampaignController@showCampaigns') }}">
                        <span data-hover="{{ trans('index.campaigns') }}">{{ trans('index.campaigns') }}</span>
                    </a>
                </li>
                <li class="menu-item menu-item-has-children drop_to_right standard">
                    <a href="{{ action('EventController@index') }}">
                        <span data-hover="{{ trans('index.event') }}">{{ trans('index.event') }}</span>
                    </a>
                </li>
                <li class="menu-item menu-item-has-children drop_to_right standard">
                    <a href="{{ action('OrtherController@aboutUs') }}">
                        <span data-hover="{{ trans('index.about') }}">{{ trans('index.about') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ action('OrtherController@member') }}">{{ trans('index.member') }}</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ action('OrtherController@faq') }}">{{ trans('index.faq') }}</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ action('OrtherController@contact') }}">{{ trans('index.contact') }}</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ action('OrtherController@blog') }}">{{ trans('index.blog') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu-sidebar thim-hidden-768px"></div>
    </div>
    <div id="wrapper-container" class="wrapper-container">
        <div class="content-pusher ">
            <header id="masthead" class="site-header line">
                <div class="top-header">
                    <div class="container">
                        <div class="thim-toggle-mobile-menu"><span class="inner"></span></div>
                        <div class="thim-logo">
                            <a href="{{ action('CampaignController@index') }}" title="{{ trans('message.page_titles.welcome') }}">
                                <img class="logo" src="{{ asset('img/icon.png') }}" alt="{{ trans('index.home') }}" />
                                <img class="sticky-logo" src="{{ asset('img/icon.png') }}" alt="{{ trans('index.home') }}" />
                                <img class="mobile-logo" src="{{ asset('img/icon.png') }}" alt="{{ trans('index.home') }}" />
                            </a>
                        </div>
                        <div class="thim-menu no-right">
                            <div class="main-menu">
                                <ul class="nav navbar-nav">
                                    <li class="menu-item menu-item-has-children drop_to_right standard">
                                        <a href="{{ action('CampaignController@index') }}">
                                            <span data-hover="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-has-children drop_to_right standard">
                                        <a href="{{ action('CampaignController@showCampaigns') }}">
                                            <span data-hover="{{ trans('index.campaigns') }}">{{ trans('index.campaigns') }}</span>
                                        </a>
                                    </li>
                                    <li class="menu-item menu-item-has-children drop_to_right standard">
                                        <a href="{{ action('EventController@index') }}"><span data-hover="{{ trans('index.event') }}">{{ trans('index.event') }}</span></a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children drop_to_right standard">
                                        <a href="{{ action('OrtherController@aboutUs') }}"><span data-hover="{{ trans('index.about') }}">{{ trans('index.about') }}</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a href="{{ action('OrtherController@member') }}">{{ trans('index.member') }}</a>
                                            </li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a href="{{ action('OrtherController@faq') }}">{{ trans('index.faq') }}</a>
                                            </li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a href="{{ action('OrtherController@contact') }}">{{ trans('index.contact') }}</a>
                                            </li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a href="{{ action('OrtherController@blog') }}">{{ trans('index.blog') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-sidebar">
                                <div class="widget widget_siteorigin-panels-builder">
                                    <div id="pl-w581a9b3585a4f">
                                        <div class="panel-grid" id="pg-w581a9b3585a4f-0">
                                            <div class="panel-grid-cell" id="pgc-w581a9b3585a4f-0-0">
                                                <div class="so-panel widget widget_donate_widget panel-first-child" id="panel-w581a9b3585a4f-0-0-0" data-index="0">
                                                    <div class="thimpress_donate_button">
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" title="" data-toggle="dropdown">
                                                                <i class="fa fa-user-circle-o user_profile fa-3x"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                @if (Auth::check())
                                                                <li><a href="">{{ trans('user.profile') }}</a></li>
                                                                <li><a href="">{{ trans('message.logout') }}</a></li>
                                                                @else
                                                                <li><a href="">{{ trans('message.login') }}</a></li>
                                                                <li><a href="">{{ trans('message.register') }}</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="so-panel widget widget_donate_widget panel-first-child" id="panel-w581a9b3585a4f-0-0-0" data-index="0">
                                                    <div class="thimpress_donate_button">
                                                        <div class="hide_language" data-route="{{ url('language') }}" data-token="{{ csrf_token() }}"></div>
                                                        <select name="lang" id="countries" class="btn-multiple-language">
                                                            <option value='{{ config('settings.en') }}' {{ Session::get('locale') == config('settings.en') ? 'selected' : '' }} ">
                                                                {{ config('settings.language.en') }}
                                                            </option>
                                                            <option value='{{ config('settings.vi') }}' {{ Session::get('locale') == config('settings.vi') ? 'selected' : '' }} >
                                                                {{ config('settings.language.vi') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="so-panel widget widget_donate_widget panel-first-child" id="panel-w581a9b3585a4f-0-0-0" data-index="0">
                                                    <div class="thimpress_donate_button">
                                                        <div class="donate_button_title thim-button style3">
                                                            <a href="">{{ trans('campaign.create') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="so-panel widget widget_search-box panel-last-child" id="panel-w581a9b3585a4f-0-0-1" data-index="1">
                                                    <div class="thim-widget-search-box thim-widget-search-box-base">
                                                        <div class="thim-search-box">
                                                            <div class="toggle-form"><i class="fa fa-search"></i> </div>
                                                            <div class="form-search-wrapper">
                                                                <div class="background-toggle"></div>
                                                                {!! Form::open(['class' => 'search-form navbar-form-custom form-group typeahead', 'role' => 'search']) !!}
                                                                {!! Form::text('search', '', ['class'=>'searchAll typeahead-search search-field', 'placeholder'=> trans('campaign.search_campaign'), 'id' => 'typeahead-search']) !!}
                                                                <button type="submit"><i class="fa fa-search"></i> </button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div id="main-content">
