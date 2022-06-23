<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
class FollowController extends Controller
{
    //follow a single person by a person
    public function followPerson($personId, Request $request)
    {
        $followingPersonId = $personId;
        $personId = auth()->id(); //get id of logged in user
        $followStatus = 1; //here 1 = following; 0 = not following

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
    //follow a page by a single person
    public function followPage($pageId)
    {
        $pageId = $pageId;
        $personId = auth()->id(); //get id of logged in user
        $followStatus = 1; //here 1 = following; 0 = not following

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
