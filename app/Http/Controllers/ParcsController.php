<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Parc;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ParcsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcs = Parc::where('libelle', 'LIKE', '%'. request('term') . '%')->with('user')
        ->select('parcs.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM parcs
            ) AS participants'
        ))
        ->latest()->paginate(5);


        return Inertia::render('Parcs/index', [
            'parcs' => $parcs,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Parcs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'position' => 'required|string',
    ]);


    $parc = Parc::create($request->all());
    // $this->authorize('update', $parc);



    return Redirect::route('parcs.index')->with('success', 'Félicitation, les informations du parcs '. $parc->libelle . ' d\'où la position est à(au) '.  $parc->position .' ont bien été enrégistrées.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parc = Parc::where('id', $id)->with('user')->first();
        $monthname = date('d/m/y à g:i A', strtotime($parc->created_at));
        return Inertia::render('Parcs/show',[
            'parc' => $parc,
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
        $parc = Parc::where('id', $id)->first();

        return Inertia::render('Parcs/edit', [
            'parc' => $parc,
    ]);
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
        $parc = Parc::where('id', $request->id)->first();
        // $carte = Carte::where('id', $request->id)->first() ->with('cartes');

          $parc->update($request->all());



          return Redirect::route('parcs.index')->with('success', 'Félicitation, les informations du parcs '. $parc->libelle . ' d\'où la position est à '.  $parc->position .' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parc = Parc::where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $parc->delete();
        // $inventaire->parc()->delete();


          return Redirect::route('parcs.index')->with('success', 'Les informations du '. $parc->libelle . ' ont bien été supprimées.');
    }
}
