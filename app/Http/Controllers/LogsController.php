<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Log;

class LogsController extends Controller
{
    public function index()
    {
        $rows = Log::get();
        return view('admin/logs/index', compact('rows'), ['page_title' => 'Logs']);
    }
}
