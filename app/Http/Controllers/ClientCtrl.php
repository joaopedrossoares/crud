<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CrudTest\Services\Contracts\ClientServiceInterface;

class ClientCtrl extends Controller
{
    protected $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
       $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.list')->with([
            'clients' => $this->clientService
                              ->getList()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->clientService->save($request->except(['_token', '_method']));

        if ($result === true) {
      
            return redirect()->route('client.create')
                             ->with('success', 'Salvo com Sucesso!');
        }
   
        return redirect()->route('client.create')
                         ->withInput()
                         ->withErrors($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('client.show')->with([
            'client' => $this->clientService
                              ->getClient($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('client.edit')->with([
            'client' => $this->clientService
                             ->getClient($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $result = $this->clientService
                       ->update($request->except(['_token', '_method']), $id);
       
        if ($result === true) {
            return redirect()->route('client.edit', $id)
                             ->with('success', 'Salvo com Sucesso!');
        }
        
        return redirect()->route('client.edit', $id)
                         ->withErrors($result)
                         ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->clientService->delete($id);
        if ($result === true) {
            return redirect()->route('client.index')
                             ->with('success', 'Excluido com Sucesso!');
        }
        return redirect()->route('client.show',$id)
                         ->withErros(['Não foi possivel excluir!']);

    }
}
