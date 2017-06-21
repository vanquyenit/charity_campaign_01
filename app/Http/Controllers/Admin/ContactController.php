<?php

namespace App\Http\Controllers\Admin;

use App\Filter\ContactsFilter;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository, Contact $contact)
    {
        $this->contactRepository = $contactRepository;
        $this->contact = $contact;
    }

    public function index(ContactsFilter $filters)
    {
        $contacts = $this->contact->filter($filters)->where('role', config('constants.ONE'))->orderBy('id', 'DESC')->paginate(config('constants.PAGINATE'));
        $input = $filters->input();
        $this->dataView['linkFilter'] = $contacts->appends($input)->links();
        $this->dataView['contacts'] = $contacts;

        return view('admin.contact.index', $this->dataView);
    }

    public function showSent(ContactsFilter $filters)
    {
        $contacts = $this->contact->filter($filters)->where('role', config('constants.RATING_USER'))->orderBy('id', 'DESC')->paginate(config('constants.PAGINATE'));
        $input = $filters->input();
        $this->dataView['linkFilter'] = $contacts->appends($input)->links();
        $this->dataView['contacts'] = $contacts;

        return view('admin.contact.index', $this->dataView);
    }

    public function show($id)
    {
        $contact = $this->contactRepository->find($id);

        if (config('constants.ZERO') == $contact->view) {
            $this->contactRepository->update(['review' => config('constants.ONE')], $id);
        }

        $this->dataView['contact'] = $contact;

        return view('admin.contact.review', $this->dataView);
    }

    public function store(Request $request)
    {
        $inputs = $request->only([
            'fullname',
            'email',
            'subject',
            'message',
            'role',
        ]);

        $contact = $this->contactRepository->create($inputs);

        if ($contact) {
            Mail::queue('admin.contact.send', [
                'contact' => $inputs,
            ], function ($message) use ($inputs) {
                $message->to($inputs['email'])->subject($inputs['subject']);
            });

            return redirect(action('Admin\ContactController@index'))
                ->with(['alert-success' => trans('contact.create-success')]);
        }

        return redirect(action('Admin\ContactController@index'))
            ->with(['alert-danger' => trans('contact.create-error')]);
    }

    public function delAll(Request $request)
    {
        if (!$this->contactRepository->deleteAll($request->only(['delAll']))) {
            return redirect(action('Admin\ContactController@index'))
                ->with(['alert-danger' => trans('contact.delete-error')]);
        }

        return redirect(action('Admin\ContactController@index'))
            ->with(['alert-success' => trans('contact.delete-success')]);
    }
}
