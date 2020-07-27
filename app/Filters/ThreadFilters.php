<?php

namespace App\Filters;

use App\User;

/**
 * Class ThreadFilters
 * @package App\Filters
 */
class ThreadFilters extends Filters {
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by', 'popular'];


    /**
     * @param $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function by($username) {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function popular() {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }
}