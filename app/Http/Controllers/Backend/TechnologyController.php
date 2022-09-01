<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Translate;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $technology = Technology::latest()->paginate($perPage);

        return view('technology.index', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('technology.create');
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
            $path = 'technology';
            $requestData['image'] = $request->file('image')->storeAs($path, $name, 'static');
        }

        if ($request->hasFile('video')) {

            $name = time().'.'.$requestData['video']->extension();
            $path = 'technology';
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

        $technology = new Technology();
        $technology->title = $title->id;
        $technology->content = $content->id;
        $technology->viewing = $requestData['viewing'];
        $technology->image = $requestData['image'];
        $technology->video = $requestData['video'];
        $technology->save();

        return redirect('admin/technology')->with('flash_message', 'Добавлен');
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
        $technology = Technology::findOrFail($id);

        return view('technology.show', compact('technology'));
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
        $technology = Technology::findOrFail($id);

        return view('technology.edit', compact('technology'));
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
        $technology = Technology::findOrFail($id);
        if ($request->hasFile('image')) {
            if($technology->image != null){
                Storage::disk('static')->delete($technology->image);
            }
            $name = time().'.'.$requestData['image']->extension();
            $path = 'technology';
            $requestData['image'] = $request->file('image')->storeAs($path, $name, 'static');
            $technology->image = $requestData['image'];
        }

        if ($request->hasFile('video')) {
            if($technology->video != null){
                Storage::disk('static')->delete($technology->video);
            }
            $name = time().'.'.$requestData['video']->extension();
            $path = 'technology';
            $requestData['video'] = $request->file('video')->storeAs($path, $name, 'static');

            $technology->video = $requestData['video'];
        }

        $title = Translate::find($technology->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($technology->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();
        $technology->viewing = $requestData['viewing'];
        $technology->update();

        return redirect('admin/technology')->with('flash_message', 'Изменен');
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
        $technology = Technology::find($id);
        if($technology->image != null){
            Storage::disk('static')->delete($technology->image);
        }
        if($technology->video != null){
            Storage::disk('static')->delete($technology->video);
        }
        $title = Translate::find($technology->title);
        $title->delete();

        $content = Translate::find($technology->content);
        $content->delete();
        $technology->delete();
        return redirect('admin/technology')->with('flash_message', 'Удален');
    }
}
