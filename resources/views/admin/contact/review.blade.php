@extends('admin.master')
@section('title')
{{ trans('user.title') }}
@endsection
@section('content')
<div class="">
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>
                    <a data-toggle="modal" href='#modal-reply' href="#" class="btn btn-success btn-lg waves-effect">
                        {{ trans('contact.reply') }}
                    </a>
                </h3>
            </div>
            <div class="inbox-body">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('contact.read-mail') }}</h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>{{ $contact->subject }}</h3>
                                <h5>{{ trans('contact.from') }} {{ $contact->email }}
                                    <span class="mailbox-read-time pull-right">{{ date('d/m/Y h:i A', strtotime($contact->created_at)) }}</span>
                                </h5>
                            </div>
                            <div class="mailbox-read-message">
                                {!! $contact->message !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>
<div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ trans('contact.reply') }}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open([
                    'action' => 'Admin\ContactController@store',
                    'method' => 'post',
                    'class' => 'form-horizontal',
                    'roly' => 'form'])
                !!}
                    {!! Form::hidden('role', config('constants.TWO_STAR'), []) !!}
                    {!! Form::hidden('email', $contact->email, []) !!}
                    <div class="form-group">
                        <label class="col-sm-2" for="inputSubject">{{ trans('contact.subject') }}:</label>
                        <div class="col-sm-10 form-line">
                            {!! Form::text('subject', '', [
                                'id' => 'inputSubject',
                                'class' => 'form-control',
                                'placeholder' => trans('contact.subject')])
                            !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="inputBody">{{ trans('contact.message') }}:</label>
                        <div class="col-sm-12 form-line">
                            {!! Form::textarea('message', '', [
                                'id' => 'inputBody',
                                'class' => 'form-control',
                                'rows' => 18])
                            !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ trans('contact.cancel') }}</button>
                        {!! Form::submit(trans('contact.reply'), ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
