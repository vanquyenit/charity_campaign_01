<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Event;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class OrtherController extends Controller
{
    protected $campaign;
    protected $event;
    protected $contributionRepository;
    protected $userRepository;

    public function __construct(
        Campaign $campaign,
        Event $event,
        ContributionRepositoryInterface $contributionRepository,
        UserRepositoryInterface $userRepository,
        ContactRepositoryInterface $contactRepository,
        BlogRepositoryInterface $blogRepository
    ) {
        $this->campaign = $campaign;
        $this->event = $event;
        $this->contributionRepository = $contributionRepository;
        $this->userRepository = $userRepository;
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

        return redirect(
            action('CampaignController@index')
        )->with(['alert-success' => trans('index.contact_success')]);
    }
}
