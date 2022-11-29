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
        $services = Service::all();
        $services = $services->groupBy('type_service_id');
        $array = (array) [];
        foreach ($services as $typeService => $items) {
            $typeserviceName = TypeService::where('id', $typeService)->pluck('label')[0];
            $array += [$typeserviceName => $items];
        }
        ksort($array);
        return view('services.serviceslist', [
            'services' => $array
        ]);
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

    public function newServiceView()
    {
        $typeservices = TypeService::all();
        return view('services.addservice', [
            'typeservices' => $typeservices
        ]);
    }

    public function editServiceView(string $id)
    {
        $typeservice = TypeService::all();
        $service = Service::where('id', $id)->first();
        return view('services.editservice', [
            'service' => $service,
            'typeservices' => $typeservice
        ]);
    }

    public function newService(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'advantages' => 'required|string',
            'terms' => 'required|string',
            'type_service_id' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

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

    public function editService(string $id, Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'advantages' => 'required|string',
            'terms' => 'required|string',
            'image' => 'mimes:png,jpg,jpeg',
            'type_service_id' => 'required|string'
        ]);
        $checkForService = Service::where('id', $id)->exists();
        if (!$checkForService) {
            return back()->with('error', 'Impossible to find this service');
        }


        if ($request->image) {
            try {
                $file = $request->file('image');
                $filename = now() . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);
                $service = Service::where('id', $id)->first();
                $service->label = $request->label;
                $service->description = $request->description;
                $service->advantages = $request->advantages;
                $service->terms = $request->terms;
                $service->type_service_id = $request->type_service_id;
                $service->image = $filename;
                $service->updated_at = date('Y-m-d H:i:s');
                $service->save();
                return redirect()->route('services')->with('success', 'Service updated successfully');
            } catch (\Throwable $th) {
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('services')->with('error', "$message");
            }
        } else {
            try {
                $service = Service::where('id', $id)->first();
                $service->label = $request->label;
                $service->description = $request->description;
                $service->advantages = $request->advantages;
                $service->terms = $request->terms;
                $service->type_service_id = $request->type_service_id;
                $service->updated_at = date('Y-m-d H:i:s');
                $service->save();
                return redirect()->route('services')->with('success', 'Service updated successfully');
            } catch (\Throwable $th) {
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('services')->with('error', "$message");
            }
        }
    }

    public function deleteService(string $id)
    {
        $checkService = Service::where('id', $id)->exists();
        if (!$checkService) {
            return back()->with('error', 'Impossible to find this service');
        }
        $service = Service::where('id', $id)->first();
        try {
            $service->delete();
            return redirect()->back()->with('success', 'Service deleted successfully');
        } catch (\Throwable $th) {
            $message = "An error occurs ! Please contact the administrator";
            return redirect()->route('services')->with('error', "$message");
        }
    }
}
