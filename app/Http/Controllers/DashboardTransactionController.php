<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    function index(){


        return view('pages.dashboard-transactions');
    }}
