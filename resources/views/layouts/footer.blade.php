<footer id="colophon" class="site-footer">
    <div class="container">
        <aside id="siteorigin-panels-builder-7" class="widget widget_siteorigin-panels-builder">
            <div id="pl-w5743ce68bcdfc">
                <div class="panel-grid" id="pg-w5743ce68bcdfc-0">
                    <div class="siteorigin-panels-stretch panel-row-style thim-overlay-color bg_image"  data-stretch-type="full" >
                        <div class="panel-grid-cell" id="pgc-w5743ce68bcdfc-0-0">
                            <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-w5743ce68bcdfc-0-0-0" data-index="0">
                                <div class="panel-widget-style">
                                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                        <div class="siteorigin-widget-tinymce textwidget">
                                            <h3 class="become">{{ trans('index.become-volunteer') }}</h3>
                                            <p class="join-become">{{ trans('index.register-volunteer') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="so-panel widget widget_button panel-last-child" id="panel-w5743ce68bcdfc-0-0-1" data-index="1">
                                <div class="thim-widget-button thim-widget-button-base">
                                    <div id="button_590e5660cd6e3" class="text-center">
                                        <a href="#" class="thim-button style4 inner size-default">{{ trans('index.now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <aside id="siteorigin-panels-builder-6" class="widget widget_siteorigin-panels-builder">
            <div id="pl-w581ad7d988d0a">
                <div class="panel-grid" id="pg-w581ad7d988d0a-0">
                    <div class="panel-row-style-thim-border-center siteorigin-panels-stretch thim-border-center panel-row-style"  data-stretch-type="full">
                        <div class="panel-grid-cell" id="pgc-w581ad7d988d0a-0-0">
                            <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-w581ad7d988d0a-0-0-0" data-index="0">
                                <div class="panel-widget-style width_500" >
                                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                        <div class="siteorigin-widget-tinymce textwidget">
                                            <p class="text-center">{{ trans('index.register-now') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="so-panel widget widget_mc4wp_form_widget panel-last-child" id="panel-w581ad7d988d0a-0-0-1" data-index="1">
                                <div class="panel-widget-style" >
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
                        <div class="panel-grid-cell" id="pgc-w581ad7d988d0a-0-1">
                            <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-w581ad7d988d0a-0-1-0" data-index="2">
                                <div class="panel-widget-style width_500" >
                                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                        <div class="siteorigin-widget-tinymce textwidget">
                                            <p class="text-center">
                                                {{ trans('index.support') }}
                                                <strong>
                                                    <a href="tel:{{ trans('message.company.phone') }}">{{ trans('message.company.phone') }}</a>
                                                </strong>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="so-panel widget widget_button panel-last-child" id="panel-w581ad7d988d0a-0-1-1" data-index="3">
                            <div class="panel-widget-style">
                                <div class="thim-widget-button thim-widget-button-base">
                                    <div id="button_590e5660cf914" class="text-center">
                                        <a href="#" class="thim-button style3 inner size-default">{{ trans('index.join-now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <aside id="siteorigin-panels-builder-3" class="widget widget_siteorigin-panels-builder">
        <div id="pl-w581bee1ca9a23">
            <div class="panel-grid" id="pg-w581bee1ca9a23-0">
                <div class="panel-row-style">
                    <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-0-0">
                        <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-w581bee1ca9a23-0-0-0" data-index="0">
                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                <div class="siteorigin-widget-tinymce textwidget">
                                    <p>
                                        <img src="{{ asset('img/footer-logo.png') }}" alt="footer-logo" width="155" height="50" class="alignnone size-full wp-image-419" />
                                    </p>
                                    <div>
                                        <i class="fa fa-phone"></i> &nbsp;&nbsp;
                                        <a href="tel:{{ trans('message.company.phone-s') }}"> {{ trans('message.company.phone') }}</a>
                                    </p>
                                    <p><i class="fa fa-envelope"></i> &nbsp;&nbsp;
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="8ae2efe6e6e5caf3e5fff8e7ebe3e6a4e9e5e7">{{ trans('index.mail') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="so-panel widget widget_social panel-last-child" id="panel-w581bee1ca9a23-0-0-1" data-index="1">
                            <div class="panel-widget-style">
                                <div class="thim-widget-social thim-widget-social-base">
                                    <div class="thim-social text-left style-default">
                                        <ul class="social_link">
                                            <li>
                                                <a class="facebook" href="https://www.facebook.com/FramgiaVietnam/" target="_self"><i class="fa fa-facebook"></i></a>
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
                    </div>
                    <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-0-1">
                        <div class="so-panel widget widget_nav_menu panel-first-child panel-last-child" id="panel-w581bee1ca9a23-0-1-0" data-index="2">
                            <div class="panel-widget-style">
                                <h3 class="widget-title">{{ trans('index.company') }}</h3>
                                <div class=" megaWrapper">
                                    <ul id="menu-company" class="menu">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-555 current_page_item standard">
                                            <a href="">
                                                <span data-hover="About Us">{{ trans('index.about') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page standard">
                                            <a href="#">
                                                <span data-hover="Blog">{{ trans('index.blog') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom standard">
                                            <a href="#">
                                                <span data-hover="Jobs">{{ trans('index.campaigns') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page standard">
                                            <a href="#">
                                                <span data-hover="Contact Us">{{ trans('index.contact') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-0-2">
                        <div class="so-panel widget widget_nav_menu panel-first-child panel-last-child" id="panel-w581bee1ca9a23-0-2-0" data-index="3">
                            <div class="panel-widget-style">
                                <h3 class="widget-title">{{ trans('index.link') }}</h3>
                                <div class=" megaWrapper">
                                    <ul id="menu-link" class="menu">
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category standard">
                                            <a href="#">
                                                <span data-hover="Projects">{{ trans('index.projects') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom standard">
                                            <a href="#">
                                                <span data-hover="Partner">{{ trans('index.partner') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page standard">
                                            <a href="#">
                                                <span data-hover="News">{{ trans('index.news') }}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page standard">
                                            <a href="#">
                                                <span data-hover="OutReach">{{ trans('index.OutReach') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-0-3">
                        <div class="so-panel widget widget_single-images panel-first-child panel-last-child" id="panel-w581bee1ca9a23-0-3-0" data-index="4">
                            <div class="thim-widget-single-images thim-widget-single-images-base">
                                <div class="thim-single-image no-effect">
                                    <h3 class="widget-title">{{ trans('index.our-worldwide-office') }}</h3>
                                    <div class="wrapper-image">
                                        <div class="single-image center">
                                            <img src="{{ asset('img/home1_map.png') }}" width="300" height="165" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-grid" id="pg-w581bee1ca9a23-1">
                <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-1-0">
                    <div class="so-panel widget widget_text panel-first-child panel-last-child" id="panel-w581bee1ca9a23-1-0-0" data-index="5">
                        <div class="textwidget">
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-grid" id="pg-w581bee1ca9a23-2">
                <div  class="panel-row-style">
                    <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-2-0">
                        <div class="so-panel widget widget_copyright panel-first-child panel-last-child" id="panel-w581bee1ca9a23-2-0-0" data-index="6">
                            <div class="thim-widget-copyright thim-widget-copyright-base">
                                <div class="thim-widget-copyright-text text-left">
                                    <p class="text-copyright">
                                        <p class="text-copyright">
                                            <a href="">{{ trans('index.design') }}</a></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-grid-cell" id="pgc-w581bee1ca9a23-2-1">
                            <div class="so-panel widget widget_nav_menu panel-first-child panel-last-child" id="panel-w581bee1ca9a23-2-1-0" data-index="7">
                                <div class="thim-float-list text-right panel-widget-style">
                                    <div class=" megaWrapper">
                                        <ul id="menu-footer-links" class="menu">
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom standard">
                                                <a href="#">
                                                    <span data-hover="Privacy">{{ trans('index.privacy') }}</span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom standard">
                                                <a href="#">
                                                    <span data-hover="Terms">{{ trans('index.terms') }}</span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom standard">
                                                <a href="#">
                                                    <span data-hover="Sitemap">{{ trans('index.sitemap') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</footer>
<a id='back-to-top' class="scrollup show" title="Go To Top"></a>
</div>
<div id="footer-bottom">
    <div class="container">
        <aside id="siteorigin-panels-builder-10" class="widget widget_siteorigin-panels-builder">
            <div id="pl-w5701effebe0cf">
                <div class="panel-grid" id="pg-w5701effebe0cf-0">
                    <div class="siteorigin-panels-stretch panel-row-style thim-overlay-color"  data-stretch-type="full">
                        <div class="panel-grid-cell" id="pgc-w5701effebe0cf-0-0">
                            <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-w5701effebe0cf-0-0-0" data-index="0">
                                <div class="panel-widget-style">
                                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                        <div class="siteorigin-widget-tinymce textwidget">
                                            <h3>{{ trans('index.become-volunteer') }}</h3>
                                            <p>{{ trans('index.register-volunteer') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="so-panel widget widget_button panel-last-child" id="panel-w5701effebe0cf-0-0-1" data-index="1">
                                <div class="thim-widget-button thim-widget-button-base">
                                    <div id="button_590e5661011d7" class="text-center">
                                        <a href="" class="thim-button style4 inner size-default">{{ trans('index.now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</div>
</div>
