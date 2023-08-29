<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCreators = User::where('is_creator', true)->count();
        $totalServices = Service::count();
        // $artworks = collect(Storage::files('public/images/carousel'))->random(5)->all();

        return view('welcome', ['totalUsers' => $totalUsers, 'totalCreators' => $totalCreators, 'totalServices' => $totalServices]);
    }
}
