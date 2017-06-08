<?php

namespace App\Http\ViewComposers;

use App\Repositories\Campaign\CampaignRepositoryInterface;
use Illuminate\Contracts\View\View;

class CategoryComposer
{

    protected $campaignRepository;

    public function __construct(
        CampaignRepositoryInterface $campaignRepository
    ) {
        $this->campaignRepository = $campaignRepository;
    }

    public function compose(View $view)
    {
        $this->dataView['campaign'] = $this->campaignRepository->lastCampaign();

        $view->with($this->dataView);

    }
}
