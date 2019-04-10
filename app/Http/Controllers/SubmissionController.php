<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $rules = array_map(function ($item) {
            return  'required|string|size:' . Submission::Questions[$item - 1]['chars'];
        }, range(1, 15));

        $request->validate($rules);

        Submission::newFromRequest($request->except(['_token']));

        return back()->with('message', 'congratulations, you have successfuly entered your submission for the challenge');
    }
}
