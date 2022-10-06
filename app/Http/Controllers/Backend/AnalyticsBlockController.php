<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\AnalyticsBlock;
use Illuminate\Http\Request;

class AnalyticsBlockController extends Controller
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
            $analyticsblock = AnalyticsBlock::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $analyticsblock = AnalyticsBlock::latest()->paginate($perPage);
        }

        return view('analytics-block.index', compact('analyticsblock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('analytics-block.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'image.required' => 'Загрузите изображение',
                'image.mimes' => 'Проверьте формат изображения',
                'image.max' => 'Размер файла не может превышать 2МБ'
            ]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path ?? null;
        }

        AnalyticsBlock::create($requestData);

        return redirect('admin/analytics-block')->with('flash_message', 'Блок добавлен');
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
        $analyticsblock = AnalyticsBlock::findOrFail($id);

        return view('analytics-block.show', compact('analyticsblock'));
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
        $analyticsblock = AnalyticsBlock::findOrFail($id);

        return view('analytics-block.edit', compact('analyticsblock'));
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

        $analyticsblock = AnalyticsBlock::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($analyticsblock->image != null) {
                Storage::disk('static')->delete($analyticsblock->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
        }


        $analyticsblock->update($requestData);

        return redirect('admin/analytics-block')->with('flash_message', 'Блок изменен');
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
        $analyticsblock = AnalyticsBlock::findOrFail($id);

        if ($analyticsblock->image != null) {
            Storage::disk('static')->delete($analyticsblock->image);
        }

        $analyticsblock->delete();

        return redirect('admin/analytics-block')->with('flash_message', 'Блок удален');
    }
}
