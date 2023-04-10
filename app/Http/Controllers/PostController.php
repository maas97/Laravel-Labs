<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    function index()
    {

        return view('post.index', [
            'postsArray' => Post::orderBy("created_at", "desc")->paginate(10)
        ]);
    }

    function create()
    {
        $usersArray = User::all();
        return view("post.create", [
            "usersArray" => $usersArray
        ]);
    }

    function store()
    {
        $post = new Post;
        $post->title = request()->input("title");
        $post->description = request()->input("description");

        $post->posted_by = request()->input("posted_by");

        $post->save();
        return redirect()->route("posts");
    }

    function show($id)
    {
        $post = Post::find($id);
        // dd($post);
        return view("post.show", [
            "post" => $post, "comments" => $post->comments
        ]);
    }

    function edit($id)
    {
        $post = Post::find($id);
        $usersArray = User::all();
        return view("post.edit", [
            "post" => $post,
            "usersArray" => $usersArray
        ]);
    }
    function update($id)
    {
        Post::find($id)
            ->update([
                "title" => request()->input("title"),
                "description" => request()->input("description"),
                // "posted_by" => request()->input("posted_by")
            ]);
        return redirect()->route("posts");
    }

    function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route("posts");
    }
}
