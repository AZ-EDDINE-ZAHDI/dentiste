<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{

    public function create()
    {
        $data=Service::all();
        return View::make('services.create')->with('data',$data);
    }

    public function store(Request $request)
    {
        $service=new Service();
           $service->nom =$request->input('nom');
        
           $service->save();
        return redirect('/services/create');
    }

    public function edit($id){
        $data = Service::findOrFail($id);
        
        return View::make('services.edit')->with('data',$data);
    }

    public function update(Request $request)
    {
        $service= Service::findOrFail($request->id);
        $service->nom =$request->input('nom');
        $service->save();

        return redirect('/services/create');
    }

    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
