<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * View Home Page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('index');
    }
}