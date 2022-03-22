<?php

namespace App\Http\Controllers;

use App\Models\Avance;
use App\Models\Rdv;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RdvController extends Controller
{
    public function index()
    {
        $rdv=Rdv::orderBy('created_at','DESC')->get();
        $avances=Avance::get();

        $totalclient = Rdv::count('nom');
        $totalpaye = Avance::sum('avc');
        $newclient = Rdv::whereDate('created_at', Carbon::today())->count();

        return View::make('rdvs.index')->with('rdv',$rdv)->with('avances',$avances)

        ->with('totalclient',$totalclient)
        ->with('totalpaye',$totalpaye)
        ->with('newclient',$newclient);
    }


    public function store(Request $request)
    {
        $rdv=new Rdv();
           $rdv->nom =$request->input('nom');
           $rdv->numero =$request->input('numero');
           $rdv->service =$request->input('service');
           $rdv->prix =$request->input('prix');
           $rdv->avance =$request->input('avance');
        
           $rdv->save();
        return redirect('/rdvs');
    }

    public function ajv(Request $request)
    {
        $avc=new Avance();
           $avc->num =$request->input('num');
           $avc->avc =$request->input('avc');
        
           $avc->save();
        return redirect('/rdvs');
    }

    public function edit($id){
        $data = Rdv::findOrFail($id);

        return View::make('rdvs.edit')->with('data',$data);
    }

    public function update(Request $request)
    {
        $rdv= Rdv::findOrFail($request->id);
        $rdv->nom =$request->input('nom');
        $rdv->numero =$request->input('numero');
        $rdv->service =$request->input('service');
        $rdv->prix =$request->input('prix');
        $rdv->avance =$request->input('avance');        
        $rdv->save();

        return redirect('/rdvs');
    }

    public function destroy($id)
    {
        $data = Rdv::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function search()
    {
        $avances=Avance::get();

        $totalclient = Rdv::count('nom');
        $totalpaye = Avance::sum('avc');
        $newclient = Rdv::whereDate('created_at', Carbon::today())->count();
        $search_text = $_GET['query'];
        $rdv = Rdv::where('nom','LIKE','%'.$search_text.'%')->get();

        return View::make('rdvs.index')->with('rdv',$rdv)->with('avances',$avances)

        ->with('totalclient',$totalclient)
        ->with('totalpaye',$totalpaye)
        ->with('newclient',$newclient);
    }
}
