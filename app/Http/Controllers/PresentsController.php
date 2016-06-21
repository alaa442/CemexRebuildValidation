<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Illuminate\Http\Request;
use Validator;
use Input;
use Excel;
use File;
use App\Competition;
use App\Award;
use App\Present;
use App\Contractor;
use DB;
use Response;
use Request;

class PresentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response 
	 */
	public function index()
	{
		// try
		//     {
 $present= Present ::all();

  

	return view('presents.index',compact('present'));
				// }
		  //  catch (Exception $e)
		  //   {
		  //   	return redirect('/');
		    	
		  //   }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
			//  $awards= Award ::lists('Name','Awards_Id');
			
				return view('presents.create');
	}




public function getCompetitions($id)
    {
        $competitions = Competition ::where('Government','=',$id)->get();
        $options = array();
      foreach ($competitions as $competition) {
          $options += array($competition->Competitions_Id => $competition->Code);

        }

        return Response::json($options);
    }



public function getContractors($id)
    {
       
        $contractor=Contractor ::where('Goverment','=',$id) ->get();
        $options = array();
      foreach ($contractor as $contractor) {
           $options += array($contractor->Contractor_Id => $contractor->Name);

        }
     
        return Response::json($options);
    }

public function getAwards($id)
    {
       
       $competitions = Competition ::where('Competitions_Id','=',$id)->first();
        $options = array();
       foreach ($competitions->awards as $items) {
          $options += array($items->Awards_Id => $items->Name);

        }
     
        return Response::json($options);
    }







	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	// {
	// 	try
    {
    	$rules = array(
		
			'Delivery_Date'  => 'required|date|date_format:Y-m-d', 
			'Ranking'        => 'required|integer|regex:/^[1-9]*$/',
			'Government'     => 'required|not_in:0',
            'competition'    => 'required|not_in:0',
            'contractor'     => 'required|not_in:0',
    
			
			
			);

			$messages = [
			    'required'           =>     'برجاء إدخال البيانات ',
			    'integer'            =>     'برجاء ادخال رقم صحيح',
			    'regex'              =>     ' برجاء ادخال رقم صحيح اكبر من الصفر',
			    'not_in'             =>     'برجاء قم بأختيار البيانات',
			    'date_format'        =>     'برجاء ادخال التاريخ بهذه الطريقه 18-02-2016'
			];


		     $Validator=Validator :: make(Input::all(),$rules,$messages);
		        if($Validator->fails())
					{
						return redirect('/presents/create')->withErrors($Validator)->withInput();
					}



    

        // $contractor_id=Contractor ::where('Name','=',$Name)->get();
		$present= New Present ;
		$present->Ranking=Request::get('Ranking');
		$present->Delivery_Date=Request::get('Delivery_Date');
		$present->competition_id=Request::get('competition');
		$present->contractor_id=Request::get('contractor');
	

		$present->save();
		
           $array=Request::get('Amount');
        

          $i=0;
                   
                    
        foreach (Request::get('awards') as $awardId) {

		             $total_amount=$array[$i];               
			         $award = Award ::find($awardId);
                     $present->getwards()->attach($award,['Amount'=>$total_amount]);
                     $i++;
        	}
		               return redirect('/presents');
				 // }
		   //  catch (Exception $e)
		   //  {
		   //  	return redirect('/presents');
		    	
		   //  }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Presents_Id)
	{
		try
		    {
				 $present=Present ::findOrFail($Presents_Id);
				
				return view('presents.show',compact('present'));
			}
			catch (Exception $e)
		    {
		    	return redirect('/presents');
		    	
		    }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Presents_Id)
	{
				try
		    {


				$awards= Award ::lists('Name','Awards_Id');
				$contractor=Contractor ::lists('Name','Contractor_Id');
			    $competition=Competition ::lists('Code','Competitions_Id');
				$present=Present ::where('Presents_Id',$Presents_Id)->first();
				
				return view('presents.edit',compact('present','awards','contractor','competition'));
			}
			catch (Exception $e)
		    {
		    	return redirect('/presents');
		    	
		    }
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Presents_Id)
	{
			try
	      {

         $rules = array(
		
			'Delivery_Date'  =>'required|date|date_format:Y-m-d', 
			'Ranking'        =>'required|integer|regex:/^[1-9]*$/'
			
			
			);

			$messages = [
			    'required'           =>     'برجاء إدخال البيانات ',

			    'integer'            =>     'برجاء ادخال رقم صحيح',
			    'regex'              =>     ' برجاء ادخال رقم صحيح اكبر من الصفر',
			   
			    'date_format'        =>     'برجاء ادخال التاريخ بهذه الطريقه 18-02-2016'
			];


		     $Validator=Validator :: make(Input::all(),$rules,$messages);
		        if($Validator->fails())
					{
						return redirect('/presents/'.$Presents_Id.'/edit')->withErrors($Validator)->withInput();
					}




			$present = Present ::where('Presents_Id',$Presents_Id)->first();
		    $present->Ranking=Request::get('Ranking');
			$present->Delivery_Date=Request::get('Delivery_Date');
			$present->competition_id=Request::get('competition');
			$present->contractor_id=Request::get('contractor');
			$present->save();
	        $present->getwards()->detach();
	        $array=Request::get('Amount');
	        
	         $i=0;         
	        foreach (Request::get('awards') as $awardId) {

			             $total_amount=$array[$i];               
				         $award = Award ::find($awardId);
	                     $present->getwards()->attach($award,['Amount'=>$total_amount]);
	                     $i++;
	        	}
			return redirect('/presents/'.$Presents_Id.'/edit');
		}
		catch (Exception $e)
		    {
		    	return redirect('/presents');
		    	
		    }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Presents_Id)
	{
		try
		    {
				$present = Present ::where('Presents_Id',$Presents_Id)->first();
				$present->delete();
				return redirect('/presents');
			}
			catch (Exception $e)
		    {
		    	return redirect('/');
		    	
		    }
	}
	public function exportPresents()
{
	try
		    {

  $exportbtn= Request::get('export'); 

   	if(isset($exportbtn))
   	{ 
   	
   		Excel::create('Presentfile', function($excel)
   		 { 

   			$excel->sheet('sheetname',function($sheet)
   			{        

   				$sheet->appendRow(1, array(
               'اسم المقاول','اسم المسابقه',
               'تاريخ استلام الهدايه','الترتيب',
               'تاريخ بدء المسابقه','المده',
               'تاريخ انتهاء المسابقه','اسم الجائزه ',
              



));
   				$data=[];

  $Presents=Present::all();

  foreach ($Presents as $present) {


 $result=[];

   foreach($present->getwards as $items)
  {

  	$result= $items->pivot->Amount.$items->Name;
  	 	
  }
								         

										
	

  	array_push($data,array(

       
		$present->getcontractors->Name,
		$present->getcompetitions->Name,
		
		$present->Delivery_Date,
		$present->Ranking,
	    $present->getcompetitions->Period,
	    $present->getcompetitions->Start_Date,
		$present->getcompetitions->End_Date,
	    $result,
  		));
  	

  	
  	}	
  $sheet->fromArray($data, null, 'A2', false, false);
});
})->download('xls');
   	
}
}
catch (Exception $e)
		    {
		    	return redirect('/presents');
		    	
		    }
 
}

}
