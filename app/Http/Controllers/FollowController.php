<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
class FollowController extends Controller
{
    //
    public function followPerson($personId, Request $request)
    {
        $followingPersonId = $personId;
        $personId = auth()->id();
        $followStatus = 1;

        $follow = Follow::create([
            'personId'=>$personId,
            'followingPersonId'=>$followingPersonId,
            'followStatus'=>$followStatus,
        ]);
        return response()->json([
            'message' => 'Person following started successfully',
            'followingStatus' => $follow
        ], 201);


    }

    public function followPage($pageId)
    {
        $pageId = $pageId;
        $personId = auth()->id();
        $followStatus = 1;

        $follow = Follow::create([
            'personId'=>$personId,
            'pageId'=>$pageId,
            'followStatus'=>$followStatus,
        ]);
        return response()->json([
            'message' => 'page following started successfully',
            'followingStatus' => $follow
        ], 201);

    }
}
