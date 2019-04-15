<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __invoke()
    {
        return response()->json(Area::all()->load('districts'));
    }
}
