<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CountryVisa;
use App\Country;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class CountryVisaController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $counvisa_lists = CountryVisa::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($counvisa_lists); die;
        return view('admin.countryvisa.index')->with('counvisa_lists',$counvisa_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.countryvisa.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
	      //print_r($request->input()); die;
          $this->validate($request, [
          	'country_id' => 'required|unique:country_visa',
            'upload_pdf' => 'required|mimes:pdf',
          ]);


            $cntvisa = new CountryVisa($request->input()) ;
            $cntvisa->country_id = $request->get('country_id') ;

            //echo "<pre>"; print_r($request->file('banner_image'));die;

            if($file = $request->hasFile('upload_pdf')) {

                $file = $request->file('upload_pdf') ;

                $fileName = time().'_'.$file->getClientOriginalName() ;

                //original destination path
                $destinationPath = public_path().'/uploads/countryvisa/' ;
                $file->move($destinationPath,$fileName);

                $cntvisa->upload_pdf = $fileName ;
            }

            $cntvisa->save() ;

          Session::flash('message', 'Successfully added!');
          return Redirect::to('/admin/countryvisa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the CountryVisa
       $cntvisa_data = CountryVisa::findOrFail($id);
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.countryvisa.edit', compact('cntvisa_data','countries'));
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
        $cntvisa = CountryVisa::find($id);
        // validate
        $this->validate($request, [
          	'country_id' => 'required',
            'upload_pdf' => 'required|mimes:pdf',
        ]);

        // Getting all data after success validation.
        $cntvisa->country_id = $request->get('country_id') ;
        $cntvisa->status = $request->get('status') ;

        //echo "<pre>"; print_r($request->file('upload_pdf'));die;

        if($file = $request->hasFile('upload_pdf')) {

            $file = $request->file('upload_pdf') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //original destination path
            $destinationPath = public_path().'/uploads/countryvisa/' ;
            $file->move($destinationPath,$fileName);

            $cntvisa->upload_pdf = $fileName ;
        }

        $cntvisa->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/countryvisa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function destroy($id)
    {
        //echo $id; die;
       // delete
        $cntvisaobj = CountryVisa::findOrFail($id);
        File::delete(public_path('/uploads/countryvisa/'. $cntvisaobj->upload_pdf));
        $cntvisaobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/countryvisa');
    }*/
     public function delete(Request $request,$id) {
        if($id) {
            $cntvisaobj = CountryVisa::find($id);
            $status = '2';
            $cntvisaobj->status = $status; 
            $del = $cntvisaobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/countryvisa');
            }
        }
    }
}
