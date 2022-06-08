<?php

namespace Joy2362\ContestSubmission\Http\Controllers;

use App\Models\Contest;
use Illuminate\Routing\Controller;

class SubmissionController extends Controller
{
    public function index()
    {
        $contest = Contest::all();
        return response()->json([
                "data" => $contest
            ]);
    }
}
