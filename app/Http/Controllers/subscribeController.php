<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\User;
use App\Models\Website;

class subscribeController extends Controller
{
    public function subscribeAWebsite(SubscriptionRequest $request)
    {
        $website = Website::find($request->website_id);

        if (!$website) {
            return ApiResponse(false, 'Website record not found!', [], 404);
        }
        if (!User::find($request->user_id)) {
            return ApiResponse(false, 'User record not found!', [], 404);
        }
        if($website->users()->where('id', $request->user_id)->exists()) {
            return ApiResponse(true, 'Already subscribed to this website.', $website);
        }
        $website->users()->attach($request->user_id);
        $users = User::with('websites')->where('id', $request->user_id)->first();
        return ApiResponse(true, 'All subscribed websites.', $users->websites);
    }
}
