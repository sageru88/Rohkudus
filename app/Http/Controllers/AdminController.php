<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = \DB::table('produk')
        ->orderBy('id')
        ->get();
        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'nama_item' => 'required',
            'type' => 'required',
            'warna_produk' => 'required',
            'size' => 'required',
            'stock' => 'required',
            'harga_sat' => 'required',
        ];
        $this->validate($request, $rule);
        
        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('produk')->insert($input);
    
        if ($status) {
            return redirect('/admin.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return view('/admin/create')->with('error', 'Data gagal ditambahkan');
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['barang'] = \DB::table('produk')->find($id);
        return view('admin.form', $data);
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
        $rule = [
            'nama_item' => 'required',
            'type' => 'required',
            'warna_produk' => 'required',
            'size' => 'required',
            'stock' => 'required',
            'harga_sat' => 'required',
        ];
        $this->validate($request, $rule);
        
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        
        $status = \DB::table('produk')->where('id', $id)->update($input);
    
        if ($status) {
            return redirect('/admin.index')->with('success', 'Data always update');
        } else {
            return view('/admin/create')->with('error', 'Data gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $status = \DB::table('produk')->where('id', $id)->delete();
        
        if ($status) {
            return redirect('/admin/index')->with('success', 'Data berhasil disingkirkan');
        } else {
            return view('/admin/create')->with('error', 'Data ada');
        }
    }
}
