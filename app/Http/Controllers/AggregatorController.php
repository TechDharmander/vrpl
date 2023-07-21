<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AggregatorController extends Controller
{
    public function index()
    {
    	return view('aggregator.dashboard');
    }
}
