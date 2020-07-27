<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Favorite
 * @package App
 */
class Favorite extends Model {

    use RecordsActivity;

    /**
     * @var array
     */
    protected $guarded = [];

    public function favorited() {
        return $this->morphTo();
    }
}
