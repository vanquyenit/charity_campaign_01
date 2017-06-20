@extends('layouts.template')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5"> <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.contact') }}</h1>
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
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.contact') }}</span>
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
                <article id="post-13" class="post-13 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div id="pl-13">
                            <div class="panel-grid" id="pg-13-0">
                                <div class="panel-grid-cell" id="pgc-13-0-0">
                                    <div class="so-panel widget widget_heading panel-first-child" id="panel-13-0-0-0" data-index="0">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading " >
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span>{{ trans('index.contact-info') }}</span>
                                                    </h3><span class="line-heading"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor" id="panel-13-0-0-1" data-index="1">
                                        <div class="panel-widget-style color-99" >
                                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                <div class="siteorigin-widget-tinymce textwidget">
                                                    <p  class="text-center">{{ trans('index.contact-content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor" id="panel-13-0-0-2" data-index="2">
                                        <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                            <div class="siteorigin-widget-tinymce textwidget">
                                                <p >
                                                    <i class="fa fa-phone" ></i>
                                                    <br/>
                                                    <a class="color-99" href="tel:{{ trans('message.company.phone') }}">{{ trans('message.company.phone') }}</a>
                                                </p>
                                                <p >
                                                    <i class="fa fa-envelope" ></i>
                                                    <br/>
                                                    <a class="color-99" href="mailto:{{ trans('message.company.email') }}">
                                                        <span class="__cf_email__" >{{ trans('message.company.email') }}</span>
                                                    </a>
                                                </p>
                                                <p >
                                                    <i class="fa fa-map-marker" ></i>
                                                    <br/> {{ trans('message.company.address') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_social panel-last-child" id="panel-13-0-0-3" data-index="3">
                                        <div class="thim-widget-social thim-widget-social-base">
                                            <div class="thim-social text-center style-default">
                                                <ul class="social_link">
                                                    <li>
                                                        <a class="facebook" href="https://www.facebook.com/FramgiaVietnam/" target="_self">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="twitter" href="#" target="_self"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="linkedin" href="#" target="_self"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="instagram" href="#" target="_self"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-grid-cell" id="pgc-13-0-1">
                                    <div class="so-panel widget widget_heading panel-first-child" id="panel-13-0-1-0" data-index="4">
                                        <div class="thim-widget-heading thim-widget-heading-base">
                                            <div class="thim-heading text-center ">
                                                <div class="sc-heading article_heading " >
                                                    <h3 class="heading__primary wrapper-line-heading">
                                                        <span></span><span>{{ trans('index.send-message') }}</span><span></span>
                                                    </h3><span class="line-heading" ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_sow-editor" id="panel-13-0-1-1" data-index="5">
                                        <div class="panel-widget-style">
                                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                <div class="siteorigin-widget-tinymce textwidget">
                                                    <p  class="text-center">{{ trans('index.send-message-content') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="so-panel widget widget_text panel-last-child" id="panel-13-0-1-2" data-index="6">
                                        <div class="panel-widget-style">
                                            <div class="textwidget">
                                                <div role="form" class="wpcf7" id="wpcf7-f10-p13-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    {!! Form::open(['method' => 'post', 'action' => 'OrtherController@store', 'class' => 'wpcf7-form']) !!}
                                                        {!! Form::hidden('role', config('constants.ONE'), []) !!}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                    {!! Form::text('fullname', '', [
                                                                        'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required',
                                                                        'placeholder' => trans('index.your-name')])
                                                                    !!}
                                                                </span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                    {!! Form::email('email', '', [
                                                                        'class' => 'wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email',
                                                                        'placeholder' => trans('index.your-mail')])
                                                                    !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap your-subject">
                                                                {!! Form::text('subject', '', [
                                                                    'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required',
                                                                    'placeholder' => trans('index.your-subject')])
                                                                !!}
                                                            </span>
                                                            <br>
                                                            <span class="wpcf7-form-control-wrap your-message">
                                                                {!! Form::textarea('message', '', [
                                                                    'rows' => 4,
                                                                    'class' => 'wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required',
                                                                    'placeholder' => trans('index.your-message') ])
                                                                !!}
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
                            <div class="panel-grid" id="pg-13-1">
                                <div class="siteorigin-panels-stretch panel-row-style"  data-stretch-type="full">
                                    <div class="panel-grid-cell" id="pgc-13-1-0">
                                        <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-13-1-0-0" data-index="7">
                                            <div  class="panel-widget-style max-600">
                                                <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                    <div class="siteorigin-widget-tinymce textwidget">
                                                        <p  class="text-center">{{ trans('index.subscribe') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="so-panel widget widget_mc4wp_form_widget panel-last-child" id="panel-13-1-0-1" data-index="8">
                                            <div class="thim-white panel-widget-style max-300">
                                                {!! Form::open(['action'=>'HomeController@index','method' => 'post','id' => 'mc4wp-form-1', 'class' => 'mc4wp-form mc4wp-form-74']) !!}
                                                <div class="mc4wp-form-fields">
                                                    {!! Form::email('email', '', ['placeholder' => trans('index.email-address'), 'required'=>'required']) !!}
                                                    <button type="submit">
                                                        <i class="fa fa-chevron-circle-right"></i>
                                                    </button>
                                                </div>
                                                <div class="mc4wp-response"></div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-grid" id="pg-13-2">
                                <div class="siteorigin-panels-stretch thim-fix-stretched panel-row-style" data-stretch-type="full-stretched">
                                    <div class="panel-grid-cell" id="pgc-13-2-0">
                                        <div class="so-panel widget widget_heading panel-first-child" id="panel-13-2-0-0" data-index="9">
                                            <div class="thim-widget-heading thim-widget-heading-base">
                                                <div class="thim-heading text-center ">
                                                    <div class="sc-heading article_heading " >
                                                        <h3 class="heading__primary wrapper-line-heading">
                                                            <span></span><span>{{ trans('index.location-on-map') }}</span><span></span>
                                                        </h3>
                                                        <span class="line-heading" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="so-panel widget widget_google-map panel-last-child" id="panel-13-2-0-1" data-index="10">
                                            <div class="thim-widget-google-map thim-widget-google-map-base">
                                                <div class="kcf-module">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.9704307670627!2d108.21120294997372!3d16.067024143711254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142184a810229eb%3A0x155a6ca1b747012!2zU2nDqnUgdGjhu4sgQmlnIEMgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1490600302190" height="450" frameborder="0" width="100%" allowfullscreen></iframe>
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
