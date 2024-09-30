<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Organization;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request, $organizationId)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $organizationName = Organization::findOrFail($organizationId)->name;
        if (!empty($keyword)) {
            $route = Route::where('from_place', 'LIKE', "%$keyword%")
                ->orWhere('to_place', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $route = Route::where('organizer', $organizationId)
            ->latest()->paginate($perPage);
        }
        return view('route.index', compact('route', 'organizationId', 'organizationName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($organizationId)
    {
        return view('route.create', compact('organizationId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $organizationId)
    {
        $requestData = $request->all();
        $route= new Route();
        $route->from_place = $requestData['from_place'];
        $route->to_place = $requestData['to_place'];
        $route->departure_time = $requestData['departure_time'];
        $route->arrival_time = $requestData['arrival_time'];
        $route->price = $requestData['price'];
        $route->seats_number = $requestData['seats_number'];
        $route->organizer = $organizationId;
        $route->save();

        return redirect('admin/organization/' . $organizationId . '/route')->with('flash_message', 'Блок добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($organizationId, $id)
    {
        $route = Route::findOrFail($id);
        $organizationName = Organization::findOrFail($organizationId)->name;
        return view('route.show', compact('route', 'organizationId', 'organizationName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($organizationId, $id)
    {
        $route = Route::findOrFail($id);
        return view('route.edit', compact('route', 'organizationId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $organizationId, $id)
    {
        $requestData = $request->all();
        $route = Route::findOrFail($id);

        $route->from_place = $requestData['from_place'];
        $route->to_place = $requestData['to_place'];
        $route->departure_time = $requestData['departure_time'];
        $route->arrival_time = $requestData['arrival_time'];
        $route->price = $requestData['price'];
        $route->seats_number = $requestData['seats_number'];
        $route->update();

        return redirect('admin/organization/' . $organizationId . '/route')->with('flash_message', 'Блок изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($organizationId, $id)
    {
        $route = Route::find($id);
        $route->delete();

        return redirect('admin/organization/' . $organizationId . '/route')->with('flash_message', 'Блок удален');
    }
}
