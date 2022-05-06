<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;//フォルダ名はappだが、Appでは認識してくれない。
use App\Http\Requests\PostRequest;


/*
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
class PostController extends Controller
{
    public function index(Post $post)
    {
        return view("posts/index") -> with(["posts" => $post -> getPaginateByLimit()]);
    }
    public function show(Post $post)
    {
        return view("posts/show") -> with(["post" => $post]);
        //なぜこれだけでidを一意に識別できる？ 
        //web.phpの"/posts/{post}"の{post}が同一リソースなら識別してくれる？
    }
    public function create()
    {
    return view('posts/create');
    }
    public function store(PostRequest $request, Post $post)
    {
        $input = $request["post"];
        $post -> fill($input) -> save();
        return redirect("/posts/" . $post -> id);
        // 「.」は結合の意味がある？
    }
}

?>