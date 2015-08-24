<?php

namespace App\Http\Controllers;


use App\User;

use Illuminate\Http\Request;
use App\Overbooking;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Input;
use Illuminate\Support\Facades\Redirect;


class OverbookingController extends Controller
{


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {

        return view('tasks.reset');
    }


    public function destroy($id)
    {
        $overbooking = Overbooking::findOrFail($id);

        $overbooking->delete();

        // Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');
    }
}
