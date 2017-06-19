<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Action\ActionRepositoryInterface;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Campaign\CampaignRepositoryInterface;
use App\Repositories\Contribution\ContributionRepositoryInterface;
use App\Repositories\Event\EventRepositoryInterface;
use App\Repositories\Follow\FollowRepositoryInterface;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Repositories\Timeline\TimelineRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $user;
    protected $userRepository;
    protected $timelineRepository;
    protected $campaignRepository;
    protected $contributionRepository;
    protected $ratingRepository;
    protected $followRepository;
    protected $actionRepository;
    protected $eventRepository;
    protected $blogRepository;

    public function __construct(
        User $user,
        UserRepositoryInterface $userRepository,
        TimelineRepositoryInterface $timelineRepository,
        CampaignRepositoryInterface $campaignRepository,
        ContributionRepositoryInterface $contributionRepository,
        RatingRepositoryInterface $ratingRepository,
        FollowRepositoryInterface $followRepository,
        ActionRepositoryInterface $actionRepository,
        EventRepositoryInterface $eventRepository,
        BlogRepositoryInterface $blogRepository
    ) {
        $this->user = $user;
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
        $this->timelineRepository = $timelineRepository;
        $this->campaignRepository = $campaignRepository;
        $this->contributionRepository = $contributionRepository;
        $this->ratingRepository = $ratingRepository;
        $this->followRepository = $followRepository;
        $this->actionRepository = $actionRepository;
        $this->blogRepository = $blogRepository;
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
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['follow'] = $this->followRepository->getFollowUser($id);
        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['actions'] = $this->actionRepository->getActionByUser($id);
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);
        $this->dataView['campaigns'] = $this->campaignRepository->listCampaignOfUser($id)->get();
        $this->dataView['userList'] = $this->userRepository->getListUserFollow($id);

        return view('user.detail', $this->dataView);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        if (!$this->dataView['user']->isCurrent()) {
            return redirect(action('UserController@show', ['id' => $this->dataView['user']->id]));
        }

        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);
        $this->dataView['following'] = $this->followRepository->following($id);
        $this->dataView['followers'] = $this->followRepository->followers($id);
        $this->dataView['campaigns'] = $this->campaignRepository->listCampaignOfUser($id)->get();

        return view('user.detail', $this->dataView);
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
        try {
            $user = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        if (!$user->isCurrent()) {
            return redirect(action('UserController@show', ['id' => $user->id]));
        }

        $this->validate($request, $this->user->updateRules($id));

        $params = [
            'id' => $user->id,
            'name' => $request->get('name'),
            'fullname' => $request->get('fullname'),
            'address' => $request->get('address'),
            'birthday' => $request->get('birthday'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'avatar' => $request->file('avatar'),
            'cover' => $request->file('cover'),
        ];

        if (!is_null($request->get('password'))) {
            $params['password'] = bcrypt($request->get('password'));
        }
        // update user
        $user = $this->userRepository->updateProfile($params, $id);

        if (empty($user)) {
            return redirect(action('UsersController@show', ['id' => $id]))
                ->withErrors(['message' => trans('user.update_error')])
                ->withInput();
        }

        return redirect()->back()
            ->with(['alert-success' => trans('user.update_success')]);
    }

    public function listUserCampaign($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['campaigns'] = $this->campaignRepository->listCampaignOfUser($id)
            ->paginate(config('constants.PAGINATE_CAMPAIGN'));
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);
        $this->dataView['following'] = $this->followRepository->following($id);
        $this->dataView['followers'] = $this->followRepository->followers($id);
        $this->dataView['userList'] = $this->userRepository->getListUser($id)->take(config('constants.ALL_USER_LIMIT'));

        return view('user.campaigns', $this->dataView);
    }

    public function manageCampaign($id, $campaignId)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['campaignInfo'] = $this->campaignRepository->getInfoCampaign($campaignId);
        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['campaignUsers'] = $this->userRepository->getUsersInCampaign($campaignId)
            ->paginate(config('constants.PAGINATE'));
        $this->dataView['contributions'] = $this->contributionRepository->getAllCampaignContributions($campaignId)
            ->paginate(config('constants.PAGINATE'));
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);
        $this->dataView['following'] = $this->followRepository->following($id);
        $this->dataView['followers'] = $this->followRepository->followers($id);
        $this->dataView['campaigns'] = $this->campaignRepository->listCampaignOfUser($id)->get();

        return view('user.campaign_detail', $this->dataView);
    }

    public function follower($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);

        return view('user.follower', $this->dataView);
    }

    public function following($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['countCampaign'] = $this->campaignRepository->countCampaign($id);

        return view('user.following', $this->dataView);
    }

    public function listUserEvent($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }

        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['listEvent'] = $this->eventRepository->listEventOfUser($id);
        $this->dataView['userList'] = $this->userRepository->getListUser($id)->take(config('constants.ALL_USER_LIMIT'));

        return view('user.event', $this->dataView);
    }

    public function listUserBlog($id)
    {
        try {
            $this->dataView['user'] = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
        $this->dataView['averageRankingUser'] = $this->ratingRepository->averageRatingUser($this->dataView['user']->id);
        $this->dataView['listBlog'] = $this->blogRepository->listBlogOfUser($id);
        $this->dataView['userList'] = $this->userRepository->getListUser($id)->take(config('constants.ALL_USER_LIMIT'));

        return view('user.blog', $this->dataView);
    }
}
