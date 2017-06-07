<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Images;
//use Validator;
//use Input;
use Redirect;
use Session;

class AlbumsController extends Controller
{
    public function getList()
	{
	   $albums = Album::with('Photos')->get();
	   return view('admin.albums.index',compact('albums'));
	}
	public function getAlbum($id)
	{
	   $album = Album::with('Photos')->find($id);
	   return view('admin.albums.album',compact('album'));
	}
	public function getForm()
	{
	   return view('admin.albums.createalbum');
	}
	
	public function postCreate(Request $request)
	{
		/*$rules = array(
		'name' => 'required',
		'cover_image'=>'required|image'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
		   return Redirect::route('create_album_form')->withErrors($validator)->withInput();
		}*/
        
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image'
          ]);


		$file = $request->file('cover_image');
		$random_name = str_random(8);
		$destinationPath = public_path().'/uploads/albums/';
		$extension = $file->getClientOriginalExtension();
		$filename=$random_name.'_cover.'.$extension;
		$uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
		$album = Album::create(array(
		'name' => $request->get('name'),
		'description' => $request->get('description'),
		'cover_image' => $filename,
		));
	    //return Redirect::route('show_album',array('id'=>$album->id));
	    Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/albums');
   }

    public function getUpdateForm($id)
	{
	   $albums = Album::findOrFail($id);	
	   return view('admin.albums.updatealbum',compact('albums'));
	}
	
	public function postUpdate(Request $request)
	{
		/*$rules = array(
		'name' => 'required',
		'cover_image'=>'required|image'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
		   return Redirect::route('create_album_form')->withErrors($validator)->withInput();
		}*/
        
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image'
          ]);


		$file = $request->file('cover_image');
		$random_name = str_random(8);
		$destinationPath = public_path().'/uploads/albums/';
		$extension = $file->getClientOriginalExtension();
		$filename=$random_name.'_cover.'.$extension;
		$uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
		$album = Album::create(array(
		'name' => $request->get('name'),
		'description' => $request->get('description'),
		'cover_image' => $filename,
		));
	    //return Redirect::route('show_album',array('id'=>$album->id));
	    Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/albums');
   }
	public function getDelete($id)
	{
	   $album = Album::find($id);
	   $album->delete();
	   Session::flash('message', 'Successfully deleted!');
	   return Redirect::to('/admin/albums');
	}
}
