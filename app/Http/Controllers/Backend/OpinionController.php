<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Opinion;
use Illuminate\Http\Request;
use App\Models\Translate;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $opinion = Opinion::latest()->paginate($perPage);

        return view('opinion.index', compact('opinion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('opinion.create');
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

            $name = time().'.'.$requestData['image']->extension();
            $path = 'opinion';
            $requestData['image'] = $request->file('image')->storeAs($path, $name, 'static');
        }

        if ($request->hasFile('video')) {

            $name = time().'.'.$requestData['video']->extension();
            $path = 'opinion';
            $requestData['video'] = $request->file('video')->storeAs($path, $name, 'static');
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

        $opinion = new Opinion();
        $opinion->title = $title->id;
        $opinion->content = $content->id;
        $opinion->viewing = $requestData['viewing'];
        $opinion->image = $requestData['image'];
        $opinion->video = $requestData['video'];
        $opinion->save();

        return redirect('admin/opinion')->with('flash_message', 'Добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $opinion = Opinion::findOrFail($id);

        return view('opinion.show', compact('opinion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $opinion = Opinion::findOrFail($id);

        return view('opinion.edit', compact('opinion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
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
        $opinion = Opinion::findOrFail($id);
        if ($request->hasFile('image')) {
            if($opinion->image != null){
                Storage::disk('static')->delete($opinion->image);
            }
            $name = time().'.'.$requestData['image']->extension();
            $path = 'opinion';
            $requestData['image'] = $request->file('image')->storeAs($path, $name, 'static');
            $opinion->image = $requestData['image'];
        }

        if ($request->hasFile('video')) {
            if($opinion->video != null){
                Storage::disk('static')->delete($opinion->video);
            }
            $name = time().'.'.$requestData['video']->extension();
            $path = 'opinion';
            $requestData['video'] = $request->file('video')->storeAs($path, $name, 'static');

            $opinion->video = $requestData['video'];
        }

        $title = Translate::find($opinion->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($opinion->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();
        $opinion->viewing = $requestData['viewing'];
        $opinion->update();

        return redirect('admin/opinion')->with('flash_message', 'Изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $opinion = Opinion::find($id);
        if($opinion->image != null){
            Storage::disk('static')->delete($opinion->image);
        }
        if($opinion->video != null){
            Storage::disk('static')->delete($opinion->video);
        }
        $title = Translate::find($opinion->title);
        $title->delete();

        $content = Translate::find($opinion->content);
        $content->delete();
        $opinion->delete();
        return redirect('admin/opinion')->with('flash_message', 'Удален');
    }
}
