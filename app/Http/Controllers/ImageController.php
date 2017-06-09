<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Images;
use Redirect;
use Session;
use Image;

class ImageController extends Controller
{
    public function getForm($id)
	{
		$album = Album::find($id);
		return view('admin.images.addimage',compact('album'));
	}
	
	public function postAdd(Request $request)
	{
		
		/*$rules = array(
		'album_id' => 'required|numeric|exists:albums,id',
		'image'=>'required|image'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
		    return Redirect::route('add_image',array('id' =>Input::get('album_id')))->withErrors($validator)->withInput();
		}*/

		 $this->validate($request, [
            'album_id' => 'required|numeric|exists:albums,id',
		    'image'=>'required|image'
          ]);

		$file = $request->file('image');
		$random_name = str_random(8);
		$destinationPath =  public_path().'/uploads/albums/';
		$extension = $file->getClientOriginalExtension();
		$filename=$random_name.'_album_image.'.$extension;
		$uploadSuccess = $request->file('image')->move($destinationPath, $filename);
		
		Images::create(array(
			'description' => $request->get('description'),
			'image' => $filename,
			'album_id'=> $request->get('album_id')
		));

		//return Redirect::route('showalbum',array('id'=>Input::get('album_id')));
		Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/albums/showalbum/'.$request->get('album_id'));
	}

	public function getDelete($id)
	{
		$image = Image::find($id);
		$image->delete();
		return Redirect::route('show_album',array('id'=>$image->album_id));
	}
}
