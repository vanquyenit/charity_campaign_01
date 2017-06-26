<?php

namespace App\Http\Controllers;

use App\Filter\HashtagsFilter;
use App\Http\Requests\EventRequest;
use App\Models\Hashtag;
use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Event\EventRepositoryInterface;
use App\Repositories\Hashtag\HashtagRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Services\Purifier;
use Gate;
use Illuminate\Http\Request;

class EventController extends BaseController
{

    protected $eventRepository;
    protected $campaignRepository;
    protected $timelineRepository;
    protected $hashtagRepository;
    protected $hashtag;

    public function __construct(
        EventRepositoryInterface $eventRepository,
        CampaignRepositoryInterface $campaignRepository,
        TimelineRepositoryInterface $timelineRepository,
        HashtagRepositoryInterface $hashtagRepository,
        Hashtag $hashtag
    ) {
        $this->eventRepository = $eventRepository;
        $this->campaignRepository = $campaignRepository;
        $this->timelineRepository = $timelineRepository;
        $this->hashtagRepository = $hashtagRepository;
        $this->hashtag = $hashtag;
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
    public function eventCreate($id)
    {
        if (!$this->campaignRepository->checkUserCampaign([
            'user_id' => auth()->id(),
            'campaign_id' => $id,
        ])) {
            return abort(404);
        }

        $this->data['campaign_id'] = $id;
        $this->data['validateMessage'] = json_encode(trans('event.validate'));

        return view('event.create', $this->data);
    }

    public function search(HashtagsFilter $filters)
    {
        $arHashtagId = [];
        foreach ($this->hashtag->filter($filters)->get() as $value) {
            $arHashtagId[] = $value->event_id;
        }

        $this->dataView['arEvent'] = $this->eventRepository->whereIn('id', $arHashtagId)
            ->paginate(config('constants.LIMIT_EVENT'));

        return view('event.search', $this->dataView);
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

        $inputs['content'] = Purifier::clean($inputs['content']);
        $event = $this->eventRepository->createEvent($inputs);

        $hashtag = [];
        foreach (explode(' ', $inputs['description']) as $key => $value) {
            if (stripos($value, '#') !== false) {
                $hashtag[]['name'] = $value;
            }
        }

        foreach (explode(' ', $inputs['content']) as $key => $value) {
            if (stripos($value, '#') !== false) {
                $hashtag[]['name'] = $value;
            }
        }

        if (!$hashtag) {
            $hashtags = $event->hashtags()->createMany($hashtag);
        }

        if (!$event) {
            return redirect(action('EventController@create'))
                ->withMessage(trans('event.create_error'));
        }

        if (!$this->timelineRepository->createTimeline(['event_id' => $event->id])) {
            return redirect(action('EventController@show', ['id' => $event->id]))
                ->with(['alert-danger' => trans('timeline.create_error_event')]);
        }

        return redirect(action('EventController@show', ['id' => $event->id]))
            ->with(['alert-success' => trans('event.create_success')]);
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
            $this->dataView['arSearch'] = $this->hashtagRepository->findBy('event_id', $id);

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
        $this->data['detailEvent'] = $this->eventRepository->getDetail($id);

        if (!$this->data['detailEvent'] || Gate::denies('event', $this->data['detailEvent'])) {
            return abort(404);
        }

        $this->data['validateMessage'] = json_encode(trans('event.validate'));

        return view('event.edit', $this->data);
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
        $inputs = $request->only([
            'event_id',
            'name',
            'file',
            'start_date',
            'end_date',
            'address',
            'lattitude',
            'longitude',
            'description',
            'content',
        ]);
        $inputs['content'] = Purifier::clean($inputs['content']);

        $event = $this->eventRepository->updateEvent($inputs);

        if (!$event) {
            return redirect(action('EventController@edit', ['userId' => auth()->id(), 'eventId' => $id]))
                ->withMessage(trans('event.update_error'));
        }

        return redirect(action('UserController@listUserEvent', ['userId' => auth()->id()]))
            ->with(['alert-success' => trans('event.update_success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = $this->eventRepository->find($id);

        if (!$event || Gate::denies('event', $event)) {
            return abort(404);
        }

        $event = $this->eventRepository->deleteEvent($id);

        if (!$event) {
            return redirect(action('UserController@listUserEvent', ['userId' => auth()->id()]))
                ->withMessage(trans('event.delete_error'));
        }

        if (!$this->timelineRepository->deleteTimeline(auth()->id(), 'event_id', $id)) {
            return redirect(action('UserController@listUserEvent', ['userId' => auth()->id()]))
                ->with(['alert-danger' => trans('event.delete_error')]);
        }

        return redirect(action('UserController@listUserEvent', ['userId' => auth()->id()]))
            ->with(['alert-success' => trans('event.delete_success')]);
    }
}
