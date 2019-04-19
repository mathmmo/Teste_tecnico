<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class RefundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isUser')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        return view('refund.index');
    }

    public function pending()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        return view('refund.pending');
    }

    public function detail()
    {
        if(!Gate::allows('isUser')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        return view('refund.detail');    
    }

    public function aproved()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        return view('refund.aproved');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
