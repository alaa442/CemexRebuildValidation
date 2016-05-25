<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contractor;
use App\Promoter;
use Request;
use Excel;
use Input;
use File;
use App\Review;
use Validator;
use DB;
use Illuminate\Support\Facades\Response;
use App\ContractorReport;
use Redirect;
use Log;
use Session;

class ContractorsController extends Controller
{
    public function PromoterByGov($gov){
         // dd($gov);
        $promoters=Promoter::where('Government','=',$gov) ->get();
        $options = array();
        foreach ($promoters as $promoter) {
            $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
        return Response::json($options);
    }
    public function EditPromoterByGov($id,$gov){
         // dd($gov);
        $promoters=Promoter::where('Government','=',$gov) ->get();
        $options = array();
        foreach ($promoters as $promoter) {
            $options += array($promoter->Pormoter_Id => $promoter->Pormoter_Name);
        }
        return Response::json($options);
    }

    public function index()
    {
        // Session::flush();
        $contractors = Contractor::all();
        ////// smart phone chart ///
        $PhoneyesCount = 0;
        $PhonenoCount = 0;
        $PhonenotRecordedCount = 0; 
        $phone_arry = array('yesCount'=>0,'noCount'=>0,'notRecordedCount'=>0);

        for ($i=0; $i<count($contractors); $i++) {           
            if ($contractors[$i]->Phone_Type == 'yes') {
                $PhoneyesCount +=1;
            }
            else if ($contractors[$i]->Phone_Type == 'no') {
                $PhonenoCount +=1;
            }
            else if ($contractors[$i]->Phone_Type == null) {
                $PhonenotRecordedCount +=1;
            }
        }
        $phone_arry['yesCount']= $PhoneyesCount;
        $phone_arry['noCount']= $PhonenoCount;
        $phone_arry['notRecordedCount']= $PhonenotRecordedCount;
        // dd($phone_arry);
        $stocksTable = \Lava::DataTable();
        $stocksTable->addStringColumn('Contractor Data');
        $stocksTable->addNumberColumn('Yes');
        $stocksTable->addNumberColumn('No');
        $stocksTable->addNumberColumn('Not Recorded');

        $rowData=array();
        array_push($rowData, 'Smart Phone');
        array_push($rowData, $phone_arry['yesCount'],  $phone_arry['noCount'],
                             $phone_arry['notRecordedCount']);
        $stocksTable->addRow($rowData);

        ////// Computer chart ///
        $CompyesCount = 0;
        $CompnoCount = 0;
        $CompnotRecordedCount = 0; 
        $Computer_arry = array('yesCount'=>0,'noCount'=>0,'notRecordedCount'=>0);
        for ($i=0; $i<count($contractors); $i++) {           
            if ($contractors[$i]->Computer == 'yes') {
                $CompyesCount +=1;
            }
            else if ($contractors[$i]->Computer == 'no') {
                $CompnoCount +=1;
            }
            else if ($contractors[$i]->Computer == null) {
                $CompnotRecordedCount +=1;
            }
        }
        $Computer_arry['yesCount']= $CompyesCount;
        $Computer_arry['noCount']= $CompnoCount;
        $Computer_arry['notRecordedCount']= $CompnotRecordedCount;

        $rowData=array();
        array_push($rowData, 'Computer');
        array_push($rowData, $Computer_arry['yesCount'],  $Computer_arry['noCount'],
                             $Computer_arry['notRecordedCount']);
        $stocksTable->addRow($rowData);

        ///// facebook charts ////
        $FaceyesCount = 0;
        $FacenoCount = 0;
        $FacenotRecordedCount = 0; 
        $Facebook_arry = array('yesCount'=>0,'noCount'=>0,'notRecordedCount'=>0);

        for ($i=0; $i<count($contractors); $i++) {           
            if ($contractors[$i]->Has_Facebook == 'yes') {
                $FaceyesCount +=1;
            }
            else if ($contractors[$i]->Has_Facebook == 'no') {
                $FacenoCount +=1;
            }
            else if ($contractors[$i]->Has_Facebook == null) {
                $FacenotRecordedCount +=1;
            }
        }

        $Facebook_arry['yesCount']= $FaceyesCount;
        $Facebook_arry['noCount']= $FacenoCount;
        $Facebook_arry['notRecordedCount']= $FacenotRecordedCount;

        $rowData=array();
        array_push($rowData, 'FaceBook');
        array_push($rowData, $Facebook_arry['yesCount'],  $Facebook_arry['noCount'],
                             $Facebook_arry['notRecordedCount']);
        $stocksTable->addRow($rowData);

        ///// Has Mixer Chart ////
        $MixyesCount = 0;
        $MixnoCount = 0;
        $MixnotRecordedCount = 0; 
        $Mixer_arry = array('yesCount'=>0,'noCount'=>0,'notRecordedCount'=>0);

        for ($i=0; $i<count($contractors); $i++) { 
            $review = $contractors[$i]->getreview; 
            if ($review) {                            
                if ($review->Has_Mixers == 'yes') {
                        $MixyesCount +=1;
                    }
                    else if ($review->Has_Mixers == 'no') {
                        $MixnoCount +=1;
                    }
                    else if ($review->Has_Mixers == null) {
                        $MixnotRecordedCount +=1;
                    }
            }
        }
        $Mixer_arry['yesCount']= $MixyesCount;
        $Mixer_arry['noCount']= $MixnoCount;
        $Mixer_arry['notRecordedCount']= $MixnotRecordedCount;

        $rowData=array();
        array_push($rowData, 'Mixer');
        array_push($rowData, $Mixer_arry['yesCount'],  $Mixer_arry['noCount'],
                             $Mixer_arry['notRecordedCount']);
        $stocksTable->addRow($rowData);
        
         ///// Has Sub Contractor Chart ////
        $SubyesCount = 0;
        $SubnoCount = 0;
        $SubnotRecordedCount = 0; 
        $SubContractor_arry = array('yesCount'=>0,'noCount'=>0,'notRecordedCount'=>0);

        for ($i=0; $i<count($contractors); $i++) { 
            $review = $contractors[$i]->getreview;
            if ($review) {                  
                if ($review->Has_Sub_Contractor == 'yes') {
                    $SubyesCount +=1;
                }
                else if ($review->Has_Sub_Contractor == 'no') {
                    $SubnoCount +=1;
                }
                else if ($review->Has_Sub_Contractor == null) {
                    $SubnotRecordedCount +=1;
                }
            }
        }
        $SubContractor_arry['yesCount']= $SubyesCount;
        $SubContractor_arry['noCount']= $SubnoCount;
        $SubContractor_arry['notRecordedCount']= $SubnotRecordedCount;

        $rowData=array();
        array_push($rowData, 'Sub-Contractor');
        array_push($rowData, $SubContractor_arry['yesCount'], $SubContractor_arry['noCount'],
                             $SubContractor_arry['notRecordedCount']);
        $stocksTable->addRow($rowData);

        // dd($stocksTable);
        $chart = \Lava::ColumnChart('MyStocks', $stocksTable,[
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14,                     
        ]]);
        return view('contractors.index',compact('contractors'));
    }

