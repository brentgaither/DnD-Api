<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;
use Carbon;

/**
 * This controller manages the admin analytics pages.  These pages should not
 * be visible to anyone who does not have the admin role assigned.  The Controller
 * manages database quries that admins are interested in like, number of users,
 * number of subscribed athletes, etc.  To add additional analytics add the
 * query function in the proper repository and then call it here.
 */
class PassportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * This function loads the index page for analytics.  This page contains a
     * table of general user statistics admins might be interested in.
     */
    public function index()
    {
        return view('passport.index');
    }
}
