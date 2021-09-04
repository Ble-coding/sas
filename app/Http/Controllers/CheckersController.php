<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Parc;
use App\Models\User;
use App\Models\Inventaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CheckersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // ->with('cartes') ->with('cartes')
          $inventaires = Inventaire::where('status','0')->where('immatricule', 'LIKE', '%'. request('term') . '%')->with('user')
          ->select('inventaires.*', DB::raw(
              '(SELECT COUNT(DISTINCT(user_id))
                  FROM inventaires
              ) AS participants'
          ))
          ->latest()->paginate(5);


          return Inertia::render('Checkers/index', [
              'inventaires' => $inventaires,

          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaire = Inventaire::where('status','0')->where('id', $id)->with('user')->with('parc')->first();
        $monthname = date('d/m/y', strtotime($inventaire->dateinv));
        return Inertia::render('Checkers/show',[
            'inventaire' => $inventaire,
            'monthname' => $monthname,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function terminer(Request $request, $id)
    {
        $inventaire = Inventaire::where('status','0')->where('id', $request->id)->first();
        // $carte = Carte::where('id', $request->id)->first() ->with('cartes');

          $inventaire->update($request->all());

          return Redirect::route('inventaires.historique')->with('success', 'Félicitation, cette transaction a bien été terminée car l`\'usager ' .  $inventaire->nomusager . ' a payé les frais.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
