<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Translate;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $requestData = $request->all();
        $perPage = 25;
        $partner = Partner::where('block_id', $requestData['block_id'])->latest()->paginate($perPage);

        return view('partner.index', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner.create');
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
            $requestData['image'] = $path;
        }

        $title = new Translate();
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->save();
        $content = new Translate();
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->save();

        $partner = new Partner();
        $partner->title = $title->id;
        $partner->content = $content->id;
        $partner->image = $requestData['image'];
        $partner->block_id = $requestData['block_id'];
        $partner->save();

        return redirect('admin/partner?block_id=' . $requestData['block_id'])->with('flash_message', 'Добавлен');
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
        $partner = Partner::findOrFail($id);

        return view('partner.show', compact('partner'));
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
        $partner = Partner::findOrFail($id);

        return view('partner.edit', compact('partner'));
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
        $partner = Partner::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($partner->image != null) {
                Storage::disk('static')->delete($partner->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
            $partner->image = $requestData['image'];
        }

        $title = Translate::find($partner->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($partner->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();
        $partner->block_id = $requestData['block_id'];
        $partner->update();

        return redirect('admin/partner?block_id=' . $request->get('block_id'))->with('flash_message', 'Изменен');
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
        $partner = Partner::find($id);
        if ($partner->image != null) {
            Storage::disk('static')->delete($partner->image);
        }
        $title = Translate::find($partner->title);
        $title->delete();

        $content = Translate::find($partner->content);
        $content->delete();
        $partner->delete();

        return redirect('admin/partner?block_id=' . $partner->block_id)->with('flash_message', 'Удален');
    }
}
