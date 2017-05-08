<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FaqCategory;
use App\Faq;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class FaqCategoryController extends Controller
{
     public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$faq_cat_data = FaqCategory::all();
        //echo "<pre>"; print_r($faq_cat_data); die;
        return view('admin.faqcategories.index')->with('faq_cat_data',$faq_cat_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('admin.faqcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|unique:faq_categories'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      FaqCategory::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/faqcategories');
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

       // get the Connectivity
       $faq_cat_data = FaqCategory::findOrFail($id);
       return view('admin.faqcategories.edit')->with(array('faq_cat_data'=> $faq_cat_data));
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
        $faqcat = FaqCategory::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:faq_categories'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $faqcat->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/faqcategories');
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
        $faq_cat = FaqCategory::findOrFail($id);
        $faq_cat->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/faqcategories');
    }
}
