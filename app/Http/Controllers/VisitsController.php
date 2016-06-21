<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Promoter;
use App\Contractor;
use Request;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Exception;
use Response;
use Carbon;
use Session;
use Flash;


class VisitsController extends Controller
{
 

 public function index()
 {
    
     $visits = Visit::all();
  
  return view('visits.index',compact('visits'));
  
}

 
  
 public function create()
 { 
  //try
  //{
 $promoters = Promoter::all();
  $contractors=Contractor::all();

 
  return view('visits.create',compact('contractors','promoters'));
 //}
//catch (Exception $e)
//{ return redirect('/visits');
//}
}

 /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
 public function store()
 { 
  
  $input = request()->all();
    $rules = array(
     //'Pormoter_Id' => 'required|exists:promoters,Pormoter_Id'.$input['Pormoter_Id'],
  //  'Contractor_Id' => 'required|exists:promoters,Pormoter_Id,Contractor_Id,'.$input['Contractor_Id'],

         'Date_Visit_Call' => array('required','date'),
        'OrderNo' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
         'Points'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Cement_Quantity' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/','min:0'),
        'Pormoter_Id'   => array('required','not_in:0'),
        'Contractor_Id'   => array('required','not_in:0'),
        'Government'  => array('not_in:0')
     //  'Cement_Type' => "required|in:ﺪﺟﻮﻳ ﻻ,ﺲﺒﺠﻟا,ﻡﻭﺎﻘﻤﻟا ﺖﻨﻤﺳﺃ,ﺭﺎﻨﻔﻟا ﺖﻨﻤﺳﺃ,ﺱﺪﻨﻬﻤﻟا ﺖﻨﻤﺳﺃ,ﺭﺎﻨﻔﻟا ﺖﻨﻤﺳ,ﺱﺪﻨﻬﻤﻟا ﺖﻨﻤﺳﺃ,ﻯﺩﺎﻌﻟا ﺖﻤﺳﺃ,ﻯﺪﻴﻌﺼﻟا ﺖﻨﻤﺳﺃ,2 ﺪﻬﻔﻟا ﺖﻨﻤﺳﺃ,ﺪﻬﻔﻟا ﺖﻨﻤﺳﺃ",
         //'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

        $messages = array(
    'required' => 'ﺕﺎﻧﺎﻴﺒﻟا ﻝﺎﺧﺩا ءﺎﺟﺮﺑ',
    'unique'=> 'ﺓﺩﻮﺟﻮﻣ ﻢﻴﻘﻟا ﻩﺬﻫ',
    'digits_between'=>'ﺢﻴﺤﺼﻟا ﻢﻗﺮﻟا ﻞﺧﺩا',
    'email'=>'ﺔﺤﻴﺤﺻ ﺔﻘﻳﺮﻄﺑ ﻞﻴﻤﻳﻻا ﻞﺧﺩا',
    'string'=>'ﻡﺎﻗﺭﺃ ﻥﻭﺪﺑ ﺔﺤﻴﺤﺼﻟا ﻢﻴﻘﻟا ﻞﺧﺩا',
    'between'=>'ﺢﻴﺤﺼﻟا ﻢﻗﺮﻟا ﻞﺧﺩا',
    'integer'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
      'digits'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
      'min'=>'ﺔﺤﻴﺤﺻ ﻢﻴﻗ ﻞﺧﺩا',
    //'max'=>'ﻞﺧﺩاf ﺔﺤﻴﺤﺻ ﻢﻴﻗ',
     'numeric'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
     'regex'=>'ﻂﻘﻓ ﻑﻭﺮﺣ ﻞﺧﺩا',
     'OrderNo.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'Points.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'Cement_Quantity.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'Government.regex'=>'ﻂﻘﻓ ﻑﻭﺮﺣ ﻞﺧﺩﺃ',
     'date'=>'ﺦﻳﺭﺎﺗ ﻞﺧﺩﺃ ',
     'alpha'=> 'ﻂﻘﻓ ﻑﻭﺮﺣ ﻞﺧﺩﺃ',
     'not_in'=>'ﺔﻤﻴﻗ ﺭﺎﺘﺧﺃ',
     'in'=>'ﺔﻤﻴﻗ ﺭﺎﺘﺧﺃ'

);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {
 // $messages = $validator->messages();
 // return $messages;
  return redirect('/visits/create')->withErrors($validator)->withInput();
}

        else

        {  



        
 

       $Pormoter_Id=$input['Pormoter_Id'];
        $Contractor_Id=$input['Contractor_Id'];
  $Date_Visit_Call=$input['Date_Visit_Call'];
          $Visit_Reason=$input['Visit_Reason'];
  
       $tdt = Carbon::now()->startOfMonth()->format('Y-m-d');
     $fdt = Carbon::now()->format('Y-m-d');
     $range=array($tdt, $fdt);



             $results = DB::table('visits')
             ->select( DB::raw('count(*) as total'))
             ->where('Pormoter_Id','=',$Pormoter_Id)
            ->where('Visit_Reason','=',$Visit_Reason)
            ->where('Contractor_Id','=',$Contractor_Id)
            ->whereBetween('Date_Visit_Call',$range)
             //->groupBy('Visit_Reason')
             ->lists('total');
     // dd($results);
        $count=$results[0];
             //dd($count);
  if($count<3 && $Visit_Reason=="ﻖﻳﻮﺴﺗ" && $count>=0) 
  {
  
  $visits= new Visit;
  
  $visits->Adress=Request::get('Adress');
  $visits->Backcheck =Request::get('Backcheck');
  $visits->Comments =Request::get('Comments');
  $visits->Cement_Type = Request::get('Cement_Type');
  $visits->Date_Visit_Call=Request::get('Date_Visit_Call');
  $visits->Government =Request::get('Government');
  $visits->GPS =Request::get('GPS');
  $visits->OrderNo =Request::get('OrderNo');
  $visits->Cement_Quantity =Request::get('Cement_Quantity');
  $visits->Points =Request::get('Points');
  $visits->Project_Type =Request::get ('Project_Type');
  $visits->Call_Reason =Request::get('Call_Reason');
  $visits->Visit_Reason =Request::get('Visit_Reason');
  $visits->Project_Current_State =Request::get('Project_Current_State');
  $visits->CV_Comments =Request::get('CV_Comments');
  $visits->Contractor_Id = $input['Contractor_Id'];
  $visits->Pormoter_Id = $input['Pormoter_Id'];
         $visits->save();
              return redirect('/visits');
             }


     elseif( $Visit_Reason=="ﺕﺎﻌﻴﺒﻣ"||$Visit_Reason=="ﻯﺮﺧﺃ")
              {
            $visits= new Visit;
  
  $visits->Adress=Request::get('Adress');
  $visits->Backcheck =Request::get('Backcheck');
  $visits->Comments =Request::get('Comments');
  $visits->Cement_Type = Request::get('Cement_Type');
  $visits->Date_Visit_Call=Request::get('Date_Visit_Call');
  $visits->Government =Request::get('Government');
  $visits->GPS =Request::get('GPS');
  $visits->OrderNo =Request::get('OrderNo');
  $visits->Cement_Quantity =Request::get('Cement_Quantity');
  $visits->Points =Request::get('Points');
  $visits->Project_Type =Request::get ('Project_Type');
  $visits->Call_Reason =Request::get('Call_Reason');
  $visits->Visit_Reason =Request::get('Visit_Reason');
  $visits->Project_Current_State =Request::get('Project_Current_State');
  $visits->CV_Comments =Request::get('CV_Comments');
  $visits->Contractor_Id = $input['Contractor_Id'];
  $visits->Pormoter_Id = $input['Pormoter_Id'];
         $visits->save();
         return redirect('/visits');
              }
              else
              {
          
               return redirect('/error');
              }

 
}
}


 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
 public function show($Visits_id)
 {  
 
  
  $visits=Visit::findOrFail($Visits_id);
 
  return view('visits.show')->with('visits', $visits);

}
//catch (Exception $e)
//{ return redirect('/visits');
//}
 //}

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
 public function edit($id)

