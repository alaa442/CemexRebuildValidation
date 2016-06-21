@extends('master')

@section('content')
	<table class="table table-striped table-bordered table-hover">
	{!! Form::open(['route'=> ['admins.update',$admin->Admin_Id ], 'method' => 'put']) !!}
		<tr>
	<!-- <form> -->
			<td>أسم الادمن</td>
			<td><input type="text" name="admin_name" value="{{$admin->Admin_Name}}" required/></td>
			<td><span type="hidden" class="label label-danger">{!!$errors->first('admin_name')!!}</td>
		</tr>

		<tr>
			<td>اسم المستخدم</td>
			<td><input type="text" name="user_name" value="{{$admin->User_Name}}" required/></td>
			<td><span type="hidden" class="label label-danger">{{ $errors->first('user_name') }}</span></td>
		</tr>	

		<tr>
			<td>البريد الاليكتروني</td>
			<td><input type="email" name="mail" value="{{$admin->Mail}}" required/></td>
			<td><span type="hidden" class="label label-danger">{{ $errors->first('mail') }}</span></td>
		</tr>
		<tr>
			<td>كلمة المرور</td>
			<td><input type="password" name="password" value="{{$admin->Password}}" required/></td>
			<td><span type="hidden" class="label label-danger">{{ $errors->first('password') }}</span></td>
		</tr>
		<tr>
			<td><input type="submit" value="حفظ"></td>
			<td></td>
		</tr>
	<!-- </form>	 -->
	{!! Form::close() !!} 
@stop

 