<?php

namespace App\Http\Controllers;

use App\Repositories\Follow\FollowRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use Illuminate\Http\Request;

class FollowController extends BaseController
{
    protected $followRepository;
    protected $timelineRepository;

    public function __construct(
        FollowRepositoryInterface $followRepository,
        TimelineRepositoryInterface $timelineRepository
    ) {
        $this->followRepository = $followRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function followOrUnFollowUser(Request $request)
    {
        if ($request->ajax()) {
            $targetId = $request->get('target_id');
            $result = $this->followRepository->followOrUnFollowUser($targetId);
            $dataType = config('constants.ONE') == $result->status ? config('settings.follow') : config('settings.unfollow');

            if (!$this->timelineRepository->createTimeline(['friends_id' => $targetId, 'data_type' => $dataType])) {
                return false;
            }

            if ($result) {
                return response()->json([
                    'success' => true,
                    'result' => $result,
                ]);
            }
        }

        return response()->json(['success' => false]);
    }
}
