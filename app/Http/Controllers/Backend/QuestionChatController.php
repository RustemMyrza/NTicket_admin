<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuestionChat;
use Illuminate\Http\Request;

class QuestionChatController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $question = QuestionChat::where('question', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $question = QuestionChat::latest()->paginate($perPage);
        }
        return view('questionChat.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('questionChat.create');
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
        // return "You can't store new question";
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
        $question = QuestionChat::findOrFail($id);
        return view('questionChat.show', compact('question'));
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
        $question = QuestionChat::findOrFail($id);
        return view('questionChat.edit', compact('question'));
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
        $question = QuestionChat::findOrFail($id);
        $question->answer = $requestData['answer'];
        $question->update();

        return redirect('admin/questionChat')->with('flash_message', 'Блок изменен');
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
        $question = QuestionChat::find($id);
        $question->delete();

        return redirect('admin/questionChat')->with('flash_message', 'Блок удален');
    }
}
