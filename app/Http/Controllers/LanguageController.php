<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // public function change(Request $request)
    // {
    //     $lang = $request->lang;

    //     if (!in_array($lang, ['en', 'sw'])) {
    //         abort(400);
    //     }

    //     Session::put('locale', $lang);
    //     return redirect()->back();
    // }


    public function change($lang)
    {
        if (!in_array($lang, ['en', 'sw'])) {
            abort(400); // Invalid language
        }

        // Store the locale in the session
        session()->put('locale', $lang);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
