<?php

namespace App\Providers;

use App;
use App\Repositories\Action\ActionRepository;
use App\Repositories\Action\ActionRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Campaign\CampaignRepository;
use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Chat\ChatRepository;
use App\Repositories\Chat\ChatRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Contribution\ContributionRepository;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\Event\EventRepository;
use App\Repositories\Event\EventRepositoryInterface;
use App\Repositories\Follow\FollowRepository;
use App\Repositories\Follow\FollowRepositoryInterface;
use App\Repositories\Group\GroupRepository;
use App\Repositories\Group\GroupRepositoryInterface;
use App\Repositories\Hashtag\HashtagRepository;
use App\Repositories\Hashtag\HashtagRepositoryInterface;
use App\Repositories\Message\MessageRepository;
use App\Repositories\Message\MessageRepositoryInterface;
use App\Repositories\Participant\ParticipantRepository;
use App\Repositories\Participant\ParticipantRepositoryInterface;
use App\Repositories\Rating\RatingRepository;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Repositories\Timeline\TimelineRepository;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Session::put('locale', 'en');

        Validator::extendImplicit('campaign', 'App\Validation\CampaignValidate@campaign');
        Validator::extendImplicit('amount', 'App\Validation\ContributionValidate@amount');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(CampaignRepositoryInterface::class, CampaignRepository::class);
        App::bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        App::bind(ContributionRepositoryInterface::class, ContributionRepository::class);
        App::bind(CommentRepositoryInterface::class, CommentRepository::class);
        App::bind(RatingRepositoryInterface::class, RatingRepository::class);
        App::bind(FollowRepositoryInterface::class, FollowRepository::class);
        App::bind(ActionRepositoryInterface::class, ActionRepository::class);
        App::bind(MessageRepositoryInterface::class, MessageRepository::class);
        App::bind(GroupRepositoryInterface::class, GroupRepository::class);
        App::bind(EventRepositoryInterface::class, EventRepository::class);
        App::bind(ContactRepositoryInterface::class, ContactRepository::class);
        App::bind(BlogRepositoryInterface::class, BlogRepository::class);
        App::bind(TimelineRepositoryInterface::class, TimelineRepository::class);
        App::bind(ParticipantRepositoryInterface::class, ParticipantRepository::class);
        App::bind(ChatRepositoryInterface::class, ChatRepository::class);
        App::bind(HashtagRepositoryInterface::class, HashtagRepository::class);
    }
}
