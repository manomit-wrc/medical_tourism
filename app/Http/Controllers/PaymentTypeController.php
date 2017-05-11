<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentType;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class PaymentTypeController extends Controller
{
     public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $paymnttype_lists = PaymentType::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($paymnttype_lists); die;
        return view('admin.paymenttype.index')->with('paymnttype_lists',$paymnttype_lists);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.paymenttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'name' => 'required|unique:payment_types'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      PaymentType::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/paymenttype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       // get the paymenttypes types
       $paymenttypes_data = PaymentType::findOrFail($id);
       return view('admin.paymenttype.edit')->with('paymenttypes_data', $paymenttypes_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id,Request $request)
    {
        //echo $id; die;
        $provdrtp = PaymentType::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:payment_types,name,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $provdrtp->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/paymenttype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    /* public function destroy($id)
    {       
        $provdrtp = PaymentType::findOrFail($id);
        $provdrtp->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/paymenttype');
    } */
    /*public function delete(Request $request,$id) {
        if($id) {
            $provdrtp = PaymentType::find($id);
            if($provdrtp) {                         
                $provdrtp->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/paymenttype');
            }
        }
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $provdrtp = PaymentType::find($id);
            $status = '2';
            $provdrtp->status = $status; 
            $del = $provdrtp->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/paymenttype');
            }
        }
    }
}
