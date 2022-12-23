<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\PartnerBlock;
use Illuminate\Http\Request;
use App\Models\Translate;

class PartnerBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $partner_blocks = PartnerBlock::orderBy('queue', 'asc')->paginate($perPage);

        return view('partner-block.index', compact('partner_blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $partner_blocks = new PartnerBlock();

        return view('partner-block.create', compact('partner_blocks'));
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

        $requestData = $request->all();

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

        $partner_blocks = new PartnerBlock();
        $partner_blocks->title = $title->id;
        $partner_blocks->content = $content->id;
        $partner_blocks->queue = $request->queue;
        $partner_blocks->save();

        return redirect('admin/partner-blocks')->with('flash_message', 'Добавлен');
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
        $partner_blocks = PartnerBlock::findOrFail($id);

        return view('partner-block.show', compact('partner_blocks'));
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
        $partner_blocks = PartnerBlock::findOrFail($id);

        return view('partner-block.edit', compact('partner_blocks'));
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

        $requestData = $request->all();
        $partner_blocks = PartnerBlock::findOrFail($id);


        $title = Translate::find($partner_blocks->title);
        $title->ru = $requestData['title']['ru'];
        $title->en = $requestData['title']['en'];
        $title->kz = $requestData['title']['kz'];
        $title->tr = $requestData['title']['tr'];
        $title->ch = $requestData['title']['ch'];
        $title->phr = $requestData['title']['phr'];
        $title->update();
        $content = Translate::find($partner_blocks->content);
        $content->ru = $requestData['content']['ru'];
        $content->en = $requestData['content']['en'];
        $content->kz = $requestData['content']['kz'];
        $content->tr = $requestData['content']['tr'];
        $content->ch = $requestData['content']['ch'];
        $content->phr = $requestData['content']['phr'];
        $content->update();
        $partner_blocks->queue = $request->queue;
        $partner_blocks->save();

        return redirect('admin/partner-blocks')->with('flash_message', 'Изменен');
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
        $partner_blocks = PartnerBlock::find($id);

        $title = Translate::find($partner_blocks->title);
        $title->delete();

        $content = Translate::find($partner_blocks->content);
        $content->delete();
        $partner_blocks->delete();
        return redirect('admin/partner-blocks')->with('flash_message', 'Удален');
    }
}
