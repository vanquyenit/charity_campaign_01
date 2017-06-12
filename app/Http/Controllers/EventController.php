<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Event\EventRepositoryInterface;
use App\Services\Purifier;
use Illuminate\Http\Request;

class EventController extends Controller
{

    protected $eventRepository;
    protected $campaignRepository;

    public function __construct(
        EventRepositoryInterface $eventRepository,
        CampaignRepositoryInterface $campaignRepository
    ) {
        $this->eventRepository = $eventRepository;
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->dataView['upcoming'] = $this->eventRepository->getUpcoming();
        $this->dataView['happening'] = $this->eventRepository->getHappening();
        $this->dataView['expired'] = $this->eventRepository->getExpired();

        return view('event.index', $this->dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['campaign'] = $this->campaignRepository->listCampaignOfUser(auth()->id())->get();
        $this->data['validateMessage'] = json_encode(trans('event.validate'));

        return view('event.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $inputs = $request->only([
            'campaign_id',
            'name',
            'image',
            'start_date',
            'end_date',
            'address',
            'lattitude',
            'longitude',
            'description',
            'content',
        ]);
        $inputs['description'] = Purifier::clean($inputs['description']);
        $event = $this->eventRepository->createEvent($inputs);

        if (!$event) {
            return redirect(action('EventController@create'))
                ->withMessage(trans('event.create_error'));
        }

        return redirect(
            action('EventController@index', ['id' => auth()->id()])
        )->with(['alert-success' => trans('event.create_success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $this->dataView['event'] = $this->eventRepository->getDetail($id);

            return view('event.detail', $this->dataView);
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
