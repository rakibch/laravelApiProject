<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{

    public function pageContentAdd(Request $request,$pageId)
    {
        $pageId = $pageId;
        $content_writer_id = auth()->id();
        $post_content = $request->post_content;
        $content = Content::create([
            'page_id' => $pageId,
            'content_writer_id'=>$content_writer_id,
            'post_content'=>$post_content
        ]);
        return response()->json([
            'message' => 'Page Content created',
            'content' => $content
        ], 201);
    }
}