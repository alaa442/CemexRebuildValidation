<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Illuminate\Contracts\Validation\Validator;
//use Illuminate\Http\Request;
use  Illuminate\Support\Collection;
use Validator;
use App\Competition;
use App\Award;
use Input;
use DB;
use Request;


class CompetitionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

public function index()
	{
      try
		   {
				$competitions=Competition::get();
		    

				return view('competitions.index',compact('competitions'));
			}	
				catch (Exception $e)
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
		// try 
		//     {
				$awards= Award ::where('Status','1')->lists('Name','Awards_Id');



				
				return view('competitions.create',compact('awards'));
		// 	}
		// catch (Exception $e)
		//     {
		//     	return redirect('/competitions');
		    	
		//     }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// try
		//     {
		$rules = array(
			'Name'          =>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}{0-9}]+(?:$|\s+)){1,}$/u'),
			'Period'        => 'required|integer|regex:/^[1-9]*$/', 
			'Start_Date'    =>'required|date|date_format:Y-m-d|after:today', 
			'End_Date'      => 'required|date|after:Start_Date',
			'City'          =>array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){1,}$/u'),

			
			
			);

			$messages = [
			    'required'           =>     'برجاء إدخال البيانات ',
			    'End_Date.after'     =>     'برجاء إدخال تاريخ الانتهاء صحيح ',
			    'Start_Date.after'   =>     'برجاء إدخال تاريخ حديث لبدء المسابقه  ',
			    'integer'            =>     'برجاء ادخال رقم صحيح',
			    'Period.regex'       =>     ' برجاء ادخال رقم صحيح اكبر من الصفر',
			    'regex'              =>     'الاسم خاطيء',
			    'date_format'        =>     'برجاء ادخال التاريخ بهذه الطريقه 18-02-2016',
			    'City.regex'         =>     'برجاء إدخال المركز صحيح '
			];


		     $Validator=Validator :: make(Input::all(),$rules,$messages);
		   //  dd(Input::all());
		        if($Validator->fails())
					{
						return redirect('/competitions/create')->withErrors($Validator)->withInput();
					}
		else
		{

        $competition= New Competition ;

		$competition->Name=Request::get('Name');
		$competition->Period=Request::get('Period');
	    $competition->Government=Request::get('Government');
	    $competition->City=Request::get('CityS');
        $competition->Start_Date=Request::get('Start_Date');
		$competition->End_Date=Request::get('End_Date');		
		$competition->Code=uniqid("Comp");

		$competition->save();
		
           
           $array=Request::get('Total_Amount');
        

          $i=0;
                    
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);

			         /*new now*/
                     $new_awards=Award ::where('Awards_Id',$awardId)->first();
                     

                     $amount=($new_awards->Total_Amount)-($total_amount);
                    
		            
		             if ($amount>0) {
							             $new_awards->Total_Amount=$amount;
							            $new_awards->Total_Cost=($new_awards->Cost)*($new_awards->Total_Amount);

							             $new_awards->Status=1;
							             $new_awards->save();

					                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
					                     $i++;
							        }
		             elseif($amount==0)
		                 {
							             $new_awards->Total_Amount=0;
					                     $new_awards->Status=0;
							             $new_awards->save();

					                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
					                     $i++;

		                 }
		                 else
		                 {
		                 	             $new_awards->Total_Amount=0;
					                     $new_awards->Status=0;
							             $new_awards->save();

                            $total_amount +=$amount;
						if ( $total_amount>0) {

							 $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
							 $i++;
						}
                         else
                         {
                         	 $i++;
                         }    


		                 }


        	}
		return redirect('/competitions');
	}
	//}


     	// 	catch (Exception $e)
		    // {
		    // 	return redirect('/competitions');
		    	
		    // }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Competitions_Id)
	{
		// try
		// 	{
			 $competition=Competition ::findOrFail($Competitions_Id);
				
			 return view('competitions.show',compact('competition'));
			// }
			// 		catch (Exception $e)
		 //    {
		 //    	return redirect('/competitions');
		    	
		 //    }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Competitions_Id)
	{
		// try
		//     {

				$awards= Award ::lists('Name','Awards_Id');
				$competition=Competition ::where('Competitions_Id',$Competitions_Id)->first();
				
				return view('competitions.edit',compact('competition','awards'));
		    // }	
		    // 		catch (Exception $e)
		    // {
		    // 	return redirect('/competitions');
		    	
		    // }	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Competitions_Id)
	{
		// try
		//     {

				$rules = array(
					'Name'          =>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}{0-9}]+(?:$|\s+)){1,}$/u'),
					'Period'        => 'required|integer|regex:/^[1-9]*$/', 
					'Start_Date'    =>'required|date|date_format:Y-m-d', 
					'End_Date'      => 'required|date|date_format:Y-m-d|after:Start_Date',
					 'City'          =>array('regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){1,}$/u'),
					
					);

					$messages = [
					    'required'           =>     'برجاء إدخال البيانات ',
					    'End_Date.after'     =>     'برجاء إدخال تاريخ الانتهاء صحيح ',
					    'Start_Date.after'   =>     'برجاء إدخال تاريخ حديث لبدء المسابقه  ',
					    'integer'            =>     'برجاء ادخال رقم صحيح',
					    'Period.regex'       =>     ' برجاء ادخال رقم صحيح اكبر من الصفر',
					    'regex'              =>     'الاسم خاطيء',
					    'date_format'        =>     'برجاء ادخال التاريخ بهذه الطريقه 2016-02-18',
					     'City.regex'         =>     'برجاء إدخال المركز صحيح '
					];

				     $Validator=Validator:: make(Input::all(),$rules,$messages);
				   
				        if($Validator->fails())
							{
								return redirect('/competitions/'.$Competitions_Id.'/edit')->withErrors($Validator)->withInput();
							}
				 
								$competition = Competition ::where('Competitions_Id',$Competitions_Id)->first();
                               $result=[];

								  foreach($competition->awards as $items)
									   {
										
										  array_push($result,array('Total_Amount'=>$items->pivot->Total_Amount,
										  	                    $items->Awards_Id=>$items->Name));

                                           $new_awards=Award ::where('Awards_Id',$items->Awards_Id)->first();
                     

                                           $amount=($new_awards->Total_Amount)+($items->pivot->Total_Amount);

                                          $new_awards->Total_Amount=$amount;
		                                  $new_awards->Total_Cost=($new_awards->Cost)*($amount);
		           
		            
							            
							             $new_awards->Status=1;
							             $new_awards->save();
									  	 	
									  }
	
							    $competition->Name=Request::get('Name');
							    $competition->City=Request::get('City');
								$competition->Period=Request::get('Period');
								$competition->Start_Date=Request::get('Start_Date');
								$competition->End_Date=Request::get('End_Date');
							    $competition->Government=Request::get('Government');
								$competition->save();
								//dd($result);

								
						        $competition->awards()->detach();
						        $array=Request::get('Total_Amount');

			         $i=0;         
			        foreach (Request::get('awards') as $awardId) {

                     $total_amount=$array[$i];
                     $award = Award ::find($awardId);

			         /*new now*/
                     $new_awards=Award ::where('Awards_Id',$awardId)->first();
                     

                     $amount=($new_awards->Total_Amount)-($total_amount);

                    
		             $new_awards->Total_Cost=($new_awards->Cost)*($new_awards->Total_Amount);
		            
		             if ($amount>0) {
							             $new_awards->Total_Amount=$amount;
							             $new_awards->Status=1;
							             $new_awards->save();

					                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
					                     $i++;
							        }
		             elseif($amount==0)
		                 {
							             $new_awards->Total_Amount=0;
					                     $new_awards->Status=0;
							             $new_awards->save();

					                     $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
					                     $i++;

		                 }
		                 else
		                 {
		                 	             $new_awards->Total_Amount=0;
					                     $new_awards->Status=0;
							             $new_awards->save();

                            $total_amount +=$amount;
						if ( $total_amount>0) {

							 $competition->awards()->attach($award,['Total_Amount'=>$total_amount]);
							 $i++;
						}
                         else
                         {
                         	 $i++;
                         }    


		                 }
		        	}
				return redirect('/competitions/'.$Competitions_Id.'/edit');
	   // }
	   // 		catch (Exception $e)
		  //   {
		  //   	return redirect('/competitions');
		    	
		  //   }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Competitions_Id)
	{
		// try
		//     {
				$competition = Competition ::where('Competitions_Id',$Competitions_Id)->first();
				$competition->delete();
			 	return redirect('/competitions');
			// }
			// 		catch (Exception $e)
		 //    {
		 //    	return redirect('/competitions');
		    	
		 //    }
				
	}
		public function exportCompetitions()
{
	// try
	// 	    {

  $exportbtn= Request::get('export'); 

   	if(isset($exportbtn))
   	{ 
   	
   		Excel::create('Competitionfile', function($excel)
   		 { 

   			$excel->sheet('sheetname',function($sheet)
   			{        

   				$sheet->appendRow(1, array(
               'اسم المسابقه','كود المسابقه',
             
               'تاريخ بدء المسابقه','المده',
               'تاريخ انتهاء المسابقه','اسم الجائزه ',
              



));
   				$data=[];

  $Competitions=Competition::all();

  foreach ($Competitions as $Competition) {


 $result=[];

   foreach($Competitions->awards as $items)
   {
	$result=$items->pivot->Total_Amount .$items->Name;
  	 	
  }
								         

										
	

  	array_push($data,array(

       
		$Competitions->Name,
		$Competitions->Code,
		$Competitions->Start_Date,
		$Competitions->Period,
	
		$Competitions->End_Date,
	    $result,
  		));
  	

  	
  	}	
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
   	
}
// }
// catch (Exception $e)
// 		    {
// 		    	return redirect('/competitions');
		    	
// 		    }
 
}

}
