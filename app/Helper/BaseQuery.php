<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait BaseQuery
{
    /**
     * get all record
     */
    public function add($model, $data)
    {
        return $model->create($data);
    }

    /**
     * get all record
     */
    public function get_all($model, $relation = null)
    {
        if ($relation == null) {
            return $model->all();
        } else {
            return $model->with($relation)->get();
        }
    }

    /**
     * get record by its id
     */
    public function get_by_id($model, $id, $relation = null)
    {
        if ($relation == null) {
            return $model->findOrFail($id);
        } else {
            return $model->with($relation)->first($id);
        }
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $column, $value, $relation = null)
    {
        if ($relation == null) {
            return $model->where($column, $value)->get();
        } else {
            return $model->with($relation)->where($column, $value)->get();
        }
    }

    /**
     * get all user with role
     */
    public function all_user_with_role($role, $relation = null)
    {
        if ($relation != null) {
            $users = User::with($relation)->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            })->get();
        } else {
            $users = User::whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            })->get();
        }

        return $users;
    }

    /**
     * get user by id with role
     */
    public function user_by_id_with_role($id, $status, $role, $relation = null)
    {
        if ($relation != null) {
            $user = User::with($relation)->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            })->where('profile_status', '>=', $status)->find($id);
        } else {
            $user = User::whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            })->where('profile_status', '>=', $status)->find($id);
        }

        return $user;
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }

    /**
     * delete record by its id
     */
    public function delete_user($id)
    {
        return User::findOrFail($id)->delete();
    }

    /**
     * Update user profile status
     */
    public function update_user_status($id, $status)
    {
        $user = User::findOrFail($id);

        if ($user != null) {
            $user->profile_status = $status;
            $user->update();
        }

        return true;
    }

    /**
     * add user
     */
    public function add_user($personal, $role)
    {
        $personal['password'] = Hash::make($personal['name']);
        $personal['profile_status'] = 1;
        $user = User::create($personal);
        $user->assignRole($role);

        return $user;
    }

    /**
     * Get monthly users
     */
    public function get_monthly_user($month)
    {
        $user = User::whereMonth('created_at', $month)->whereYear('created_at', date('Y'))->whereHas('roles', function ($q) {
            $q->where('name', '!=', 'admin');
        })->count();

        return $user;
    }
}
