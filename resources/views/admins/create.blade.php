@extends('master')

@section('content')
	<br/>
	<table class="table table-striped table-bordered table-hover">
	{!! Form::open(['route'=>'admins.store', 'method' => 'post']) !!}
	<tr>
	<!-- <form> -->
		<td>اسم الادمن</td>
		<td><input type="text" name="admin_name" required/></td>
		<td><span type="hidden" class="label label-danger">{!!$errors->first('admin_name')!!}</td>
	</tr>
	<tr>
		<td>اسم المستخدم</td>
		<td><input type="text" name="user_name" required/></td>
		<td><span type="hidden" class="label label-danger">{{ $errors->first('user_name') }}</span></td>
	</tr>
	<tr>
		<td>البريد الاليكتروني</td>
		<td><input type="mail" name="mail" required/></td>
		<td><span type="hidden" class="label label-danger">{{ $errors->first('mail') }}</span></td>
	</tr>
	<tr>
		<td>كلمة المرور</td>
		<td><input type="password" name="password" required/></td>
		<td><span type="hidden" class="label label-danger">{{ $errors->first('password') }}</span></td>
	</tr>
		<td><input type="submit" value="حفظ"></td>
		<td></td>
		<td></td>

	</table>
	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop

