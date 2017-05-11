<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procedure;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class ProcedureController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $procedure_lists = Procedure::where('status', '!=', 2)->get();
        //echo "<pre>"; print_r($langcapbes); die;
        return view('admin.procedure.index')->with('procedure_lists',$procedure_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.procedure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:procedures',
        'procedure_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=243,min_height=149',
      ]);

      // Getting all data after success validation.
      
      $procedureobj = new Procedure($request->input()) ;
      
      $procedureobj->name = $request->get('name') ;
           

        //echo "<pre>"; print_r($request->file('procedure_image'));die;

        if($file = $request->hasFile('procedure_image')) {

            $file = $request->file('procedure_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPath = public_path().'/uploads/procedures/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(243, 149, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/procedures/' ;
            $file->move($destinationPath,$fileName);

            $procedureobj->procedure_image = $fileName ;
        }

        $procedureobj->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/procedure');
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
        // get the procedure
       $procedures_data = Procedure::findOrFail($id);
       return view('admin.procedure.edit')->with('procedures_data', $procedures_data);
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
        $procedureobj = Procedure::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required',
        'procedure_image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=243,min_height=149',
        ]);

        // Getting all data after success validation.
        $procedureobj->name = $request->get('name') ;
        $procedureobj->status = $request->get('status') ;
       

        //echo "<pre>"; print_r($request->file('procedure_image'));die;

        if($file = $request->hasFile('procedure_image')) {

            $file = $request->file('procedure_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPath = public_path().'/uploads/procedures/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/procedures/' ;
            $file->move($destinationPath,$fileName);

            $procedureobj->procedure_image = $fileName ;
        }

        $procedureobj->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/procedure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    /* public function destroy($id)
    {       
        $procobj = Procedure::findOrFail($id);
        File::delete(public_path('/uploads/medicalfacilities/'. $procobj->banner_image));
        File::delete(public_path('/uploads/medicalfacilities/thumb/'. $procobj->banner_image));
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/procedure');
    } */
	/* public function delete(Request $request,$id) {
        if($id) {
            $pro_details = Procedure::find($id);
            if($pro_details) {
                File::delete(public_path('/uploads/medicalfacilities/'. $pro_details->banner_image));
                File::delete(public_path('/uploads/medicalfacilities/thumb/'. $pro_details->banner_image));          
                $pro_details->delete();
             $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/procedure');
            }
        }
    } */
	public function delete(Request $request,$id) {
        if($id) {
            $pro_details = Procedure::find($id);
            $status = '2';
            $pro_details->status = $status; 
            $del = $pro_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/procedure');
            }
        }
    }
}
