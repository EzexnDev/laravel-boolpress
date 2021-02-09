<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;
use App\PostInformation;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post', compact('posts'));
    }
    public function guest(){

        $message = 'Ciao User, purtroppo non sei autentificato, non vedrai i contenuti del sito';
        return view('test',compact('message'));
        // Rotta /free-zone/hello
        // Stampare 'Ciao Utente'
    }

    public function logged(){
        $user = Auth::user();
        $message = 'Ciao '.$user->name;
        return view('test', compact('message'));
        //  Rotta: /restricted-zone/hello
        // Stampare 'Ciao @NomeUtente'
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view("create", compact("tags", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'author' => 'required|string|min:3',
        ]);

        $newPost = Post::create([
            "title" => $validated["title"],
            "author" => $validated["author"],
            "category_id" => $data["categories"]
        ]);


        $newPost->save();

        $postInfo = PostInformation::create([
            "post_id" => $newPost->id,
            "description" => $data["description"],
            "slug" => "prova_slug"
        ]);

        $postInfo->save();

        foreach ($data["tags"] as $tag) {
            $newPost->tags()->attach($tag);
        }


        return redirect()->route('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
