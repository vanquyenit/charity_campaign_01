<?php
namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\User;
use App\Repositories\Chat\ChatRepositoryInterface;
use App\Repositories\Participant\ParticipantRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Cmgmyr\Messenger\Models\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LRedis;

class MessagesController extends BaseController
{

    protected $userRepository;
    protected $participantRepository;
    protected $chatRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ChatRepositoryInterface $chatRepository,
        ParticipantRepositoryInterface $participantRepository
    ) {
        $this->userRepository = $userRepository;
        $this->chatRepository = $chatRepository;
        $this->participantRepository = $participantRepository;
    }

    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $this->dataView['listUser'] = $this->participantRepository->listUser();

        if ($this->dataView['listUser']) {
            return view('messenger.index', $this->dataView);
        }

        return abort(404);
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect(action('MessagesController@index'))
                ->with(['alert-danger' => trans('message.not_found')]);
        }

        $this->dataView['messages'] = $this->chatRepository->getMessage($id);

        if ($this->dataView['messages']) {
            return view('messenger.show', $this->dataView);
        }

        return abort(404);
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $inputs = $request->only([
                'thread_id',
                'user_id',
                'body',
            ]);

            if (!trim($inputs['body'])) {
                return response()->json([
                    'success' => false,
                ]);
            }

            $message = $this->chatRepository->create($inputs);
            $currentUser = auth()->user();

            if ($message) {
                $dataLayout = [
                    'body' => $inputs['body'],
                    'time' => $message->created_at->diffForHumans(),
                    'avatar' => $currentUser->avatar,
                    'name' => $currentUser->name,
                    'user_id' => auth()->id(),
                ];
                $messageSendHtml = view('messenger.message_send', $dataLayout)->render();
                $messageReceiveHtml = view('messenger.message_receive', $dataLayout)->render();
                $preview = view('messenger.preview', $dataLayout)->render();
                $redis = LRedis::connection();
                $redis->publish('chat', json_encode([
                    'success' => 'true',
                    'user_id' => $currentUser->id,
                    'html' => $messageReceiveHtml,
                    'chatId' => $request->chat_id,
                    'preview' => $preview,
                ]));

                return response()->json([
                    'success' => true,
                    'html' => $messageSendHtml,
                ]);
            }
        }

        return response()->json(['success' => false]);
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        //
    }
}
