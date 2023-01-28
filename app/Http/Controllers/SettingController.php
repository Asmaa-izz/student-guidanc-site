<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index', [
            'logo' => Setting::where('key', '=', 'logo')->first()->value,
            'title_page' => Setting::where('key', '=', 'title_page')->first()->value,
            'title_header' => Setting::where('key', '=', 'title_header')->first()->value,
            'title_main' => Setting::where('key', '=', 'title_main')->first()->value,
            'text_main' => Setting::where('key', '=', 'text_main')->first()->value,
            'img_home' => Setting::where('key', '=', 'img_home')->first()->value,
//            'color' => Setting::where('key', '=', 'color')->first()->value,
        ]);
    }

    public function store(Request $request)
    {
        $title_page = Setting::where('key', '=', 'title_page')->first();
        if($request->title_page !== $title_page->value) {
            $title_page->value = $request->title_page;
            $title_page->update();
        }


        $title_header= Setting::where('key', '=', 'title_header')->first();
        if($request->title_header !== $title_header->value) {
            $title_header->value = $request->title_header;
            $title_header->update();
        }

        $title_main = Setting::where('key', '=', 'title_main')->first();
        if($request->title_main !== $title_main->value) {
            $title_main->value = $request->title_main;
            $title_main->update();
        }

        $text_main = Setting::where('key', '=', 'text_main')->first();
        if($request->text_main !== $text_main->value) {
            $text_main->value = $request->text_main;
            $text_main->update();
        }



        if($request->has('logo')) {
            $logo = Setting::where('key', '=', 'logo')->first();
            if($request->logo !== $logo->value) {
                $imageName = time().'.'.$request->logo->extension();
                $request->logo->move(public_path('/'), $imageName);
                $logo->value = $imageName;
                $logo->update();
            }
        }


        if($request->has('img_home')) {
            $img_home = Setting::where('key', '=', 'img_home')->first();
            if ($request->img_home !== $img_home->value) {
                $imageName = time() . '.' . $request->img_home->extension();
                $request->img_home->move(public_path('/'), $imageName);
                $img_home->value = $imageName;
                $img_home->update();
            }
        }

        return redirect()->route('settings.index');
    }
}
