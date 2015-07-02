<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{


    public function getIndex()
    {
        // qui c'è la dashboard

    }

    public function getLogin()
    {
        // qui c'è la pagina di login

        return view('backend.login');

    }

    public function postLogin(Request $request)

    {
        // qui c'è la procedura di controllo dei dati in fase di login

        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        ))

            return redirect('backend');

        else return redirect('backend/login');


    }

    public function getLogout()

    {
        // qui c'è la procedura di logout dell'utente
    }








}
