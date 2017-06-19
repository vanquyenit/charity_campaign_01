<div id="sidebar" class="widget-area col-sm-3" role="complementary">
    <div class="sidebar theiaStickySidebar">
        @if (isset($detailCampaign))
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-info donate_load_form"
                data-toggle="modal" href='.donate_modal'
                data-hiden="{{ csrf_token() }}"
                data-url="{{ action('CampaignController@review') }}"
                data-campaign-id="{{ $detailCampaign->id }}">{{ trans('index.join-now') }}</button>
                @if (auth()->check())
                    @if (auth()->id() == $userCampaign->id)
                        <a href="{{ action('EventController@eventCreate', $detailCampaign->id) }}" type="button" class="btn btn-default">{{ trans('event.create') }}</a>
                    @endif
                @endif
            </div>
        @endif

        @if (count($results))
            <div class="block">
                <div class="block-title themed-background-dark">
                    <h4 class="block-title-light campaign-title">
                        <strong>{{ trans('campaign.progress') }}</strong>
                    </h4>
                </div>
                <div class="widget-extra">
                    <div class="timeline">
                        <ul class="">
                            @foreach ($results as $result)
                                <li class="media event active fix-float font-size-progress-bar">
                                    <div class="pull-left">
                                        <span>
                                            <strong>{{ $result['name'] }}</strong> :
                                            <span>{{ $result['value'] . '/' . $result['goal'] }}</span>
                                            <strong>{{ $result['unit'] }}</strong>
                                        </span>
                                    </div>
                                </li>
                                <div class="progress">
                                    @if ($result['progress'] < 100)
                                        <div class="progress-bar progress-bar-danger progress-bar-striped  active"
                                            role="progressbar"
                                            aria-valuenow="{{ $result['progress'] }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{ $result['progress'] }}%">
                                            <span class="show">{{ $result['progress'] }} %</span>
                                        </div>
                                    @else
                                        <div class="progress-bar progress-bar-success progress-bar-striped  active"
                                            role="progressbar"
                                            style="width:{{ round(100 / $result['progress'] * 100) }}%">
                                            <span class="show">100%</span>
                                        </div>
                                        <div class="progress-bar progress-bar-warning progress-bar-striped  active"
                                            style="width:{{ 100 - round(100 / $result['progress'] * 100) }}%">
                                            <span class="show">{{ $result['progress'] - 100 }}%</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="clear"></div>
        <aside id="events-1" class="widget widget_events">
            <div class="thim-widget-events thim-widget-events-base">
                <div class="thim-events style3">
                    <div class="events archive-content">
                        <h3 class="widget-title"><span>{{ trans('listcampaign.upcoming-campaign') }}</span></h3>
                        @foreach ($campaign as $element)
                            <article class="post-4934 tp_event type-tp_event status-tp-event-upcoming has-post-thumbnail hentry">
                                <div class="content-inner">
                                    <div class="event-content">
                                        <div class="entry-meta">
                                            <div class="date pull-left col-xs-6">
                                                <span class="day">{{ date('d', strtotime($element->start_time)) }}</span>
                                                <span class="month">{{ date('M', strtotime($element->start_time)) }}</span>
                                            </div>
                                            <div class="metas col-xs-6">
                                                <div class="entry-header">
                                                    <h2 class="blog_title"><a href="{{ action('CampaignController@show', $element->id) }}">{!! str_limit($element->name, config('constants.LIMIT_TITLE_CHARACTERS')) !!}</a></h2>
                                                </div>
                                                <span class="location"><i class="fa fa-map-marker"></i> {{ $element->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>
        @if (count($events))
            <aside id="list-post-4" class="widget widget_list-post">
                <div class="thim-widget-list-post thim-widget-list-post-base">
                    <div class="thim-list-post-wrapper-simple list-post-base">
                        <div class="inner-list">
                            <h3 class="widget-title"><span>{{ trans('index.event') }}</span></h3>
                            <div class="list-posts">
                                <div class="item-post post-596 post type-post status-publish format-standard has-post-thumbnail hentry category-all category-blog category-health category-lifesaving category-seniors tag-course tag-learn tag-photography tag-social tag-study">
                                    @foreach ($events as $element)
                                        <div class="article-title-wrapper">
                                            <div class="article-inner">
                                                <div class="col-xs-6">
                                                    <a href="{{ action('EventController@show', $element->id) }}">
                                                        <img src="{{ asset('uploads/images/' . $element->img) }}" alt="{{ $element->title }}" title="{{ $element->title }}">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="{{ action('EventController@show', $element->id) }}" class="article-title">{{ $element->title }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        @endif
        <aside id="single-images-2" class="widget widget_single-images">
            <div class="thim-widget-single-images thim-widget-single-images-base">
                <div class="thim-single-image effect-hover">
                    <div class="wrapper-image">
                        <div class="single-image center">
                            <a target="_self" href="#">
                                <img class="fix-w-h" src="{{ asset('img/ads.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <aside id="list-post-5" class="widget widget_list-post">
            <div class="thim-widget-list-post thim-widget-list-post-base">
                <div class="fb-page" data-href="https://www.facebook.com/FramgiaVietnam" data-tabs="timeline" data-height="400px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/FramgiaVietnam" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/FramgiaVietnam">{{ trans('campaign.framgia') }}</a>
                    </blockquote>
                </div>
            </div>
        </aside>
    </div>
</div>
<div id="fb-root"></div>

@section('javascript')
    @parent
    {{ Html::script('js/version1/share_social.js') }}
@stop
