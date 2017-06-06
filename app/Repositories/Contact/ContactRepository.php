<?php
namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\BaseRepository;
use App\Repositories\Contact\ContactRepositoryInterface;
use Illuminate\Container\Container;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    protected $container;

    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function model()
    {
        return Contact::class;
    }

    public function createContact($params = [])
    {
        if (empty($params)) {
            return false;
        }

        return $this->model->create([
            'fullname' => $params['fullname'],
            'email' => $params['email'],
            'subject' => $params['subject'],
            'message' => $params['message'],
        ]);
    }
}
