<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ trans('message.page_titles.welcome') }}">
    <title>{{ Auth::user()->fullname }}</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="shortcut icon" href="{{ asset('/img/001-world.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('css')
        {{ Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,italic,600,600italic,700,700italic,800,800italic&#038;subset=greek-ext,greek,cyrillic-ext,latin-ext,latin,vietnamese,cyrillic') }}
        {{ Html::style('http://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&#038;subset=greek-ext,greek,cyrillic-ext,latin-ext,latin,vietnamese,cyrillic') }}
        {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}
        {{ Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}
        {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/autoptimize.css') }}
        {{ Html::style('css/master.css') }}
        {{ Html::style('css/messenger.css') }}
    @show

    @section('javascript')
        {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
        {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('bower_components/jquery-migrate/jquery-migrate.min.js') }}
        {{ Html::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}
    @show

</head>

<body class="archive post-type-archive post-type-archive-dn_campaign group-blog tp_event-template-default single single-tp_event home page-template
page-template-page-templates page-template-homepage page-template-page-templateshomepage-php page page-id-4967
siteorigin-panels siteorigin-panels-home group-blog loading thim_header_custom_style thim_header_style2 thim_fixedmenu ">

@include('layouts.header')
@include('layouts.alert')
@include('layouts.message')
<div class="hide"
    data-host="{{ config('app.key_program.socket_host') }}"
    data-port="{{ config('app.key_program.socket_port') }}"
    data-user-id="{{ auth()->id() }}"
    data-url="{{ action('MessagesController@store') }}"
    data-error="{{ trans('message.error') }}">
</div>
<div class="wrapper">
    <div class="container">
        <div class="left col-xs-4 no-padding fix-height">
            <div class="top">
                <input type="text" class="col-xs-9" />
                <a href="javascript:;" class="search col-xs-9"></a>
            </div>
            <ul class="people list-unstyled">
                @if (isset($listFriend))
                    @foreach ($listFriend as $value)
                        <li class="person new-chat"
                            data-fullname="{{ $value->following->fullname }}"
                            data-url="{{ action('ParticipantController@store') }}"
                            data-user-id="{{ $value->following->id }}">
                            <img src="{{ $value->following->avatar }}" alt="" />
                            <span class="name">{{ $value->following->fullname }}</span>
                            <div class="preview-message">
                                <span class="time"></span>
                                <span class="preview"></span>
                            </div>
                        </li>
                    @endforeach
                @else
                    @foreach ($listUser as $element)
                        <li class="person person_{{ $element->thread_id }}"
                            data-chat="person_{{ $element->thread_id }}"
                            data-url="{{ action('MessagesController@show', $element->thread_id) }}"
                            data-thread="{{ $element->thread_id }}"
                            data-fullname="{{ $element->user->fullname }}"
                            data-user-id="{{ $element->user->id }}">
                            <img src="{{ $element->user->avatar }}" alt="" />
                            <span class="name">{{ $element->user->fullname }}</span>
                            <div class="preview-message">
                                <span class="time"></span>
                                <span class="preview"></span>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="right col-xs-8 no-padding fix-height">
            <div class="top"><span>{{ trans('message.to') }}<span class="name"></span></span></div>
            <div class="chat" data-chat-id="">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>
            <div class="write">
                {!! Form::textarea('body', null, ['class' => 'text-body']) !!}
                <a href="javascript:;" class="write-link send"></a>
            </div>
        </div>
    </div>
</div>
@section('js')
    {{ Html::script('js/version1/main.min.js') }}
    {{ Html::script('js/version1/custom-script.js') }}
    {{ Html::script('js/version1/custom-scroll.min.js') }}
    {{ Html::script('js/multiple_language.js') }}
    {{ Html::script('https://cdn.socket.io/socket.io-1.3.4.js') }}
    {{ Html::script('js/version1/messenger.js') }}
@show
</body>
</html>
