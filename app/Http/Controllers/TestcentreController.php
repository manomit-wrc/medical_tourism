<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testcentre;
use App\Country;
use App\State;
use App\City;
use App\MedicalTestCategories;
use App\Medicaltest;  
use App\CentreMedicalTest;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use Image;
use File;
use Illuminate\Support\Facades\Route;

class TestcentreController extends Controller
{
	public function __construct() {
    	
    }

    public function index() {
        $testcentre_list = Testcentre::where('status', '!=', 2)->get();
        return view('admin.testcentre.index')->with('testcentre_list',$testcentre_list);
    }
    public function create()
    {
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       return view('admin.testcentre.create', compact('countries'));
    }
    public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); die;
        Validator::make($request->all(), [
            'name' => 'required',           
            'email_id' => 'required|email',
            'mobile_no' => 'required',            
            'address' => 'required',            
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',            
            'pincode' => 'required',            
            'avators' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=745,min_height=214'
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required'
        ])->validate();

      // Getting all data after success validation.
      
      $hptl = new Testcentre($request->input()) ;
      $hptl->name = $request->get('name') ;      
      $hptl->email_id = $request->  ('email_id') ;
      $hptl->mobile_no = $request->get('mobile_no') ;
      $hptl->address = $request->get('address') ;     
      $hptl->country_id = $request->get('country_id') ;
      $hptl->state_id = $request->get('state_id') ;
      $hptl->city_id = $request->get('city_id') ;      
      $hptl->pincode = $request->get('pincode') ;   
     	if($file = $request->hasFile('avators')) {
            $file = $request->file('avators') ;
            $fileName = time().'_'.$file->getClientOriginalName() ;
            //thumb destination path
            $destinationPath = public_path().'/uploads/testcentre/thumb' ;
            $img = Image::make($file->getRealPath());

            $img->resize(745, 214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/testcentre/' ;
            $file->move($destinationPath,$fileName);

            $hptl->avators = $fileName ;
        }
      $hptl->save() ;

      Session::flash('message', 'Successfully added!');
      return Redirect::to('/admin/testcentre');
    }

    public function edit($id)
    {
        // get the Hotel
       $cent_data = Testcentre::findOrFail($id);
       $countries = Country::orderBy('name')->pluck('name', 'id')->all();
       $states = State::orderBy('name')->pluck('name', 'id')->all();
       $cities = City::orderBy('name')->pluck('name', 'id')->all();          
       return view('admin.testcentre.edit', compact('cent_data','countries','states','cities'));
    }

    public function update($id,Request $request)
    {
        //echo $id; die;
        $hptl = Testcentre::find($id);
        // validate
        //echo "<pre>"; print_r($request->all()); die;
        Validator::make($request->all(), [
            'name' => 'required',           
            'email_id' => 'required|email',
           	'mobile_no' => 'required',            
            'address' => 'required',            
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',            
            'pincode' => 'required'                      
       ],[
        'country_id.required' => 'country field is required',
        'state_id.required' => 'state field is required',
        'city_id.required' => 'city field is required'
        ])->validate();

      // Getting all data after success validation.
      $hptl->name = $request->get('name') ;      
      $hptl->email_id = $request->get('email_id') ;
      $hptl->mobile_no = $request->get('mobile_no') ;
      $hptl->address = $request->get('address') ;     
      $hptl->country_id = $request->get('country_id') ;
      $hptl->state_id = $request->get('state_id') ;
      $hptl->city_id = $request->get('city_id') ;      
      $hptl->pincode = $request->get('pincode') ;
     

      if($file = $request->hasFile('avators')) {
            $file = $request->file('avators') ;
            $fileName = time().'_'.$file->getClientOriginalName() ;
            //thumb destination path
            $destinationPath = public_path().'/uploads/testcentre/thumb' ;
            $img = Image::make($file->getRealPath());
            $img->resize(745, 214, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);

            //original destination path
            $destinationPath = public_path().'/uploads/testcentre/' ;
            $file->move($destinationPath,$fileName);

            $hptl->avators = $fileName ;
        }
      $hptl->save() ;


        // redirect
        Session::flash('message', 'Successfully updated');
        return Redirect::to('/admin/testcentre');
    }

    public function medicaltest($id)
    { 
      $medicaltestcatdata = MedicalTestCategories::all();
      $hospitalmedicaltest = CentreMedicalTest::where('testcentre_id',$id)->get()->toArray();
      //echo "<pre>"; print_r($hospitalmedicaltest); die;
      foreach ($hospitalmedicaltest as $key => $value) {
          $data['medicaltest_array'][] = $value['medicaltest_id'];
          /* $data['medicaltest_array'][]['test_price'] = $value['test_price']; */
      }      
      foreach($medicaltestcatdata as $key => $val)
      {
        //$data['medicaltestdata']['catid'] = $val->id;
        //$data['medicaltestdata']['catname'] = $val->cat_name;
        $data1[] = array(
          'cat_id' => $val->id,
          'catname' => $val->cat_name,
          'testarr' => $this->gettestarr($val->id,$id)
        );
      }
      $data['medicaltestdata'] =$data1;
    // echo "<pre>"; print_r($data1); die;
      //echo "<pre>"; print_r($data['medicaltestdata']); die;
      //echo "<pre>"; print_r($medicaltestdata[0]->medicaltestcategories); die;        
      return view('admin.testcentre.medicaltest',$data);
    }

    public function gettestarr($cat_id,$testcentre_id) {
      $medicaltest = Medicaltest::where('medicaltestcategories_id',$cat_id)->get()->toArray();      
		    $data = array();
        foreach($medicaltest as $keyy => $vall)
        {      
          $data[] = array(
            'id' => $vall['id'],
            'testname' => $vall['test_name'],
            'test_price' => $this->gettestprice($vall['id'],$testcentre_id)                    
          );
        }
        return $data;
    }

    public function gettestprice($test_id,$testcentre_id) {
      $hospitalmedicaltest = CentreMedicalTest::where('testcentre_id',$testcentre_id)->where('medicaltest_id',$test_id)->get()->toArray();
      if(!empty($hospitalmedicaltest)){      
        if($hospitalmedicaltest[0]['test_price'] !=''){
          $data = $hospitalmedicaltest[0]['test_price'];
        }else{
          $data ='';
        }
      }else{
          $data ='';
      }
        return $data;
    }

    public function store_medicaltest(Request $request) {
      /*echo "<pre>"; print_r($request->all()); die;*/
      $testcentre_id = $request->testcentre_id;
      $medicaltestArr = $request->medicaltestArr;      
      if(count($medicaltestArr) > 0){
      // print_r($medicaltestArr); die();
      //echo $request->hospital_id;  die;
      //echo "<pre>"; print_r($request->treatmentArr); die;      
        //echo $hospital_id; die;
        $existRows = \App\CentreMedicalTest::where('testcentre_id', '=', $testcentre_id)->get();
        //echo "<pre>"; print_r($existRows); die;
        if(count($existRows)>0)
        {
          $affectedRows = \App\CentreMedicalTest::where('testcentre_id', '=', $testcentre_id)->delete();        
        }
        $test_price = '';
        foreach ($medicaltestArr as $key => $value) {
          $test_price = 'test_price'.$value;           
          $data[] = [
                'testcentre_id' => $testcentre_id,
                'medicaltest_id' => $value,
                'test_price' => $request->$test_price,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }       
        
        //echo "<pre>"; print_r($data); die;
        $result = \App\CentreMedicalTest::insert($data);
        Session::flash('message', 'Successfully added!');
        return Redirect::to('/admin/testcentre/medicaltest/'.$testcentre_id);
      }else{
        Session::flash('error_message', 'Please select medical test!');
        return Redirect::to('/admin/testcentre/medicaltest/'.$testcentre_id);
      }
    }

    public function ajaxstoremedicaltest(Request $request) {      
      $test_name = $request->test_name;
      $medicaltestcategories_id = $request->medicaltestcategories_id;
      $existRows = \App\Medicaltest::where('medicaltestcategories_id', '=', $medicaltestcategories_id)->where('test_name', '=', $test_name)->get();
        /*echo count($existRows); die;*/
       if(count($existRows)>0)
        {
          $returnArr = array('status'=>'3','msg'=>'Test name already exists on this category');
        } else{
      /*$data = [          
          'medicaltestcategories_id' => $medicaltestcategories_id,
          'test_name' => $test_name,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
      ];         
      $result = \App\Medicaltest::insert($data);
      echo "<pre>"; print_r($result); die; */
        $mt = new Medicaltest();
        $mt->medicaltestcategories_id = $medicaltestcategories_id;
        $mt->test_name = $test_name; 
        $mt->created_at = date('Y-m-d H:i:s'); 
        $mt->updated_at = date('Y-m-d H:i:s');         
        $mt->save();
        $lastinsert_id = $mt->id;
        if($lastinsert_id) {              
          $returnArr = array('status'=>'1','lastinsert_id'=>$lastinsert_id,'test_name'=>$test_name,'msg'=>'Inserted Successfully');
        }else{
          $returnArr = array('status'=>'0','msg'=>'Inserted Faliure');
        } 
      }    
        echo json_encode($returnArr);
        die(); 
    }

    public function ajaxtestchangestatus(Request $request) { 
        $id = $request->id;
        $status = $request->status;     
        $mt = Testcentre::find($id);
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
    public function delete(Request $request,$id) {
        if($id) {
            $hosobj = Testcentre::find($id);
            $status = '2';
            $hosobj->status = $status; 
            $del = $hosobj->save();
            if($del) {      
                $request->session()->flash("message", "Successfully deleted");
                return redirect('/admin/testcentre');
            }
        }
    }    
}
