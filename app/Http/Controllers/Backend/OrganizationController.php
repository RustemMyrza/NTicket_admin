<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $organization = Organization::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $organization = Organization::latest()->paginate($perPage);
        }
        return view('organization.index', compact('organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.required' => 'Изображение для блока обязательно',
                'image.mimes' => 'Проверьте формат изображения',
                'image.max' => 'Размер файла не может превышать 2МБ'
            ]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
        }

        $organization= new Organization();
        $organization->name = $requestData['name'];
        $organization->transport_type = $requestData['transport_type'];
        $organization->image = $path ?? null;
        $organization->save();

        return redirect('admin/organization')->with('flash_message', 'Блок добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organization.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.mimes' => 'Проверьте формат изображения',
                'image.max' => 'Размер файла не может превышать 2МБ'
            ]);

        $requestData = $request->all();
        $organization = Organization::findOrFail($id);
        if ($request->hasFile('image')) 
        {
            if ($organization->image != null) {
                unlink($organization->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $organization->image = $path;
        }
        else
        {
            if ($organization->image != null) {
                unlink($organization->image);
            }
            $organization->image = null;
        }
        $organization->name = $requestData['name'];
        $organization->transport_type = $requestData['transport_type'];
        $organization->update();

        return redirect('admin/organization')->with('flash_message', 'Блок изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $organization = Organization::find($id);
        if ($organization->image != null) {
            unlink($organization->image);
        }
        $organization->delete();

        return redirect('admin/organization')->with('flash_message', 'Блок удален');
    }
}
