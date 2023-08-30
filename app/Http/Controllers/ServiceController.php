<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('services.index', [
            'services' => Service::latest()->filter(request(['search', 'category_id']))->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'time' => 'required',
            'category_id' => 'required'
        ]);

        $formFields['status'] = 'open';

        $formFields['user_id'] = auth()->id();

        Service::create($formFields);

        // Create Logs in admin.log
        Log::channel('admin')->info("Service created: Title" . $formFields['title']);

        return redirect('/services/index')->with('message', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', [
            'service' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // dd($service);
        // Check if the currently authenticated user matches the requested service user id
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        return view('services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if (Auth::user()->id !== $service->user_id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'time' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $service->update($formFields);

        // Create Logs in admin.log
        Log::channel('admin')->info("Service Updated: Title" . $formFields['title']);

        return redirect('/services/' . $service->id)->with('message', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // if (Auth::user()->id !== $service->user_id) {
        //     abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        // }
        $service->delete();

        // Create Logs in admin.log
        Log::channel('admin')->info("Service Deleted: Title" . $service->title);

        return redirect('/users/' . $service->users->id)->with('message', 'Service deleted successfully');
    }

    public function manage()
    {
        return view('services.manage', ['services' => auth()->user()->services()->get()]);
    }

    public function showUpdateService($service)
    {   
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $service = Service::where('id', $service)->first();
        return view('users.admin-update-service', ['service' => $service]);
    }
    public function updateUserService(Request $request, Service $service)
    {
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'time' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $service->update($formFields);

        return redirect('/users/1')->with('message', 'Service updated successfully');
    }
}
