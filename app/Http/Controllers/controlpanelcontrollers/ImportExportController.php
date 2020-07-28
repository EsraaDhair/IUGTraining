<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Exports\TrainingExport;
use App\Http\Controllers\Controller;
use App\Imports\TrainingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importView()
    {
        return view('base_layout.training.import');
    }
    public function export($city)
    {
        return Excel::download(new TrainingExport($city), 'training.xlsx');
    }

    public function import()
    {
        Excel::import(new TrainingImport(),request()->file('file'));
        return back()->with('success','تم استيراد البيانات واضافتها بنجاح');
    }
}
