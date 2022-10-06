<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Purpose;
use Illuminate\Http\Request;
use App\Models\Translate;
use Illuminate\Support\Facades\Storage;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $purpose = Purpose::where('title', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $purpose = Purpose::latest()->paginate($perPage);
        }

        return view('purpose.index', compact('purpose'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('purpose.create');
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'logo.required' => 'Загрузите изображение',
                'logo.mimes' => 'Проверьте формат изображения',
                'logo.max' => 'Размер файла не может превышать 2МБ'
            ]);

        $requestData = $request->all();

        if ($request->hasFile('logo')) {
            $path = $this->uploadImage($request->file('logo'));
            $requestData['logo'] = $path;
        }

        $title = new Translate();
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->save();

        $purpose = new Purpose();
        $purpose->title = $title->id;
        $purpose->logo = $requestData['logo'];
        $purpose->save();


        return redirect('admin/purpose')->with('flash_message', 'Purpose added!');
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
        $purpose = Purpose::findOrFail($id);

        return view('purpose.show', compact('purpose'));
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
        $purpose = Purpose::findOrFail($id);

        return view('purpose.edit', compact('purpose'));
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'logo.mimes' => 'Проверьте формат изображения',
                'logo.max' => 'Размер файла не может превышать 2МБ'
            ]);
        $requestData = $request->all();
        $purpose = Purpose::findOrFail($id);
        if ($request->hasFile('logo')) {
            if ($purpose->logo != null) {
                Storage::disk('static')->delete($purpose->logo);
            }
            $path = $this->uploadImage($request->file('logo'));

            $requestData['logo'] = $path;
            $purpose->logo = $requestData['logo'];
        }

        $title = Translate::find($purpose->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();

        $purpose->update();

        return redirect('admin/purpose')->with('flash_message', 'Purpose updated!');
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
        $purpose = Purpose::find($id);
        if ($purpose->logo != null) {
            Storage::disk('static')->delete($purpose->logo);
        }
        $title = Translate::find($purpose->title);
        $title->delete();

        $purpose->delete();

        return redirect('admin/purpose')->with('flash_message', 'Purpose deleted!');
    }
}
