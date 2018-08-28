<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateText;
use App\Text;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'text' => Text::all()->first() ? Text::all()->first() : ''
        ]);
    }

    public function create()
    {
        Text::create([
            'text' => 'text'
        ]);

        return back();
    }

    public function updateShow(Text $text)
    {
        return view('text.showUpdate', [
            'text' => $text
            ]);
    }

    public function update(Text $text, UpdateText $request)
    {
        $text->update([
           'text' => $request->input('text')
        ]);

        return redirect()->route('welcome');
    }
}
