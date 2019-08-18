<?php

namespace App\Http\Controllers;


class AppController extends Controller
{
    /**
     * View Home Page.
     *
     * @return \Illuminate\View\View
     */
    public function app()
    {
        return view('app');
    }
}