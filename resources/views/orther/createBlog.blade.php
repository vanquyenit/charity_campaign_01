@extends('layouts.template')

@section('js')
    @parent
    {{ Html::script('bower_components/jquery-validation/dist/jquery.validate.min.js') }}
    {{ Html::script('js/version1/blog.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            var blog = new Blog(
                '{!! $validateMessage !!}'
            );
            blog.init();
        });
    </script>
@endsection

@section('content')
<div id="page-content">
    <div class="row">
        <div class="col-md-12 center-panel">
            <div class="block">
                <div class="block-title themed-background-dark">
                    <h2 class="font-weight-700 text-center">{{ trans('blog.create') }}</h2>
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
                        {!! Form::open(['action' => 'OrtherController@saveBlog', 'method' => 'POST', 'id' => 'create-blog', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                <label for="type" class="col-md-3 control-label">{{ trans('blog.type') }}</label>
                                <div class="col-md-8">
                                @php($optionsArray = ['image' => trans('blog.image'), 'video' => trans('blog.video')])
                                    {!! Form::select('type', $optionsArray, null, ['class' => 'form-control', 'id' => 'type_blog']) !!}
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-md-3 control-label">{{ trans('blog.title') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('title', null, ['class' => 'form-control datetimepicker', 'placeholder' => trans('blog.validate.title.required')]) !!}
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group video_preview">
                                <label for="video" class="col-md-3 control-label">{{ trans('blog.video') }}</label>
                                <div class="col-md-8">
                                    {!! Form::text('video', old('video'), ['class' => 'form-control', 'placeholder' => trans('blog.validate.video.required')]) !!}
                                    @if ($errors->has('video'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('video') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group image_preview">
                                <label for="title" class="col-md-3 control-label">{{ trans('blog.image') }}</label>
                                <div class="col-md-8">
                                    {!! Form::file('img[]', ['class' => 'form-control', 'id' => 'image__preview', 'multiple' => 'mutiple']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-3" id="img-previews"></div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-raised btn-primary">
                                        {{ trans('blog.create') }}
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
