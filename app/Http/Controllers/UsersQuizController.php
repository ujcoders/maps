<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersQuizController extends Controller
{
    /**
     * Display the active view.
     *
     * @return \Illuminate\View\View
     */
    public function activeView()
    {
        return view('active');
    }

    /**
     * Display the inactive view.
     *
     * @return \Illuminate\View\View
     */
    public function inactiveView()
    {
        return view('inactive');
    }

    /**
     * Display the complete view.
     *
     * @return \Illuminate\View\View
     */
    public function completeView()
    {
        return view('complete');
    }
}
