<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Promoter;
use App\Contractor;
use App\Visit;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Exception;
use Response;
use Carbon;
use Session;
use Request;
use Flash;
use Collection;

class KpiController extends Controller
{
  public function index()
  {    
    return view('Kpi.index');    
  }

   public function create()
    {
      $promoters = Promoter::all();
      $contractors=Contractor::all(); 
      return view('Kpi.create',compact('contractors','promoters'));
    }


public function store()
{ 
  $profacebook=0;
  $pronewcon=0;
  $proinstgram=0;
  $proWebsite =0;
  $proreports=0;
  $proyoutube=0;
  $pro_facebook =0;
  $pro_instgram=0;
  $pro_Website=0;
  $pro_youtube=0;
  $pro_reports=0;
  $pro_newcon=0;

  $GLOBALS['kpi'] = array();
  $kpiErr = "البيانات غير صحيحة للمندوب:  ";
  $prokpiErr = "لا يوجد مندوب للصف رقم:  ";
  $GLOBALS['promoter_kpi'] = array();

  $input = request()->all();
  $Days=$input['Days'];
  $Reports=$input['Reports'];
  $Visits=$input['Visits'];
  $Calls=$input['Calls'];
  $NewCon=$input['NewCon'];
  $FB=$input['FB'];
  $Inst=$input['Inst'];
  $Activity=$input['Activity'];
  $gps=$input['GPS'];
  $WebSite=$input['WebSite'];
  $Youtube=$input['Youtube'];
  $Cemexads=$input['Cemexads'];
  $Caffe=$input['Caffe'];
  $News=$input['News'];
  $Quantity=$input['Quantity'];
  $QuilityDB=$input['QuilityDB'];
  $Salles=$input['Salles'];
  $School=$input['School'];
  $CementQu=$input['CementQu'];
  $Date_Visit_Call=$input['Date_Visit_Call'];

  $kpi_btn=Request::get('submit');
  if(isset($kpi_btn)) { 
    if(!Input::file('file')){  //if no file selected  
                $errFile = "الرجاء اختيار الملف المطلوب تحميله";                
                $cookie_name = 'FileError';
                $cookie_value = $errFile;
                setcookie($cookie_name, $cookie_value, time() + (60), "/"); 
                return redirect('/Kpi/create');
    } 
    unset ($_COOKIE['FileError']);
    $filename = Input::file('file')->getClientOriginalName();  
    $Dpath = base_path();
    $upload_success =Input::file('file')->move( $Dpath, $filename); 
    $GLOBALS['$Fdata'] = [];

    Excel::load($upload_success, function($reader)
        {   
          $RowNumb=0;
          $results = $reader->get();
          $results = $results->toArray(); 

          foreach ($results as $data)
          {    
              $RowNumb+=1;
            try{
                  $Pormoter_Id= Promoter::where('Code',$data['code'])->pluck('Pormoter_Id')->first();
                  $ProName = DB::table('promoters')->select('Pormoter_Name')
                                ->where('Pormoter_Id', '=',$Pormoter_Id)->first();
                  $ProName = $ProName->Pormoter_Name;
              }
            catch (\Exception $e) {
                $ErrorMessage = "Trying to get property of non-object";
                if ($ErrorMessage == $e->getMessage()) {
                  array_push($GLOBALS['promoter_kpi'],$RowNumb);
                }  
            }  

            $facebook_comment =isset($data['facebook']) ? $data['facebook'] : 0;
            $instgram_follow = isset($data['instgram']) ?$data['instgram']  : 0;
            $Website =isset($data['website']) ?$data['website']  : 0;
            $youtube_follow = isset($data['youtube']) ? $data['youtube']: 0;
            $Report =isset( $data['reports']) ?  $data['reports']: 0;
            $NewCon=isset($data['newcon']) ? $data['newcon'] : 0;
            $Bonus=isset($data['bonus']) ?  $data['bonus']: 0;
            $Others=isset($data['others']) ? $data['others'] : 0;
            $Bnd=isset($data['bnd']) ? $data['bnd'] : 0;

            $ErrFlag =0;

            $facebook_regex = preg_match('/^\d+$/' , $data['facebook']);
            $instgram_regex = preg_match('/^\d+$/' , $data['instgram']);
            $Website_regex = preg_match('/^\d+$/' , $data['website']);
            $youtube_regex = preg_match('/^\d+$/' , $data['youtube']);
            $Report_regex = preg_match('/^\d+$/' , $data['reports']);
            $NewCon_regex = preg_match('/^\d+$/' , $data['newcon']);
            $Bonus_regex = preg_match('/^\d+$/' , $data['bonus']);
            $Others_regex = preg_match('/^\d+$/' , $data['others']);
            $Bnd_regex = preg_match('/^\d+$/' , $data['bnd']);

              if($facebook_regex==1 || $facebook_comment == '0' ) {
                  if($instgram_regex==1 || $instgram_follow == '0' ) {
                       if($Website_regex==1 || $Website == '0' ) {
                          if($youtube_regex==1 || $youtube_follow == '0' ) {
                            if($Report_regex==1 || $Report == '0' ) {
                              if($NewCon_regex==1 || $NewCon == '0' ) {
                                if($Bonus_regex==1 || $Bonus == '0' ) {
                                  if($Others_regex==1 || $Others == '0' ) {
                                    if($Bnd_regex==1 || $Bnd == '0' ) {
                                      array_push($GLOBALS['$Fdata'],array(
                                          'promoter_id'=>$Pormoter_Id,
                                          'facebook_comment'=>$facebook_comment,
                                          'instgram_follow'=>$instgram_follow,
                                          'Website'=>$Website,
                                          'youtube_follow'=>$youtube_follow,
                                          'reports'=>$Report,
                                          'newcon'=>$NewCon,
                                          'bonus'=>$Bonus,
                                          'others'=>$Others,
                                          'bnd'=>$Bnd,

                                          ));
                                  }
                                else {$ErrFlag =1; }
                              }
                              else {$ErrFlag =1; }
                            }
                            else {$ErrFlag =1; }
                          }
                          else {$ErrFlag =1; }
                        }
                        else {$ErrFlag =1; }
                      }
                      else {$ErrFlag =1; }
                    }
                    else {$ErrFlag =1; }
                  }
                  else {$ErrFlag =1; }
              }
              else {$ErrFlag =1; }

              if( $ErrFlag == 1){ // if not matched
                array_push($GLOBALS['$Fdata'],array(
                    'promoter_id'=>"0",
                    'facebook_comment'=>"0",
                    'instgram_follow'=>"0",
                    'Website'=>"0",
                    'youtube_follow'=>"0",
                    'reports'=>"0",
                    'newcon'=>"0",
                    'bonus'=>"0",
                    'others'=>"0",
                    'bnd'=>"0",
                    ));
                array_push($GLOBALS['kpi'],$ProName);
              }
          } // end foreach data

      }); // end excel
   
} // end if submit button

      $tdt = Carbon::now()->startOfMonth()->format('Y-m-d');
      $tdt1 = Carbon::now()->startOfMonth();    
      $fdt = $tdt1->endOfMonth()->format('Y-m-d');
      $range=array($Date_Visit_Call,  $fdt);   
      $Pormoters_Id= DB::table('visits')
             ->select('Pormoter_Id')
             ->whereBetween('Date_Visit_Call',$range)
             ->groupBy('Pormoter_Id')
             ->lists('Pormoter_Id');
         
      $Final=[];

      foreach ($Pormoters_Id as $Pormoter_Id) {
        $results = DB::table('visits')
             ->select('Backcheck')
             ->where('Pormoter_Id','=',$Pormoter_Id)
             ->whereBetween('Date_Visit_Call',$range)
             ->groupBy('Backcheck')
             ->lists('Backcheck');
        
        $Name=DB::table('promoters')
             ->select('Pormoter_Name')
             ->where('Pormoter_Id','=',$Pormoter_Id)->first();

        $Salary=Promoter::where('Pormoter_Id',$Pormoter_Id)->pluck('Salary')->first();

        $Visit_count = DB::table('visits')
               ->select('Visit_Reason',DB::raw('count(*) as total'))
               ->where('Pormoter_Id','=',$Pormoter_Id)
               ->whereBetween('Date_Visit_Call',$range)      
               ->where('Visit_Reason','!=','')      
               ->count('Visit_Reason');

        $number=(($Visit_count/(8*26)));
        
        $Visits_count = number_format($number, 2, '.', '');
        $PERVisit_count=($Visits_count*$Visits)/100;

        $Call_count = DB::table('visits')
              ->select('Call_Reason',DB::raw('count(*) as total'))
              ->where('Pormoter_Id','=',$Pormoter_Id)
              ->whereBetween('Date_Visit_Call',$range)
              ->where('Call_Reason','!=','')  
              ->count('Call_Reason');
            
        $number=(($Call_count/(12*26)));
        $Calls_count = number_format($number, 2, '.', '');
        $PERCall_count=($Calls_count*$Calls)/100;

        $Cement_Quantity = DB::table('visits')
             ->select('Cement_Quantity',DB::raw('count(*) as total'))
             ->where('Pormoter_Id','=',$Pormoter_Id)
             ->whereBetween('Date_Visit_Call',$range)
             ->where('Cement_Quantity','!=','')  
             ->sum('Cement_Quantity');
        
        $number=(($Cement_Quantity/(40)));
        $Cements_Quantity = number_format($number, 2, '.', '');
        $PERCement_Quantity=($Cements_Quantity*$CementQu)/100;

        $Work_Day = DB::table('visits')
             ->select('Date_Visit_Call',DB::raw('count(*) as total'))
             ->where('Pormoter_Id','=',$Pormoter_Id)
             ->whereBetween('Date_Visit_Call',$range)
             ->distinct('Date_Visit_Call')
             ->count('Date_Visit_Call');
            
        $number=(($Work_Day/26));
        $Works_Day = number_format($number, 2, '.', '');
        $PERWorks_Day=($Works_Day*$Days)/100;

        $GPS = DB::table('visits')
             ->select('GPS',DB::raw('count(*) as total'))
             ->where('Pormoter_Id','=',$Pormoter_Id)
             ->whereBetween('Date_Visit_Call',$range)
             ->where('GPS','!=','')
             ->count('GPS');
               
        $number=(($GPS/(3*26)));
        $GPSs = number_format($number, 2, '.', '');
        $PERGPS=($GPSs*$gps)/100;

        foreach ($GLOBALS['$Fdata'] as $item) {
          if($item['promoter_id']==$Pormoter_Id){
            $pro_facebook=$item['facebook_comment'];
            $profacebook=($pro_facebook/(2*26));
            $profacebook = number_format($profacebook, 2, '.', '');

            $pro_instgram=$item['instgram_follow'];
            $proinstgram=($pro_instgram/(1*26));
            $proinstgram = number_format($proinstgram, 2, '.', '');
            
            $pro_Website=$item['Website'];
            $proWebsite=($pro_Website/(3*26));
            $proWebsite = number_format($proWebsite, 2, '.', '');

            $pro_youtube=$item['youtube_follow'];
            $proyoutube=($pro_youtube/(2*26));
            $proyoutube = number_format($proyoutube, 2, '.', '');

            $pro_reports=$item['reports'];
            $proreports=($pro_reports/(1*26));
            $proreports = number_format($proreports, 2, '.', '');

            $pro_newcon=$item['newcon'];
            $pronewcon=($pro_newcon/(1*26));
            $pronewcon = number_format($pronewcon, 2, '.', '');

            $pro_bonus=$item['bonus'];
            $probonus = number_format($pro_bonus, 2, '.', '');

            $pro_others=$item['others'];
             $proothers = number_format($pro_others, 2, '.', '');


            $pro_bnd=$item['bnd'];
            $probnd = number_format($pro_bnd, 2, '.', '');

          } //end if item promoter id 
        } // end foreach fdata 

  $Anwser=0;
  $closed=0;
  $No_answer=0;
  $Repeat=0;
  $Wrong=0;
  $NO= 0;

        foreach ($results as $key) {        
          if($key=='نعم')
          {
             $Anwser = DB::table('visits')
                  ->select(DB::raw('count(*) as total'))
                  ->where('Pormoter_Id','=',$Pormoter_Id)
                  ->whereBetween('Date_Visit_Call',$range)
                  ->where('Backcheck','=',$key)
                  ->lists('total');
              $Anwser=$Anwser[0];
            
          }
          elseif ($key=='مغلق') {
             $closed = DB::table('visits')
                 ->select(DB::raw('count(*) as total'))
                 ->where('Pormoter_Id','=',$Pormoter_Id)
                 ->whereBetween('Date_Visit_Call',$range)
                 ->where('Backcheck','=',$key)
                 ->lists('total');
            $closed = $closed[0];
      
          }
         elseif ($key=='لم يرد') {
              $No_answer = DB::table('visits')
                    ->select(DB::raw('count(*) as total'))
                    ->where('Pormoter_Id','=',$Pormoter_Id)
                    ->whereBetween('Date_Visit_Call',$range)
                    ->where('Backcheck','=',$key)
                    ->lists('total');

              $No_answer=$No_answer[0];

          }
        elseif ($key=='متكرر') {
              $Repeat = DB::table('visits')
                  ->select(DB::raw('count(*) as total'))
                  ->where('Pormoter_Id','=',$Pormoter_Id)
                  ->whereBetween('Date_Visit_Call',$range)
                  ->where('Backcheck','=',$key)
                  ->lists('total');
              $Repeat=$Repeat[0]/5;

        }
        elseif ($key=='لا') {
            $NO = DB::table('visits')
                ->select(DB::raw('count(*) as total'))
                ->where('Pormoter_Id','=',$Pormoter_Id)
                ->whereBetween('Date_Visit_Call',$range)
                ->where('Backcheck','=',$key)
                ->lists('total');
            $NO =$NO[0];
                                                     
        }

        elseif ($key=='رقم خطأ') {
              $Wrong = DB::table('visits')
                  ->select(DB::raw('count(*) as total'))
                  ->where('Pormoter_Id','=',$Pormoter_Id)
                  ->whereBetween('Date_Visit_Call',$range)
                  ->where('Backcheck','=',$key)
                  ->lists('total');

              $Wrong= $Wrong[0];
            }
        else{
                $done=0;
            }       
    } //end foreach result

    if($Anwser>0)
       {
          $Total=($Anwser/($Anwser+$NO));
       }
    else
       {
        $Total=0.1;
       }

    $Sub=($No_answer*(0.01))+($Repeat*(0.05))+($closed*(0.01))+($Wrong*(0.05));     
    $BAnaylsis=($Total-$Sub)*100;      
    $Anaylsis = ceil(number_format($BAnaylsis, 2, '.', ''));
    $totalsalary=($Salary*$Work_Day);
    $sumation=$totalsalary*(
                               ($PERWorks_Day)+($PERGPS)+($PERCement_Quantity)+
                               ($PERCall_count)+($PERVisit_count)+ (($profacebook*$FB)/100)+
                               (($pronewcon*$NewCon)/100)+ (($proinstgram*$Inst)/100)+ (($proWebsite*$WebSite)/100)+
                               (($proreports*$Reports)/100)+(($proyoutube*$Youtube)/100)+
                               (.06*.5)+(.1*.06)+(.07*.8)+
                               (.07*.1)+(.08*.8)+(1*.05)+
                               ($PERVisit_count)
                        );

    $resumation=$sumation*($Anaylsis/100);
    $resumation = ceil(number_format($resumation, 2, '.', ''));
    array_push($Final,array('Name'=>$Name->Pormoter_Name,
                                    'Salary'=>$Salary,
                                    'Backcheck'=>$Anaylsis,
                                    'GPS'=>$GPS,
                                    'GPS%'=>$GPSs*100,
                                    'Work_Day%'=> $Works_Day*100,
                                    'Work_Day'=> $Work_Day,
                                    'Visit_count'=>$Visit_count,
                                    'Visit_count%'=>$Visits_count*100,
                                    'Call_count'=>$Call_count,
                                    'Call_count%'=>$Calls_count*100,
                                    'Cement_Quantity'=>$Cement_Quantity,
                                    'Cement_Quantity%'=>$Cements_Quantity*100,
                                    'facebook'=>$pro_facebook,
                                    'instgram'=>$pro_instgram,
                                    'Website'=>$pro_Website,
                                    'youtube'=>$pro_youtube,
                                    'reports'=>$pro_reports,
                                    'newcon'=>$pro_newcon,
                                    'facebook%'=>$profacebook*100,
                                    'instgram%'=>$proinstgram*100,
                                    'Website%'=>$proWebsite*100,
                                    'youtube%'=>$proyoutube*100,
                                    'reports%'=>$proreports*100,
                                    'newcon%'=>$pronewcon*100,
                                    'sumation'=>$sumation,
                                    'resumation'=>$resumation

                                  ));
 
      } // end foreach results as key
$CookieFlag=0;
  if ( !empty ($GLOBALS['kpi'] )) {
            $GLOBALS['kpi'] = array_unique($GLOBALS['kpi']);
            $kpiErr = $kpiErr.implode(" \n ",$GLOBALS['kpi']);
            $kpiErr = nl2br($kpiErr);  
            $cookie_name = 'kpiErr';
            $cookie_value = $kpiErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
            $CookieFlag=1;
  }
  if ( !empty ($GLOBALS['promoter_kpi'] )) {
            $GLOBALS['promoter_kpi'] = array_unique($GLOBALS['promoter_kpi']);
            $prokpiErr = $prokpiErr.implode(" \n ",$GLOBALS['promoter_kpi']);
            $prokpiErr = nl2br($prokpiErr);  
            $cookie_name = 'prokpiErr';
            $cookie_value = $prokpiErr;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
            $CookieFlag=1;
  }
  if ($CookieFlag == 1) { // there is cookie, there is error
      return redirect('/Kpi/create');
  }

  else {  // no cookie, no error
    return view('Kpi.index',compact('Final') );
  }

  }// end foreach promoter ids
}