<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_title',
        'content'
    ];

    public $timestamps = false;

    const MAIN_PAGE = 'main_page';

    public function mainTextCreate()
    {
        $this->create([
            'page_title' => self::MAIN_PAGE,
            'content' => self::MAIN_PAGE
        ]);
    }
}
