@extends('layouts.template')

@section('content')
<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5"> <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.event') }}</h1>
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
                                <span itemprop="name" class="bread-current bread-555">{{ trans('index.event') }}</span>
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
                <div class="thim-event-tabs">
                    <ul class="nav nav-tabs">
                        <li class="tab upcoming active" data-tab="upcoming">
                            <a href="#upcoming" aria-controls="upcoming" data-toggle="tab">{{ trans('event.upcoming') }} </a>
                        </li>
                        <li class="tab happening" data-tab="happening">
                            <a href="#happening" aria-controls="happening" data-toggle="tab">{{ trans('event.happening') }} </a>
                        </li>
                        <li class="tab expired " data-tab="expired">
                            <a href="#expired" aria-controls="expired" data-toggle="tab">{{ trans('event.expired') }} </a>
                        </li>
                    </ul>
                </div>
                <div class="archive-content tab-content" data-tab="upcoming">
                    <div class="tab-pane row " id="happening">
                        @foreach ($happening as $element)
                            <article class="col-xs-6 col-md-4 post-275 tp_event type-tp_event status-tp-event-expired has-post-thumbnail hentry">
                                <div class="content-inner">
                                    <div class="entry-thumbnail">
                                        <div class="thumbnail">
                                            <a href="" title="{{ $element->title }}">
                                                <img src="{{ asset('uploads/images/' . $element->img) }}" alt="{{ $element->title }}" title="{{ $element->title }}" />
                                            </a>
                                        </div>
                                        <a href="{{ action('EventController@show', ['id' => $element->id]) }}" class="thim-button style3">{{ trans('index.read-more') }}</a>
                                    </div>
                                    <div class="event-content">
                                        <div class="entry-header">
                                            <h2 class="blog_title">
                                                <a href="{{ action('EventController@show', ['id' => $element->id]) }}">{{ $element->title }}</a>
                                            </h2>
                                        </div>
                                        <div class="entry-content">
                                            <p>{!! str_limit($element->description, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</p>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="date">
                                                <div class="day">{{  date('d', strtotime($element->start_time)) }}</div>
                                                <div class="month">{{  date('M', strtotime($element->start_time)) }}</div>
                                            </div>
                                            <div class="metas">
                                                <div class="time">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{  date('h:i A', strtotime($element->start_time)) }} - {{  date('h:i A', strtotime($element->end_time)) }}
                                                </div>
                                                <div class="location">
                                                    <i class="fa fa-map-marker"></i> {!! $element->address !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="pagination loop-pagination event">
                            {{ $happening->links() }}
                        </div>
                    </div>
                    <div class="tab-pane row active" id="upcoming">
                        @foreach ($upcoming as $element)
                            <article class="col-xs-6 col-md-4 post-275 tp_event type-tp_event status-tp-event-expired has-post-thumbnail hentry">
                                <div class="content-inner">
                                    <div class="entry-thumbnail">
                                        <div class="thumbnail">
                                            <a href="" title="{{ $element->title }}">
                                                <img src="{{ asset('uploads/images/' . $element->img) }}" alt="{{ $element->title }}" title="{{ $element->title }}" />
                                            </a>
                                        </div>
                                        <a href="{{ action('EventController@show', ['id' => $element->id]) }}" class="thim-button style3">{{ trans('index.read-more') }}</a>
                                    </div>
                                    <div class="event-content">
                                        <div class="entry-header">
                                            <h2 class="blog_title">
                                                <a href="{{ action('EventController@show', ['id' => $element->id]) }}">{{ $element->title }}</a>
                                            </h2>
                                        </div>
                                        <div class="entry-content">
                                            <p>{!! str_limit($element->description, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</p>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="date">
                                                <div class="day">{{  date('d', strtotime($element->start_time)) }}</div>
                                                <div class="month">{{  date('M', strtotime($element->start_time)) }}</div>
                                            </div>
                                            <div class="metas">
                                                <div class="time">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{  date('h:i A', strtotime($element->start_time)) }} - {{  date('h:i A', strtotime($element->end_time)) }}
                                                </div>
                                                <div class="location">
                                                    <i class="fa fa-map-marker"></i> {!! $element->address !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="pagination loop-pagination event">
                            {{ $upcoming->links() }}
                        </div>
                    </div>
                    <div class="tab-pane row " id="expired">
                        @foreach ($expired as $element)
                            <article class="col-xs-6 col-md-4 post-275 tp_event type-tp_event status-tp-event-expired has-post-thumbnail hentry">
                                <div class="content-inner">
                                    <div class="entry-thumbnail">
                                        <div class="thumbnail">
                                            <a href="" title="{{ $element->title }}">
                                                <img src="{{ asset('uploads/images/' . $element->img) }}" alt="{{ $element->title }}" title="{{ $element->title }}" />
                                            </a>
                                        </div>
                                        <a href="{{ action('EventController@show', ['id' => $element->id]) }}" class="thim-button style3">{{ trans('index.read-more') }}</a>
                                    </div>
                                    <div class="event-content">
                                        <div class="entry-header">
                                            <h2 class="blog_title">
                                                <a href="{{ action('EventController@show', ['id' => $element->id]) }}">{{ $element->title }}</a>
                                            </h2>
                                        </div>
                                        <div class="entry-content">
                                            <p>{!! str_limit($element->description, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</p>
                                        </div>
                                        <div class="entry-meta">
                                            <div class="date">
                                                <div class="day">{{  date('d', strtotime($element->start_time)) }}</div>
                                                <div class="month">{{  date('M', strtotime($element->start_time)) }}</div>
                                            </div>
                                            <div class="metas">
                                                <div class="time">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{  date('h:i A', strtotime($element->start_time)) }} - {{  date('h:i A', strtotime($element->end_time)) }}
                                                </div>
                                                <div class="location">
                                                    <i class="fa fa-map-marker"></i> {!! $element->address !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="pagination loop-pagination event">
                            {{ $expired->links() }}
                        </div>
                    </div>
                </div>
            </main>
            @include('layouts.right_bar')
            <div class="clear"></div>
        </div>
    </div>
</section>
@stop
