<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
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
        return view('public.home.homePublic');
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

    /**
     * showBlog
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBlog()
    {
        return view('public.blog.blogPublic');
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

            $getData = new Users();

            if ($checkLogin) {
                /*Dùng code php để code tính năng nhớ mật khẩu */
                if ($remember == true) {
                    setcookie('user', $username, time() + 3600, '/', '', 0, 0);
                    setcookie('pass', $password, time() + 3600, '/', '', 0, 0);
                }

                $valueIDCustomer = $getData->getDataUser($username)->IDCustomer;
                session()->put('IDCustomer',$valueIDCustomer);
                return redirect('private/infoAccount');

            } else {

                $active = $getData->deleted;
                if ($active != 1) {
                    Session::flash('error', 'If you enter incorrectly 3 times, your account will be blocked');

                } else {
                    Session::flash('error', 'Your account has been locked');
                }
                return redirect('public/login');
            }
        }
    }
}
