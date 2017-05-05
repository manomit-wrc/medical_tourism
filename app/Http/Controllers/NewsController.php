<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;

class NewsController extends Controller
{
     public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$news_data = News::all();
        //echo "<pre>"; print_r($news_data); die;
        return view('admin.news.index')->with('news_data',$news_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required|unique:news',
        'description' => 'required',
        'news_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214'
      ]);

        $newscobj = new News($request->input()) ;
        $newscobj->title = $request->get('title') ;
        $newscobj->description = $request->get('description') ;

        //echo "<pre>"; print_r($request->file('news_image'));die;

        if($file = $request->hasFile('news_image')) {

            $file = $request->file('news_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPathThumb2 = public_path().'/uploads/news/thumb_352_170' ;
            $destinationPathThumb3 = public_path().'/uploads/news/thumb_745_214' ;

            $img = Image::make($file->getRealPath());

            $img->resize(352, 170, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb2.'/'.$fileName);

            $img->resize(745, 214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb3.'/'.$fileName);

            //original destination path
            $destinationPathOriginal = public_path().'/uploads/news/' ;
            $file->move($destinationPathOriginal,$fileName);

            $newscobj->news_image = $fileName ;
        }

        $newscobj->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/news');
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
       // get the news
       $news_data = News::findOrFail($id);
       return view('admin.news.edit')->with(array('news_data'=> $news_data));
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
        $nws = News::find($id);
        // validate
        $this->validate($request, [
        'title' => 'required|unique:news',
        'description' => 'required',
        'news_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214',
        ]);

        // Getting all data after success validation.
        $nws->title = $request->get('title') ;
        $nws->description = $request->get('description') ;

        //echo "<pre>"; print_r($request->file('news_image'));die;

        if($file = $request->hasFile('news_image')) {

            $file = $request->file('news_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            $destinationPathThumb2 = public_path().'/uploads/news/thumb_352_170' ;
            $destinationPathThumb3 = public_path().'/uploads/news/thumb_745_214' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(352, 170, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb2.'/'.$fileName);

             $img->resize(745,214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPathThumb3.'/'.$fileName);

            //original destination path
            $destinationPathoriginal = public_path().'/uploads/news/' ;
            $file->move($destinationPathoriginal,$fileName);

            $nws->news_image = $fileName ;
        }

        $nws->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/news');
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
        $trtmntobj = Treatment::findOrFail($id);
        $trtmntobj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/treatment');
    }
}
