<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
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
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
        }

//        if ($request->hasFile('video')) {
//            $path = $this->uploadImage($request->file('video'));
//            $requestData['video'] = $path;
//        }

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
     * @param int $id
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
     * @param int $id
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
        $technology = Technology::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($technology->image != null) {
                Storage::disk('static')->delete($technology->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
            $technology->image = $requestData['image'];
        }

//        if ($request->hasFile('video')) {
//            if ($technology->video != null) {
//                Storage::disk('static')->delete($technology->video);
//            }
//            $path = $this->uploadImage($request->file('video'));
//            $requestData['video'] = $path;
//            $technology->video = $requestData['video'];
//        }

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
        $technology->video = $request->video ?? $technology->video;
        $technology->update();

        return redirect('admin/technology')->with('flash_message', 'Изменен');
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
        $technology = Technology::find($id);
        if ($technology->image != null) {
            Storage::disk('static')->delete($technology->image);
        }
//        if ($technology->video != null) {
//            Storage::disk('static')->delete($technology->video);
//        }
        $title = Translate::find($technology->title);
        $title->delete();

        $content = Translate::find($technology->content);
        $content->delete();
        $technology->delete();

        return redirect('admin/technology')->with('flash_message', 'Удален');
    }

    public function seo($id)
    {
        $technology = Technology::find($id);

        return view('technology.seo', compact('technology'));
    }

    public function seoStore(Request $request)
    {
        $technology = Technology::find($request['technology_id']);

        if (isset($technology->meta_title)) {
            $this->translateUpdate($technology->meta_title, $request['title']);
        } else {
            $title = $this->translateCreate($request['title']);
            $technology->meta_title = $title->id;
        }

        if (isset($technology->meta_description)) {
            $this->translateUpdate($technology->meta_description, $request['content']);
        } else {
            $desc = $this->translateCreate($request['content']);
            $technology->meta_description = $desc->id;
        }

        $technology->save();

        return redirect()->route('technology.index')->with('success', 'Успешно сохранилось SEO.');
    }

    protected function translateCreate($data)
    {
        return Translate::create([
            'ru'    =>  $data['ru'],
            'en'    =>  $data['en'],
            'kz'    =>  $data['kz'],
            'tr'    =>  $data['tr'],
            'ch'    =>  $data['ch'],
            'phr'    =>  $data['phr'],
        ]);
    }

    protected function translateUpdate($id, $data)
    {
        Translate::find($id)->update([
            'ru'    =>  $data['ru'],
            'en'    =>  $data['en'],
            'kz'    =>  $data['kz'],
            'tr'    =>  $data['tr'],
            'ch'    =>  $data['ch'],
            'phr'    =>  $data['phr'],
        ]);
    }
}