    //contractor report
    public function ContractorReport(){
        $govs = DB::table('contractors')->select('Goverment as gov_name')
                                        ->groupBy('Goverment')->get();
        // dd($govs);
        return view('contractors.report', compact('govs'));
    }

    public function CityByGov($gov){
         // dd($gov);
        $cities=Contractor::where('Goverment','=',$gov) 
                            ->select('City as City')
                            ->groupBy('City')
                            ->get();
        // dd($gov, $cities[1]->City);
        $options = array();
        foreach ($cities as $city) {
            array_push($options, $city->City);
        }
        // dd($options);
        return Response::json($options);
    }

    public function ReportResult(){        
        $inputs = Input::all();
        // dd(Request::get('goverment'), Request::get('city_name'));
        $contractors= Contractor::where('Goverment','=',Request::get('goverment')) 
                                ->where('City','=',Request::get('city_name'))
                                ->get();
         ContractorReport::truncate();
        foreach ($contractors as $contractor) {
            $ReportContractor = new ContractorReport;
            $ReportContractor->Name = $contractor->Name;
            $ReportContractor->Goverment = $contractor->Goverment;
            $ReportContractor->City = $contractor->City;
            $ReportContractor->Address = $contractor->Address;
            $ReportContractor->Education = $contractor->Education;
            $ReportContractor->Facebook_Account = $contractor->Facebook_Account;
            $ReportContractor->Computer = $contractor->Computer;            
            $ReportContractor->Has_Facebook = $contractor->Has_Facebook;
            $ReportContractor->Email = $contractor->Email;
            $ReportContractor->Birthday = $contractor->Birthday;
            $ReportContractor->Tele1 = $contractor->Tele1;
            $ReportContractor->Tele2 = $contractor->Tele2;
            $ReportContractor->Job = $contractor->Job;
            $ReportContractor->Class = $contractor->Class;            
            $ReportContractor->Pormoter_Id = $contractor->Pormoter_Id;
            $ReportContractor->Phone_Type = $contractor->Phone_Type;
            $ReportContractor->Nickname = $contractor->Nickname;
            $ReportContractor->Religion=$contractor->Religion;
            $ReportContractor->Home_Phone=$contractor->Home_Phone;
            $ReportContractor->Fame=$contractor->Fame;
            $ReportContractor->Code=$contractor->Code;
            $ReportContractor->save();
        }        

        // dd($contractors);
        return view('contractors.results', compact('contractors'));
    }

