<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\Contact;
use App\Model\Introduce;
use App\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class PublicController extends Controller
{
    /**
     * showHome
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHome()
    {
        $objIntroduce = new Introduce();
        $valueIntroduces = $objIntroduce->getIntroduct();
        return view('public.home.homePublic', compact('valueIntroduces'));
    }

    public function showIntroduce($id)
    {
        $objIntroduce = new Introduce();
        $valueIntroduce = $objIntroduce->getIntroItem($id);

        return view('public.home.introduce', compact('valueIntroduce'));
    }

    /**
     * showAbout
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAbout()
    {
        return view('public.about.aboutPublic');
    }

    /**
     * showContact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContact()
    {
        return view('public.contact.contactPublic');
    }

    public function postContact(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ];
        $messages = [
            'name.required' => 'name is a required field',
            'email.required' => 'email is a required field',
            'subject.required' => 'subject is a required field',
            'message.required' => 'message is a required field',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/public/contact')->withErrors($validator)->withInput();
        }

        $objContact = new Contact();
        $objContact->name = $request->input('name');
        $objContact->email = $request->input('email');
        $objContact->subject = $request->input('subject');
        $objContact->message = $request->input('message');

        $objContact->save();
        return redirect('/public');

    }

    /**
     * showBlog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBlog()
    {
        $objBlog = new Blog();
        $getDataBlogs = $objBlog->getBlog();
        return view('public.blog.blogPublic', compact('getDataBlogs'));
    }

    public function showBlogDetail($id)
    {
        $objBlog = new Blog();
        $getDataBlog = $objBlog->getBlogItem($id);
        $getDataBlogs = $objBlog->getBlog();
        return view('public.blog.blog-detail', compact('getDataBlog', 'getDataBlogs'));
    }

    /**
     * showLogin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showLogin()
    {
        return view('public.login.loginPublic');
    }

    /**
     * handlingLogin
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handlingLogin(Request $request)
    {
        // Check data login
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'username.required' => 'User is a required field',
            'password.required' => 'Pass is a required field',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/public/login')->withErrors($validator)->withInput();
        } else {
            $username = $request->input('username');
            $password = $request->input('password');
            $remember = $request->input('remember');

            $objUser = new Users();

            $checkLogin = $objUser->checkLogin($username, $password);

            if ($checkLogin) {
                /*Dùng code php để code tính năng nhớ mật khẩu */
                if ($remember == true) {
                    setcookie('user', $username, time() + 3600, '/', '', 0, 0);
                    setcookie('pass', $password, time() + 3600, '/', '', 0, 0);
                }
                $valueIDCustomer =  $objUser->getDataUser($username)->IDCustomer;
                session()->put('IDCustomer', $valueIDCustomer);
                return redirect('private/infoAccount');

            } else {
                $active =  $objUser->getDataUser($username)->deleted;
                if ($active == 1) {
                    Session::flash('error', 'Your account has been locked');
                } else {
                    Session::flash('error', 'If you enter incorrectly 3 times, your account will be blocked');
                }
                return redirect('public/login');
            }
        }
    }
}
