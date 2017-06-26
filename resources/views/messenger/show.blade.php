@foreach ($messages as $message)
    @if ($message->isOwnerCurrentUser())
        <div class="col-xs-12 no-padding">
            <div class="bubble me" title="{{ $message->created_at->diffForHumans() }}">
                {{ $message->body }}
            </div>
        </div>
    @else
        <div class="col-xs-12 no-padding">
            <img class="img-circle col-xs-3" src="{{ $message->user->avatar }}" title="{{ $message->user->fullname }}">
            <div class="bubble you col-xs-4" title="{{ $message->created_at->diffForHumans() }}">
                {{ $message->body }}
            </div>
        </div>
    @endif
@endforeach
