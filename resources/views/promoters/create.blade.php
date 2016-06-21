@extends('master')

@section('content')
{!!Form::open(['route' => 'promoters.store','method' => 'post'])!!}
 <table class=" table form-group">
  <tr>
 <td> أسم المندوب</td>
  <td><input type="text" name="Pormoter_Name" >{!!$errors->first('Pormoter_Name','<small class="label label-danger">:message</small>')!!} </td>
 </tr>
 <tr>
 <td>رقم التليفون</td>
 <td> <input type="tel" name="TelephonNo" min="10" max="11">  {!!$errors->first('TelephonNo','<small class="label label-danger">:message</small>')!!}  </td> 
</tr>
</tr>
 <td>أسم المستخدم</td>
 <td> <input type="text" name=" User_Name" >{!!$errors->first('User_Name','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
 <td> الرقم السرى</td>
  <td> <input type="password" name=" Password"> {!!$errors->first('Password','<small class="label label-danger">:message</small>')!!} </td>
   </tr>
   <tr>
   <td> حساب الانستجرام </td> 
    <td> <input type="text" name=" Instegram_Account" >{!!$errors->first('Instegram_Account','<small class="label label-danger">:message</small>')!!}</td>
    </tr>
    <tr>
      <td>  حساب الفيسبوك</td>
     <td> <input type="text" name=" Facebook_Account" >{!!$errors->first('Facebook_Account','<small class="label label-danger">:message</small>')!!}</td>
      </tr>
      <tr>
      <td>  البريد الاكترونى </td>
      <td>  <input type="text" name=" Email" >{!!$errors->first('Email','<small class="label label-danger">:message</small>')!!}</td>
        </tr>
           <tr>
       <td> المحافظة</td>
      <td>  <input type="text" name=" Government" >{!!$errors->first('Government','<small class="label label-danger">:message</small>')!!}</td>
        </tr>
        <tr>
      <td>   المركز</td>
      <td>  <input type="text" name=" City" >{!!$errors->first('City','<small class="label label-danger">:message</small>')!!}</td>
        </tr>
     
          <tr>
       <td> الخبرة</td>
       <td>  <input type="number"  name=" Experince">  {!!$errors->first('Experince','<small class="label label-danger">:message</small>')!!} </td>
       </tr>
             <tr>
       <td> تاريخ بدء العمل</td>
       <td>  <input type="date"  name=" Start_Date">  {!!$errors->first('Start_Date','<small class="label label-danger">:message</small>')!!} </td>
       </tr>
             <tr>
       <td> اليومية</td>
       <td>  <input type="text"  name=" Salary">  {!!$errors->first('Salary','<small class="label label-danger">:message</small>')!!} </td>
       </tr>
       <tr>
  <td><input type="submit" value="الحفظ"><td>
</tr>
</table>
  
{!!Form::close() !!}

@stop