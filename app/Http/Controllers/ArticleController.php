<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articale;
use App\Category;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 3. The home view contains paginated newest articles with their categories.
        $articles  = Articale::with('Category')->paginate(15);
        return response()->json([
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.addArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'category_id' => ['required'],
            'content' => ['required'],
        ]);

        $article = new Articale;
        $article->name = $request->name;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::id();
        $article->save();
      
        return redirect('addArticle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articale::find($id);
        return view('articles.show', [
            'article' => $article
        ]);
        // return response()->json([
        //     'article' => $article
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Articale::find($id));
        return view('articles.editArticle',['article' => Articale::find($id)]);
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
        // $msg=null;
        $article = Articale::find($id);
        // dd($article);
        $article->name = $request->name;
        $article->category_id = $request->category_id;
        $article->content = $request->content;
        if ($article->user_id == Auth::id()) {
            $article->save();
            $msg = 'article updated successfully';
        } else {
            $msg = 'you are not allowd to edit this articale';
        }
        return response()->json([
            'msg' => $msg
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articale::find($id);
        if ($article->user_id == Auth::id()) {
            Articale::destroy($id);
            $msg = 'article deleted successfully';
        } else {
            $msg = 'you are not allowd to delete this articale';
        }

        return response()->json([
            'msg' => $msg
        ]);
    }
}
