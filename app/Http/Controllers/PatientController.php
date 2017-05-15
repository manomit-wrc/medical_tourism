<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Hash;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $patient_data = Patient::where('status', '!=', 2)->get();
        return view('admin.patients.index')->with('patient_data',$patient_data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.patients.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       //echo "<pre>"; print_r($request->all()); die;
       $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_id' => 'required|unique:patients',
            'mobile_no' => 'required|unique:patients',
            'password' => 'required',
       ]);

      // Getting all data after success validation.
      
      $pat = new Patient($request->except('address'),$request->except('avators'),$request->except('pincode'));
      $pat->first_name = $request->get('first_name') ;
      $pat->last_name = $request->get('last_name') ;
      $pat->email_id = $request->get('email_id') ;
      $pat->mobile_no = $request->get('mobile_no') ;
      $pat->password = bcrypt($request->get('password')) ;
      $pat->remember_token = str_replace("/","",Hash::make(str_random(30)));
      $pat->status = "1";
      $pat->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patient_data = Patient::findOrFail($id);
       //echo "<pre>"; print_r($patient_data); die;
        return view('admin.patients.show',compact('patient_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       // get the Patient
       $patient_data = Patient::findOrFail($id);
       return view('admin.patients.edit', compact('patient_data'));
    }

    public function update($id,Request $request)
    {
         //echo $id; die;
        $patientdata = Patient::find($id);
        // validate
        $this->validate($request, [        
        'first_name' => 'required',
        'last_name' => 'required',
        'email_id' => 'required|unique:patients,email_id,'.$id,
        'mobile_no' => 'required|unique:patients,mobile_no,'.$id
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $patientdata->fill($input)->save();
        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/patients');
    }

    public function delete(Request $request,$id) {
        if($id) {
            $patobj = Patient::find($id);
            $status = '2';
            $patobj->status = $status; 
            $del = $patobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/patients');
            }
        }
    }
}
