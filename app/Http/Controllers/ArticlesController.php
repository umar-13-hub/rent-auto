<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleForm;
use App\Http\Requests\UpdateArticleForm;
use App\Models\Articles;
use App\Models\Categories;
use http\Client\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::with('category')
            ->get();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'categories'=> Categories::all()
        ]);
    }

    public function store(CreateArticleForm $request)
    {
        Articles::create($request->all());
        return redirect()->back()->with('alert', 'Ваша новость добавлена.');
    }

    public function show(string $slug)
    {
        DB::table('articles')
            ->where('slug', $slug)
            ->increment('view_count', 1);

        $article = Articles::with('car', 'category')
            ->where('slug', $slug)
            ->first();
        return view('article.show', [
           'article' => $article
        ]);
    }

    public function update(int $id, Request $request)
    {
        $model = Articles::find($id);
        if (is_null($model)) {
            return redirect()->route('articles.index')->with('error', 'Такой новости не существует.');
        }
        return view('articles.update', [
           'article' => Articles::find($id)
        ]);
    }

    public function updateStore(int $id, UpdateArticleForm $request)
    {
        $model = Articles::where('id', $id)
            ->update(
                $request->all()
            );
        return redirect()->back();

    }
}
