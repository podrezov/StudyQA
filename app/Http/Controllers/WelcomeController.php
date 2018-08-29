<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateText;
use App\Page;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $text = Page::where('page_title', 'main_page')->first();
        return view('welcome', [
            'page' => $text
        ]);
    }

    public function create()
    {
        $text = new Page();
        $text->mainTextCreate();

        return back();
    }

    public function edit(Page $page)
    {
        return view('text.edit', [
            'text' => $page
            ]);
    }

    public function update(Page $page, UpdateText $request)
    {
        $page->update([
           'content' => $request->input('text')
        ]);

        return redirect()->route('welcome');
    }
}
