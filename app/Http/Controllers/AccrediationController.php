<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accrediation;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class AccrediationController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $accrediation_lists = Accrediation::all();
        //echo "<pre>"; print_r($accrediation_lists); die;
        return view('admin.accrediation.index')->with('accrediation_lists',$accrediation_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.accrediation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
	      // echo public_path(); die;
          $this->validate($request, [
            'name' => 'required|unique:accrediations',
            'accrediation_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
          ]);

            $accd = new Accrediation($request->input()) ;
            $accd->name = $request->get('name') ;

            if($file = $request->hasFile('accrediation_logo')) {

                $file = $request->file('accrediation_logo') ;

                $fileName = time().'_'.$file->getClientOriginalName() ;
                //thumb destination path
                $destinationPath = public_path().'/uploads/accrediations/thumb' ;
                $img = Image::make($file->getRealPath());

                $img->resize(100, 100, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);

                //original destination path
                $destinationPath = public_path().'/uploads/accrediations/' ;
                $file->move($destinationPath,$fileName);
                $accd->accrediation_logo = $fileName ;
            }

            $accd->save() ;

          Session::flash('message', 'Successfully added!');
          return Redirect::to('/admin/accrediation');
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
        // get the Accrediation
       $accrediations_data = Accrediation::findOrFail($id);
       return view('admin.accrediation.edit')->with('accrediations_data', $accrediations_data);
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
        $accd = Accrediation::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:accrediations',
        'accrediation_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        // Getting all data after success validation.
         $accd->name = $request->get('name') ;

        if($file = $request->hasFile('accrediation_logo')) {

            $file = $request->file('accrediation_logo') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;
            //thumb destination path
            $destinationPath = public_path().'/uploads/accrediations/thumb' ;
            $img = Image::make($file->getRealPath());

            $img->resize(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/accrediations/' ;
            $file->move($destinationPath,$fileName);
            $accd->accrediation_logo = $fileName ;
        }

        $accd->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/accrediation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

   /* public function destroy($id)
    {        
        $accobj = Accrediation::findOrFail($id);
        File::delete(public_path('/uploads/accrediations/'. $accobj->accrediation_logo));
        File::delete(public_path('/uploads/accrediations/thumb/'. $accobj->accrediation_logo));
        $accobj->delete();
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/accrediation');
    }*/
    public function delete(Request $request,$id) {
        if($id) {
            $accobj = Accrediation::find($id);
            if($accobj) {
                File::delete(public_path('/uploads/accrediations/'. $accobj->accrediation_logo));
                File::delete(public_path('/uploads/accrediations/thumb/'. $accobj->accrediation_logo));
                $accobj->delete();
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/accrediation');
            }
        }
    }
}
