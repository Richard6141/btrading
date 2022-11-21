<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;

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
        $typeService = TypeService::where('id', $id)->pluck('label')[0];
        return view('services.typeservice', [
            'typeService' => $typeService,
            'services' => $services
        ]);
    }

    public function newTypeServiceView()
    {
        return view('services.addtypeservice');
    }

    public function newServiceView()
    {
        $typeservices = TypeService::all();
        return view('services.addservice', [
            'typeservices' => $typeservices
        ]);
    }

    public function newTypeService(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('image');
        $filename = now() . $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);

        try {
            $typeservice = new TypeService();
            $typeservice->label = $request->label;
            $typeservice->description = $request->description;
            $typeservice->image = $filename;
            $typeservice->save();
            return redirect()->back()->with('success', "Type Service created successfully");
        } catch (\Throwable $th) {
            $message = "An error occurs ! Please contact the administrator";
            return redirect()->route('customer.index')->with('error', "$message");
        }
    }

    public function newService(Request $request) {
        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'advantages' => 'required|string',
            'terms' => 'required|string',
            'type_service_id' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        // dd($request->all());

        $file = $request->file('image');
        $filename = now() . $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);

        try {
            $service = new Service();
            $service->label = $request->label;
            $service->description = $request->description;
            $service->advantages = $request->advantages;
            $service->terms = $request->terms;
            $service->type_service_id = $request->type_service_id;
            $service->image = $filename;
            $service->save();
            dd('succes');
        } catch (\Throwable $th) {
            $message = "An error occurs ! Please contact the administrator";
            return redirect()->route('customer.index')->with('error', "$message");
        }
    }
}
