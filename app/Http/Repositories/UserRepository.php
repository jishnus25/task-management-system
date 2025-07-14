<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getModel():Builder
    {
        return User::query();

    }

    public function getUserById(int $id)
    {
        return $this->getModel()->findOrFail($id);
    }

    public function getAllUsers():Collection
    {
        return $this->getModel()->get();
    }

    public function getUserCount():int
    {
        return $this->getModel()->count();
    }



}
