{{ Html::script('js/contribute.js') }}

<script type="text/javascript">
    $(document).ready(function () {
        var contribute = new Contribute('{{ action('ContributionController@store') }}');
        contribute.init();
    });
</script>

@if (Auth()->user())
<div class="modal-dialog donate_modal" id="donate_modal">
    <div id="donate_hidden" class="">
        <div class="thimpress_donate_form">
            <div class="notify"></div>
            {!! Form::open(['method' => 'POST', 'class' => 'donate_form form-horizontal', 'id' => 'form-contribute' ]) !!}
                <h2>{{ trans('index.what-you-donate') }}</h2>
                <p class="description">{!! str_limit($campaign->name, config('constants.LIMIT_DESCRIPTION_CHARACTERS')) !!}</p>
                {!! Form::hidden('campaign_id', old('campaign_id', $campaign->id), []) !!}
                {!! Form::hidden('email', old('email', Auth::user()->email), []) !!}
                {!! Form::hidden('name', old('name', Auth::user()->name), []) !!}
                @foreach ($results as $value)
                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                    <div class="col-md-11 col-md-offset-1">
                        <div class="col-md-3 ">
                            <span>{{ $value['name'] }}</span>
                        </div>
                        <div class="col-md-9 category">
                            <div class="input-group">
                                <div class="col-md-9 ">
                                    {!! Form::number('amount[' . $value['id'] . ']', '', ['class' => 'form-control', 'placeholder' => trans('campaign.amount'), 'min' => 0]) !!}
                                </div>
                                <div class="col-md-3">
                                    <p class="pull-right"><span>{{ $value['unit'] }}</span></p>
                                </div>
                                @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::textarea('description', null, ['rows' => 4, 'class' => 'form-control', 'placeholder' => trans('campaign.description')]) !!}
                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="donate_form_footer center">
                    {!! Form::submit(trans('index.join-now'), ['class' => 'donate_submit button payment', "id" => "btn-contribute"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@else
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ trans('index.sory-not-login') }}</h4>
        </div>
        <div class="modal-body">
            {{ trans('index.notlogin') }} <a href="{{ route('get_login') }}">{{ trans('index.login') }}</a>
        </div>
    </div>
</div>
@endif
