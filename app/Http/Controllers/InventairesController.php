<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Parc;
use App\Models\User;
use App\Models\Inventaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InventairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function accueil()
    {
        $homes = DB::table('inventaires')->count();
        $inventaires = DB::table('inventaires')->count();
        $caisses = DB::table('inventaires')->where('status','1')->sum('prix');
        $nonsoldes = DB::table('inventaires')->where('status','0')->sum('prix');
        $users = DB::table('users')->count();

            return Inertia::render('Inventaires/accueil', [
                'homes' => $homes,
                'inventaires' => $inventaires,
                'users' => $users,
                'caisses' => $caisses,
                'nonsoldes' => $nonsoldes,
        ]);
    }

    public function cars()
    {
        $cars = Inventaire::where('immatricule', 'LIKE', '%'. request('term') . '%')->with('user')->with('parc')
        ->select('inventaires.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM inventaires
            ) AS participants'
        ))
        ->latest()->paginate(10);


        return Inertia::render('Inventaires/cars', [
            'cars' => $cars,
        ]);
    }

    public function identite()
    {
        $proprietaires = Inventaire::where('nomusager', 'LIKE', '%'. request('term') . '%')->with('user')
        ->select('inventaires.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
                FROM inventaires
            ) AS participants'
        ))
        ->latest()->paginate(10);

        return Inertia::render('Inventaires/identite', [
            'proprietaires' => $proprietaires,
        ]);
    }

    public function user()
    {
        $users = User::where('name', 'LIKE', '%'. request('term') . '%')
        ->latest()->paginate(5);

        return Inertia::render('Inventaires/user', [
            'users' => $users,
        ]);
    }

    public function historique()
    {
          // ->with('cartes') ->with('cartes')
          $historiques = Inventaire::where('status','1')->where('immatricule', 'LIKE', '%'. request('term') . '%')->with('user')
          ->select('inventaires.*', DB::raw(
              '(SELECT COUNT(DISTINCT(user_id))
                  FROM inventaires
              ) AS participants'
          ))
          ->latest()->paginate(5);


          return Inertia::render('Inventaires/historique', [
              'historiques' => $historiques,

          ]);
    }

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


          return Inertia::render('Inventaires/index', [
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
        $parcs = Parc::all();
        return Inertia::render('Inventaires/create', [
            'parcs' => $parcs,
            ]);
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
            'nomcoord' => ['required', 'string', 'max:255'],
            'nomusager' => ['required', 'string', 'max:255'],
            'contactusager' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'immatricule' => ['required', 'string', 'max:255'],
            // , 'unique:inventaires'
            'dateinv' => 'required|string',
            'lieuenlev' => 'required|string',
            'marque' => 'required|string',
            'panne' => 'required|string',
            'genre' => 'required|string',
            'prix' => 'required|string',
            'operation_id' => ['required', 'integer'],
            // 'avance' => 'required|string',
            'parc_id' => 'required|integer',
         'status' => 'required|integer',
            // 'statut_id' => ['required', 'integer'],
    ]);

    $inventaire = Inventaire::create($request->all());

    return Redirect::route('inventaires.index')->with('success', 'Félicitation, les informations ont bien été enrégistrées.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    // Request $request,
    {
        $inventaire = Inventaire::where('status','0')->where('id', $id)->with('user')->with('parc')->first();
        $monthname = date('d/m/y', strtotime($inventaire->dateinv));

        return Inertia::render('Inventaires/show',[
            'inventaire' => $inventaire,
            'monthname' => $monthname,
        ]);
    }

    public function montrer($id)
    // Request $request,
    {
        $historique = Inventaire::where('status','1')->where('id', $id)->with('user')->with('parc')->first();
        $monthname = date('d/m/y', strtotime($historique->dateinv));

        return Inertia::render('Inventaires/montrer',[
            'historique' => $historique,
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
        $parcs = Parc::all();
        $inventaire = Inventaire::where('status','0')->where('id', $id)->with('parc')->first();

        return Inertia::render('Inventaires/edit', [
            'inventaire' => $inventaire,
            'parcs' => $parcs,
    ]);
    }


    public function modifier($id)
    {
        $parcs = Parc::all();
        $historique = Inventaire::where('status','1')->where('id', $id)->with('parc')->first();

        return Inertia::render('Inventaires/modifier', [
            'historique' => $historique,
            'parcs' => $parcs,
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
        $inventaire = Inventaire::where('status','0')->where('id', $request->id)->first();
        // $carte = Carte::where('id', $request->id)->first() ->with('cartes');

          $inventaire->update($request->all());

          return Redirect::route('inventaires.index')->with('success', 'Félicitation, les informations ont bien été modifiées.');
    }

    public function ajour(Request $request, $id)
    {
        $historique = Inventaire::where('status','1')->where('id', $request->id)->first();
        // $carte = Carte::where('id', $request->id)->first() ->with('cartes');

          $historique->update($request->all());

          return Redirect::route('inventaires.historique')->with('success', 'Il est signalé que le client ' . $historique->nomusager . ' n\'avait pas soldé .');
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
        $inventaire = Inventaire::where('status','0')->where('id', $id)->first();
        // $carte = Carte::where('id', $id)->first() ->with('cartes')-;

        $inventaire->delete();
        // $inventaire->parc()->delete();


          return Redirect::route('inventaires.index')->with('success', 'Les informations de l\'usager '. $inventaire->nomusager . ' ont bien été supprimées.');
    }
}
