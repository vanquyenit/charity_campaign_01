<?php

namespace App\Console\Commands;
use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Console\Command;
use Mail;

class SendMail extends Command
{

    protected $campaignRepository;
    protected $contactRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        CampaignRepositoryInterface $campaignRepository,
        ContactRepositoryInterface $contactRepository
    ) {
        parent::__construct();
        $this->campaignRepository = $campaignRepository;
        $this->contactRepository = $contactRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arCampaign = $this->campaignRepository->lastCampaign();
        $arContact = $this->contactRepository->all();

        foreach ($arContact as $value) {
            $contacts[] = $value->email;
        }

        if ($arCampaign) {
            Mail::send('email.send_mail', ['arCampaign' => $arCampaign], function ($message) use ($contacts) {
                $message->to($contacts)->subject(trans('email.subject'));
            });
        }
    }
}
