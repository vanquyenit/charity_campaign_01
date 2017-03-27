@extends('layouts.master')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.about') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs">
                            <li class="item-home" >
                                <a class="bread-link bread-home" href="{{ action('CampaignController@index') }}">
                                    <span>{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-555">
                                <span class="bread-current bread-555">{{ trans('index.about') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="not-heading-sidebar"></div>
    <div class="container site-content">
        <div class="row">
            <main id="main" class="site-main col-sm-12 full-width  no-padding">
                <article id="post-555" class="post-555 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="pl-555">
                            <div class="panel-grid" id="pg-555-0">
                                <div class="panel-grid-cell" id="pgc-555-0-0">
                                    <div class="so-panel widget_heading panel-first-child panel-last-child" id="panel-555-0-0-0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading ">
                                                    <h3 class=" wrapper-line-heading">
                                                        <span>{{ trans('index.who-we-are') }}</span>
                                                    </h3>
                                                    <span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-555-1">
                                <div class="panel-grid-cell col-xs-12 col-md-6">
                                    <div class="so-panel widget_single-images panel-first-child panel-last-child" id="panel-555-1-0-0" data-index="1">
                                        <div class="thim-widget-single-images thim-widget-single-images-base">
                                            <div class="thim-single-image effect-hover">
                                                <div class="wrapper-image">
                                                    <div class="single-image center">
                                                        <img src="{{ asset('img/about1.jpg') }}" alt="" width="570" height="350">
                                                    </div>
                                                    <div class="subtitle">{{ trans('index.vision') }}</div>
                                                    <div class="descriptions">{{ trans('index.vision-content') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-grid-cell col-xs-12 col-md-6">
                                    <div class="so-panel widget_single-images panel-first-child panel-last-child" id="panel-555-1-1-0" data-index="2">
                                        <div class="thim-widget-single-images thim-widget-single-images-base">
                                            <div class="thim-single-image effect-hover">
                                                <div class="wrapper-image">
                                                    <div class="single-image center">
                                                        <img src="{{ asset('img/about_2.jpg') }}" alt="" width="570" height="350">
                                                    </div>
                                                    <div class="subtitle">{{ trans('index.mission') }}</div>
                                                    <div class="descriptions">{{ trans('index.mission-content') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-555-2">
                                <div class="siteorigin-panels-stretch panel-row-style thim-overlay-color about__us">
                                    <div class="panel-grid-cell col-xs-6 col-md-3">
                                        <div class="so-panel widget_counters-box panel-first-child panel-last-child">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_58c89a35eb5dd" class="counter-box has-padding line-in-right visible full-visible">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="display-percentage">{{ $countUsers }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.member') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-6 col-md-3">
                                        <div class="so-panel widget_counters-box panel-first-child panel-last-child">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_58c89a35eb5dd" class="counter-box has-padding line-in-right visible full-visible">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="display-percentage">{{ $countCampaigns }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.campaigns') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-6 col-md-3">
                                        <div class="so-panel widget_counters-box panel-first-child panel-last-child">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_58c89a35eb5dd" class="counter-box has-padding line-in-right visible full-visible">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="display-percentage">{{ $countEvents }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.event') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-6 col-md-3">
                                        <div class="so-panel widget_counters-box panel-first-child panel-last-child">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_58c89a35eb5dd" class="counter-box has-padding line-in-right visible full-visible">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="display-percentage">{{ $countInteractives }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.interactive') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-555-3">
                                <div class="panel-grid-cell" id="pgc-555-3-0">
                                    <div class="so-panel widget_heading panel-first-child" id="panel-555-3-0-0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading ">
                                                    <h3>
                                                        <span>{{ trans('index.member') }}</span>
                                                    </h3>
                                                    <p class="heading__secondary">{{ trans('index.member-content') }}</p>
                                                    <span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget_team panel-last-child" id="panel-555-3-0-1">
                                        <div class="panel-widget-style">
                                            <div class="thim-widget-team thim-widget-team-base">
                                                <div class="thim-our-team">
                                                    <div class="row members">
                                                        @foreach ($arUser as $element)
                                                        <div class="member col-xs-6 col-md-3">
                                                            <div class="inner">
                                                                <div class="avatar-wrapper">
                                                                    <div class="avatar-inner">
                                                                        <img src="{{ $element->avatar }}" class="attachment-full size-full wp-post-image" alt="" width="570" height="570">
                                                                    </div>
                                                                    <div class="social">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="name">
                                                                        <a href="{{ action('UserController@show', ['id' => $element->id]) }}">{{ $element->name }}</a>
                                                                    </div>
                                                                    <div class="regency">{{ $element->name }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
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
            </article>
        </main>
    </div>
</div>
</section>
@stop
