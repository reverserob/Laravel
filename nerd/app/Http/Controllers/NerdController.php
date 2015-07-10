<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nerd;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the nerds
        $nerds = Nerd::all();

        // load the view and pass the nerds
        return view ('nerds.index')->with('nerds', $nerds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('nerds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        /*  $rules = array(
             'name'       => 'required',
             'email'      => 'required|email',
             'nerd_level' => 'required|numeric'
         );
            $validator = Validator::make(Input::all(), $rules);

             // process the login
             if ($validator->fails()) {
                 return Redirect::to('nerds/create')
                     ->withErrors($validator)
                     ->withInput(Input::except('password'));
             } else {
                 // store
                 $nerd = new Nerd;
                 $nerd->name = Input::get('name');
                 $nerd->email = Input::get('email');
                 $nerd->nerd_level = Input::get('nerd_level');
                 $nerd->save();

                 // redirect
               //  Session::flash('message', 'Successfully created nerd!');
               //  return Redirect::to('nerds');

             }
        */

        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'nerd_level' => 'required'
        ]);

        $input = $request->all();

        Nerd::create($input);

        return redirect()->route('nerds.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      /*  // get the nerd
        $nerd = Nerd::find($id);

        // show the view and pass the nerd to it
        return View::make('nerds.show')
            ->with('nerd', $nerd);
*/
        $nerd = Nerd::findOrFail($id);

        return view('nerds.show')->withNerd($nerd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $nerd = Nerd::findOrFail($id);

        return view('nerds.edit')->withNerd($nerd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id, Request $request)
    {
        $nerd = Nerd::findOrFail($id);

        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'nerd_level' => 'required'
        ]);

        $input = $request->all();

        $nerd->fill($input)->save();



        return redirect()->route('nerds.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $nerd = Nerd::findOrFail($id);

        $nerd->delete();

        // Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('nerds.index');
    }
}
