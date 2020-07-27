<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App
 */
class Channel extends Model {
    /**
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

    public function threads() {
        return $this->hasMany(Thread::class);
    }

}
