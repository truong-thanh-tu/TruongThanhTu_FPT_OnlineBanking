<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function showHome()
    {
        return view('public.page.homePublic');
    }

    public function showAbout()
    {
        return view('public.page.aboutPublic');
    }

    public function showContact()
    {
        return view('public.page.contactPublic');
    }

    public function showBlog()
    {
        return view('public.page.blogPublic');
    }
}
