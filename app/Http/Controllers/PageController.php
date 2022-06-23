<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $page_name = $request->page_name;
        $owner_id = auth()->id();
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
