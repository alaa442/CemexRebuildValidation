@extends('master')
@section('content')
{!! Form::open(['route'=>['awards.update',$award->Awards_Id],'method'=>'PUT']) !!}
	<legend>تعديل الجائزه</legend>
    <table class=" table form-group">
<tr>
    <td><label for="inputName" class="control-label">الأسم</label></td>
    <td><input type="text" name="Name" class="form-control" id="inputName" value="{{$award->Name}}">
      {!!$errors->first('Name','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td><label for="inputName" class="control-label">الكميه الكليه</label></td>
    <td><input type="number" name="Total_Amount" class="form-control" id="inputName" value="{{$award->Total_Amount}}" min="1" >
      {!!$errors->first('Total_Amount','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td><label for="inputName" class="control-label">التكلفه للقكعه الواحده</label></td>
    <td><input type="number" name="Cost" class="form-control" id="inputName" value="{{$award->Cost}}" min="1" step="0.01">
      {!!$errors->first('Cost','<small class="label label-danger">:message</small>')!!}</td>
</tr>
</table>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
	{!!Form::close()!!}


  @stop
  
 
 