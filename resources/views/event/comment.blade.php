@foreach ($event->comments as $element)
    <li class="area__comment">
        <div class="comment-main-level">
            <div class="comment-avatar col-xs-2">
                @if ($element->user)
                    <img class="media-object img-circle" src="{{ $element->user->avatar }}" alt="profile">
                @else
                    <img class="media-object img-circle" src="{{ config('path.to_avatar_default') }}" alt="profile">
                @endif
            </div>
            <div class="comment-box col-xs-10">
                <div class="comment-head">
                    @if ($element->user)
                        <h6 class="comment-name">
                            <a href="{{ action('UserController@show', ['id' => $element->user['id']]) }}">{{ $element->user['name'] }}</a>
                        </h6>
                    @else
                        <span>{{{ $element->name }}}</span>
                    @endif
                    <span>{{ Carbon\Carbon::now()->subSeconds(time() - strtotime($element->created_at))->diffForHumans() }}</span>
                </div>
                <div class="comment-content">{{{ $element->text }}}</div>
            </div>
        </div>
    </li>
@endforeach
