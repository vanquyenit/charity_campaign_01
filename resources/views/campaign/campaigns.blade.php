@extends('layouts.master')

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
                            <article id="campaign-315" class="col-xs-6 col-md-4 post-315 dn_campaign type-dn_campaign status-publish has-post-thumbnail hentry dn_campaign_cat-community-charities dn_campaign_cat-environmental-charities dn_campaign_cat-international-charities dn_campaign_tag-events dn_campaign_tag-winter">
                                <div class="content-inner">
                                    <div class="entry-thumbnail">
                                        <img width="870" height="500" src="{{ $element->image->image }}" class="attachment-full size-full wp-post-image" alt="charity wordpress theme" srcset="{{ $element->image->image }} 870w, {{ $element->image->image }} 300w, {{ $element->image->image }} 768w" sizes="(max-width: 870px) 100vw, 870px">
                                        <a data-toggle="modal" href="#modal-donate" class="donate_load_form thim-button style3" data-campaign-id="{{ $element->id }}">{{ trans('index.join-now') }}</a>
                                    </div>
                                    <div class="event-content">
                                        <div class="dn-content-inner">
                                            <div class="entry-header">
                                                <h2 class="blog_title"><a class="font" href="{{ action('CampaignController@show', $element->id) }}">{!! str_limit($element->name, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</a></h2>
                                            </div>
                                            <div class="entry-content">
                                                <div class="font-description">{!! str_limit($element->description, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</div>
                                            </div>
                                        </div>
                                        <div class="dn-content-countdown-box">
                                            <div class="entry-meta">
                                                <div class="date col-xs-12">
                                                    <div class="day col-xs-3">{{ date('d', strtotime($element->start_time)) }}</div>
                                                    <div class="day col-xs-4">{{ date('M', strtotime($element->start_time)) }}</div>
                                                    <div class="day col-xs-5">{{ date('Y', strtotime($element->start_time)) }}</div>
                                                </div>
                                                <div class="metas col-xs-12">
                                                    <div class="time"><i class="fa fa-clock-o"></i> {{ date('H:i', strtotime($element->start_time)) }} - {{ date('H:i', strtotime($element->end_time)) . '  (' . date('d/m/Y', strtotime($element->end_time)) . ')' }}</div>
                                                    <div class="location"><i class="fa fa-map-marker"></i> {{ $element->address }}</div>
                                                </div>
                                            </div>
                                            <a data-toggle="modal" href="#modal-donate" class="donate_load_form thim-button style3" data-campaign-id="{{ $element->id }}">{{ trans('index.join-now') }}</a>
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
            <div id="sidebar" class="widget-area col-sm-3" role="complementary">
                <div class="sidebar theiaStickySidebar">
                    <aside id="events-1" class="widget widget_events">
                        <div class="thim-widget-events thim-widget-events-base">
                            <div class="thim-events style3">
                                <div class="events archive-content">
                                    <h3 class="widget-title"><span>{{ trans('listcampaign.upcoming-campaign') }}</span></h3>
                                    <article class="post-4934 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry">
                                        <div class="content-inner">
                                            <div class="event-content">
                                                <div class="entry-meta">
                                                    <div class="date pull-left col-xs-6">
                                                        <span class="day">{{ date('d', strtotime($campaign->start_time)) }}</span>
                                                        <span class="month">{{ date('M', strtotime($campaign->start_time)) }}</span>
                                                    </div>
                                                    <div class="metas col-xs-6">
                                                        <div class="entry-header">
                                                            <h2 class="blog_title"><a href="{{ action('CampaignController@show', $campaign->id) }}">{!! str_limit($campaign->name, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</a></h2>
                                                        </div>
                                                        <span class="location"><i class="fa fa-map-marker"></i> {{ $campaign->address }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside id="campaign-categories-1" class="widget widget_campaign-categories">
                        <div class="thim-widget-campaign-categories thim-widget-campaign-categories-base">
                            <li class="dn_campaign_cat">
                                <h3 class="widget-title"><span>{{ trans('listcampaign.categories-campaign') }}</span></h3>
                                <ul>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.community-charities') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.community-charities') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.community-charities') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.community-charities') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.community-charities') }}</a></li>
                                </ul>
                            </li>
                        </div>
                    </aside>
                    <aside id="campaign-categories-1" class="widget widget_campaign-categories">
                        <div class="thim-widget-campaign-categories thim-widget-campaign-categories-base">
                            <li class="dn_campaign_cat">
                                <h3 class="widget-title"><span>{{ trans('listcampaign.categories-blog') }}</span></h3>
                                <ul>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.awarness') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.awarness') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.awarness') }}</a></li>
                                    <li class="cat-item cat-item-24"><a href="#">{{ trans('listcampaign.awarness') }}</a></li>
                                </ul>
                            </li>
                        </div>
                    </aside>
                    <aside id="list-post-4" class="widget widget_list-post">
                        <div class="thim-widget-list-post thim-widget-list-post-base">
                            <div class="thim-list-post-wrapper-simple list-post-base">
                                <div class="inner-list">
                                    <h3 class="widget-title"><span>{{ trans('listcampaign.opular-post') }}</span></h3>
                                    <div class="list-posts">
                                        <div class="item-post post-596 post type-post status-publish format-standard has-post-thumbnail hentry category-all category-blog category-health category-lifesaving category-seniors tag-course tag-learn tag-photography tag-social tag-study">
                                            <div class="article-title-wrapper">
                                                <div class="article-inner">
                                                    <div class="media">
                                                        <a href="#">
                                                            <img src="" alt="" title="">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <a href="#" class="article-title">{{ trans('listcampaign.content-post') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside id="single-images-2" class="widget widget_single-images">
                        <div class="thim-widget-single-images thim-widget-single-images-base">
                            <div class="thim-single-image effect-hover">
                                <div class="wrapper-image">
                                    <div class="single-image center">
                                        <a target="_self" href="#">
                                            <img src="" width="269" height="300" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside id="list-post-5" class="widget widget_list-post">
                        <div class="thim-widget-list-post thim-widget-list-post-base"></div>
                    </aside>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
@stop
