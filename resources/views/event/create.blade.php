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
    {{ Html::script('js/version1/event.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            var event = new Event(
                "{!! action('CampaignController@uploadImage') . '?_token=' . csrf_token() !!}",
                '{!! $validateMessage !!}'
            );
            event.init();
        });
    </script>
@endsection

@section('content')
<div id="page-content">
    <div class="row">
        <div class="col-md-12 center-panel">
            <div class="block">
                <div class="block-title themed-background-dark">
                    <h2 class="font-weight-700 text-center">{{ trans('event.create') }}</h2>
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
                        {!! Form::open(['action' => 'EventController@store', 'method' => 'POST', 'id' => 'create-event', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">{{ trans('event.image') }}</label>
                                        {{ Form::file('image', ['class' => 'form-control', 'id' => 'image-upload']) }}
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                                <label for="campaign_id" class="col-md-3 control-label">{{ trans('event.campaign_id') }}</label>
                                <div class="col-md-8">
                                    <select name="campaign_id" id="campaign_id" class="form-control">
                                        <option value="">{{ trans('event.validate.campaign_id.required') }}</option>
                                        @foreach ($campaign as $element)
                                            <option value="{!! $element->id !!}">{!! $element->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">{{ trans('event.name') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('event.validate.name.campaigns-name')]) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-3 control-label">{{ trans('event.start_date') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('start_date', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('event.validate.start_date.start_date') ]) !!}
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-3 control-label">{{ trans('event.end_date') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('end_date', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('event.validate.end_date.end_date')]) !!}
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-3 control-label">{{ trans('event.address') }}</label>
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
                                <label for="description" class="col-md-3 control-label">{{ trans('event.description') }}</label>
                                <div class="col-lg-8">
                                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => '3']) !!}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-3 control-label">{{ trans('event.content') }}</label>
                                <div class="col-lg-8">
                                    {!! Form::textarea('content', old('content'), ['class' => 'form-control content', 'rows' => '3', 'id' => 'editor',]) !!}
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-raised btn-primary">
                                        {{ trans('event.create') }}
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
