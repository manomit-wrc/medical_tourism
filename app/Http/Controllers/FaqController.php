<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;
use App\FaqCategory;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class FaqController extends Controller
{
     public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $faqlist = Faq::with('faqcategory')->orderBy('faqcategory_id')->get()->toArray();        
        $data['faqlist'] = $faqlist;
       /* echo "<pre>";
        print_r($data['faqlist']);       
        die(); */
        return view('admin.faq.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category_list = \App\FaqCategory::get()->pluck('name','id')->toArray();
       //   return view('admin.genericmedicine.create');
       return view('admin.faq.create')->with(['category_list'=>$category_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required|unique:faqs', 
        'description' => 'required'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      Faq::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/faq');
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
       $conn_srvc_data = Faq::findOrFail($id);
       return view('admin.connectivityservices.edit')->with(array('conn_srvc_data'=> $conn_srvc_data));
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
        $connectivity = FaqCategory::find($id);
        // validate
        $this->validate($request, [
        'name' => 'required|unique:connectivity_services'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $connectivity->fill($input)->save();


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/connectivityservices');
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
        $con_serv_obj = FaqCategory::findOrFail($id);
        $con_serv_obj->delete();

        // redirect
        Session::flash('message', 'Successfully deleted');
        return Redirect::to('/admin/connectivityservices');
    }
}
