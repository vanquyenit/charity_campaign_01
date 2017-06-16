<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Event;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class OrtherController extends BaseController
{
    protected $campaign;
    protected $event;
    protected $contributionRepository;
    protected $userRepository;
    protected $timelineRepository;

    public function __construct(
        Campaign $campaign,
        Event $event,
        ContributionRepositoryInterface $contributionRepository,
        UserRepositoryInterface $userRepository,
        TimelineRepositoryInterface $timelineRepository,
        ContactRepositoryInterface $contactRepository,
        BlogRepositoryInterface $blogRepository
    ) {
        $this->campaign = $campaign;
        $this->event = $event;
        $this->contributionRepository = $contributionRepository;
        $this->userRepository = $userRepository;
        $this->timelineRepository = $timelineRepository;
        $this->contactRepository = $contactRepository;
        $this->blogRepository = $blogRepository;
    }

    public function aboutUs()
    {
        $this->dataView['countUsers'] = $this->userRepository->count();
        $this->dataView['countCampaigns'] = $this->campaign->count();
        $this->dataView['countEvents'] = $this->event->count();
        $this->dataView['countInteractives'] = $this->contributionRepository->getInteractive();
        $this->dataView['arUser'] = $this->userRepository->getUserByRating();

        return view('orther.aboutUs', $this->dataView);
    }

    public function faq()
    {
        return view('orther.faq');
    }

    public function member()
    {
        $this->dataView['arUser'] = $this->userRepository->paginate(config('constants.ALL_USER_LIMIT'));

        return view('orther.member', $this->dataView);
    }

    public function blog()
    {
        $this->dataView['arBlog'] = $this->blogRepository->all();

        return view('orther.blog', $this->dataView);
    }

    public function contact()
    {
        return view('orther.contact');
    }

    public function store(Request $request)
    {
        $inputs = $request->only([
            'fullname',
            'email',
            'subject',
            'message',
        ]);
        $contact = $this->contactRepository->createContact($inputs);

        if (!$contact) {
            return redirect(action('CampaignController@index'))
                ->withMessage(trans('index.contact_error'));
        }

        return redirect(action('CampaignController@index'))
            ->with(['alert-success' => trans('index.contact_success')]);
    }

    public function createBlog()
    {
        $this->dataJson['validateMessage'] = json_encode(trans('blog.validate'));

        return view('orther.createBlog', $this->dataJson);
    }

    public function saveBlog(Request $request)
    {
        $inputs = $request->only([
            'title',
            'img',
            'video',
            'type',
        ]);

        $blog = $this->blogRepository->createBlog($inputs);

        if (!$blog) {
            return redirect(action('OrtherController@createBlog'))
                ->withMessage(trans('blog.blog_error'));
        }

        if (!$this->timelineRepository->createTimeline(['blog_id' => $blog->id])) {
            return redirect(action('OrtherController@blog'))
                ->with(['alert-danger' => trans('timeline.create_error_blog')]);
        }

        return redirect(action('OrtherController@blog'))
            ->with(['alert-success' => trans('blog.blog_success')]);
    }
}
