<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * 
     */
    public function showServices()
    {
        $services = Service::latest()->paginate(9);

        return view('layanan.list', compact('services'));
    }


}