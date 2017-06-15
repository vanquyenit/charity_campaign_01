<div class="message new">
    <figure class="avatar">
        <img src="{{ $avatar }}">
    </figure>
    <a href="{{ action('UserController@show', $user_id) }}">{{ $name }}</a>
    <p class="send_mess">
        {{ $content }}
    </p>
    <div class="timestamp">{{ $time }}</div>
</div>
