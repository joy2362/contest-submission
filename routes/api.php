<?php

use App\Models\ContestSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Joy2362\ContestSubmission\Http\Controllers\SubmissionController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/', SubmissionController::class . '@index');
