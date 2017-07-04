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
        $faqlist = Faq::with('faqcategory')->orderBy('faqcategory_id')->where('status', '!=', 2)->orderBy('title','asc')->get()->toArray();     
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
        $category_list = FaqCategory::orderBy('name','asc')->get()->pluck('name','id')->toArray();
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
        'description' => 'required',
        'faqcategory_id' => 'required'
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
       $faqdata = Faq::findOrFail($id);       
       $category_list = FaqCategory::orderBy('name','asc')->get()->pluck('name','id')->toArray();      
       return view('admin.faq.edit')->with(array('faqdata'=> $faqdata,'category_list'=> $category_list));
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
        $faq = Faq::find($id);
        // validate
        $this->validate($request, [
        'title' => 'required|unique:faqs,title,'.$id,
        'description' => 'required',
        'faqcategory_id' => 'required'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $faq->fill($input)->save();
        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */ 

   /* public function delete(Request $request,$id) {
      if($id) {
        $faq_details = Faq::find($id);
        if($faq_details) {          
          $faq_details->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/faq');
        }
      }
    } */
    public function delete(Request $request,$id) {
        if($id) {
            $faq_details = Faq::find($id);
            $status = '2';
            $faq_details->status = $status; 
            $del = $faq_details->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/faq');
            }
        }
    }
    public function ajaxfaqchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Faq::find($id);
       /* if ($status == 1){
            $stat = 0;
        }
        if ($status == 0){
            $stat = 1;
        } */      
        $mt->status = $status; 
        $upd = $mt->save();        
        if($upd) {              
          $returnArr = array('status'=>'1','msg'=>'Updateed Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        }          
        echo json_encode($returnArr);
        die();
    }
}
