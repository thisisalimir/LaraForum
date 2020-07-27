<?php

namespace App\Http\Controllers;

use App\Reply;

/**
 * Class FavoritesController
 * @package App\Http\Controllers
 */
class FavoritesController extends Controller {
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Store a new favorite in the database.
     *
     * @param Reply $reply
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Reply $reply) {
        $reply->favorite();

        return back();
    }
}