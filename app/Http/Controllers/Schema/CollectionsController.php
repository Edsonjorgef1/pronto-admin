<?php

namespace App\Http\Controllers\Schema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CollectionsController extends Controller
{
    public function index()
    {
        return Inertia::render('Schema/Collections/Index');
    }
}
