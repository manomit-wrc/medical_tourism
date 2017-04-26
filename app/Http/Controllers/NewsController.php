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
        'description' => 'required'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      News::create($input);
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
        'description' => 'required'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $nws->fill($input)->save();


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
