<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;

class PageController extends Controller
{
    //page creation by a person
    public function create(Request $request)
    {
        $page_name = $request->page_name;
        $owner_id = auth()->id(); //get the id of logged in user as well as creator of page
        $page = Page::create([
            'page_name'=>$page_name,
            'owner_id'=>$owner_id,
        ]);
        return response()->json([
            'message' => 'Page successfully created',
            'page' => $page
        ], 201);
    }
}
