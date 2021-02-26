<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Repositories\BaseRepository;
use App\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Returns a given
     *
     * @param string $email
     * @return Model
     */
    public function findByEmail($email): ?Model
    {
        return $this->model->where('email', $email)->first();
    }
}
