<?php

namespace App\Http\Controllers;

use App\Imports\PatientsImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PatientsController extends Controller
{
    public function importPatients(Request $request) :JsonResponse
    {

        $validator = Validator::make(
            $request->all(), [
                'patientFile' => 'required',
            ]
        );

        if ($validator->fails()) {
            return JsonResponse::create(['message' => $validator->getMessageBag()], 400);
        }

        $file = $request->file('patientFile');
        Excel::import(new PatientsImport, $file);
        return JsonResponse::create(['message' => 'file is being processed'], 200);
    }
}
