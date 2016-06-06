<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promoter;
use Request;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Datatables;
use Illuminate\View\Middleware\ErrorBinder;
use Exception;


class PromotersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
try {
  $promoters = Promoter::all();


	return view('promoters.index',compact('promoters'));
}
	catch(Exception $e)	
	{
		return redirect('/');
	}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('promoters.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
public function store(Request $request)
 {  


       $rules = array(
         'Pormoter_Name' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
        'TelephonNo' => array('required','regex:/^[0-9]*$/','between:7,11','unique:promoters,TelephonNo'),
        'Email' => array('required','email','unique:promoters,Email'),
        'User_Name' => array('required','unique:promoters,User_Name'),
        'Password' => array('required','unique:promoters,Password'),
        'Start_Date'=>array('date'),
        'Salary'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
       'Experince'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'City'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u'),
         'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

       	$messages = array(
    'required' => 'برجاء ادخال البيانات',
    'unique'=> 'هذه القيم موجودة',
    'digits_between'=>'ادخل الرقم الصحيح',
    'email'=>'ادخل الايميل بطريقة صحيحة',
    'string'=>'ادخل القيم الصحيحة بدون أرقام',
    'between'=>'ادخل الرقم الصحيح',
    'integer'=>'ادخل ارقام فقط',
   'digits'=>'ادخل ارقام فقط',
      'min'=>'ادخل قيم صحيحة',
    //'max'=>'ادخلf قيم صحيحة',
     'numeric'=>'ادخل ارقام فقط',
     'regex'=>'ادخل حروف فقط',
     'TelephonNo.regex'=>'أدخل ارقام فقط',
     'Experince.regex'=>'أدخل ارقام فقط',
       'Salary.regex'=>'ادخل ارقام فقط',
        'Start_Date'=>'دخل تاريخ فقط',
     'alpha'=> 'أدخل حروف فقط'
);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {
	// $messages = $validator->messages();
	// return $messages;
	 return redirect('/promoters/create')->withErrors($validator)->withInput();
}

       	else
       	{

      $promoters= new Promoter;
		$promoters->Pormoter_Name =Request::get('Pormoter_Name');
		$promoters->TelephonNo =Request::get('TelephonNo');
		$promoters->User_Name =Request::get('User_Name');
		$promoters->Password =Request::get('Password');
		$promoters->Instegram_Account =Request::get('Instegram_Account');
		$promoters->Facebook_Account =Request::get('Facebook_Account');
		$promoters->Email =Request::get('Email');
		$promoters->City =Request::get('City');
		$promoters->Government =Request::get('Government');
		$promoters->Code=uniqid('Pro');
	    $promoters->Experince=Request::get('Experince');
	      $promoters->Start_Date=Request::get('Start_Date');
          $promoters->Salary=Request::get('Salary');

		$promoters->save();


     return redirect('/promoters'); 
		
	}
}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Pormoter_Id)
	{  
	try
	{ $promoters=Promoter::findOrFail($Pormoter_Id);
	
		return view('promoters.show',compact('promoters'));
	}
	catch(Exception $e)
{  return redirect('/promoters'); }


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{  
		try
		{
			$promoters=Promoter::find($id);
		    return view('promoters.edit',compact('promoters'));
	}
	catch(Exception $e)
	{
		return redirect('/promoters');

	}
}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Pormoter_Id)

	{ 
		try
		{
	 
		$promoters=Promoter::find($Pormoter_Id);
	

		$rules =array(
	//$promoters = $this->route('promoters');
			//'Pormoter_Id' => array('required','unique:promoters,Pormoter_Id'),
         'Pormoter_Name' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
        'TelephonNo' => 'required|regex:/^[0-9]*$/|between:7,11|unique:promoters,TelephonNo,'.$promoters->Pormoter_Id.',Pormoter_Id',
        'Email' => 'required|email|unique:promoters,email,'.$promoters->Pormoter_Id.',Pormoter_Id',
        'User_Name' => array('required'),
        'Password' => array('required'),
        'Experince'=>('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
         'Salary'=>array('regex:/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/'),
        'Start_Date'=>array('date'),
        'City'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u'),
         'Government'=>array('alpha','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+))/u')

     );

       	$messages = array(
    'required' => 'برجاء ادخال البيانات',
    'unique'=> 'هذه القيم موجودة',
    'digits_between'=>'ادخل الرقم الصحيح',
    'email'=>'ادخل الايميل بطريقة صحيحة',
    'string'=>'ادخل القيم الصحيحة بدون أرقام',
    'between'=>'ادخل الرقم الصحيح',
    'integer'=>'ادخل ارقام فقط',
   'digits'=>'ادخل ارقام فقط',
      'min'=>'ادخل قيم صحيحة',
    //'max'=>'ادخلf قيم صحيحة',
     'numeric'=>'ادخل ارقام فقط',
     'regex'=>'ادخل حروف فقط',
     'TelephonNo.regex'=>'أدخل ارقام فقط',
     'Experince.regex'=>'أدخل ارقام فقط',
      'Salary.regex'=>'أدخل ارقام فقط',
      'date'=>'أدخل تاريخ',
     'alpha'=> 'أدخل حروف فقط'
);
  $validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {

	 return redirect('/promoters/'.$Pormoter_Id.'/edit')->withErrors($validator)->withInput();
}


	
		$promoters->Pormoter_Name =Request::get('Pormoter_Name');
		$promoters->TelephonNo =Request::get('TelephonNo');
		$promoters->User_Name =Request::get('User_Name');
		$promoters->Password =Request::get('Password');
		$promoters->Instegram_Account =Request::get('Instegram_Account');
		$promoters->Facebook_Account =Request::get('Facebook_Account');
		$promoters->Email =Request::get('Email');
		$promoters->City =Request::get('City');
		$promoters->Government =Request::get('Government');
		$promoters->Code=Request::get('Code');
	    $promoters->Experince=Request::get('Experince');
	    $promoters->Start_Date=Request::get('Start_Date');
	    $promoters->Salary=Request::get('Salary');
		$promoters->save();
		return redirect('/promoters');

}
catch (Exception $e)
{
	
	return redirect('/promoters');

}
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{ 	
			$promoters=Promoter::find($id);
			$promoters->delete();
			return redirect('/promoters');
		}
		catch(Exception $e)
		{
				return redirect('/promoters');

		}
		
	}

	public function ValidatePromoter($data){
		               
        $PromoterErr = 'البيانات غير صحيحة للمندوب: ';
        $DublePromoterErr = 'البيانات موجودة بالفعل للمندوب: ';

        $promoter =new Promoter();
	    $promoter->Pormoter_Name = (isset($data['pormoter_name']) ? $data['pormoter_name'] : '');
		$promoter->TelephonNo =(isset($data['pormoter_name']) ? $data['telephonno'] : '');
		$promoter->User_Name =(isset($data['user_name']) ? $data['user_name'] : '');
		$promoter->Password =(isset($data['password']) ? $data['password'] : '');
		$promoter->Instegram_Account =(isset($data['instegram_account']) ? $data['instegram_account'] : '');
		$promoter->Facebook_Account =(isset($data['facebook_account']) ? $data['facebook_account'] : '');
		$promoter->Email =(isset($data['email']) ? $data['email'] : '');
		$promoter->City =(isset($data['city']) ? $data['city'] : '');
		$promoter->Code=uniqid('Pro');
		$promoter->Experince=(isset($data['experince']) ? $data['experince'] : '');
		$promoter->Government =(isset($data['government']) ? $data['government'] : '');
		$promoter->Start_Date =(isset($data['start_date']) ? $data['start_date'] : '');
		$promoter->Salary =(isset($data['salary']) ? $data['salary'] : '');

		$name_regex = preg_match('/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u' , $data['pormoter_name']);
        //name  check

if (isset($data['password'])) {     
    if (isset($data['pormoter_name'])) {
        if ($name_regex == 1) { // true pormoter_name 
            $gov_regex = preg_match('/^[\pL\s]+$/u' , $data['government']);  
            if ($gov_regex == 1 || !isset($data['government'])) { // true goverment 
            	$city_regex = preg_match('/^[\pL\s]+$/u' , $data['city']);
                if ($city_regex == 1 || !isset($data['city'])) { // true city 
                	$FBAccount_regex = preg_match('/^[\pL\s]+$/u' , $data['facebook_account']);
                	if ($FBAccount_regex == 1 || !isset($data['facebook_account'])) { // true Facebook 
                		$InstAccount_regex = preg_match('/^[\pL\s]+$/u' , $data['instegram_account']);
	                	if ($InstAccount_regex == 1 || !isset($data['instegram_account'])) { // true inst 
	                		$Exp_regex = preg_match('/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/' , $data['experince']);
	                		if ($Exp_regex == 1 || !isset($data['experince'])) { // true experince  
	                		    $Telephone_regex = preg_match('/^[0-9]{10,11}$/' , $data['telephonno']);
                                if ($Telephone_regex == 1 && isset($data['telephonno'])) { // telephonno  
                                	$email_regex = preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/' , $data['email']);
	                                if ($email_regex == 1) { // mail  
	                                    $usename_regex = preg_match('/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u' , $data['user_name']);
		                                if ($usename_regex == 1 && isset($data['user_name'])) { // user_name  
		                                	$Salary_regex = preg_match('/^(.*[^0-9]|)(1000|[1-9]\d{0,2})([^0-9].*|)$/' , $data['salary']);
			                                if ($Salary_regex == 1 && isset($data['salary'])) { // Salary	
			                                	$Sdate= explode (' ',$data['start_date']);
                                                $Sdate_regex = preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/' , $Sdate[0]);
				                                if ($Sdate_regex == 1 && isset($data['start_date'])) { //date 
				                                    try {
				                                           $promoter->save(); 
				                                        } 
				                                        catch (Exception $e) {
				                                        	 // dd($e); 
// zero flags means changed values			
$phone_flag = 0;
$mail_flag = 0;
$username_flag = 0;
$pass_flag = 0;

//if promoter exists
$phone_string= "Duplicate entry '".ltrim($data['telephonno'], '0')."' for key 'promoters_telephonno_unique'";
$mail_string= "Duplicate entry '".$data['email']."' for key 'promoters_email_unique'";
$username_string= "Duplicate entry '".$data['user_name']."' for key 'promoters_user_name_unique'";
$pass_string= "Duplicate entry '".$data['password']."' for key 'promoters_password_unique'";   

    if ($phone_string == $e->errorInfo[2] || $username_string == $e->errorInfo[2]) {  
        array_push($GLOBALS['Doublepromoter'],$data['pormoter_name']);
		$Pormoter_Id= Promoter::where('Email',$data['email'])->pluck('Pormoter_Id')->first();
		$phone_flag = 1;
	}
	if ($mail_string == $e->errorInfo[2] || $pass_string == $e->errorInfo[2]) {  
        array_push($GLOBALS['Doublepromoter'],$data['pormoter_name']);
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$mail_flag = 1;
	}
	if ($username_string == $e->errorInfo[2]) {  
        array_push($GLOBALS['Doublepromoter'],$data['pormoter_name']);
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$username_flag = 1;
	}
	if ($pass_string == $e->errorInfo[2]) {  
        array_push($GLOBALS['Doublepromoter'],$data['pormoter_name']);
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$pass_flag = 1;
	}	
	if (isset($Pormoter_Id)){	 //update not unique values
		$update_promoter = Promoter::find($Pormoter_Id);
		$update_promoter->Pormoter_Name = (isset($data['pormoter_name']) ? $data['pormoter_name'] : '');
		$update_promoter->Instegram_Account =(isset($data['instegram_account']) ? $data['instegram_account'] : '');
		$update_promoter->Facebook_Account =(isset($data['facebook_account']) ? $data['facebook_account'] : '');
		$update_promoter->City =(isset($data['city']) ? $data['city'] : '');
		$update_promoter->Code=uniqid('Pro');
		$update_promoter->Experince=(isset($data['experince']) ? $data['experince'] : '');
		$update_promoter->Government =(isset($data['government']) ? $data['government'] : '');
		$update_promoter->Start_Date =(isset($data['start_date']) ? $data['start_date'] : '');
		$update_promoter->Salary =(isset($data['salary']) ? $data['salary'] : '');
		$update_promoter->save();
	}
	//update unique values
	if ($phone_flag == 0 ) { //changed phone only
		$Pormoter_Id= Promoter::where('Email',$data['email'])->pluck('Pormoter_Id')->first();
		$update_promoter = Promoter::find($Pormoter_Id);
		$update_promoter->TelephonNo = $data['telephonno'];
		$update_promoter->save();
	}
	if ($pass_flag == 0 ) { //changed pass only
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$update_promoter = Promoter::find($Pormoter_Id);
		$update_promoter->Password = $data['password'];
		$update_promoter->save();
	}
	if ($username_flag == 0 ) { //changed username only
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$update_promoter = Promoter::find($Pormoter_Id);
		$update_promoter->User_Name = $data['user_name'];
		$update_promoter->save();
	}
	if ($mail_string == 0 ) { //changed mail only
		$Pormoter_Id= Promoter::where('TelephonNo',$data['telephonno'])->pluck('Pormoter_Id')->first();
		$update_promoter = Promoter::find($Pormoter_Id);
		$update_promoter->Email = $data['email'];
		$update_promoter->save();
	}

				                                        }   //end catch                    
					                		
							                	}
							                	else {
							                		array_push($GLOBALS['promoter'],$data['pormoter_name']); 
							                	}                            
				                		
						                	}
						                	else {
						                		array_push($GLOBALS['promoter'],$data['pormoter_name']); 
						                	}	                               
			                		
					                	}
					                	else {
					                		array_push($GLOBALS['promoter'],$data['pormoter_name']); 
					                	}	                                
		                			
				                	}
				                	else {
				                		array_push($GLOBALS['promoter'],$data['pormoter_name']); 
				                	}	                                             		
			                	}
			                	else {
			                		array_push($GLOBALS['promoter'],$data['pormoter_name']); 
			                	}	                              
	                		
		                	}
		                	else {
		                		array_push($GLOBALS['promoter'],$data['pormoter_name']);
		                	}	
	                		
		                }
		                else {
		                	array_push($GLOBALS['promoter'],$data['pormoter_name']); 
		                }
	                }
	                else {
	                	array_push($GLOBALS['promoter'],$data['pormoter_name']); 
	                }

                }
                else {
                	array_push($GLOBALS['promoter'],$data['pormoter_name']); 
                }
            }
            else {
                	array_push($GLOBALS['promoter'],$data['pormoter_name']); 
                }
        }
        else {
                	array_push($GLOBALS['promoter'],$data['pormoter_name']); 
                }    
     }
    	else {
    		array_push($GLOBALS['promoter'],(isset($data['telephonno']) ? $data['telephonno'] : $data['pormoter_name'])); 
     	}
    }
    else {
            array_push($GLOBALS['promoter'],$data['pormoter_name']); 
           }  

        if ( !empty ($GLOBALS['promoter'] )) {
            $GLOBALS['promoter'] = array_unique($GLOBALS['promoter']);
            $PromoterErr = $PromoterErr.implode(" \n ",$GLOBALS['promoter']);
            $PromoterErr = nl2br($PromoterErr);  
            $cookie_name = 'PromoterErr';
            $cookie_value = $PromoterErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
        }

        if ( !empty ($GLOBALS['Doublepromoter'] )) {
            $GLOBALS['Doublepromoter'] = array_unique($GLOBALS['Doublepromoter']);
            $DublePromoterErr = $DublePromoterErr.implode(" \n ",$GLOBALS['Doublepromoter']);
            $DublePromoterErr = nl2br($DublePromoterErr);  
            $cookie_name = 'DublePromoterErr';
            $cookie_value = $DublePromoterErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
        }
	} //function end

	public function importpromoters()
	{			
		$temp= Request::get('submit'); 
   		if(isset($temp))
 		{ 
 			if(!Input::file('file')){  //if no file selected  
 				$errFile = "الرجاء اختيار الملف الملطلوب تحميلة";                
                $cookie_name = 'FileError';
                $cookie_value = $errFile;
                setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day
                return redirect('/promoters');
 			}
 			unset ($_COOKIE['FileError']);
   			$filename = Input::file('file')->getClientOriginalName();
     		$Dpath = base_path();
     		$upload_success =Input::file('file')->move( $Dpath, $filename);
       Excel::load($upload_success, function($reader)
       {   
	    	$results = $reader->get()->toArray();
	    	$GLOBALS['promoter']= array();   
			$GLOBALS['Doublepromoter']= array(); 
	    	for ($i=0; $i < count($results[0]) ; $i++) { 
	    		app('App\Http\Controllers\PromotersController')->ValidatePromoter($results[0][$i]);
	    	}
    	});
	}
	return redirect('/promoters');    
}

public function exportpromoters()
{
	try {

  $exportbtn= Request::get('export'); 

   	if(isset($exportbtn))
   	{ 
   	
   		Excel::create('promoterfile', function($excel)
   		 { 

   			$excel->sheet('sheetname',function($sheet)
   			{        

   				$sheet->appendRow(1, array(
                'أسم المندوب', 'رقم التليفون','المحافظة','المركز','البريد الاكترونى	','حساب الفيسبوك','حساب الانستجرام	','أسم النستخدم	','الرقم السرى','الكود','عدد سنين الخبرة'
));
   				$data=[];

  $promoters=Promoter::all();

  foreach ($promoters as $promoter) {

  	array_push($data,array(

  		$promoter->Pormoter_Name,
  		$promoter->TelephonNo,
  		$promoter->Government,
  		$promoter->City,
  		$promoter->Email,
  		$promoter->Facebook_Account,
  		$promoter->Instegram_Account,
  		$promoter->User_Name,
  	    $promoter->Password,
  	    $promoter->Code,
	    $promoter->Experince,
	    $promoter->Start_Date,
	     $promoter->Salary,

  		
  	
 
  		

  		));
  	

  	
  	}	
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
   	}
}
     	catch(Exception $e)
{
	 return redirect('/promoters'); 
} 
}


 
   
}

?>