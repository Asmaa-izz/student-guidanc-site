<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'logo' => Setting::where('key', '=', 'logo')->first()->value,
            'title_page' => Setting::where('key', '=', 'title_page')->first()->value,
            'title_header' => Setting::where('key', '=', 'title_header')->first()->value,
            'title_main' => Setting::where('key', '=', 'title_main')->first()->value,
            'text_main' => Setting::where('key', '=', 'text_main')->first()->value,
            'img_home' => Setting::where('key', '=', 'img_home')->first()->value,
//            'color' => Setting::where('key', '=', 'color')->first()->value,
        ]);
    }
}
