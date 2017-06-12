<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ trans('message.page_titles.welcome') }}">
    <title>{{ trans('message.project') }}</title>
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
        {{ Html::style('bower_components/datatables/media/css/dataTables.bootstrap.min.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/autoptimize.css') }}
        {{ Html::style('css/master.css') }}
    @show

    @section('javascript')
        {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
        {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('bower_components/jquery-migrate/jquery-migrate.min.js') }}
        {{ Html::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}
        {{ Html::script('js/version1/styling.min.js') }}
        {{ Html::script('js/version1/share_social.js') }}
    @show

</head>

<body class="archive post-type-archive post-type-archive-dn_campaign group-blog tp_event-template-default single single-tp_event home page-template
page-template-page-templates page-template-homepage page-template-page-templateshomepage-php page page-id-4967
siteorigin-panels siteorigin-panels-home group-blog loading thim_header_custom_style thim_header_style2 thim_fixedmenu ">

@include('layouts.header')

@yield('content')

@include('layouts.footer')

@section('js')
    {{ Html::script('js/version1/main.min.js') }}
    {{ Html::script('js/version1/custom-script.js') }}
    {{ Html::script('js/version1/custom-scroll.min.js') }}
    {{ Html::script('js/multiple_language.js') }}
    {{ Html::script('bower_components/datatables/media/js/dataTables.material.min.js') }}
    {{ Html::script('js/version1/search.js') }}
    {{ Html::script('js/custom.js') }}
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery(document).ready(function($) {
        var search = new Search();
        search.init();
    });
</script>
@show

</body>

</html>
