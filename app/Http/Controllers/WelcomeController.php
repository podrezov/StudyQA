<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateText;
use App\Page;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $page = Page::where('page_title', 'main_page')->first();
        
        return view('welcome', [
            'page' => $page,
        ]);
    }

    public function edit($pageType)
    {
        $page = Page::where('page_title', $pageType)->first();

        return view('text.edit', [
            'text' => $page,
            'pageType' => $pageType
        ]);
    }

    public function store($pageType, UpdateText $request)
    {
        $page = Page::where('page_title', $pageType)->first() ?? new Page();

        $page->page_title = $pageType;
        $page->content = $request->input('text');
        $page->save();

        return redirect()->route('welcome');
    }
}
