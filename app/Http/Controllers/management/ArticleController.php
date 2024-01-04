<?php

namespace App\Http\Controllers\management;

use App\Models\management\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\management\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::orderBy("created_at","desc")->paginate(10);
        return view("management.article.index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::orderBy("created_at","desc")->get();
        return view("management.article.create",get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:2',
        ]);
        $result=Article::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'user_id'=> auth()->user()->id,
        ]);
        $message="ویرایش با شکست مواجه شد";
        if ($result) {
            $message="ذخیره با موفقیت انجام شد";
            $slugable=$result->replicate();
        }
        return redirect()->back()->with(['result'=>$result,'message'=>$message]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
