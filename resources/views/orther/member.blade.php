@extends('layouts.template')

@section('css')
    @parent
    {{ Html::style('bower_components/bootstrap-star-rating/css/star-rating.css') }}
    {{ Html::style('bower_components/bootstrap-star-rating/css/theme-krajee-fa.css') }}
@stop

@section('js')
    @parent
    {{ Html::script('bower_components/bootstrap-star-rating/js/star-rating.js') }}
    {{ Html::script('js/version1/custom-rating.js') }}
@stop

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5"> <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.member') }}</h1>
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
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.member') }}</span>
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
                <article id="post-157" class="post-157 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="pl-157">
                            <div class="panel-grid" id="pg-157-0">
                                <div class="panel-grid-cell" id="pgc-157-0-0">
                                    <div class="so-panel widget widget_heading panel-first-child" id="panel-157-0-0-0" data-index="0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading " >
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span>{{ trans('index.meet-team') }}</span>
                                                    </h3>
                                                    <p class="heading__secondary">{{ trans('index.meet-team') }}</p>
                                                    <span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_team panel-last-child" id="panel-157-0-0-1" data-index="1">
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
                                                    <div class="text-center">
                                                        {{ $arUser->links() }}
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
