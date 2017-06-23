@extends('layouts.template')

@section('css')
    @parent
    {{ Html::style('bower_components/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
@endsection

@section('js')
    @parent
    {{ Html::script('js/plugins.js') }}
    {{ Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAvCSKMKzElwzRaHpcURMmS6J4z4qGP0ZM&libraries=places') }}
    {{ Html::script('http://opoloo.github.io/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js') }}
    {{ Html::script('bower_components/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}
    {{ Html::script('bower_components/jquery-validation/dist/jquery.validate.min.js') }}
    {{ Html::script('bower_components/ckeditor/ckeditor.js') }}
    {{ Html::script('js/version1/campaign.js') }}
    <script type="text/javascript">
        $(document).ready(function(){
            var campaign = new Campaign(
                "{!! action('CampaignController@uploadImage') . '?_token=' . csrf_token() !!}",
                '{!! $validateMessage !!}'
            );
            campaign.init();
        })
    </script>
@endsection

@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-md-12 center-panel">
                <div class="block">
                    <div class="block-title themed-background-dark">
                        <h2 class="font-weight-700 text-center">{{ trans('campaign.create') }}</h2>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="col-lg-12">
                                <div class="col-lg-10 col-lg-offset-1 alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {!! Session::get('message') !!}
                                </div>
                            </div>
                        @endif
                        <div class="campaign">
                            {!! Form::open(['action' => 'CampaignController@store', 'method' => 'POST', 'id' => 'create-campaign', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">{{ trans('campaign.image') }}</label>
                                        {{ Form::file('image', ['class' => 'form-control', 'id' => 'image-upload']) }}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">{{ trans('campaign.name') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('campaign.validate.name.required')]) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="contribution">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-3 control-label">{{ trans('campaign.categories') }}</label>
                                    <div class="col-md-8 category">
                                        <div class="category-content">
                                            <div class="col-md-6 no-padding-left">
                                                {!! Form::text('contribution_type[]', null, ['class' => 'form-control category-name', 'placeholder' => trans('campaign.validate.contribution_type.contribution')] ) !!}
                                            </div>
                                            <div class="col-md-3">
                                                {!! Form::number('goal[]', null, ['class' => 'form-control category-goal', 'placeholder' => trans('campaign.validate.goal.goal'), 'min' => 1]) !!}
                                            </div>
                                            <div class="col-md-3 no-padding-right" id="form-control">
                                                <select name="unit[]" class="form-control">
                                                    <option value="">{{ trans('campaign.validate.unit.unit') }}</option>
                                                    @foreach ($categoryUnit as $key =>  $element)
                                                        <option value="{{ $element->name }}">{{ $element->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-3 control-label">{{ trans('campaign.start_date') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('start_date', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('campaign.validate.start_date.start_date') ]) !!}
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-3 control-label">{{ trans('campaign.end_date') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('end_date', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('campaign.validate.end_date.end_date')]) !!}
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-3 control-label">{{ trans('campaign.address') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'id' => 'location']) !!}
                                    {!! Form::hidden('lattitude', '', ['id' => 'lat']) !!}
                                    {!! Form::hidden('longitude', '', ['id' => 'lng']) !!}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-3 control-label">{{ trans('campaign.description') }}</label>
                                <div class="col-lg-8">
                                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'editor', 'rows' => '10']) !!}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-raised btn-primary">
                                        {{ trans('campaign.create') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
