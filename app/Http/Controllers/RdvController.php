<?php

namespace App\Http\Controllers;

use App\Models\Avance;
use App\Models\Rdv;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RdvController extends Controller
{
    public function index()
    {
        $rdv=Rdv::orderBy('created_at','DESC')->get();
        $avances=Avance::get();
        $service=Service::get();

        $totalclient = Rdv::count('nom');
        $totalservice = Service::count();
        $totalpaye = Avance::sum('avc');
        $newclient = Rdv::whereDate('created_at', Carbon::today())->count();

        return View::make('rdvs.index')->with('rdv',$rdv)->with('avances',$avances)->with('service',$service)

        ->with('totalclient',$totalclient)
        ->with('totalservice',$totalservice)
        ->with('totalpaye',$totalpaye)
        ->with('newclient',$newclient);
    }

    public function create()
    {
        $service=Service::all();
        return View::make('rdvs.create')->with('service',$service);
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
        $service=Service::all();

        return View::make('rdvs.edit')->with('data',$data)->with('service',$service);
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
        $service=Service::get();

        $totalclient = Rdv::count('nom');
        $totalservice = Service::count();
        $totalpaye = Avance::sum('avc');
        $newclient = Rdv::whereDate('created_at', Carbon::today())->count();
        $search_text = $_GET['query'];
        $rdv = Rdv::where('nom','LIKE','%'.$search_text.'%')->get();

        return View::make('rdvs.index')->with('rdv',$rdv)->with('avances',$avances)->with('service',$service)

        ->with('totalclient',$totalclient)
        ->with('totalservice',$totalservice)
        ->with('totalpaye',$totalpaye)
        ->with('newclient',$newclient);
    }
}