    //export filtered contractors

    function ExportFilterContractors(){
        // dd('ExportFilterDateGps');
        $exportbtn=Request::get('export');
        // dd($exportbtn);
        if(isset($exportbtn))
        {            
            // dd('exportbtn');   
            Excel::create('Contractor By City', function($excel)
            {
                $excel->sheet('sheetname',function($sheet)
                {        
                     $sheet->appendRow(1, array(
            'اسم المقاول','المركز','اللقب','المهنة','المحافظة','التعليم','اسم الشهرة ','الديانة ','تليفون 1','تليفون 2','التليفون الارضي ','العنوان','البريد الاليكتروني','هل يمتلك حساب فيسبوك','اسم حساب الفيسبوك',' نوع الهاتف','الكمبيوتر ','تاريخ الميلاد','اسم المندوب','الفئة','الكود'));
                $data=[];

                    $ContractorReport=ContractorReport::all();                 
                    foreach ($ContractorReport as $contractor)
                       {
                        array_push($data,array(
                            $contractor->Name,
                            $contractor->City,
                            $contractor->Fame,
                            $contractor->Job,
                            $contractor->Goverment,
                            $contractor->Education,
                            $contractor->Nickname ,
                            $contractor->Religion,
                            $contractor->Tele1,
                            $contractor->Tele2 ,
                            $contractor->Home_Phone,
                            $contractor->Address,
                            $contractor->Email,
                            $contractor->Has_Facebook,                               
                            $contractor->Facebook_Account,
                            $contractor->Phone_Type,
                            $contractor->Computer,               
                            $contractor->Birthday,           
                            $contractor->getpromoter->Pormoter_Name,               
                            $contractor->Class, 
                            $contractor->Code,                                      
                         ));        
                    }  

                $sheet->fromArray($data, null, 'A2', false, false);
                }); 
            })->download('xls');
    
        }
       
    }

    public function create()
    {
            $promoters = Promoter::all();
            $govs = DB::table('promoters')->select('Government as gov_name')
                                          ->groupBy('Government')->get();
            // dd($govs[0]->gov_name);
            return view('contractors.create',compact('promoters','govs'));        
    }

