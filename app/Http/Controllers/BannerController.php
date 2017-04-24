<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;

class BannerController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $banner_lists = Banner::all();
        //echo "<pre>"; print_r($banner_lists); die;
        return view('admin.banner.index')->with('banner_lists',$banner_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.banner.create');
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
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1700,height=601',
            'banner_heading' => 'required',
            'banner_url' => 'required|url',
          ]);

        
            $bannr = new Banner($request->input()) ;
            $bannr->banner_heading = $request->get('banner_heading') ;
            $bannr->banner_sub_heading = $request->get('banner_sub_heading') ;
            $bannr->banner_heading = $request->get('banner_heading') ;
            $bannr->banner_url = $request->get('banner_url') ;

            //echo "<pre>"; print_r($request->file('banner_image'));die;

            if($file = $request->hasFile('banner_image')) {
                
                $file = $request->file('banner_image') ;
                
                $fileName = time().'_'.$file->getClientOriginalName() ;
               
                //thumb destination path
                $destinationPath = public_path().'/uploads/banners/thumb' ;

                $img = Image::make($file->getRealPath());

                $img->resize(100, 100, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$fileName);
                
                //original destination path
                $destinationPath = public_path().'/uploads/banners/' ;
                $file->move($destinationPath,$fileName);

                $bannr->banner_image = $fileName ;
            }
            
            $bannr->save() ;
      
          Session::flash('message', 'Successfully added!');
          return Redirect::to('/admin/banner');
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
       $banners_data = Banner::findOrFail($id);
       return view('admin.banner.edit')->with('banners_data', $banners_data);
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
        $bannr = Banner::find($id);
        // validate
        $this->validate($request, [
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1700,height=601',
            'banner_heading' => 'required',
            'banner_url' => 'required|url',
        ]);
      
        // Getting all data after success validation.
        $bannr->banner_heading = $request->get('banner_heading') ;
        $bannr->banner_sub_heading = $request->get('banner_sub_heading') ;
        $bannr->banner_heading = $request->get('banner_heading') ;
        $bannr->banner_url = $request->get('banner_url') ;

        //echo "<pre>"; print_r($request->file('banner_image'));die;

        if($file = $request->hasFile('banner_image')) {
            
            $file = $request->file('banner_image') ;
            
            $fileName = time().'_'.$file->getClientOriginalName() ;
           
            //thumb destination path
            $destinationPath = public_path().'/uploads/banners/thumb' ;

            $img = Image::make($file->getRealPath());

            $img->resize(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            
            //original destination path
            $destinationPath = public_path().'/uploads/banners/' ;
            $file->move($destinationPath,$fileName);

            $bannr->banner_image = $fileName ;
        }
        
        $bannr->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/banner');
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
        $procobj = Banner::findOrFail($id);
        $procobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/banner');
    }
}
