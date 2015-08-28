<?php

namespace App\Http\Controllers;


use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;
use App\Task;
use App\Overbooking;
use Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        // controllo campo overbooking -- inserimento predisposto per user Ortopedia

        $value=array('class' => 'form-control','required');

        if(!Auth::user()->admin)
        {
            $value=array('class' => 'form-control', 'readonly');
        }





        // Campo ricerca --- recupera prenotazioni per Cognome
        if ((isset($_GET['search']) && $_GET['search']!='')) {

            $query = Input::get('search');

            $tasks = Task::where('cognome', 'LIKE', $query.'%' )
                ->orderBy('cognome', 'asc')
                ->get();

            $overbooking = Overbooking::where('cognome', 'LIKE', $query.'%' )->get();

            // controllo esistenza record cercato
            if ($tasks->count() > 0) {

                 $string='<h3> Risultato della ricerca: ' . $query . ' </h3><hr>';
                return view('tasks.search', compact('tasks', 'query', 'overbooking', 'none','string'));
            } else {

                   $none= '<h3> Nessun Risultato Trovato per: ' . $query . ' </h3><hr>';
                return view('tasks.search', compact('tasks', 'query', 'overbooking', 'none','string'));

            }


        }

        //conta righe table
        $counter = 1;


        //variabile OGGI index
        $day = Carbon::now('Europe/Rome')->format('d/m/Y');

        //Query OGGI -- Formattazione per inserimento data nel DB
        $today1=Carbon::now('Europe/Rome')->format('Y-m-d');


        //query prenotazioni odierne
        $tasks = Task::where('data', '=', $today1 )
            ->orderBy('cognome','asc')
            ->get();

        //query prenotazioni di overbooking odierne
        $overbooking = Overbooking::where('data', '=', $today1 )->get();




        // DATEPICKER --- recupera prenotazioni dal calendario
        if((isset($_GET['data']))&& $_GET['data']!=''){
            $query = Input::get('data');
            $data = date_format(date_create_from_format('d/m/Y',$query), 'Y-m-d');


            $tasks = Task::where('data', 'LIKE', '%'.$data.'%' )
                ->get();
            $overbooking = Overbooking::where('data', 'LIKE', '%'.$data.'%' )
                ->get();

            $day=Input::get('data');


            return view('tasks.index', compact('tasks', 'today','day', 'yesterday', 'tomorrow', 'counter', 'overbooking','value'));

        }




        // view predefinita - INDEX
        return view('tasks.index', compact('tasks', 'day', 'yesterday', 'tomorrow','counter','today', 'overbooking', 'value'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $tasks = Task::all();
        return view('tasks.create')->withTasks($tasks);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'nome' => 'required',
            'cognome' => 'required',

        ]);


        $input = $request->all();

        // condizioni creazione nuova prenotazione

        if(isset($_POST['prenotazioni'])){
            $task=Task::create($input);

            return view('tasks.show')->withTask($task);

        }

        // condizioni creazione nuova prenotazione di overbooking
            if (isset($_POST['overbooking']) ) {

               Overbooking::create($input);

                return redirect()->route('tasks.index');

                } else {
                    echo 'Prenotazione non autorizzata';
                }

                // Session::flash('flash_message', 'Task successfully added!');

                // return redirect()->back();




        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    public function show($id)
    {

        if (isset($_GET['print'])) {

            $task = Task::findOrFail($id);

            return view('tasks.htmltopdf', compact('tasks', 'day','counter', 'overbooking'));
        }

            $task = Task::findOrFail($id);

            return view('tasks.show')->withTask($task);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    // condizioni di modifica prenotazione di overbooking
        if(isset($_GET['overedit']))
        {
            $over = Overbooking::findOrFail($id);
            return view('tasks.edit')->withOver($over);

        }else{

            // condizioni di modifica prenotazione
            $task = Task::findOrFail($id);
            return view('tasks.edit')->withTask($task);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */


    public function update($id, Request $request)
    {

        // condizioni di aggiornamento prenotazione di overbooking

        if(isset($_POST['overupdate']))
        {
            $over = Overbooking::findOrFail($id);

            $input = $request->all();

            $over->fill($input)->save();

            //  Session::flash('flash_message', 'Task successfully added!');
            // return redirect()->back();

            return redirect()->route('tasks.index');
        }else{

            // condizioni di aggiornamento prenotazione

            $task = Task::findOrFail($id);

            $input = $request->all();

            $task->fill($input)->save();

            //  Session::flash('flash_message', 'Task successfully added!');
            // return redirect()->back();

            return view('tasks.show')->withTask($task);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */



    public function destroy($id)
    {
        // condizioni di eliminazione prenotazione



            $task = Task::findOrFail($id);
            $task->delete();




            return redirect()->route('tasks.index');


    }


}
/*
$task = Task::findOrFail($id);
$d=$task->data;
$taskd=Task::where('data', 'LIKE', $d )
    ->get();



return view('tasks.index',compact($task,$d));
*/