    public function importcontractor()
    {   
        // dd($_COOKIE);
        unset ($_COOKIE['Tele1Error']);
        unset ($_COOKIE['Tele1Error2']);
        unset ($_COOKIE['FileError']);
        unset ($_COOKIE['File1Error']);
        unset ($_COOKIE['cookie']);  
        // dd($_COOKIE);     
        $contractors = Contractor::all();
        $importbtn= Request::get('submit');  
        if(isset($importbtn))
        {   
            unset ($_COOKIE['Tele1Error']);
            unset ($_COOKIE['Tele1Error2']);
            unset ($_COOKIE['FileError']);
            unset ($_COOKIE['File1Error']);
            unset ($_COOKIE['cookie']);  
            if(!Input::file('file')){  //if no file selected  
            // dd($_COOKIE);              
                unset ($_COOKIE['Tele1Error']);
                unset ($_COOKIE['cookie']);
                unset ($_COOKIE['File1Error']);
                unset ($_COOKIE['Tele1Error2']);
                $errFile = "الرجاء اختيار الملف المطلوب تحميله";                
                $cookie_name = 'FileError';
                $cookie_value = $errFile;
                setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day
                // dd($_COOKIE);   
                return redirect('/contractors');
            } 
            unset ($_COOKIE['FileError']);
            unset ($_COOKIE['File1Error']);            
            unset ($_COOKIE['cookie']);
            unset ($_COOKIE['Tele1Error2']);
            $filename = Input::file('file')->getClientOriginalName();            
            $Dpath = base_path();
            $upload_success =Input::file('file')->move( $Dpath, $filename);
            $GLOBALS['z']= array('');
            $GLOBALS['y']= array(''); //wrong data type tele1
        Excel::load($upload_success, function($reader)
            {                       
                $results = $reader->get()->toArray();
                // dd($results); 
                foreach ($results[0] as $data)
                {
                $contractor =new Contractor();
                $contractor->Name = $data['name'];
                // dd(gettype($contractor->Name));
                $contractor->Goverment = $data['goverment'];
                $contractor->City = $data['city'];
                $contractor->Address = $data['address'];
                $contractor->Education = $data['education'];
                $contractor->Class = $data['class'];
                $contractor->Facebook_Account = $data['facebook_account'];
                $contractor->Computer = $data['computer'];
                $contractor->Email = $data['email'];
                $contractor->Birthday =$data['birthday'];
                $contractor->Tele1 = $data['tele1'];
                // dd(gettype($data['tele1']));
                $contractor->Tele2 =$data['tele2'];
                $contractor->Job = $data['job'];
                $contractor->Code=uniqid('Cont');
                $contractor->Phone_Type = $data['phone_type'];
                $contractor->Nickname =$data['nickname'];
                $contractor->Religion=$data['religion'];
                $contractor->Home_Phone= $data['home_phone'];
        if(isset($data['code'])){
            $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
            $contractor->Pormoter_Id =$Pormoter_Id;
        }
        if(isset($data['tele1'])){
$Contractor_Id= Contractor::where('Tele1',$data['tele1'])->pluck('Contractor_Id')->first();
}       
        try{
            $contractor->save();
            $saved_contractor = Contractor::find($contractor->Contractor_Id);
            if ($saved_contractor->Tele1 == "0") { // Tele1 data type check
                $TypeTele1Err = 'رقم التليفون غير صحيح للمقاول: ';

        array_push($GLOBALS['y'],$saved_contractor->Name); 
        $TypeTele1Err = $TypeTele1Err.implode(" \n ",$GLOBALS['y']);
        $TypeTele1Err = nl2br($TypeTele1Err);  


        $cookie_name = 'TypeTele1Err';
        $cookie_value = $TypeTele1Err;
        setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day  
                $saved_contractor->delete();
                
            }

            // dd($TypeTele1Err); 
        // dd('save',$contractor->Contractor_Id,$contractor->Tele1, $saved_contractor,$test);
        }
        catch (\Exception $e)
            {   
                // dd(gettype($contractor->Tele1));
                dd($e);
                //if contractor exists
                $exist_string= "Duplicate entry '".$data['tele1']."' for key 'contractors_tele1_unique'";
                $is_exist='null';
                if ($exist_string == $e->errorInfo[2]) {  $is_exist='true';}
                if ($is_exist == 'true') { //update existing
                    unset ($_COOKIE['FileError']);
                    unset ($_COOKIE['Tele1Error2']);
                    $updated_cont = Contractor::find($Contractor_Id);
                    $updated_cont->Name =  $data['name'];
                    $updated_cont->Goverment = $data['goverment'];
                    $updated_cont->City = $data['city'];
                    $updated_cont->Address = $data['address'];
                    $updated_cont->Education = $data['education'];
                    $updated_cont->Class = $data['class'];
                    $updated_cont->Facebook_Account = $data['facebook_account'];
                    $updated_cont->Computer = $data['computer'];
                    $updated_cont->Email = $data['email'];
                    $updated_cont->Birthday =$data['birthday'];
                    $updated_cont->Tele2 =$data['tele2'];
                    $updated_cont->Job = $data['job'];
                    $updated_cont->Code=uniqid('Cont');
                    $updated_cont->Phone_Type = $data['phone_type'];
                    $updated_cont->Nickname =$data['nickname'];
                    $updated_cont->Religion=$data['religion'];
                    $updated_cont->Home_Phone=$data['home_phone'];
    if(isset($data['code'])){
        $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
        $updated_cont->Pormoter_Id =$Pormoter_Id;
    }
                    $updated_cont->save();
            } //end if contractor exists
    //if tele1 dosent exist
    $tele1_string= "Column 'Tele1' cannot be null";
    $tele1_exist='null';
    if ($tele1_string == $e->errorInfo[2]) {  $tele1_exist='true';}               
    if ($tele1_exist == 'true') { //no Tele1
        $errStr = "ادخل رقم تليفون للمقاول: \n"; 
        array_push($GLOBALS['z'],$data['name']); 
        $errStr = $errStr.implode(" \n ",$GLOBALS['z']);
        $errStr = nl2br($errStr);  
        $cookie_name = 'Tele1Error';
        $cookie_value = $errStr;
        setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 86400 = 1 day  
        }   //end if tele1 dosent exist
    }   //end catch
    } //end foreach
    }); //end excel
        
        } 
        return redirect('/contractors');            
} 

