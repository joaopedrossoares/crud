<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CrudTest\Services\Contracts\AddressServiceInterface;

class AddressCtrl extends Controller
{
    protected $addressService;

    public function __construct(AddressServiceInterface $addressService)
    {
       $this->addressService = $addressService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client)
    {
        return view('address.list')->with([
            'clientId'  => $client,
            'addresses' => $this->addressService
                                ->getListAddressClient($client),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function create($client)
    {

        return view('address.create')->with([
            'clientId' => $client
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $client)
    {
        
        $result = $this->addressService->save($request->all(), $client);

        if ($result === true) {
      
            return redirect()->route('client.address.create', $client)
                             ->with('success', 'Salvo com Sucesso!');
        }
   
        return redirect()->route('client.address.create', $client)
                         ->withInput()
                         ->withErrors($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $client
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($client, $id)
    {
         return view('address.list')->with([
            'clientId' => $client,
            'addresses' => $this->addressService
                                ->getaddress($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client, $id)
    {
        return view('address.edit')->with([
            'clientId' => $client,
            'address'  => $this->addressService
                               ->getAddress($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $client
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($client, Request $request, $id)
    {
        $result = $this->addressService->update($request->except(['_token', '_method']), $id);
      
        if ($result === true) {
            return redirect()->route('client.address.edit', [$client, $id])
                             ->with('success', 'Salvo com Sucesso!');
        }
        
        return redirect()->route('client.address.edit', [$client, $id])
                         ->withErrors($result)
                         ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $client
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client, $id)
    {
        $result = $this->addressService->delete($id);
        if ($result === true) {
            return redirect()->route('client.address.index', $client)
                             ->with('success', 'Excluido com Sucesso!');
        }
        return redirect()->route('client.address.index', $client)
                         ->withErros(['Não foi possivel excluir!']);

    }
}
