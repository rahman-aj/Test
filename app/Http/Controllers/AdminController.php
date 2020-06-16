<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Comment;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $users = User::all();
        
        return $users;
    }

    public function indexArticle()
    {
        $articles = Article::all();

        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeArticle(Request $request)
    {
        $article = new Article ([
        'title' =>  $request->get('title'),
        'description' =>  $request->get('description'),
        'author_id' => $request->get('author_id'),

        ]);
        
        $article->save();

        return redirect('/articles')->with('success', 'Article saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
        $article = Article::find($id);

        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title =  $request->get('title');
        $article->description =  $request->get('description');
        $article->author_id = $request->get('author_id');

        $article->save();

        return redirect('/articles')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyArticle($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('success', 'Article deleted!');
    }

    public function destroyComment($id, $article_id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect("/articles/{'$article_id'}")->with('success', 'Article deleted!');
    }

    public function statistics() 
    {
        $statistics['articles_count'] = Article::all()->count();
        $statistics['comments_count'] = Comment::all()->count();
        $statistics['users_count'] = User::all()->count();
        $statistics['users_comment_count'] = 
    }

    public function addComment($id, $body)
    {
        $article = Article::find($id);

        
    }
}
