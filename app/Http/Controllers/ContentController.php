<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    //page content add by person
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
    //post content add by single person
    public function personContentAdd(Request $request)
    {
        $content_writer_id = auth()->id();
        $post_content = $request->post_content;
        $content = Content::create([
            'content_writer_id'=>$content_writer_id,
            'post_content'=>$post_content
        ]);
        return response()->json([
            'message' => 'Content created by person',
            'content' => $content
        ], 201);
    }
}
