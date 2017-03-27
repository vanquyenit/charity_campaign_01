<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Event;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

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
        UserRepositoryInterface $userRepository
    ) {
        $this->campaign = $campaign;
        $this->event = $event;
        $this->contributionRepository = $contributionRepository;
        $this->userRepository = $userRepository;
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

    public function contact()
    {
        return view('orther.contact');
    }
}
