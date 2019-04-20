<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refund;
use App\Type;
use App\User;
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
            abort(403,"Desculpe, você não tem acesso a essa área.");
        };
        $type = Type::all();
        return view('refund.index', compact('type'));
    }

    public function teste($id){
        Refund::find($id)->update(['status' => 1]);
    }

    public function pending()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Desculpe, você não tem acesso a essa área.");
        };
        $pending = Refund::where('status',0)
            ->join('users', 'refunds.user_id', '=', 'users.id')
            ->select('refunds.*', 'users.name')
            ->get();
        return view('refund.pending', compact('pending'));
    }

    public function detail($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Desculpe, você não tem acesso a essa área.");
        };
        $refundDetail = Refund::where('id', $id)->first();
        $refundName = User::where('id',$refundDetail['user_id'])->select('name')->first();
        //Array of numbers.
        $typeIds = explode(',', $refundDetail['type_id']);
        $typeNames = [];
        foreach ($typeIds as $item ) {  
            $typeNames[] = Type::where('id',$item)->select('name')->first();
        }
        $count = count($typeNames);
        return view('refund.detail', compact('refundDetail','typeIds','count','typeNames', 'refundName' ));    
    }

    public function aproved()
    {
        if(!Gate::allows('isAdmin')){
            abort(403,"Desculpe, você não tem acesso a essa área.");
        };
        $aproved = Refund::where('status',1)
            ->join('users', 'refunds.user_id', '=', 'users.id')
            ->select('refunds.*', 'users.name')
            ->get();

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
            return redirect('refund');
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
    public function update($id)
    {
        Refund::find($id)->update(['status' => 1]);

        return redirect('pending');
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
