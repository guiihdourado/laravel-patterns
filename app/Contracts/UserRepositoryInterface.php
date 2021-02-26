<?php
namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    /**
     * Returns a given
     *
     * @param string $email
     * @return Model
     */
   public function findByEmail($email): ?Model;
}
