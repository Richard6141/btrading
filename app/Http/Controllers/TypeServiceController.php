<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{

    public function editTypeService(string $id)
    {
        $typeService = TypeService::where('id', $id)->first();
        return view('services.edittypeservice', [
            'typeService' => $typeService,
        ]);
    }

    public function editTypeServiceSubmission(Request $request, string $id)
    {
        $request->validate([
            'label' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        $checkForTypeservice = TypeService::where('id', $id)->exists();
        if (!$checkForTypeservice) {
            return back()->with('error', 'Impossible to perform this action');
        }
        if ($request->image) {
            // dd('true');
            $file = $request->file('image');
            $filename = now() . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            try {
                $typeService = TypeService::where('id', $id)->first();
                $typeService->label = $request->label;
                $typeService->description = $request->description;
                $typeService->image = $filename;
                $typeService->updated_at = date('Y-m-d H:i:s');
                $typeService->save();
                return redirect()->route('liste.typeservice')->with('success', 'Type service updated successfully');
            } catch (\Throwable $th) {
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('liste.typeservice')->with('error', "$message");
            }
        } else {
            try {
                $typeService = TypeService::where('id', $id)->first();
                $typeService->label = $request->label;
                $typeService->description = $request->description;
                $typeService->updated_at = date('Y-m-d H:i:s');
                $typeService->save();
                return redirect()->route('liste.typeservice')->with('success', 'Type service updated successfully');
            } catch (\Throwable $th) {
                $message = "An error occurs ! Please contact the administrator";
                return redirect()->route('liste.typeservice')->with('error', "$message");
            }
        }
    }

    public function deleteTypeService(string $id)
    {
        $checkForTypeservice = TypeService::where('id', $id)->exists();
        if (!$checkForTypeservice) {
            return back()->with('error', 'Impossible to perform this action');
        }
        try {
            $typeService = TypeService::where('id', $id)->first();
            $typeService->delete();
            return redirect()->route('liste.typeservice')->with('success', 'Type service deleted successfully');
        } catch (\Throwable $th) {
            $message = "An error occurs ! Please contact the administrator";
            return back()->with('error', "$message");
        }
    }

    public function listeTypeServices()
    {
        $typeservices = TypeService::all();
        return view('services.listetypeservice', [
            'typeservices' => $typeservices
        ]);
    }

    public function newTypeServiceView()
    {
        return view('services.addtypeservice');
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
}
