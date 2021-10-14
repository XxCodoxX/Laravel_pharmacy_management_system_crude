<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DruginventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function customerView(){
        $data1 = session()->get('userType');
        $stdefultv = '1';
        // $all = DB::table('customers')->where('status', '1')->get();
        $all = Drug::where('status',$stdefultv)->get();
        return view('druginventory',compact('all','data1'));
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
        $request->validate([
            'drugName'=>'required',
            'drugSnum'=>'required',
            'drugQu'=>'required',
        ]);

        $drugAdditem = new Drug();
        $drugAdditem->drug_name = $request->drugName;
        $drugAdditem->drug_serial_number = $request->drugSnum;
        $drugAdditem->drug_quantity = $request->drugQu;
        $result = $drugAdditem->save();

        if($result){
            return redirect('druginventory')->with('success','you have Successfully Add Item');
        }else{
            return redirect('druginventory')->with('fail','somthing went wrong');
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
        $editRow = Drug::where('drug_id',$id)->first();
        return view('updatepage.drugupdate',compact('editRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'drugName'=>'required',
            'drugSnum'=>'required',
            'drugQu'=>'required',
        ]);

        $d_id = $request->drugId;
        $data = Drug::find($d_id);
        $data->drug_name = $request->drugName;
        $data->drug_serial_number = $request->drugSnum;
        $data->drug_quantity = $request->drugQu;
        $result = $data->save();

        if($result){
            return redirect('druginventory')->with('success','You have Successfully Update Item');
        }else{
            return redirect('druginventory')->with('fail','somthing went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stdefulv1 = '0';
        $data = Drug::find($id);
        $data->status=$stdefulv1;
        $data->save();



        return back() ->with('success','Item deleted successfully');
    }

    public function cancel(){
        $stdefultv = '1';
        // $all = DB::table('customers')->where('status', '1')->get();
        $all = Drug::where('status',$stdefultv)->get();
        return view('druginventory',compact('all'));
    }
}
