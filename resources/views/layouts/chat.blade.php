<div class="hide-chat" data-campaign-id="{{ $detailCampaign->id }}"
    data-route-chat="{{ url('campaign-chat') }}"
    data-host="{{ config('app.key_program.socket_host') }}"
    data-port="{{ config('app.key_program.socket_port') }}">
</div>
<div class="hide-campaign-id" data-campaign-id="{{ $detailCampaign->id }}"></div>
<div class="hide-user-id" data-current-user-id="{{ auth()->id() }}"></div>
<div class="chat">
    <div class="chat-title">
        <div class="col-xs-9">
            <h1>{{ $detailCampaign->name }}</h1>
        </div>
        <div class="col-xs-3">
            <a href="javascript:void(0)"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
            <a href="javascript:void(0)"><span class="glyphicon glyphicon-remove icon_close chat-close"></span></a>
        </div>
    </div>
    <div class="messages">
        <div class="messages-content msg_container_base">
            @foreach ($messages as $message)
                @if ($message->isOwnerCurrentUser())
                    @include('layouts.message_send', [
                        'content' => $message->content,
                        'avatar' => $message->user->avatar,
                        'time' => $message->created_at->diffForHumans(),
                        'name' => $message->user->name,
                    ])
                @else
                    @include('layouts.message_receive', [
                        'content' => $message->content,
                        'avatar' => $message->user->avatar,
                        'time' => $message->created_at->diffForHumans(),
                        'name' => $message->user->name,
                        'user_id' => $message->user_id,
                    ])
                @endif
            @endforeach
        </div>
    </div>
    <div class="message-box">
        {!! Form::textarea('content', null, [
            'class' => 'message-input',
            'placeholder' => trans('index.text-chat'),
        ]) !!}
        <button type="submit" class="message-submit">{{ trans('index.send') }}</button>
    </div>
</div>