    public function expotcontractor()
    {
        $exportbtn=Request::get('export');
        if(isset($exportbtn))
        {             
        Excel::create('contractors file', function($excel)
        {
            $excel->sheet('sheetname',function($sheet)
            {        
      $sheet->appendRow(1, array(
            'اسم المقاول','المركز','اللقب','المهنة','المحافظة','التعليم','اسم الشهرة ','الديانة ','تليفون 1','تليفون 2','التليفون الارضي ','العنوان','البريد الاليكتروني','هل يمتلك حساب فيسبوك','اسم حساب الفيسبوك',' نوع الهاتف','الكمبيوتر ','تاريخ الميلاد','اسم المندوب','الفئة','الكود'));
                $data=[];

                $contractors=Contractor::all();
                $review =Review::all();

          foreach ($contractors as $contractor)
           {
                if ($contractor->getpromoter) {
                    $Pormoter_Name = $contractor->getpromoter->Pormoter_Name;
                }
                else {
                    $Pormoter_Name ='';
                }
            array_push($data,array(
                $contractor->Name,
                $contractor->City,
                $contractor->Fame,
                $contractor->Job,
                $contractor->Goverment,
                $contractor->Education,
                $contractor->Nickname ,
                $contractor->Religion,
                $contractor->Tele1,
                $contractor->Tele2 ,
                $contractor->Home_Phone,
                $contractor->Address,
                $contractor->Email,
                $contractor->Has_Facebook,                               
                $contractor->Facebook_Account,
                $contractor->Phone_Type,
                $contractor->Computer,               
                $contractor->Birthday,
                $Pormoter_Name,               
                $contractor->Class, 
                $contractor->Code,                                      
             ));        
        }  
    $sheet->fromArray($data, null, 'A2', false, false);
    }); })->download('xls');
    
    }
}

