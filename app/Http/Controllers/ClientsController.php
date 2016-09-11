<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\CustomerType;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::fetchAll();
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CustomerType::pluck('name','id')->toArray();
        return view('clients.create',compact('types'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Client::createNewClient($request->all());
        return redirect('/clientes');
    }

    public function edit($slug)
    {
        $types = CustomerType::pluck('name','id')->toArray();
        $clients = Client::where('slug',$slug)->first();
        return view('clients.edit',compact('clients','types'));
    }

    public function update(Request $request, Client $client)
    {
        dd($client);
        $this->validator($request->all())->validate();
        $client->update($request->all());
        return redirect('/clientes');
    }

    public function destroy(Client $client)
    {
        $client->delete();

    }

    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'slug' => 'max:255',
            'address' => 'required|max:255',
            'nit'=>'required|max:17',
            'legal_agent' =>'max:255',
        ]);

    }
}
