<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Translate;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contacts::first();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $contacts = Contacts::first();
        if ($contacts) {
            $this->translateUpdate($contacts->phone_number, $request['phone_number']);
            $this->translateUpdate($contacts->email, $request['email']);
            $this->translateUpdate($contacts->address, $request['address']);
            $this->translateUpdate($contacts->address2, $request['address2']);
            $this->translateUpdate($contacts->whats_app, $request['whats_app']);
            $this->translateUpdate($contacts->telegram, $request['telegram']);
            $this->translateUpdate($contacts->facebook, $request['facebook']);
            $this->translateUpdate($contacts->insta, $request['insta']);
            $this->translateUpdate($contacts->link, $request['link']);

        } else {
            Contacts::create($requestData);
        }

        return redirect('admin/contacts')->with('success', 'Изменения сохранены');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function translateUpdate($id, $data)
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
