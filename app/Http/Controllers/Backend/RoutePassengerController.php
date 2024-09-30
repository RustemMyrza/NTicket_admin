<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Route;
use App\Models\Ticket;
use App\Models\Client;
use Illuminate\Http\Request;

class RoutePassengerController extends Controller
{
    public function index ($organizationId, $routeId)
    {
        $organizationName = Organization::findOrFail($organizationId)->name;
        $routeName = Route::findOrFail($routeId)->name;
        $allPassengers = Client::query()->with('getTickets')->get();
        $passengers = [];
        // return $allPassengers;
        foreach($allPassengers as $item)
        {
            foreach($item->getTickets as $tickets)
            {
                if (in_array($routeId, json_decode($tickets->routes, 1)))
                {
                    $passengers[] = $item;
                }
            }
        }
        
        $passengers = array_unique($passengers);
        return view('routePassengers.index', compact(
            'passengers',
            'organizationId',
            'organizationName',
            'routeId',
            'routeName'
        ));
    }
}
