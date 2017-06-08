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
                                <img class="fix-w-h" src="" alt="">
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
        {{ Html::script('js/facebook.js') }}
 @stop
