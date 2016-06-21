@extends('master')

@section('content')

{!!Form::open(['route' =>[ 'promoters.update',$promoters->Pormoter_Id],'method' => 'put'])!!}
 <table class="table table-striped table-bordered table-hover">
<tr> <td>  أسم المندوب</td>
 <td> <input type="text" name="Pormoter_Name" value="{{$promoters->Pormoter_Name}}">{!!$errors->first('Pormoter_Name','<small class="label label-danger">:message</small>')!!}</td></tr>
 <tr> <td>رقم التليفون</td>
 <td> <input type="text" name="TelephonNo" value="{{$promoters->TelephonNo}}">{!!$errors->first('TelephonNo','<small class="label label-danger">:message</small>')!!}</td></tr>
 <tr> <td> أسم المستخدم </td>
  <td> <input type="text" name=" User_Name" value="{{$promoters->User_Name}}">{!!$errors->first('User_Name','<small class="label label-danger">:message</small>')!!}</td></tr>
 <tr> <td> الرقم السرى</td>
  <td> <input type="password" name=" Password" value="{{$promoters->Password}}">{!!$errors->first('Password','<small class="label label-danger">:message</small>')!!}</td></tr>
  <tr> <td> حساب الانستجرام </td> 
    <td> <input type="text" name=" Instegram_Account" value="{{$promoters->Instegram_Account}}">{!!$errors->first('Instegram_Account','<small class="label label-danger">:message</small>')!!}</td></tr>
    <tr> <td> حساب الفيسبوك  </td>
    <td>  <input type="text" name=" Facebook_Account" value="{{$promoters->Facebook_Account}}">{!!$errors->first('Facebook_Account','<small class="label label-danger">:message</small>')!!}</td></tr>
     <tr> <td> البريد الاكترونى  
       <td> <input type="text" name=" Email" value="{{$promoters->Email}}">{!!$errors->first('Email','<small class="label label-danger">:message</small>')!!}</td></tr>
         <tr> <td>   المحافظة
        <td><input type="text" name=" Government" value="{{$promoters->Government}}" >{!!$errors->first('Government','<small class="label label-danger">:message</small>')!!}</td></tr>
     <tr> <td>   المركز
       <td> <input type="text" name=" City" value="{{$promoters->City}}">{!!$errors->first('City','<small class="label label-danger">:message</small>')!!}</td></tr>
   
      <tr> <td>     الخبرة
      <td>   <input type="text" name=" Experince" value="{{$promoters->Experince}}">{!!$errors->first('Experince','<small class="label label-danger">:message</small>')!!}</td></tr>
      <tr> <td>     تاريخ بدء العمل
      <td>   <input type="date" name=" Start_Date" value="{{$promoters->Start_Date}}">{!!$errors->first('Start_Date','<small class="label label-danger">:message</small>')!!}</td></tr>
   <tr> <td>     اليومية
      <td>   <input type="text" name=" Salary" value="{{$promoters->Salary}}">{!!$errors->first('Salary','<small class="label label-danger">:message</small>')!!}</td></tr>

      <tr> <td> <input type="submit" value="حفظ"> </tr> </td>
</table>
{!!Form::close() !!}

@stop