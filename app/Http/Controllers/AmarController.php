<?php

namespace App\Http\Controllers;

use App\Exports\AmarExport;
use App\Models\Detail_folder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AmarController extends Controller
{

    public function namayesh()
    {
        $Amars =Detail_folder::where('folder_name', 'like', "%" . 'ق'. "%")->where('code_water', 'like', "%" . '11'. "%")->take(5)->get();
        return view('namayesh',compact('Amars'));
    }


    public function getAmar()
    {
return Excel::download(new AmarExport,'reports.xlsx');

   }
}
