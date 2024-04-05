<?php

namespace App\Http\Controllers;

use App\Models\Badminton;
use App\Models\Basket;
use App\Models\Dance;
use App\Models\Esport;
use App\Models\Futsal;
use App\Models\Seni;
use App\Models\Voli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $danceCount = Dance::count();
    $badmintonCount = Badminton::count();
    $futsalCount = Futsal::count();
    $basketCount = Basket::count();
    $esportCount = Esport::count();
    $voliCount = Voli::count();
    $seniCount=Seni::count();

    return view('Admin.dashboard', [
        'user' => $user,
        'danceCount' => $danceCount,
        'badmintonCount' => $badmintonCount,
        'futsalCount' => $futsalCount,
        'basketCount' => $basketCount,
        'esportCount' => $esportCount,
        'voliCount' => $voliCount,
        'seniCount'=>$seniCount,
    ]);
}
public function AllData()
{


    $danceCount = Dance::all();
    $badmintonCount = Badminton::all();
    $futsalCount = Futsal::all();
    $basketCount = Basket::all();
    $esportCount = Esport::all();
    $voliCount = Voli::all();
    $seniCount=Seni::all();

    return view('status', [
        'dance' => $danceCount,
        'badminton' => $badmintonCount,
        'futsal' => $futsalCount,
        'basket' => $basketCount,
        'esport' => $esportCount,
        'voli' => $voliCount,
        'seni'=> $seniCount
    ]);
}


    public function adminForm(){
        $user = Auth::user();
        return view('Admin.add_admin', ['user' => $user]);
    }
}
