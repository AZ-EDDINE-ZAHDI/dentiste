<?php

namespace App\Http\Controllers;

use App\Models\Avance;
use App\Models\Service;
use App\Models\Rdv;
use Illuminate\Support\Facades\View;

class AvanceController extends Controller
{
    public function destroy($id)
    {
        $data = Avance::findOrFail($id);
        $data->delete();

        return redirect('/rdvs');
    }
}
