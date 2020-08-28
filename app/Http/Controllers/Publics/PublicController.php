<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function showHome()
    {
        return view('public.home.homePublic');
    }

    public function showAbout()
    {
        return view('public.about.aboutPublic');
    }

    public function showContact()
    {
        return view('public.contact.contactPublic');
    }

    public function showBlog()
    {
        return view('public.blog.blogPublic');
    }
    public function showLogin()
    {
        return view('public.login.loginPublic');
    }
}
