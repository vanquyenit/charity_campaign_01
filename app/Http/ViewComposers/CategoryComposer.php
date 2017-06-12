<?php

namespace App\Http\ViewComposers;

use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\Event\EventRepositoryInterface;
use Illuminate\Contracts\View\View;
use Request;

class CategoryComposer
{

    protected $campaignRepository;
    protected $contributionRepository;
    protected $eventRepository;

    public function __construct(
        CampaignRepositoryInterface $campaignRepository,
        ContributionRepositoryInterface $contributionRepository,
        EventRepositoryInterface $eventRepository
    ) {
        $this->campaignRepository = $campaignRepository;
        $this->contributionRepository = $contributionRepository;
        $this->eventRepository = $eventRepository;
    }

    public function compose(View $view)
    {

        $id = Request::segment(config('constants.RATING_USER'));
        $campaign = Request::segment(config('constants.ACTIVATED'));

        if ($id && config('settings.campaign') == $campaign ||
            config('settings.confirmed') == $campaign ||
            config('settings.unconfirmed') == $campaign
        ) {
            $this->dataView['events'] = $this->eventRepository->getEvent($id);
            $this->dataView['results'] = $this->contributionRepository->getValueContribution($id);
        } else {
            $this->dataView['events'] = [];
            $this->dataView['results'] = [];
        }

        $this->dataView['campaign'] = $this->campaignRepository->lastCampaign();

        $view->with($this->dataView);
    }
}
