<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

//use Illuminate\Http\Request;
use Validator;
use Input;
use App\Award;
use DB;
use Request;

class AwardsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() 
	{
	 try
		    {	
			    $awards=Award::all();
				
			
				return view('awards.index',compact('awards'));
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
		 //    {
		        return view('awards.create');
		   //  }   
     // catch (Exception $e)
		   //  {
		   //  	return redirect('/presents');
		    	
		   //  } 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  // try
		 // {
		$rules = array(
			 'Name'          =>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}{0-9}]+(?:$|\s+)){1,}$/u','unique:awards,Name'),
			 'Total_Amount'   =>array('required','regex:/^(.*[^0-9]|)(10000|[1-9]\d{0,2})([^0-9].*|)$/'),
			 'Cost'   =>array('required'),
			);

			$messages = [
			    'required'           =>     'برجاء إدخال البيانات ',
			    'regex'              =>     'إدخال رقم صحيح اكبر من الصفر',
			    'unique'              =>      'هذا الاسم موجود بالفعل'

			   
			];


		     $Validator=Validator :: make(Input::all(),$rules,$messages);
		   // dd(Input::all());
		        if($Validator->fails())
					{
						return redirect('/awards/create')->withErrors($Validator)->withInput();
					}

		$c=Request::get('Cost');
		$t=Request::get('Total_Amount');
		$award = new Award;
		$award->Name=Request::get('Name');
		$award->Total_Amount=Request::get('Total_Amount');
		$award->Cost=Request::get('Cost');
		$award->Total_Cost=($c)*($t);
		$award->Status=1;




		
		$award->save();
		return redirect('/awards');
      //  }
      //  	catch (Exception $e)
		    // {
		    // 	return redirect('/awards');
		    	
		    // }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($Awards_Id)

	{
      // try
		    // {

				 $award=Award::findOrFail($Awards_Id);
				//$award=DB::table('awards')->where('Awards_Id',$Awards_Id)->first();
				return view('awards.show',compact('award'));
	     //    }
	     //    	catch (Exception $e)
		    // {
		    // 	return redirect('/awards');
		    	
		    // }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($Awards_Id)
	{
      //   try
		    // {
				$award=DB::table('awards')->where('Awards_Id',$Awards_Id)->first();
				return view('awards.edit',compact('award'));
		//     }
		// catch (Exception $e)
		//     {
		//     	return redirect('/awards');
		    	
		//     }		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($Awards_Id)
	{
		// try
		//     {
		$award = Award ::where('Awards_Id',$Awards_Id)->first();
		//dd($award->Awards_Id);
//,.$award->Awards_Id.'Awards_Id'),
		$rules = array(
			 'Name'          =>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}{0-9}]+(?:$|\s+)){1,}$/u'),
             'Name'          =>'required|unique:awards,Name,'.$award->Awards_Id.',Awards_Id',
			 'Total_Amount'   =>array('required','regex:/^(.*[^0-9]|)(1000000|[1-9]\d{0,2})([^0-9].*|)$/'),
			 'Cost'   =>array('required'),
			);

			$messages = [
			    'required'           =>     'برجاء إدخال البيانات ',
			    'regex'              =>     'إدخال رقم صحيح اكبر من الصفر',
			   'unique'              =>      'هذا الاسم موجود بالفعل'
			];


		     $Validator=Validator :: make(Input::all(),$rules,$messages);
		   // dd(Input::all());
		        if($Validator->fails())
					{
						return redirect('/awards/'.$Awards_Id.'/edit')->withErrors($Validator)->withInput();
					}


		$award = Award ::where('Awards_Id',$Awards_Id)->first();
		$award->Name=Request::get('Name');
		$award->Total_Amount=Request::get('Total_Amount');
		$award->Total_Cost=(Request::get('Cost'))*(Request::get('Total_Amount'));
		$award->Cost=Request::get('Cost');
		$award->Status=1;
		$award->save();
		return redirect('/awards/'.$Awards_Id.'/edit');
	// }
	// catch (Exception $e)
	// 	    {
	// 	    	return redirect('/awards');
		    	
	// 	    }
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($Awards_Id)
	{
		// try
		//     {
				$award = Award ::where('Awards_Id',$Awards_Id)->first();
				$award->delete();
				return redirect('/awards');
			// }	
			// 	catch (Exception $e)
		 //    {
		 //    	return redirect('/awards');
		    	
		 //    }
	}

}
