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
                    <a data-toggle="modal" href='#modalCompose' href="#" class="btn btn-success btn-lg waves-effect">
                        {{ trans('contact.compose') }}
                    </a>
                </h3>
                {{ Form::open(['action' => 'Admin\ContactController@index', 'method' => 'GET', 'class' => 'pull-right position']) }}
                <div class="input-append">
                    {{ Form::text('email', isset($input['email']) ? $input['email'] : "", [
                        'class' => 'sr-input',
                        'id' => 'email',
                        'placeholder' => trans('contact.search-mail')])
                    }}
                    <button class="btn sr-btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="inbox-body">
                {!! Form::open(['action' => 'Admin\ContactController@delAll', 'method' => 'post']) !!}
                    <div class="mail-option">
                        <div class="chk-all">
                            {!! Form::checkbox('checkbox', null, null, ['id' => 'check-all', 'class' => 'remove-checkbox']) !!}
                            <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                    {{ trans('contact.all') }}
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> {{ trans('contact.none') }}</a></li>
                                    <li><a href="#"> {{ trans('contact.read') }}</a></li>
                                    <li><a href="#"> {{ trans('contact.unreads') }}</a></li>
                                    <li class="divider"></li>
                                    <li><i class="fa fa-trash-o"></i>{!! Form::submit(trans('contact.delete'), []) !!}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a data-original-title="Refresh" href="{{ action('Admin\ContactController@index') }}" class="btn mini tooltips">
                                <i class=" fa fa-refresh"></i>
                            </a>
                        </div>
                        <ul class="unstyled inbox-pagination">
                            <li>
                                {{ trans_choice('label.paginations', $contacts->total(), [
                                    'start' => $contacts->firstItem(),
                                    'finish' => $contacts->lastItem(),
                                    'numberOfRecords' => $contacts->total()
                                    ])
                                }}
                            </li>
                        </ul>
                    </div>
                    <table class="table table-inbox table-hover">
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr class="
                                    @if ($contact->review == config('constans.ZERO'))
                                        {{ trans('contact.unread') }}
                                    @endif
                                ">
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" name="delAll[]" value="{{ $contact->id }}" class="mail-checkbox">
                                    </td>
                                    <td class="view-message  dont-show"><a href="{{ action('Admin\ContactController@show', $contact->id) }}" title="">{{ $contact->fullname }}</a></td>
                                    <td class="view-message "><a href="{{ action('Admin\ContactController@show', $contact->id) }}" title="">{{ $contact->subject }}</a></td>
                                    <td class="view-message  text-right">{{ Carbon\Carbon::now()->subSeconds(time() - strtotime($contact->created_at))->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {!! Form::close() !!}
                <div class="pagination pagination-lg pull-right">
                    {{ (isset($linkFilter) ? $linkFilter : $contacts->render()) }}
                </div>
            </div>
        </aside>
    </div>
</div>
@stop
