@extends('layouts.template')

@section('content')
<section class="content-area">
    <div class="top_site_main thim-parallax-image" data-stellar-background-ratio="0.5"> <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('listcampaign.all-campaigns') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs">
                            <li class="item-home">
                                <a class="bread-link bread-home" href="{{ action('CampaignController@index') }}"><span>{{ trans('listcampaign.home') }}</span></a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-archive">
                                <span class="bread-current bread-archive">{{ trans('listcampaign.all-campaigns') }}</span>
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
            <main id="main" class="site-main col-sm-9 alignleft ">
                <div class="thim-layout-search">
                    <div class="row">
                        <div class="col-xs-6 layout-box">
                            <span class="layouts"> <i class="fa fa-th-large active" data-layout="grid"></i> <i class="fa fa-th-list " data-layout="list"></i> </span>
                            <span class="results"> {{ trans('listcampaign.showing') }} {{ $campaigns->currentpage() }} - {{ $campaigns->lastpage() }} {{ trans('listcampaign.page-of') }} {{ $campaigns->total() }} {{ trans('listcampaign.results') }} </span>
                        </div>
                    </div>
                </div>
                <div id="donate_main_content" class="gird">
                    <div class="archive-content row">
                        @foreach ($campaigns as $element)
                        <article id="campaign-314" class="col-xs-6 col-md-4 post-314 dn_campaign type-dn_campaign status-publish has-post-thumbnail hentry dn_campaign_cat-community-charities dn_campaign_cat-environmental-charities dn_campaign_cat-health-charities dn_campaign_cat-international-charities dn_campaign_tag-events dn_campaign_tag-winter">
                            <div class="content-inner">
                                <div class="entry-thumbnail">
                                    <img class="fix-img-cp" src="{{ $element->image->image }}" class="attachment-full size-full wp-post-image" alt="{!! str_limit($element->name, config('constants.LIMIT_TITLE_CHARACTERS')) !!}" srcset="{{ $element->image->image }} 870w, {{ $element->image->image }} 300w, {{ $element->image->image }} 768w" sizes="(max-width: 870px) 100vw, 870px" />
                                    <button type="button" class="donate_load_form thim-button style3" data-toggle="modal" href='.donate_modal' data-hiden="{{ csrf_token() }}" data-url="{{ action('CampaignController@review') }}" data-campaign-id="{{ $element->id }}">{{ trans('index.join-now') }}</button>
                                </div>
                                <div class="event-content">
                                    <div class="dn-content-inner">
                                        <div class="entry-header">
                                            <h2 class="blog_title"><a href="{{ action('CampaignController@show', $element->id) }}">{!! str_limit($element->name, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</a></h2>
                                        </div>
                                        <div class="entry-content">
                                            <p>{!! str_limit($element->description, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</p>
                                        </div>
                                    </div>
                                    <div class="dn-content-countdown-box">
                                        <div class="entry-meta">
                                            <div class="date">
                                                <div class="day">{{ date('d', strtotime($element->start_time)) }}</div>
                                                <div class="month">{{ date('M', strtotime($element->start_time)) }}</div>
                                            </div>
                                            <div class="metas">
                                                <div class="time"><i class="fa fa-clock-o"></i> {{ date('H:i', strtotime($element->start_time)) }} - {{ date('H:i', strtotime($element->end_time)) }} </div>
                                                <div class="location"><i class="fa fa-map-marker"></i> {{ $element->address }}</div>
                                            </div>
                                        </div>
                                        <button type="button" class="donate_load_form thim-button style3" data-toggle="modal" href='.donate_modal' data-hiden="{{ csrf_token() }}" data-url="{{ action('CampaignController@review') }}" data-campaign-id="{{ $element->id }}">{{ trans('index.join-now') }}</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                <div class="pagination loop-pagination">
                    <ul class="page-numbers">
                        {{ $campaigns->links() }}
                    </ul>
                </div>
            </main>

            @include('layouts.right_bar')

            <div class="clear"></div>
        </div>
    </div>
</section>
@stop