    public function store()
    {
    $inputs = Input :: all();
    $messages = array(
        'name.regex'    =>'الرجاء ادخالا الاسم صحيح',
        'goverment.regex' =>'أدخل الحروف صحيحة',
        'city.regex'    =>'أدخل الحروف صحيحة',
        'address.regex' =>'أدخل الحروف صحيحة',
        'required'      => 'برجاء ادخال البيانات',
        'unique'        => 'هذه القيم موجودة بالفعل',
        'email'         =>'ادخل الايميل بطريقة صحيحة',
        'tele1.regex'   =>'أدخل رقم التليفون صحيح',
        'tele2.regex'   =>'أدخل رقم التليفون صحيح',
        'home_phone.regex'=>'أدخل رقم التليفون صحيح',
        'alpha'         => 'أدخل حروف فقط',
        'pormoter_id.required' =>'الرجاء ادخال اسم المندوب',
        'nickname.regex'=>'أدخل الحروف صحيحة',
        'religion.regex'=>'أدخل الحروف صحيحة',
        'fame.regex'    =>'أدخل الحروف صحيحة',
        'tele2.different'=> 'هذه القيمه مكرره',
        'tele1.different'=> 'هذه القيمه مكرره',
        'home_phone.different'=> 'هذه القيمه مكرره',
        'job.regex'=>'أدخل الحروف صحيحة',

    );

    $rules = array(
        'name'      => array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'                               \x{2019}]+(?:$|\s+)){2,}/u','required'),
        'goverment' => array('regex:/^[\pL\s]+$/u'),
        'city'      => array('regex:/^[\pL\s]+$/u'),
        'address'   => array('regex:/^[\pL\s]+$/u'),
        'mail'      => array('email','unique:contractors,Email'),
        'birthday'  => array(
                    'regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'),
        'tele1' => array('required',
                         'regex:/^[0-9]{10,11}$/',
                         'unique:contractors',
                         'different:tele2',
                         'different:home_phone'),
        'tele2' => array('regex:/^[0-9]{10,11}$/',
                         // 'unique:contractors',
                         'different:Tele1',
                         ),
        'home_phone'=>array(
                            'regex:/^[0-9]{9,11}$/',
                            'unique:contractors',
                            'different:tele1'
                            ),  
        'pormoter_id' => array('required'),
        'job'       => array('regex:/^[\pL\s]+$/u'),
        'nickname'  => array('regex:/^[\pL\s]+$/u'),
        'religion'  => array('regex:/^[\pL\s]+$/u'),
        'fame'      => array('regex:/^[\pL\s]+$/u')
     );

$validator = Validator::make(Input::all(), $rules,$messages);
    if ($validator->fails()) {
        return redirect('/contractors/create')
                        ->withErrors($validator)->withInput();
    }
        
