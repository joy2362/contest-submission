<?php

namespace Joy2362\ContestSubmission\Http\Controllers;

use App\Models\Contest;
use Illuminate\Routing\Controller;

class SubmissionController extends Controller
{
    public function index()
    {
        $contest = Contest::orderBy('id','DESC')->get();

        return response()->json(
                 $contest,
            );
    }

    public function submission(Contest $contest){
        $submission = $contest->submission()->get();
        return response()->json([
            'submission' => $submission,
            'contest' => $contest,
        ]);
    }
}
