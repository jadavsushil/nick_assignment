<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function subscribeAWebsite(Request $request)
    {
        $website = Website::find($request->website_id);
        $website->users()->attach($request->user_id);
        $users = User::with('websites')->where('id', $request->user_id)->first();
        return ApiResponse(true, 'All subscribed websites.', $users->websites);
    }
}
