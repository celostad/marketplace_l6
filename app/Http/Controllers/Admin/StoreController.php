<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = \App\Store::paginate(10);
        //return $stores;
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = \App\User::find($data['user']);
        $store = $user->store()->create($data);

        flash('Loja Criada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store)
    {
        $data = $request->all();

        $store = \App\Store::find($store);
        $store->update($data);

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    PUBLIC function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja Removida com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
