<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankCard;
use App\Models\Client;

class BankCardController extends Controller
{
    public function index($clientId)
    {
        $client = Client::findOrFail($clientId);
        $fullName = $client->surname . ' ' . $client->name;
        $data = $client->getBankCard;
        return view('bankCard.index', compact([
            'data',
            'fullName',
            'clientId'
        ]));
    }

    public function store(Request $request, $clientId)
    {
        $requestData = $request->all();
        $bankCardData = Client::findOrFail($clientId)->getBankCard;
        $bankCardData->name = $requestData['name'];
        $bankCardData->number = $requestData['number'];
        $bankCardData->cvv = $requestData['cvv'];
        $bankCardData->update();
        return redirect('admin/client/' . $clientId . '/bank-card')->with('success', 'Изменения сохранены');
    }
}
