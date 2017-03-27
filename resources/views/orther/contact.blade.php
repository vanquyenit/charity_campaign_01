@extends('layouts.master')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-2 ">
                        <h1 class="heading__primary">{{ trans('index.contact') }}</h1>
                    </div>
                    <div class="col-xs-6 pull-right">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs">
                            <li class="item-home" >
                                <a class="bread-link bread-home" href="{{ action('CampaignController@index') }}" title="{{ trans('index.home') }}">
                                    <span>{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-555">
                                <span class="bread-current bread-555">{{ trans('index.contact') }}</span>
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
            <main id="main" class="site-main col-xs-12 full-width  no-padding">
                <article id="post-13" class="post-13 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="pl-13">
                            <div class="panel-grid" >
                                <div class="panel-grid-cell col-xs-12 col-sm-6" >
                                    <div class="so-panel widget widget_heading panel-first-child" id="panel-13-0-0-0" data-index="0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading ">
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span>{{ trans('index.contact-info') }}</span>
                                                    </h3>
                                                    <span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor" id="panel-13-0-0-1">
                                        <div class="panel-widget-style">
                                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                <div class="siteorigin-widget-tinymce textwidget">
                                                    <p class="text-center">{{ trans('index.contact-content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor">
                                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                            <div class="siteorigin-widget-tinymce textwidget">
                                                <p class="text-center"><i class="fa fa-phone" ></i>
                                                    <br> <a  href="tel:{{ config('constants.PHONE') }}">{{ config('constants.PHONE') }}</a>
                                                </p>
                                                <p class="text-center"><i class="fa fa-envelope" ></i>
                                                    <br> <a  href="mailto:{{ trans('index.mail') }}">{{ trans('index.mail') }}</a>
                                                </p>
                                                <p class="text-center"><i class="fa fa-map-marker" ></i>
                                                    <br>{{ trans('index.address') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_social panel-last-child" id="panel-13-0-0-3" data-index="3">
                                        <div class="thim-widget-social thim-widget-social-base">
                                            <div class="thim-social text-center style-default">
                                                <ul class="social_link">
                                                    <li><a class="facebook" href="" target="_self"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a class="twitter" href="" target="_self"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a class="google-plus" href="" target="_self"><i class="fa fa-google-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-grid-cell col-xs-12 col-sm-6" >
                                    <div class="so-panel widget widget_heading panel-first-child">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading">
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span>{{ trans('index.send-message') }}</span>
                                                    </h3>
                                                    <span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor">
                                        <div class="panel-widget-style">
                                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                <div class="siteorigin-widget-tinymce textwidget">
                                                    <p class="text-center">{{ trans('index.send-message-content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_text panel-last-child">
                                        <div class="panel-widget-style">
                                            <div class="textwidget">
                                                <div role="form" class="wpcf7" id="wpcf7-f10-p13-o1" dir="ltr" lang="en-US">
                                                    <div class="screen-reader-response"></div>
                                                    {!! Form::open(['method' => 'post', 'class' => 'wpcf7-form']) !!}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                {!! Form::text('yourname', '', ['class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required', 'placeholder' => trans('index.your-name')]) !!}
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <span class="wpcf7-form-control-wrap your-email">
                                                                {!! Form::email('youremail', '', ['class' => 'wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email', 'placeholder' => trans('index.your-mail')]) !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <span class="wpcf7-form-control-wrap your-subject">
                                                            {!! Form::text('yoursubject', '', ['class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required', 'placeholder' => trans('index.your-subject')]) !!}
                                                        </span>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap your-message">
                                                            {!! Form::textarea('yourmessage', '', ['rows' => 4, 'class' => 'wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required', 'placeholder' => trans('index.your-message') ]) !!}
                                                        </span>
                                                        <br>
                                                        {!! Form::submit(trans('index.submit'), ['class' => 'wpcf7-form-control wpcf7-submit']) !!}
                                                        <span class="ajax-loader"></span>
                                                    </p>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid">
                                <div class="siteorigin-panels-stretch thim-fix-stretched panel-row-style">
                                    <div class="panel-grid-cell" >
                                        <div class="so-panel widget widget_heading panel-first-child">
                                            <div class="thim-widget-heading thim-widget-heading-base">
                                                <div class="thim-heading text-center ">
                                                    <div class="sc-heading article_heading ">
                                                        <h3 class="heading__primary wrapper-line-heading">
                                                            <span>{{ trans('index.location-on-map') }}</span>
                                                        </h3>
                                                        <span class="line-heading"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="so-panel widget widget_google-map panel-last-child" id="panel-13-2-0-1" data-index="10">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.9704307670627!2d108.21120294997372!3d16.067024143711254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142184a810229eb%3A0x155a6ca1b747012!2zU2nDqnUgdGjhu4sgQmlnIEMgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1490600302190" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
