@extends('layouts.template')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5"> <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.blog') }}</h1>
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
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.blog') }}</span>
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
            <main id="main" class="site-main col-sm-12 full-width ">
                <div class="portfolio_container">
                    <div class="wrapper_portfolio portfolio_filter 12 same_width ">
                        <div class="portfolio-tabs-wrapper filters">
                            <div class="portfolio-tabs">
                                <button class="filter active" data-filter="*">{{ trans('index.all') }}</button>
                                <button class="filter" data-filter=".video">{{ trans('index.video') }}</button>
                                <button class="filter" data-filter=".image">{{ trans('index.image') }}</button>
                            </div>
                        </div>
                        <div class="portfolio_column">
                            <div class="content_portfolio" data-style="same_width" data-columns="4" data-gutter="0">
                                @foreach ($arBlog as $element)
                                    @if ($element->type == 'video')
                                        @php
                                            $arrayBlog[] = [
                                                'title' => $element->title,
                                                'type' => $element->type,
                                                'content' => $element->content,
                                            ];
                                        @endphp
                                    @else
                                        @foreach (json_decode($element->content) as $value)
                                            @php
                                                $arrayBlog[] = [
                                                    'title' => $element->title,
                                                    'type' => $element->type,
                                                    'content' => $value,
                                                ];
                                            @endphp
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach ($arrayBlog as $value)
                                    <div class="element-item {{ $value['type'] }}  four-col item_portfolio">
                                        <div class="portfolio-image">
                                            @if ($value['type'] == 'video')
                                                @php($img = getImageYoutube($value['content']))
                                                @php($url = $value['content'])
                                                @php($class = $value['type'] . '-popup')
                                            @else
                                                @php($url = asset('uploads/images/' . $value['content']))
                                                @php($img = $url)
                                                @php($class = $value['type'] . '-popup-01')
                                            @endif
                                            <img src="{{ $img }}" alt="{{ $value['title'] }}" title="{{ $value['title'] }}" height="219" />
                                            <div class="portfolio-hover">
                                                <div class="thumb-bg">
                                                    <div class="mask-content">
                                                        <span class="p_line"></span>
                                                        <div class="portfolio_zoom">
                                                            <a href="{{ $url }}" title="{{ $value['title'] }}" class="btn_zoom {{ $class }}"><i class="fa fa-search"></i></a>
                                                        </div>
                                                        <div class="portfolio_title">
                                                            <h3>
                                                                <a href="" title="{{ $value['title'] }}">{{ $value['title'] }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@stop
