<div class="comment-list-inner">
    <h2 class="comments-title"> {{ count($detailCampaign->comments) }} {{ trans('campaign.comments') }}</h2>
    <div class="comments-container">
        <ul id="comments-list" class="comments-list">
            @foreach ($detailCampaign->comments as $element)
                <li class="area__comment">
                    <div class="comment-main-level">
                        <div class="comment-avatar col-xs-2">
                            <img class="img-circle" src="{{ $element->user['avatar'] }}">
                        </div>
                        <div class="comment-box col-xs-10">
                            <div class="comment-head">
                                <h6 class="comment-name">
                                    <a href="{{ action('UserController@show', ['id' => $element->user['id']]) }}">{{ $element->user['name'] }}</a>
                                </h6>
                                <span>{{ Carbon\Carbon::now()->subSeconds(time() - strtotime($element->created_at))->diffForHumans() }}</span>
                            </div>
                            <div class="comment-content">{{{ $element->text }}}</div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
