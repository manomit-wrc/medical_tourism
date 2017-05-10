<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SuccessStories;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class SuccessStoryController extends Controller
{
    public function __construct() {
    	
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $succstory_lists = SuccessStories::all();
        //echo "<pre>"; print_r($succstory_lists); die;
        return view('admin.successstories.index')->with('succstory_lists',$succstory_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.successstories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'story_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214',
      ]);

      // Getting all data after success validation.
      
      $succstoryobj = new SuccessStories($request->input()) ;
      
      $succstoryobj->title = $request->get('title') ;
      $succstoryobj->description = $request->get('description') ;
      $succstoryobj->user_id = Auth::guard('admin')->user()->id;
           

        //echo "<pre>"; print_r($request->file('story_image'));die;

        if($file = $request->hasFile('story_image')) {

            $file = $request->file('story_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $thumbdestinationPath1 = public_path().'/uploads/successstories/thumb_200_200' ;
            $destinationPathThumb2 = public_path().'/uploads/successstories/thumb_745_214' ;

            $img = Image::make($file->getRealPath());

            $img->resize(243, 149, function ($constraint){
                $constraint->aspectRatio();
            })->save($thumbdestinationPath1.'/'.$fileName);

            $img->resize(745, 214, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPathThumb2.'/'.$fileName);

            //original destination path
            $originaldestinationPath = public_path().'/uploads/successstories/' ;
            $file->move($originaldestinationPath,$fileName);

            $succstoryobj->story_image = $fileName ;
        }

        $succstoryobj->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/successstories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
         $succstory_data = SuccessStories::findOrFail($id);
       //echo "<pre>"; print_r($succstory_data); die;
        return view('admin.successstories.show',compact('succstory_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       $succstory_data = SuccessStories::findOrFail($id);
       return view('admin.successstories.edit')->with('succstory_data', $succstory_data);
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
        $succstoryobj = SuccessStories::find($id);
        // validate
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'story_image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214',
      ]);

      // Getting all data after success validation.
      
      $succstoryobj->title = $request->get('title') ;
      $succstoryobj->description = $request->get('description') ;
         

        //echo "<pre>"; print_r($request->file('story_image'));die;

        if($file = $request->hasFile('story_image')) {

            $file = $request->file('story_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $thumbdestinationPath1 = public_path().'/uploads/successstories/thumb_200_200' ;
            $destinationPathThumb2 = public_path().'/uploads/successstories/thumb_745_214' ;

            $img = Image::make($file->getRealPath());

            $img->resize(200, 200, function ($constraint){
                $constraint->aspectRatio();
            })->save($thumbdestinationPath1.'/'.$fileName);

            $img->resize(745,214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb2.'/'.$fileName);

            //original destination path
            $originaldestinationPath = public_path().'/uploads/successstories/' ;
            $file->move($originaldestinationPath,$fileName);

            $succstoryobj->story_image = $fileName ;
        }

        $succstoryobj->save() ;

        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/successstories');
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
        $succstoryobj = SuccessStories::findOrFail($id);
        File::delete(public_path('/uploads/successstories/'. $succstoryobj->story_image));
        File::delete(public_path('/uploads/successstories/thumb_200_200/'. $succstoryobj->story_image));
        File::delete(public_path('/uploads/successstories/thumb_745_214/'. $succstoryobj->story_image));
        $succstoryobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/successstories');
    }
}
