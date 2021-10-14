<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stdefultv = '1';
        // // $all = DB::table('customers')->where('status', '1')->get();
        // $all = Customer::where('status',$stdefultv)->get();
        // return view('customer',compact('all'));
    }

    public function customerView(){
        $data1 = session()->get('userType');
        $stdefultv = '1';
        // $all = DB::table('customers')->where('status', '1')->get();
        $all = Customer::where('status',$stdefultv)->get();
        return view('customer',compact('all','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'cusName'=>'required',
            'cusAge'=>'required',
            'cusmnumber'=>'required',
        ]);

        $cusAdddetails = new Customer();
        $cusAdddetails->cus_name = $request->cusName;
        $cusAdddetails->cus_age = $request->cusAge;
        $cusAdddetails->cus_sex = $request->cussex;
        $cusAdddetails->cus_mno = $request->cusmnumber;
        $result = $cusAdddetails->save();

        if($result){
            return redirect('customer')->with('success','you have Successfully Add Customer');
        }else{
            return redirect('customer')->with('fail','somthing went wrong');
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
        $editRow = Customer::where('cus_id',$id)->first();
        return view('updatepage.cusupdate',compact('editRow'));
        // return $id;
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
            'cusName'=>'required',
            'cusAge'=>'required',
            'cusmnumber'=>'required',
        ]);

        $c_id = $request->cusid;
        $data = Customer::find($c_id);
        $data->cus_name = $request->cusName;
        $data->cus_age = $request->cusAge;
        $data->cus_sex = $request->cussex;
        $data->cus_mno = $request->cusmnumber;
        $result = $data->save();

        if($result){
            return redirect('customer')->with('success','you have Successfully Update Customer');
        }else{
            return redirect('customer')->with('fail','somthing went wrong');
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
        $data = Customer::find($id);
        $data->status=$stdefulv1;
        $data->save();



        return back() ->with('success','Customer deleted successfully');
    }
}
