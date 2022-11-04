<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();

        return view('home', compact('newsletters'));
    }
}
