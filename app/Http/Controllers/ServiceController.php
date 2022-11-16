<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

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

        return view('pages.contact', [
            'services' => $services
        ]);
    }
}
