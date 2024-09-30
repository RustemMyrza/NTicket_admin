<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class IdCardController extends Controller
{
    public function index($clientId)
    {
        $client = Client::findOrFail($clientId);
        $fullName = $client->surname . ' ' . $client->name;
        $data = $client->getIdCard;
        return view('idCard.index', compact([
            'data',
            'fullName',
            'clientId'
        ]));
    }

    public function store(Request $request, $clientId)
    {
        $requestData = $request->all();
        $idCardData = Client::findOrFail($clientId)->getIdCard;
        $idCardData->name = $requestData['name'];
        $idCardData->number = $requestData['surname'];
        $idCardData->middle_name = $requestData['middle_name'];
        $idCardData->birth_date = $requestData['birth_date'];
        $idCardData->iin = $requestData['iin'];
        $idCardData->number = $requestData['number'];
        $idCardData->nationality = $requestData['nationality'];
        $idCardData->update();
        return redirect('admin/client/' . $clientId . '/id-card')->with('success', 'Изменения сохранены');
    }
}
