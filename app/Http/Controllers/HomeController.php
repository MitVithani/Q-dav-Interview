<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact_Us;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contactDtls = Contact_Us::get();
        return view('admin.contact_us.index')->with('contactDtls', $contactDtls);
    }
}
