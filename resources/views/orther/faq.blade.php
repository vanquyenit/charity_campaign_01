@extends('layouts.template')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image" data-stellar-background-ratio="0.5">
    <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.faq') }}</h1>
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
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.faq') }}</span>
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
                <article id="post-147" class="post-147 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="pl-147">
                            <div class="panel-grid" id="pg-147-0">
                                <div class="panel-grid-cell" id="pgc-147-0-0">
                                    <div class="so-panel widget widget_sow-editor panel-first-child panel-last-child" id="panel-147-0-0-0" data-index="0">
                                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                            <div class="siteorigin-widget-tinymce textwidget">
                                                <p class="text-center">{{ trans('question.title') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-147-1">
                                <div class="panel-grid-cell col-xs-12 col-sm-6" id="pgc-147-1-0">
                                    <div class="so-panel widget widget_accordion panel-first-child panel-last-child" id="panel-147-1-0-0" data-index="1">
                                        <div class="thim-widget-accordion thim-widget-accordion-base">
                                            <div class="thim-accordion">
                                                <h3 class="widget-title">{{ trans('question.general-question') }}</h3>
                                                <div id="000" class="panel-group" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="" data-toggle="collapse" data-parent="#000" href="#collapse_001" aria-expanded="true" aria-controls="collapse_001">
                                                            {!! trans('question.payment-supported') !!}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_001">
                                                            <div class="panel-body">{!! trans('question.payment-supported-content') !!}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_1">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_1" aria-expanded="false" aria-controls="collapse_000_1">
                                                            {{ trans('question.send Site-information') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_000_1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_1">
                                                            <div class="panel-body"> {{ trans('question.send Site-information-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_2">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_2" aria-expanded="false" aria-controls="collapse_000_2">
                                                            {{ trans('question.reset-your-database') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_000_2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_2">
                                                            <div class="panel-body">{{ trans('question.reset-your-database-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_3">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_3" aria-expanded="false" aria-controls="collapse_000_3">{{ trans('question.find-composer-license-key') }}</a></h4>
                                                        </div>
                                                        <div id="collapse_000_3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_3">
                                                            <div class="panel-body">{{ trans('question.find-composer-license-key-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_4">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_4" aria-expanded="false" aria-controls="collapse_000_4">
                                                            {{ trans('question.build-an-onepage') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_000_4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_4">
                                                            <div class="panel-body">{{ trans('question.build-an-onepage-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_5">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_5" aria-expanded="false" aria-controls="collapse_000_5">
                                                            {{ trans('question.refund-your-policy') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_000_5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_5">
                                                            <div class="panel-body">{{ trans('question.refund-your-policy-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_000_6">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#000" href="#collapse_000_6" aria-expanded="false" aria-controls="collapse_000_6">
                                                            {{ trans('question.get-a-discount') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_000_6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_000_6">
                                                            <div class="panel-body">{{ trans('question.get-a-discount-content') }}</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="panel-grid-cell col-xs-12 col-sm-6" id="pgc-147-1-1">
                                    <div class="so-panel widget widget_accordion panel-first-child panel-last-child" id="panel-147-1-0-0" data-index="1">
                                        <div class="thim-widget-accordion thim-widget-accordion-base">
                                            <div class="thim-accordion">
                                                <h3 class="widget-title">{{ trans('question.general-question') }}</h3>
                                                <div id="001" class="panel-group" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_0011">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_0011" aria-expanded="true" aria-controls="collapse_0011">
                                                            {!! trans('question.payment-supported') !!}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_0011" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0011">
                                                            <div class="panel-body">{!! trans('question.payment-supported-content') !!}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_1">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_1" aria-expanded="false" aria-controls="collapse_001_1">
                                                            {{ trans('question.send Site-information') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001_1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_1">
                                                            <div class="panel-body"> {{ trans('question.send Site-information-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_2">
                                                            <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_2" aria-expanded="false" aria-controls="collapse_001_2">
                                                            {{ trans('question.reset-your-database') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001_2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_2">
                                                            <div class="panel-body">{{ trans('question.reset-your-database-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_3">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_3" aria-expanded="false" aria-controls="collapse_001_3">{{ trans('question.find-composer-license-key') }}</a></h4>
                                                        </div>
                                                        <div id="collapse_001_3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_3">
                                                            <div class="panel-body">{{ trans('question.find-composer-license-key-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_4">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_4" aria-expanded="false" aria-controls="collapse_001_4">
                                                            {{ trans('question.build-an-onepage') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001_4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_4">
                                                            <div class="panel-body">{{ trans('question.build-an-onepage-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_5">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_5" aria-expanded="false" aria-controls="collapse_001_5">
                                                            {{ trans('question.refund-your-policy') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001_5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_5">
                                                            <div class="panel-body">{{ trans('question.refund-your-policy-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_001_6">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#001" href="#collapse_001_6" aria-expanded="false" aria-controls="collapse_001_6">
                                                            {{ trans('question.get-a-discount') }}
                                                            </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_001_6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_001_6">
                                                            <div class="panel-body">{{ trans('question.get-a-discount-content') }}</div>
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
