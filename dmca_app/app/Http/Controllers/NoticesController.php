<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Http\Templates;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class NoticesController extends Controller
{

    /**
     * Create a new notices controller instance.
     *
     */

    public function __construct()
    {

        $this->middleware('auth');

    }


    /*
     * Show all notices.
     *
     * @return string
     */

    public function index()
    {

        return 'all notices';

    }

    /**
     * Show a page to create a new notice.
     *
     * @return \Response
     *
     *
     */


    public function create()
    {

        // get list of providers

        $providers = Provider::lists('name', 'id');

        // load a view to create a new notice

        return view ('notices.create', compact('providers'));

    }

    /**
     *
     * Ask the user to confirm the DMCA that Will be delivered.
     *
     * @param Requests\PrepareNoticeRequest $request
     * @param Guard                 $auth
     * @return \Response
     *
     */

    public function confirm(Requests\PrepareNoticeRequest $request, Guard $auth )
    {
        $template=$this->compileDmcaTemplate($data=$request->all(), $auth);

       session()->flash('dmca', $data);

        return view('notices.confirm', compact('template'));
    }


    public function store(Request $request)
    {

      $data = session()->get('dmca');

      $notice=Notice::open($data)->useTemplate($request)->input('template');

       // return Auth::user()->notices();



    }


    /**
     *
     *
     * Compile DMCA Template from the form data.
     *
     * @param $data
     * @param Guard $auth
     *
     * @return  mixed
     *
     *
     *
     */

    public function compileDmcaTemplate($data, Guard $auth)
    {

        $data=$data+[

                'name'=> $auth->user()->name,
                'email'=> $auth->user()->email,

            ];

        return view()->file(app_path('Http/Templates/dmca.blade.php'), $data);
    }

}
