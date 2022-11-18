<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeService;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.services');
    }



    public function serviceByType(string $id)
    {
        $services = Service::where('type_service_id', $id)->get();
        $typeService = TypeService::where('id',$id)->pluck('label')[0];
        // dd($typeService);

        return view('services.typeservice', [
            'typeService' => $typeService,
            'services' => $services
        ]);
    }
}
