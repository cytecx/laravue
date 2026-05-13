<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class IndexController extends Controller
{
    public function index()
    {
        // dd('Hello from Laravel!');
        $data = Listing::where('beds', '>=', 4)->orderBy('price', 'asc')->first();
        dd($data);
        return inertia('Index/Index', [
            'message' => "Hello from Laravel!"
        ]);
    }

    public function show(Request $request) {
        return inertia('Index/Show');
    }
}
