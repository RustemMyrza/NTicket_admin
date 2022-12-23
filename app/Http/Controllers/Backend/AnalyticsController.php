<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Models\Translate;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $analytics = Analytics::latest()->paginate($perPage);

        return view('analytics.index', compact('analytics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('analytics.create');
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

        $category = new Translate();
        $category->ru = $requestData['category']['ru'];
        $category->en = $requestData['category']['en'];
        $category->kz = $requestData['category']['kz'];
        $category->tr = $requestData['category']['tr'];
        $category->ch = $requestData['category']['ch'];
        $category->phr = $requestData['category']['phr'];
        $category->save();

        $analytics = new Analytics();
        $analytics->title = $title->id;
        $analytics->content = $content->id;
        $analytics->viewing = $requestData['viewing'];
        $analytics->image = $requestData['image'];
        $analytics->category = $category->id;
        $analytics->save();

        return redirect('admin/analytics')->with('flash_message', 'Добавлен');
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
        $analytics = Analytics::findOrFail($id);

        return view('analytics.show', compact('analytics'));
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
        $analytics = Analytics::findOrFail($id);

        return view('analytics.edit', compact('analytics'));
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
        ], [
            'image.mimes' => 'Проверьте формат изображения',
            'image.max' => 'Размер файла не может превышать 2МБ'
        ]);
        $requestData = $request->all();
        $analytics = Analytics::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($analytics->image != null) {
                Storage::disk('static')->delete($analytics->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
            $analytics->image = $requestData['image'];
        }

        $title = Translate::find($analytics->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($analytics->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();

        if (isset($analytics->category)) {
            $category = Translate::find($analytics->category);
            $category->ru = $requestData['category']['ru'];
            $category->en = $requestData['category']['en'];
            $category->kz = $requestData['category']['kz'];
            $category->tr = $requestData['category']['tr'];
            $category->ch = $requestData['category']['ch'];
            $category->phr = $requestData['category']['phr'];
            $category->update();
        } else {
            $category = new Translate();
            $category->ru = $requestData['category']['ru'];
            $category->en = $requestData['category']['en'];
            $category->kz = $requestData['category']['kz'];
            $category->tr = $requestData['category']['tr'];
            $category->ch = $requestData['category']['ch'];
            $category->phr = $requestData['category']['phr'];
            $category->save();
            $analytics->category = $category->id;
        }


        $analytics->viewing = $requestData['viewing'];
        $analytics->update();

        return redirect('admin/analytics')->with('flash_message', 'Изменен');
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
        $analytics = Analytics::find($id);
        if ($analytics->image != null) {
            Storage::disk('static')->delete($analytics->image);
        }
        $title = Translate::find($analytics->title);
        $title->delete();

        $content = Translate::find($analytics->content);
        $content->delete();
        $analytics->delete();
        return redirect('admin/analytics')->with('flash_message', 'Удален');
    }

    public function seo($id)
    {
        $analytics = Analytics::find($id);

        return view('analytics.seo', compact('analytics'));
    }

    public function seoStore(Request $request)
    {
        $analytics = Analytics::find($request['analytics_id']);
        if (isset($analytics->meta_title)) {
            $this->translateUpdate($analytics->meta_title, $request['title']);
        } else {
            $title = $this->translateCreate($request['title']);
            $analytics->meta_title = $title->id;
        }

        if (isset($analytics->meta_description)) {
            $this->translateUpdate($analytics->meta_description, $request['content']);
        } else {
            $desc = $this->translateCreate($request['content']);
            $analytics->meta_description = $desc->id;
        }

        $analytics->save();

        return redirect()->route('analytics.index')->with('success', 'Успешно сохранилось SEO.');
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
