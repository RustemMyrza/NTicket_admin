<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;

class ConsultationRequestController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        if (!empty($keyword)) {
            $request = ConsultationRequest::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $request = ConsultationRequest::latest()->paginate($perPage);
        }
        return view('consultationRequest.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('consultationRequest.create');
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
        $consultationRequest= new ConsultationRequest();
        $consultationRequest->name = $requestData['name'];
        $consultationRequest->phone = $requestData['phone'];
        $consultationRequest->save();

        return redirect('http://127.0.0.1:8000/mainPage')->with('success_message', 'Заявка отправлено, мы перезвоним вам в скором времени');
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
        $request = ConsultationRequest::findOrFail($id);
        return view('consultationRequest.show', compact('request'));
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
        return "You can't edit Consultation request";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $organizationId, $id)
    {
        return "You can't edit Consultation request";
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
        $request = ConsultationRequest::find($id);
        $request->delete();

        return redirect('admin/consultationRequest')->with('flash_message', 'Блок удален');
    }
}
