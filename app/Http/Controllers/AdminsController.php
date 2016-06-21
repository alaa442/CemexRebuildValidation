<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;
use DB;
use Excel;
use Input;

use Request;

class AdminsController extends Controller
{
    public function index()
    {
           $admins = Admin::all();
            return view('admins.index',compact('admins')); 
    }

    public function show($id)
    {
    	$admin = Admin::findOrFail($id);
        return view('admins.show',compact('admin'));
    }

    public function store()
    {
        $rules = array(
            'admin_name'=>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u','unique:admins,Admin_Name'),
'user_name' => array('required','regex:/(?!^\d+$)^.+$/','unique:admins,User_Name'),
            'mail' => array('email','unique:admins,Mail'),
            'password' => array('required','unique:admins,Password'),
         );

        $messsages = array(
            'admin_name.regex'=> 'الرجاء أدخل الاسم صحيح',
            'user_name.regex' => 'ادخل اسم المستخدم صحيح',
            'required' => 'برجاء ادخال البيانات',
            'unique' => 'هذه القيمة موجوده بالفعل', 
            'email'=>'ادخل البريد الاليكتروني بطريقة صحيحة'                  
        );

    $validator = Validator::make(Input::all(), $rules,$messsages);       
        if ($validator->fails()) {
                // dd($validator);
                return redirect('admins/create')
                                ->withErrors($validator)->withInput();
            }
        
        else {   
            $admin = new Admin;
            $admin->Admin_Name = Request::get('admin_name');
            $admin->User_name = Request::get('user_name');
            $admin->Password = Request::get('password');
            $admin->Mail = Request::get('mail');
            $admin->save();
            return redirect('/admins');
            }
                      
    }

    public function create()
    {        
    	return view('admins.create');
    }

    public function edit($id)
    { 
        $admin = Admin::find($id);
    	return view('admins.edit',compact('admin'));
    }

    public function update($id)
    {
        $admin = Admin::find($id);
       $rules = array(
            'admin_name'=>array('required',
            'regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
            'user_name' => array('required','regex:/(?!^\d+$)^.+$/'),
            'mail' => array('email'),
            'password' => array('required'),
         );

        $messsages = array(
            'admin_name.regex'=> 'الرجاء أدخل الاسم صحيح',
            'user_name.regex' => 'ادخل اسم المستخدم صحيح',
            'required' => 'برجاء ادخال البيانات',
            'unique' => 'هذه القيمة موجوده بالفعل', 
            'email'=>'ادخل البريد الاليكتروني بطريقة صحيحة'                  
        );
        $validator = Validator::make(Input::all(), $rules,$messsages);     
        if ($validator->fails()) {
                return redirect('admins/'.$admin->Admin_Id.'/edit')
                                ->withErrors($validator)->withInput();
            } 

        else {   
                $admin->Admin_Name = Request::get('admin_name');
                $admin->User_Name = Request::get('user_name');
                $admin->Password = Request::get('password');
                $admin->Mail = Request::get('mail');
                $admin->save();
                return redirect('/admins');
            }
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admins');
    }


      public function exportadmin()
    {
        $exportbtn=Request::get('export');
        if(isset($exportbtn))
        {    
        Excel::create('adminfile', function($excel)
        {
            $excel->sheet('sheetname',function($sheet)
            {        
            $sheet->appendRow(1, array('اسم الادمن','اسم المستخدم','البريد الاليكتروني','كلمة المرور'));
            
            $data=[];

            $admins=Admin::all();

          foreach ($admins as $admin)
           {
            array_push($data,array(
                $admin->Admin_Name,
                $admin->User_Name,
                $admin->Mail,
                $admin->Password                       
             ));        
        }  
    $sheet->fromArray($data, null, 'A2', false, false);
    }); })->download('xls');
    
    }
}
    

}

