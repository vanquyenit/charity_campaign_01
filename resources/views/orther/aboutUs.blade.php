@extends('layouts.template')

@section('css')
    @parent
    {{ Html::style('bower_components/bootstrap-star-rating/css/star-rating.css') }}
    {{ Html::style('bower_components/bootstrap-star-rating/css/theme-krajee-fa.css') }}
@stop

@section('js')
    @parent
    {{ Html::script('bower_components/bootstrap-star-rating/js/star-rating.js') }}
    <script>
        $(document).on('ready', function(){
            $('.rating').rating({displayOnly: true});
        });
    </script>
@stop

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image" data-stellar-background-ratio="0.5">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.about') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs" >
                            <li class="item-home"  >
                                <a itemprop="item" class="bread-link bread-home" href="{{ action('CampaignController@index') }}" title="{{ trans('index.home') }}">
                                    <span itemprop="name">{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-555" >
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.about') }}</span>
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
                                    <div class="so-panel widget widget_heading panel-first-child panel-last-child" id="panel-555-0-0-0" data-index="0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading ">
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span>{{ trans('index.who-we-are') }}</span>
                                                    </h3><span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-555-1">
                                <div class="panel-grid-cell col-xs-12 col-sm-6" id="pgc-555-1-0">
                                    <div class="so-panel widget widget_single-images panel-first-child panel-last-child" id="panel-555-1-0-0" data-index="1">
                                        <div class="thim-widget-single-images thim-widget-single-images-base">
                                            <div class="thim-single-image effect-hover">
                                                <div class="wrapper-image">
                                                    <div class="single-image center">
                                                        <img src="{{ asset('img/about_1.jpg') }}" width="570" height="350" alt="" />
                                                    </div>
                                                    <div class="subtitle">{{ trans('index.vision') }}</div>
                                                    <div class="description">{{ trans('index.vision-content') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-grid-cell col-xs-12 col-sm-6" id="pgc-555-1-1">
                                    <div class="so-panel widget widget_single-images panel-first-child panel-last-child" id="panel-555-1-1-0" data-index="2">
                                        <div class="thim-widget-single-images thim-widget-single-images-base">
                                            <div class="thim-single-image effect-hover">
                                                <div class="wrapper-image">
                                                    <div class="single-image center">
                                                        <img src="{{ asset('img/about_2.jpg') }}" width="570" height="350" alt="" />
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
                                <div class="siteorigin-panels-stretch panel-row-style thim-overlay-color page_about_count" data-stretch-type="full" >
                                    <div class="panel-grid-cell col-xs-12 col-sm-3" id="pgc-555-2-0">
                                        <div class="so-panel widget widget_counters-box panel-first-child panel-last-child" id="panel-555-2-0-0" data-index="3">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_590e5660bf6fc" class="counter-box has-padding line-in-right">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="before"></span>
                                                            <span class="display-percentage" data-to="{{ $countUsers }}" data-speed="2000">{{ $countUsers }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.member') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-12 col-sm-3" id="pgc-555-2-1">
                                        <div class="so-panel widget widget_counters-box panel-first-child panel-last-child" id="panel-555-2-1-0" data-index="4">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_590e5660bfa0a" class="counter-box has-padding line-in-right">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="before"></span>
                                                            <span class="display-percentage" data-to="{{ $countCampaigns }}" data-speed="2000">{{ $countCampaigns }}</span>
                                                        </div>
                                                        <div class="counter-label">
                                                            <span class="counter-box-content">{{ trans('index.campaigns') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-12 col-sm-3" id="pgc-555-2-2">
                                        <div class="so-panel widget widget_counters-box panel-first-child panel-last-child" id="panel-555-2-2-0" data-index="5">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_590e5660bfcfb" class="counter-box has-padding line-in-right">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="before"></span>
                                                            <span class="display-percentage" data-to="{{ $countEvents }}" data-speed="2000">{{ $countEvents }}</span>
                                                        </div>
                                                        <div class="counter-label"><span class="counter-box-content">{{ trans('index.event') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-grid-cell col-xs-12 col-sm-3" id="pgc-555-2-3">
                                        <div class="so-panel widget widget_counters-box panel-first-child panel-last-child" id="panel-555-2-3-0" data-index="6">
                                            <div class="thim-widget-counters-box thim-widget-counters-box-base">
                                                <div id="counter_590e5660c0028" class="counter-box has-padding no-line">
                                                    <div class="content-box-percentage">
                                                        <div class="counter-number">
                                                            <span class="before"></span>
                                                            <span class="display-percentage" data-to="{{ $countInteractives }}" data-speed="2000">{{ $countInteractives }}</span>
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
                                    <div class="so-panel widget widget_heading panel-first-child" id="panel-555-3-0-0" data-index="7">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading " >
                                                    <h3 class="heading__primary">
                                                        <span>{{ trans('index.member') }}</span>
                                                    </h3>
                                                    <p class="heading__secondary">{{ trans('index.member-content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_team panel-last-child" id="panel-555-3-0-1" data-index="8">
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
                                                                                {!! Form::hidden('input-1', $element->star, ['id' => 'not-allow-rating-user', 'class' => 'rating rating-loading', 'data-min' => '0', 'data-step' => '1', 'data-size' => 'xs']) !!}
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
                </article>
            </main>
        </div>
    </div>
</section>

@stop
