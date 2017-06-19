<style type="text/css" media="screen">
    #wrap {
        font-family:&quot;Arial&quot;,Helvetica Neue,Helvetica,sans-serif;
        line-height:18pt;
    }
    .tile {
        font-size:18px;
        padding-top:10px;
    }
    .im {
        color: rgb(14, 13, 12) !important;
    }
    .table {
        width:100%;
        border-collapse:collapse;
    }
    .content-title {
        border:1px solid #d7d7d7;
        background-color:#f8f8f8;
    }
    .cc-left {
        padding:5px 10px;
        text-align:left
    }
    .cc-center {
        text-align:center;
        padding:5px 10px;
    }
    .cc-right {
        padding:5px 10px;
        text-align:right;
    }
    .content-main {
        border:1px solid #d7d7d7;
    }
    .name {
        padding:5px 10px;
    }
    .next {
        font-size:18px;
    }
    .next-web {
        padding:15px;background-color:#7fc142;color:#fff;
    }
    .contact {
        text-align:right;
    }
    .contact span {
        color:#17a3dd;
    }
</style>
<div id="wrap">
    <div class="adM"></div>
    <p>{{ trans('email.hello') }}</p>
    <p>{{ trans('email.wellcome') }}</p>
    <div>
        <div class="tile">
            <strong>{{ trans('email.information') }}</strong>
        </div>
        <table border="1" class="table">
            <thead>
                <tr class="content-title">
                    <th class="cc-left">
                        <strong>{{ trans('email.name') }}</strong>
                    </th>
                    <th class="cc-center">
                        <strong>{{ trans('email.description') }}</strong>
                    </th>
                    <th class="cc-right">
                        <strong>{{ trans('email.address') }}</strong>
                    </th>
                    <th class="cc-right">
                        <strong>{{ trans('email.time') }}</strong>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arCampaign as $element)
                    <tr class="content-main">
                        <td class="name">{{ $element->name }}</td>
                        <td class="cc-center">{!! $element->description !!}</td>
                        <td class="cc-right">{{ $element->address }}</td>
                        <td class="cc-right">{{ trans('email.start-time') }}: {{ $element->start_time }} <br> {{ trans('email.end-time') }}: {{ $element->end_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>{{ trans('email.for-more') }}:</p>
    <div class="next">
        <a class="next-web" href="{{ action('CampaignController@index') }}" target="_blank" >{{ trans('email.go-to-the') }}</a>
    </div> &nbsp;
    <hr>
    <p class="contact">
        {{ trans('email.if-you-have') }}
        <span>
            <a href="{{ trans('email.email') }}" target="_blank">{{ trans('email.email') }}</a>
        </span>
    </p>
    <p class="contact">
        <i>{{ trans('email.respect') }}</i>
    </p>
    <p class="contact">
        <strong>{{ trans('email.the-charity') }}</strong>
    </p>
</div>
