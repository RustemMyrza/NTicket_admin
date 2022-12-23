<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Translate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $news = News::latest()->paginate($perPage);

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $news = new News();

        return view('news.create', compact('news'));
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

        $news = new News();
        $news->title = $title->id;
        $news->content = $content->id;
        $news->viewing = $requestData['viewing'];
        $news->image = $requestData['image'];
        $news->video = $requestData['video'];
        $news->link = $requestData['link'];
        $news->popular = $request->popular ? true : false;
        $news->save();

        return redirect('admin/news')->with('flash_message', 'Добавлен');
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
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
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
        $news = News::findOrFail($id);

        return view('news.edit', compact('news'));
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
        $news = News::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($news->image != null) {
                Storage::disk('static')->delete($news->image);
            }
            $path = $this->uploadImage($request->file('image'));
            $requestData['image'] = $path;
            $news->image = $requestData['image'];
        }

        $title = Translate::find($news->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($news->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();
        $news->viewing = $requestData['viewing'];
        $news->video = $requestData['video'];
        $news->link = $requestData['link'];
        $news->popular = $request->popular ? true : false;
        $news->update();

        return redirect('admin/news')->with('flash_message', 'Изменен');
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
        $news = News::find($id);
        if ($news->image != null) {
            Storage::disk('static')->delete($news->image);
        }
        $title = Translate::find($news->title);
        $title->delete();

        $content = Translate::find($news->content);
        $content->delete();
        $news->delete();
        return redirect('admin/news')->with('flash_message', 'Удален');
    }

    public function seo($id)
    {
        $news = News::find($id);

        return view('news.seo', compact('news'));
    }

    public function seoStore(Request $request)
    {
        $news = News::find($request['news_id']);
        if (isset($news->meta_title)) {
            $this->translateUpdate($news->meta_title, $request['title']);
        } else {
            $title = $this->translateCreate($request['title']);
            $news->meta_title = $title->id;
        }

        if (isset($news->meta_description)) {
            $this->translateUpdate($news->meta_description, $request['content']);
        } else {
            $desc = $this->translateCreate($request['content']);
            $news->meta_description = $desc->id;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'Успешно сохранилось SEO.');
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
