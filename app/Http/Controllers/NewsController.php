<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::orderBy('id', 'desc')->paginate(3),
        ]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNews $request)
    {
        News::create([
            'title' => $request->input('title'),
            'short_content' => $request->input('short_content'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('news')->with('status', 'Новость успешно создана!');
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('news.edit', [
            'news' => $news,
        ]);
    }

    public function update(StoreNews $request, News $news)
    {
        $news->update([
            'title' => $request->input('title'),
            'short_content' => $request->input('short_content'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('news.show', $news);
    }

    public function delete(News $news)
    {
        $news->delete();

        return redirect()->route('news')->with('status', 'Новость успешно удалена!');
    }
}
