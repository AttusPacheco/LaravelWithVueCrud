<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return User::select(['id', 'name', 'email', 'created_at'])
        ->when($request->get('name'), function ($q) use ($request) {
            return $q->where('name', 'like', "%{$request->get('name')}%");
        })->paginate(9);
    }

    /**
     * @param Request $request
     * @return User|null
     */
    public function store(Request $request): User|null
    {
        return User::create($request->all());
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): User|null
    {
        try {
            return User::find($id);
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return bool|null
     */
    public function update(int $id, Request $request): ?bool
    {
        return $this->find($id)?->update($request->all());
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        return $this->find($id)?->delete();
    }
}
