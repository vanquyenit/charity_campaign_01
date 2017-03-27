@extends('layouts.master')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image">
    <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.faq') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs">
                            <li class="item-home" >
                                <a class="bread-link bread-home" href="{{ action('CampaignController@index') }}" title="Home">
                                    <span>{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-555">
                                <span class="bread-current bread-555">{{ trans('index.faq') }}</span>
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
            <main id="main" class="site-main col-xs-12 full-width ">
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
                            <div class="panel-grid" >
                                <div class="panel-grid-cell col-xs-12 col-sm-6" >
                                    <div class="so-panel widget widget_accordion panel-first-child panel-last-child">
                                        <div class="thim-widget-accordion thim-widget-accordion-base">
                                            <div class="thim-accordion">
                                                <h3 class="widget-title">{{ trans('question.general-question') }}</h3>
                                                <div id="accordion_58c89c03a97f4" class="panel-group" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_1">
                                                            <h4 class="panel-title">
                                                                <a role="button" class="" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_1" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_1">{!! trans('question.payment-supported') !!}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_1" >
                                                            <div class="panel-body">{!! trans('question.payment-supported-content') !!}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_0">
                                                            <h4 class="panel-title">
                                                                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_0" aria-expanded="true" aria-controls="collapse_accordion_58c89c03a97f4_0">{{ trans('question.send Site-information') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_0" >
                                                            <div class="panel-body">{{ trans('question.send Site-information-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_2">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_2" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_2">{{ trans('question.reset-your-database') }}</a></h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_2">
                                                            <div class="panel-body">{{ trans('question.reset-your-database-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_3">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_3" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_3">{{ trans('question.find-composer-license-key') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_3">
                                                            <div class="panel-body">{{ trans('question.find-composer-license-key-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_4">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_4" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_4">{{ trans('question.build-an-onepage') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_4">
                                                            <div class="panel-body">{{ trans('question.build-an-onepage-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_5">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_5" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_5">{{ trans('question.refund-your-policy') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_5">
                                                            <div class="panel-body">{{ trans('question.refund-your-policy-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_accordion_58c89c03a97f4_6">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion_58c89c03a97f4" href="#collapse_accordion_58c89c03a97f4_6" aria-expanded="false" aria-controls="collapse_accordion_58c89c03a97f4_6">{{ trans('question.get-a-discount') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_accordion_58c89c03a97f4_6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_accordion_58c89c03a97f4_6">
                                                            <div class="panel-body">{{ trans('question.get-a-discount-content') }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-grid-cell col-xs-12 col-sm-6" >
                                    <div class="so-panel widget widget_accordion panel-first-child panel-last-child">
                                        <div class="thim-widget-accordion thim-widget-accordion-base">
                                            <div class="thim-accordion">
                                                <h3 class="widget-title">{{ trans('question.general-question') }}</h3>
                                                <div id="div_2" class="panel-group" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="question_1">
                                                            <h4 class="panel-title">
                                                                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#answer_1" aria-expanded="true" aria-controls="collapse_div_2_1">{!! trans('question.payment-supported') !!}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="answer_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="question_1" >
                                                            <div class="panel-body">{!! trans('question.payment-supported-content') !!}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_0">
                                                            <h4 class="panel-title">
                                                                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_0" aria-expanded="true" aria-controls="collapse_div_2_0">{{ trans('question.send Site-information') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_div_2_0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_div_2_0" >
                                                            <div class="panel-body">{{ trans('question.send Site-information-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_2">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_2" aria-expanded="false" aria-controls="collapse_div_2_2">{{ trans('question.reset-your-database') }}</a></h4>
                                                        </div>
                                                        <div id="collapse_div_2_2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_div_2_2">
                                                            <div class="panel-body">{{ trans('question.reset-your-database-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_3">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_3" aria-expanded="false" aria-controls="collapse_div_2_3">{{ trans('question.find-composer-license-key') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_div_2_3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_div_2_3">
                                                            <div class="panel-body">{{ trans('question.find-composer-license-key-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_4">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_4" aria-expanded="false" aria-controls="collapse_div_2_4">{{ trans('question.build-an-onepage') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_div_2_4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_div_2_4">
                                                            <div class="panel-body">{{ trans('question.build-an-onepage-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_5">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_5" aria-expanded="false" aria-controls="collapse_div_2_5">{{ trans('question.refund-your-policy') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_div_2_5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_div_2_5">
                                                            <div class="panel-body">{{ trans('question.refund-your-policy-content') }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading_div_2_6">
                                                            <h4 class="panel-title"> <a role="button" class="collapsed" data-toggle="collapse" data-parent="#div_2" href="#collapse_div_2_6" aria-expanded="false" aria-controls="collapse_div_2_6">{{ trans('question.get-a-discount') }}</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse_div_2_6" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading_div_2_6">
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
