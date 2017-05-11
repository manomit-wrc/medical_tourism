<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPageDetail;
use App\Cmspage;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
class CmspageDetailsController extends Controller
{
    public function __construct() {

    }
    public function index() {
        $cmspagedtl = CmsPageDetail::with('cmspage')->orderBy('cmspage_id')->get()->toArray();        
        $data['cmspagedtl'] = $cmspagedtl;
       	/* echo "<pre>";print_r($data['cmspagedtl']);  die(); */
        return view('admin.cmspagedetail.index',$data); 
    }
    public function create()
    {
        $cmspage_id_list = Cmspage::get()->pluck('pagename','id')->toArray();
       //   return view('admin.genericmedicine.create');
       return view('admin.cmspagedetail.create')->with(['cmspage_id_list'=>$cmspage_id_list]);
    }
    public function store(Request $request)
    {
      $this->validate($request, [
        'slag' => 'required|unique:cmspage_details'.$request->get('id'), 
        'description' => 'required',
        'cmspage_id' => 'required'
      ]);

      // Getting all data after success validation.
      //dd($request->all());
      $input = $request->all();

      CmsPageDetail::create($input);
      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/cmspagedetail');
    }
    public function edit($id)
    {
       // get the Connectivity
       $cmspagedata = CmsPageDetail::findOrFail($id);       
       $cmspage_id_list = \App\Cmspage::get()->pluck('pagename','id')->toArray();     
       return view('admin.cmspagedetail.edit')->with(array('cmspagedata'=> $cmspagedata,'cmspage_id_list'=> $cmspage_id_list));
    }
    public function update($id,Request $request)
    {
       //echo $id; die;
        $cmp = CmsPageDetail::find($id);
        // validate
        $this->validate($request, [        
        'description' => 'required',
        'cmspage_id' => 'required'
        ]);

        // Getting all data after success validation.
        $input = $request->all();
        //echo "<pre>"; print_r($input); die;
        $cmp->fill($input)->save();
        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/cmspagedetail');
    }
    /* public function delete(Request $request,$id) {
      if($id) {
        $cms_details = CmsPageDetail::find($id);
        if($cms_details) {          
          $cms_details->delete();
          $request->session()->flash("message", "Successfully deleted");
          return redirect('/admin/cmspagedetail');
        }
      }
    } */
}
