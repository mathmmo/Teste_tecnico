<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
use App\Type;
use Gate;
use Auth;

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
        $type = Type::all();
        return view('refund.index', compact('type'));
    }

    public function pending()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        $pending = Refund::where('status',0)->get();
        return view('refund.pending', compact('pending'));
    }

    public function detail($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        $refid = Refund::where('id', $id)->first();
        $typeids = explode(',', $refid['type_id']);
        $count = count($typeids);
        return view('refund.detail', compact('refid','typeids','count') );    
    }

    public function aproved()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Desculpe, você não tem acesso a essa área.");
        };
        $aproved = Refund::where('status',1)->get();
        return view('refund.aproved', compact('aproved'));
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
        $count = count($request['type_id']);
        $id_type = "";
        for ($i=0; $i < $count; $i++) { 
            $id_type = $id_type . $request['type_id'][$i].','; 
        }
        try {
            $request['user_id'] = Auth::user()->id;
            $request['type_id'] = substr($id_type, 0, -1 );
            Refund::create($request->all());
            return 'Cadastrado';
            //return view('refund.index');
        } catch (\Throwable $th) {
            return $th->getMessage();
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