 {
 
 $visits=Visit::find($id);
 

  $visits=Visit::find($id);
  $promoters = Promoter::all();
    $contractors= Contractor::all();
 return view('visits.edit',compact('visits','contractors','promoters'));
}
 

 /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
 public function update($id)
 {   
 
$input = request()->all();
  $visits= Visit::find($id);
  $rules = array(

   'Date_Visit_Call' => array('date'),
        'OrderNo' => array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'Pormoter_Id'   => array('required','not_in:0'),
        'Contractor_Id'   => array('required','not_in:0'),
        'Government'  => array('not_in:ﺔﻈﻓﺎﺤﻣ ﺮﺘﺧﺃ'),
      
       'Cement_Quantity' =>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Points'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
     //'Cement_Type' => "required|in:ﺪﺟﻮﻳ ﻻ,ﺲﺒﺠﻟا,ﻡﻭﺎﻘﻤﻟا ﺖﻨﻤﺳﺃ,ﺭﺎﻨﻔﻟا ﺖﻨﻤﺳﺃ,ﺱﺪﻨﻬﻤﻟا ﺖﻨﻤﺳﺃ,ﺭﺎﻨﻔﻟا ﺖﻨﻤﺳ,ﺱﺪﻨﻬﻤﻟا ﺖﻨﻤﺳﺃ,ﻯﺩﺎﻌﻟا ﺖﻤﺳﺃ,ﻯﺪﻴﻌﺼﻟا ﺖﻨﻤﺳﺃ,2 ﺪﻬﻔﻟا ﺖﻨﻤﺳﺃ,ﺪﻬﻔﻟا ﺖﻨﻤﺳﺃ",
         'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

        $messages = array(
    'required' => 'ﺕﺎﻧﺎﻴﺒﻟا ﻝﺎﺧﺩا ءﺎﺟﺮﺑ',
    'unique'=> 'ﺓﺩﻮﺟﻮﻣ ﻢﻴﻘﻟا ﻩﺬﻫ',
    'digits_between'=>'ﺢﻴﺤﺼﻟا ﻢﻗﺮﻟا ﻞﺧﺩا',
    'email'=>'ﺔﺤﻴﺤﺻ ﺔﻘﻳﺮﻄﺑ ﻞﻴﻤﻳﻻا ﻞﺧﺩا',
    'string'=>'ﻡﺎﻗﺭﺃ ﻥﻭﺪﺑ ﺔﺤﻴﺤﺼﻟا ﻢﻴﻘﻟا ﻞﺧﺩا',
    'between'=>'ﺢﻴﺤﺼﻟا ﻢﻗﺮﻟا ﻞﺧﺩا',
    'integer'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
      'digits'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
      'min'=>'ﺔﺤﻴﺤﺻ ﻢﻴﻗ ﻞﺧﺩا',
    //'max'=>'ﻞﺧﺩاf ﺔﺤﻴﺤﺻ ﻢﻴﻗ',
     'numeric'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩا',
     'regex'=>'ﻂﻘﻓ ﻑﻭﺮﺣ ﻞﺧﺩا',
     'OrderNo.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'Points.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'Cement_Quantity.regex'=>'ﻂﻘﻓ ﻡﺎﻗﺭا ﻞﺧﺩﺃ',
     'date'=>'ﺦﻳﺭﺎﺗ ﻞﺧﺩﺃ ',
     'alpha'=> 'ﻂﻘﻓ ﻑﻭﺮﺣ ﻞﺧﺩﺃ',
     'in'=>'ﺔﻤﻴﻗ ﺭﺎﺘﺧﺃ'
);
  $validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {

  return redirect('/visits/'.$id.'/edit')->withErrors($validator)->withInput();
}


  $visits->Adress=Request::get('Adress');
  $visits->Backcheck =Request::get('Backcheck');
  $visits->Comments =Request::get('Comments');
  $visits->Cement_Type =Request::get('Cement_Type');
  $visits->Date_Visit_Call=Request::get('Date_Visit_Call');
  $visits->Government =Request::get('Government');
  $visits->GPS =Request::get('GPS');
  $visits->OrderNo =Request::get('OrderNo');
  $visits->Project_Current_State =Request::get('Project_Current_State');
  $visits->Points =Request::get('Points');
  $visits->Project_Type =Request::get ('Project_Type');
  $visits->Call_Reason =Request::get('Call_Reason');
  $visits->Visit_Reason =Request::get('Visit_Reason');
  $visits->Cement_Quantity =Request::get('Cement_Quantity');
  $visits->CV_Comments =Request::get('CV_Comments');
     $visits->Contractor_Id = $input['Contractor_Id'];
  $visits->Pormoter_Id = $input['Pormoter_Id'];
  $visits->save();
  return redirect('/visits'); 
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
 public function destroy($id)
 {
    $visits=Visit::find($id);
  $visits->delete();
  return redirect('/visits');

 }

 public function ValidateVisit($data){
  	if(!isset($GLOBALS['visits'])) { $GLOBALS['visits']= array(); }
  	if(!isset($GLOBALS['cont_visits']) ) {$GLOBALS['cont_visits'] = array();} 
  	if(!isset($GLOBALS['pro_visits']) ) {$GLOBALS['pro_visits']= array();} 

  	if(!isset($VisitsErr)) {$VisitsErr= 'بيانات الزيارة غير صحيحة للمقاول صاحب لتليفون: ';} 
  	if(!isset($NoContVisitsErr)) {$NoContVisitsErr= 'لا يوجد مقاول للزيارة التي بتاريخ: '; }
  	if(!isset($NoProVisitsErr)) {$NoProVisitsErr = 'لا يوجد مندوب للزيارة التي بتاريخ: '; }

$data['date_visit_call'] = strtotime($data['date_visit_call']);
$data['date_visit_call'] = date('Y-m-d',$data['date_visit_call']);

  $visit =new Visit();
  $visit->Month =$data['month'];
	$visit->Date_Visit_Call =$data['date_visit_call'];
	$visit->Seller_Name =$data['seller_name'];
	$id= Contractor::where('Tele1',$data['tele1'])->pluck('Contractor_Id')->first();
	$visit->Contractor_Id =$id;
	$visit->Government =$data['government'];
	$visit->City =$data['city'];
	$visit->Project_Type =$data['project_type'];
	$visit->Adress =$data['adress'];
	$visit->GPS =$data['gps'];
	$visit->Visit_Reason =$data['visit_reason'];
	$visit->Call_Reason =$data['call_reason'];
	$visit->Project_Current_State=$data['project_current_state'];
  $visit->Cement_Type=$data['cement_type'];
	$visit->Cement_Quantity =$data['cement_quantity'];
	$visit->Points =$data['points'];
	$visit->Backcheck =$data['backcheck'];
	$Pormoter_Id= Contractor::where('Contractor_Id',$id)->pluck('Pormoter_Id')->first();
	$visit->Pormoter_Id =$Pormoter_Id;

//required and regex values check
$gov_regex = preg_match('/^[\pL\s]+$/u' , $data['government']); 
$city_regex = preg_match('/^[\pL\s]+$/u' , $data['city']);
$month_regex = preg_match('/^[0-9]{1,2}$/' , $data['month']);
$Vdate= explode (' ',$data['date_visit_call']);
$Vdate_regex = preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/' , $Vdate[0]);
$project_comment_regex = preg_match('/^[\pL\s]+$/u' , $data['project_type_comments']);
$cv_comment_regex = preg_match('/^[\pL\s]+$/u' , $data['cv_comments']);
$Comments_regex = preg_match('/^[\pL\s]+$/u' , $data['comments']);
$Cement_Quantity_regex = preg_match('/^[0-9]*$/' , $data['cement_quantity']);
$points_regex = preg_match('/^[0-9]*$/' , $data['points']);
$OrderNo_regex = preg_match('/^[0-9]*$/' , $data['order_no']);
$seller_regex=preg_match('/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u',$data['seller_name']);
$project_state_regex = preg_match('/^[\pL\s]+$/u' , $data['project_current_state']);

//required data
  	if ($data['government'] != null && $gov_regex ==1) {
  		if ($data['city'] != null && $city_regex ==1) {
  			if ($data['month']!= null && $month_regex ==1) {
  				if ($data['adress'] != null) {
  					if ($data['date_visit_call'] != null && $Vdate_regex ==1) {
  						//regex data
  						if ($project_comment_regex ==1 || $data['project_type_comments'] == null) {
  							if ($cv_comment_regex ==1  || $data['cv_comments'] == null) {
  								if ($Comments_regex ==1 || $data['comments'] == null) {
  									if ($Cement_Quantity_regex ==1 || $data['cement_quantity'] == null) {
  										if ($points_regex ==1 || $data['points'] == null) {
  											if ($OrderNo_regex ==1 || $data['order_no'] == null) {
  												if ($seller_regex ==1 || $data['seller_name'] == null) {
  													//one or more word check
  													if($data['project_type'] != null ){
                                                    	if($data['project_type'] != "تجارى" ){
                                                        	if($data['project_type'] != "سكنى"){         
                                                            	if($data['project_type'] != "سكنى تجارى"){         
                                                            		if($data['project_type'] != "بنية تحتية"){         
                                                            			if($data['project_type'] != "مشاريع أخرى"){         
                                                            			array_push($GLOBALS['visits'],$data['tele1']);
                                                        				}
                                                        			}
                                                        		}
                                                        	}
                                                    	}   
                                                	} // end project_type check
                                                	if($data['visit_reason'] != null ){
                                                    	if($data['visit_reason'] != "تسويق" ){
                                                        	if($data['visit_reason'] != "مبيعات"){         
                                                            	if($data['visit_reason'] != "أخرى"){         
                                                            		if($data['visit_reason'] != "بنية تحتية"){         
                                                            			array_push($GLOBALS['visits'],$data['tele1']);
                                                        			}
                                                        		}
                                                        	}
                                                    	}   
                                                	} // end visit_reason check
                                                	if($data['call_reason'] != null ){
                                                    	if($data['call_reason'] != "تسويق" ){
                                                        	if($data['call_reason'] != "أخرى"){         
                                                            	array_push($GLOBALS['visits'],$data['tele1']);
                                                        	}
                                                    	}   
                                                	} // end call_reason check
  													if($data['backcheck'] != null ){
                                                    	if($data['backcheck'] != "نعم" ){
                                                        	if($data['backcheck'] != "لا"){         
                                                        		if($data['backcheck'] != "متكرر"){         
                                                        			if($data['backcheck'] != "رقم خطأ"){         
                                                        				if($data['backcheck'] != "خطأ"){         
                                                        					if($data['backcheck'] != "أخرى"){         
                                                        						array_push($GLOBALS['visits'],$data['tele1']);
                                                        					}
                                                        				}
                                                        			}
                                                        		}
                                                        	}
                                                    	}   
                                                	} // end backcheck check
  													if($data['cement_type'] != null ){
                                                    	if($data['cement_type'] != "أسمنت الفهد" ){
                                                        	if($data['cement_type'] != "أسمنت الفهد 2"){         
                                                        		if($data['cement_type'] != "أسمنت الصعيدى"){         
                                                        			if($data['cement_type'] != "أسمت العادى"){         
                                                        				if($data['cement_type'] != "أسمنت المهندس"){         
                                                        					if($data['cement_type'] != "أسمنت الفنار"){         
                                                        						if($data['cement_type'] != "أسمنت المقاوم"){         
                                                        							if($data['cement_type'] != "الجبس"){         
                                                        								if($data['cement_type'] != "لا يوجد"){         
                                                        									array_push($GLOBALS['visits'],$data['tele1']);
                                                        								}
                                                        							}
                                                        						}
                                                        					}
                                                        				}
                                                        			}
                                                        		}
                                                        	}
                                                    	}   
                                                	} // end cement type check  		

	                                                if($project_state_regex ==1 || $data['project_current_state'] == null){
	                                                	try{
	                                                		$visit->save();
	                                                	}
	                                                	catch (\Exception $e){
	                                                		// dd($e);
															$null_cont= "Column 'Contractor_Id' cannot be null";
														    if ($null_cont == $e->errorInfo[2]) {  
														    	$Contdate= explode (' ',$data['date_visit_call']);
														        array_push($GLOBALS['cont_visits'],$Contdate[0]);
														    }
														    $null_pro= "Column 'Pormoter_Id' cannot be null";
														    if ($null_pro == $e->errorInfo[2]) {  
														    	$Prodate= explode (' ',$data['date_visit_call']);
														        array_push($GLOBALS['pro_visits'],$Prodate[0]);
														    }
	                                                	} //end catch

	                                                }	
													else {
													    array_push($GLOBALS['visits'],$data['tele1']);
													    // dd('13');
													}   	 		

											  	}
												else {
												    array_push($GLOBALS['visits'],$data['tele1']);
												    // dd('12');
												}   	 		
										  	}
											else {
											    array_push($GLOBALS['visits'],$data['tele1']);
											    // dd('11');
											}   
									  	}
										else {
										    array_push($GLOBALS['visits'],$data['tele1']);
										    // dd('10');
										}   				
								  	}
									else {
									    array_push($GLOBALS['visits'],$data['tele1']);
									     // dd('9');							
									}   
							  	}
								else {
								    array_push($GLOBALS['visits'],$data['tele1']);
								    // dd('8');
								}   						
						  	}
							else {
							    array_push($GLOBALS['visits'],$data['tele1']);
							    // dd('7');
							}   						 		
					  	}
						else {
						    array_push($GLOBALS['visits'],$data['tele1']);
						    // dd('6');
						}  							  		
				  	}
					else {
					   array_push($GLOBALS['visits'],$data['tele1']);
					   // dd('5');
					}  	
			  	}
				else {
				    array_push($GLOBALS['visits'],$data['tele1']);
				    // dd('4');
				}  
		  	}
			else {
			    array_push($GLOBALS['visits'],$data['tele1']);
			    // dd('3');
			}  			
	  	}
		else {
		    array_push($GLOBALS['visits'],$data['tele1']); 
		    // dd('2');
		} 
  	}
	else {
	   array_push($GLOBALS['visits'],$data['tele1']);
	   // dd('1');
	} 

	if ( !empty ($GLOBALS['visits'] )) {
            $GLOBALS['visits'] = array_unique($GLOBALS['visits']);
            $VisitsErr = $VisitsErr.implode(" \n ",$GLOBALS['visits']);
            $VisitsErr = nl2br($VisitsErr);  
            $cookie_name = 'VisitsErr';
            $cookie_value = $VisitsErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
        }       
    if ( !empty ($GLOBALS['cont_visits'] )) {
            $GLOBALS['cont_visits'] = array_unique($GLOBALS['cont_visits']);
            $NoContVisitsErr = $NoContVisitsErr.implode(" \n ",$GLOBALS['cont_visits']);
            $NoContVisitsErr = nl2br($NoContVisitsErr);  
            $cookie_name = 'NoContVisitsErr';
            $cookie_value = $NoContVisitsErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
        }
    if ( !empty ($GLOBALS['pro_visits'] )) {
            $GLOBALS['pro_visits'] = array_unique($GLOBALS['pro_visits']);
            $NoProVisitsErr = $NoProVisitsErr.implode(" \n ",$GLOBALS['pro_visits']);
            $NoProVisitsErr = nl2br($NoProVisitsErr);  
            $cookie_name = 'NoProVisitsErr';
            $cookie_value = $NoProVisitsErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
        }
 } //end function

public function importvisit()
{ 
	  $GLOBALS['visits']= array();
  	$GLOBALS['cont_visits'] = array();
  	$GLOBALS['pro_visits']= array();

	$temp= Request::get('submit'); 
 	if(isset($temp))
  	{ 
  		if(!Input::file('file')){  //if no file selected  
            $FileError = "الرجاء اختيار الملف الملطلوب تحميلة";                
            $cookie_name = 'FileError';
            $cookie_value = $FileError;
            setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day
            return redirect('/visits');
        } 
      unset ($_COOKIE['FileError']);
    	$filename = Input::file('file')->getClientOriginalName();
    	$Dpath = base_path();
    	$upload_success =Input::file('file')->move( $Dpath, $filename);
        
       // xls to csv conversion
        $nameOnly = explode(".",$filename);
        $newCSV =$nameOnly[0]."."."csv";
        $PathnewCSV= $Dpath."/".$newCSV ;
        $myfile = fopen($PathnewCSV, "w");

        app('App\Http\Controllers\ContractorsController')->convertXLStoCSV($upload_success, $PathnewCSV);

        Excel::filter('chunk')->selectSheetsByIndex(0)->load($PathnewCSV)->chunk(150, function($results){ 
                $data = $results->toArray();
                foreach($data as $data1) {
                    app('App\Http\Controllers\VisitsController')->ValidateVisit($data1);
                }
        });
        //remove temperorary csv file
        unlink($PathnewCSV);

      // Excel::load($upload_success, function($reader)
      //   {    
      //   	$results = $reader->get()->all();
      //    	foreach ($results as $data)
      //    	{
      //   	  	app('App\Http\Controllers\VisitsController')->ValidateVisit($data);
      //    	}
     	// });


 	} //end if
         return redirect('/visits');
}


 public function exportvisit()
        {


try {

  $exportbtn=Request::get('export');

  if(isset($exportbtn))
    { 
    
     Excel::create('visitsfile', function($excel)
      {
      $excel->sheet('sheetname',function($sheet)
      {        

       $sheet->appendRow(1, array('ﺔﻈﻓﺎﺤﻤﻟا','ﺰﻛﺮﻤﻟا','ﻦﻤﺳﻻا ﻉﻮﻧ','ﺕﺎﻈﺣﻼﻤﻟا','ﺔﻴﻣﻮﻴﻟا ﺕﺎﻌﺒﺗﺎﻤﻟا','ﺮﺟﺎﺘﻟا ﻢﺳﺃ','ﺦﻳﺭﺎﺗ','ﺮﻬﺸﻟا'
                ,'GPS','ﺔﻳﻮﻀﻌﻟا ﻢﻗﺭ','ﻥﻮﻔﻴﻠﺘﻟا ﻢﻗﺭ','ﺏﻭﺪﻨﻤﻟا ﻢﺳﺃ','ﻝﻭﺎﻘﻤﻟا ﻉﻮﻧ'
));
       $data=[];

  $visits=Visit::all();

  foreach ($visits as $visit) {

   array_push($data,array(
        $visit->Month ,
  $visit->Date_Visit_Call ,
  $visit->Seller_Name ,
    $visit->Adress,
  $visit->Backcheck ,
  $visit->Comments,
  $visit->Cement_Type ,
  $visit->City,
  $visit->Government ,
  $visit->GPS ,
  $visit->OrderNo ,
  $visit->Cement_Quantity ,
  $visit->Points ,
  $visit->Project_Type ,
  $visit->Call_Reason ,
  $visit->Visit_Reason ,
  $visit->Project_Current_State ,
  $visit->CV_Comments,
    $visit->getusername->Pormoter_Name,
         $visit->getcontractorproject->Name,
        $visit->getcontractorproject->Tele1,
        $visit->getcontractorproject->Phone,
       $visit->getcontractorproject->Intership_No,

    ));
   

   
   } 
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
    }
        }
        catch (Exception $e)
{ return redirect('/visits');
}
}
public function promotersDropDownData($id)
    {
       
        $promoters=Promoter::where('Government','=',$id) ->get();

        $options = array();
      foreach ($promoters as $promoter) {
      $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
     
        return Response::json($options);
    }
    public function contractorsDropDownData($id)
    {
       
        $contractors=Contractor::where('Pormoter_Id','=',$id) ->get();

        $options = array();
      foreach ($contractors as $contractor) {
      $options += array($contractor->Contractor_Id => $contractor->Name);
        }
     
        return Response::json($options);
    }
  
     
  
}