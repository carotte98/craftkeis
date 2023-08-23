<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

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
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();


        Service::create($formFields);

        return redirect('/')->with('message', 'Service created successfully');
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
        return view('services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'time' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);

        $service->update($formFields);

        return redirect('/services/' . $service->id)->with('message', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('/')->with('message', 'Service deleted successfully');
    }

    public function manage()
    {
        return view('services.manage', ['services' => auth()->user()->services()->get()]);
    }
}
