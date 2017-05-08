<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalFacility;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class MedicalFacilityController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $medfac_lists = MedicalFacility::all();
        //echo "<pre>"; print_r($medfac_lists); die;
        return view('admin.medicalfacility.index')->with('medfac_lists',$medfac_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.medicalfacility.create');
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
          	'name' => 'required',
            'description' => 'required',
            'facility_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214',
          ]);


            $medfacobj = new MedicalFacility($request->input()) ;
            $medfacobj->name = $request->get('name') ;
            $medfacobj->description = $request->get('description') ;

            //echo "<pre>"; print_r($request->file('facility_image'));die;

            if($file = $request->hasFile('facility_image')) {

                $file = $request->file('facility_image') ;

                $fileName = time().'_'.$file->getClientOriginalName() ;

                //thumb destination path
                $destinationPathThumb1 = public_path().'/uploads/medicalfacilities/thumb_243_149' ;
                $destinationPathThumb2 = public_path().'/uploads/medicalfacilities/thumb_352_170' ;
                $destinationPathThumb3 = public_path().'/uploads/medicalfacilities/thumb_745_214' ;

                $img = Image::make($file->getRealPath());

                $img->resize(243, 149, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPathThumb1.'/'.$fileName);

                $img->resize(352, 170, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPathThumb2.'/'.$fileName);

                $img->resize(745, 214, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPathThumb3.'/'.$fileName);

                //original destination path
                $destinationPathOriginal = public_path().'/uploads/medicalfacilities/' ;
                $file->move($destinationPathOriginal,$fileName);

                $medfacobj->facility_image = $fileName ;
            }

            $medfacobj->save() ;

          Session::flash('message', 'Successfully added!');
          return Redirect::to('/admin/medicalfacility');
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
        // get the Banner
       $medfac_data = MedicalFacility::findOrFail($id);
       return view('admin.medicalfacility.edit')->with('medfac_data', $medfac_data);
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
        $facmedobj = MedicalFacility::find($id);
        // validate
        $this->validate($request, [
          	'name' => 'required',
            'description' => 'required',
            'facility_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214',
        ]);

        // Getting all data after success validation.
        $facmedobj->name = $request->get('name') ;
        $facmedobj->description = $request->get('description') ;

        //echo "<pre>"; print_r($request->file('banner_image'));die;

        if($file = $request->hasFile('banner_image')) {

            $file = $request->file('banner_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPathThumb1 = public_path().'/uploads/medicalfacilities/thumb_243_149' ;
            $destinationPathThumb2 = public_path().'/uploads/medicalfacilities/thumb_352_170' ;
            $destinationPathThumb3 = public_path().'/uploads/medicalfacilities/thumb_745_214' ;

            $img = Image::make($file->getRealPath());

            $img->resize(243, 149, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb1.'/'.$fileName);

            $img->resize(352, 170, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb2.'/'.$fileName);

             $img->resize(745,214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb3.'/'.$fileName);

            //original destination path
            $destinationPathoriginal = public_path().'/uploads/medicalfacilities/' ;
            $file->move($destinationPathoriginal,$fileName);

            $facmedobj->banner_image = $fileName ;
        }

        $facmedobj->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/medicalfacility');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
        //echo $id; die;
       // delete
        $medfacobj = MedicalFacility::findOrFail($id);
        File::delete(public_path('/uploads/medicalfacilities/'. $medfacobj->banner_image));
        File::delete(public_path('/uploads/medicalfacilities/thumb/'. $medfacobj->banner_image));
        $medfacobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/medicalfacility');
    }
}
