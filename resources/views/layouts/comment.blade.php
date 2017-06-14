<li class="area__comment">
    <div class="comment-main-level">
        <div class="comment-avatar col-xs-2">
            @if ($comment->user)
                <img class="img-circle" src="{{ $comment->user->avatar }}" alt="profile">
            @else
                <img class="img-circle" src="{{ config('path.to_avatar_default') }}" alt="profile">
            @endif
        </div>
        <div class="comment-box col-xs-10">
            <div class="comment-head">
                <h6 class="comment-name">
                    @if ($comment->user)
                        <a href="{{ action('UserController@show', ['id' => $comment->user->id]) }}" >
                            <span>{{ $comment->user->name }}</span>
                        </a>
                    @else
                        <span>{{{ $comment->name }}}</span>
                    @endif
                </h6>
                <span>{{ Carbon\Carbon::now()->subSeconds(time() - strtotime($comment->created_at))->diffForHumans() }}</span>
            </div>
            <div class="comment-content">{{{ $comment->text }}}</div>
        </div>
    </div>
</li>
