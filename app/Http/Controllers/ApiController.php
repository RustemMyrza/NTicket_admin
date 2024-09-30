<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use App\Models\QuestionChat;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestApi(Request $request)
    {
        return 'OK';
        $requestData = $request->all();
        $consultationRequest= new ConsultationRequest();
        $consultationRequest->name = $requestData['name'];
        $consultationRequest->phone = $requestData['phone'];
        $consultationRequest->save();

        return redirect('http://127.0.0.1:8000/mainPage')->with('success_message', 'Заявка отправлено, мы перезвоним вам в скором времени');
    }

    public function chatHelpApi(Request $request)
    {
        $requestData = $request->all();
        $questionRequest= new QuestionChat();
        $questionRequest->question = $requestData['question'];
        $questionRequest->asked = $requestData['user'];
        $questionRequest->save();

        return redirect('http://127.0.0.1:8000/mainPage')->with('success_message', 'Заявка отправлено, мы перезвоним вам в скором времени');
    }
}
