<li class="person"
    data-chat="person_{{ $thread_id }}"
    data-url="{{ action('MessagesController@show', $thread_id) }}"
    data-thread="{{ $thread_id }}"
    data-fullname="{{ $name }}"
    data-user-id="{{ $user_id }}">
    <img src="{{ $avatar }}" alt="">
    <span class="name">{{ $name }}</span>
    <div class="preview-message">
        <span class="time">{{ $time }}</span>
        <span class="preview">{{ $body }}</span>
    </div>
</li>
