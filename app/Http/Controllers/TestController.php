<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;
use App\PostInformation;
use App\Http\Requests\PostValidator;

class TestController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }
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
    // public function guest(){
    //     $message = 'Ciao User, purtroppo non sei autentificato, non vedrai i contenuti del sito';
    //     return view('test',compact('message'));
    //     // Rotta /free-zone/hello
    //     // Stampare 'Ciao Utente'
    // }

    // public function logged(){
    //     $user = Auth::user();
    //     $message = 'Ciao '.$user->name;
    //     return view('test', compact('message'));
    //     //  Rotta: /restricted-zone/hello
    //     // Stampare 'Ciao @NomeUtente'
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('create', compact(['categories', 'tags', 'user']));
          } else {
            return redirect()->route('post.index');
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidator $request)
    {
        $validated = $request->validated();

        // dd($validated);

        $newpost = Post::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'category_id' => $validated['categories'],
        ]);

        $newPostInformation = PostInformation::create([
            'post_id' => $newpost->id,
            'description' => $validated['description'],
            'slug' => 'I am a Slug!'
        ]);


        $newpost->tags()->attach($validated['tags']);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('watch_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::check()) {
            return view("update",compact("post"));
        } else {
            return redirect()->back();
        }
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
        $post = Post::find($id);
        $data = $request->all();
        $post->update($data);

        $post->hasInfo->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->hasInfo->delete();

        foreach ($post->tags as $tag) {

            $post->tags()->detach($tag->id);
        }
        $post->delete();


        return redirect()->back();
    }
}