    else {   
            $contractor = new Contractor;
            $contractor->Name = Request::get('name');
            $contractor->Goverment = Request::get('goverment');
            $contractor->City = Request::get('city');
            $contractor->Address = Request::get('address');
            $contractor->Education = Request::get('education');
            $contractor->Facebook_Account = Request::get('facebook');
            $contractor->Computer = Request::get('computer');            
            $contractor->Has_Facebook = Request::get('has_facebook');
            $contractor->Email = Request::get('mail');
            $contractor->Birthday = Request::get('birthday');
            $contractor->Tele1 = Request::get('tele1');
            $contractor->Tele2 = Request::get('tele2');
            $contractor->Job = Request::get('job');
            $contractor->Class = Request::get('class');            
            $contractor->Pormoter_Id = Request::get('pormoter_id');
            $contractor->Phone_Type = Request::get('phone_type');
            $contractor->Nickname = Request::get('nickname');
            $contractor->Religion=Request::get('religion');
            $contractor->Home_Phone=Request::get('home_phone');
            $contractor->Fame=Request::get('fame');
            $contractor->Code=uniqid('Cont');
            $contractor->save();
            return redirect('/contractors');          
        }
}
    public function show($id)
    {
            $contractor = Contractor::findOrFail($id);
            return view('contractors.show',compact('contractor'));
        
    }

    public function edit($id)
    { 
            $promoters = Promoter::all();
            $contractor = Contractor::find($id);
            $govs = DB::table('promoters')->select('Government as gov_name')
                                          ->groupBy('Government')->get();
            return view('contractors.edit',compact('contractor','promoters','govs'));
        
    }

    public function update($id)
    {
        $inputs = Input :: all();
        $contractor = Contractor::find($id);

        $rules = array(
        'name'      => array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'                               \x{2019}]+(?:$|\s+)){2,}/u','required'),
        'goverment' => array('regex:/^[\pL\s]+$/u'),
        'city'      => array('regex:/^[\pL\s]+$/u'),
        'address'   => array('regex:/^[\pL\s]+$/u'),
        'mail'      => array('email'),
        'birthday'  => array(
                    'regex:/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'),
    'tele1' => array('required',
                         'regex:/^[0-9]{11}$/'),
    'tele2' => array('regex:/^[0-9]{11}$/','different:Tele1','different:home_phone'),
'home_phone'=>array('regex:/^[0-9]{9,11}$/','different:tele2','different:tele1'),  
        'pormoter_id' => array('required'),
        'job'       => array('regex:/^[\pL\s]+$/u'),
        'nickname'  => array('regex:/^[\pL\s]+$/u'),
        'religion'  => array('regex:/^[\pL\s]+$/u'),
        'fame'      => array('regex:/^[\pL\s]+$/u')
        );
        
         $messages = array(
            'name.regex' =>'الرجاء ادخالا الاسم صحيح',
            'goverment.regex' =>'أدخل الحروف صحيحة',
            'city.regex' =>'أدخل الحروف صحيحة',
            'address.regex' =>'أدخل الحروف صحيحة',
            'required'      => 'برجاء ادخال البيانات',
            'unique'        => 'هذه القيم موجودة بالفعل',
            'email'         =>'ادخل الايميل بطريقة صحيحة',
            'tele1.regex'   =>'أدخل رقم التليفون صحيح',
            'tele2.regex'   =>'أدخل رقم التليفون صحيح',
            'home_phone.regex'=>'أدخل رقم التليفون صحيح',
            'alpha'         => 'أدخل حروف فقط',
            'job.regex'     =>'أدخل الحروف صحيحة',
            'pormoter_id.required' =>'الرجاء ادخال اسم المندوب',
            'nickname.regex'=>'أدخل الحروف صحيحة',
            'religion.regex'=>'أدخل الحروف صحيحة',
            'fame.regex'    =>'أدخل الحروف صحيحة',
            'tele2.different'=> 'هذه القيمه مكرره',
            'home_phone.different'=> 'هذه القيمه مكرره',
        );

        

        $validation = Validator::make($inputs,$rules,$messages);
        if ($validation->fails()) {    
            return redirect('contractors/'.$contractor->Contractor_Id.'/edit')
                        ->withErrors($validation)
                        ->withInput();
        }
        
        else {
            $contractor = Contractor::find($id);
            $contractor->Name = Request::get('name');
            $contractor->Goverment = Request::get('goverment');
            $contractor->City = Request::get('city');
            $contractor->Address = Request::get('address');
            $contractor->Education = Request::get('education');           
            $contractor->Has_Facebook = Request::get('has_facebook');
            $contractor->Facebook_Account = Request::get('facebook');
            $contractor->Computer = Request::get('computer');
            $contractor->Email = Request::get('mail');
            $contractor->Birthday = Request::get('birthday');
            $contractor->Tele1 = Request::get('tele1');
            $contractor->Tele2 = Request::get('tele2');
            $contractor->Job = Request::get('job');
            $contractor->Class = Request::get('class');
            $contractor->Pormoter_Id = Request::get('pormoter_id');
            $contractor->Phone_Type = Request::get('phone_type');
            $contractor->Nickname = Request::get('nickname');
            $contractor->Religion=Request::get('religion');
            $contractor->Home_Phone=Request::get('home_phone');
            $contractor->Fame=Request::get('fame');

            $contractor->save();
            return redirect('/contractors');
        }

    }

    public function destroy($id)
    {
        $contractor = Contractor::find($id);
        $contractor->delete();
        return redirect('/contractors');
    }


}
 
