@extends('layouts.template')

@section('content')

<section class="content-area">
    <div class="top_site_main thim-parallax-image"  data-stellar-background-ratio="0.5">
        <span class="overlay-top-header"></span>
        <div class="page-title-wrapper">
            <div class="banner-wrapper container article_heading">
                <div class="row">
                    <div class="col-xs-6">
                        <h1 class="heading__primary">{{ trans('index.campaigns') }}</h1>
                    </div>
                    <div class="col-xs-6">
                        <ul id="thim_breadcrumbs" class="thim-breadcrumbs" itemscope >
                            <li class="item-home" itemprop="itemListElement" itemscope >
                                <a itemprop="item" class="bread-link bread-home" href="{{ action('CampaignController@index') }}" title="Home">
                                    <span itemprop="name">{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li class="separator separator-home"></li>
                            <li class="item-current item-cat item-custom-post-type-tp_event">
                                <a itemprop="item" class="bread-cat bread-custom-post-type-tp_event" href="{{ action('CampaignController@show', $detailCampaign->id) }}" title="Events">
                                    <span itemprop="name">{{ trans('index.campaigns') }}</span>
                                </a>
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
            <main id="main" class="site-main col-sm-9">
                <div class="table-responsive">
                    <table id="contribution-confirmed" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('campaign.contribution.index') }}</th>
                                <th>{{ trans('campaign.contribution.avatar') }}</th>
                                <th>{{ trans('campaign.contribution.name') }}</th>
                                <th>{{ trans('campaign.contribution.email') }}</th>
                                <th>{{ trans('campaign.contribute') }}</th>
                                <th>{{ trans('campaign.contribution.description') }}</th>
                                <th>{{ trans('campaign.contribution.time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contributionConfirmed as $key => $contribution)
                                <tr>
                                    <td scope="row"><p>{{ $key + 1 }}</p></td>
                                    @if ($contribution->user)
                                        <td>
                                            <div class="profile_thumb">
                                                <a href="{{ action('UserController@show', ['id' => $contribution->user->id]) }}">
                                                    <img src="{{ $contribution->user->avatar }}" alt="avatar" class="img-responsive img-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="profile_thumb">
                                                <a href="{{ action('UserController@show', ['id' => $contribution->user->id]) }}">
                                                    <p>{{ $contribution->user->name }}</p>
                                                </a>
                                            </div>
                                        </td>
                                        <td><p>{{ $contribution->user->email }}</p></td>
                                    @else
                                        <td>
                                            <div class="profile_thumb">
                                                <img src="{{ config('path.to_avatar_default') }}" alt="avatar" class="img-responsive img-circle">
                                            </div>
                                        </td>
                                        <td><p>{{ $contribution->name }}</p></td>
                                        <td><p>{{ $contribution->email }}</p></td>
                                    @endif
                                    <td>
                                        @foreach ($contribution->categoryContributions as $value)
                                          <span>{{ $value->category->name }} : {{ $value->amount }}  ({{ $value->category->unit }})</span><br>
                                        @endforeach
                                    </td>
                                    <td><p>{{ $contribution->description }}</p></td>
                                    <td><p>{{ $contribution->created_at }}</p></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>

            @include('layouts.right_bar')

            <div class="clear"></div>
        </div>
    </div>
</section>

@stop
