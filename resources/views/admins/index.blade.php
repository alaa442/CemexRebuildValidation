@extends('master')
@section('content')

<a href="admins/create" class="btn btn-primary">اضافة ادمن</a> <br/>
<br/>

<section class="panel panel-primary">
<div class="panel-body">

<table class="table table-hover table-bordered dt-responsive nowrap display admins" width="100%">
	<thead>
	    <tr>
	    	<td>رقم المسلسل</td>
		    <td>اسم الادمن</td>
		    <td>اسم المستخدم</td> 
		    <td>البريد الاليكتروني</td> 
		    <td>كلمة المرور</td>
		    <td>ملحوظات</td>
	  	</tr>
	</thead>

	<tbody>
		<?php $i=1; ?>			
	  	@foreach($admins as $admin)
		    <tr>
			    <td>{{ $i++}}</td>
			    <td>{{$admin->Admin_Name}}</td>
			    <td>{{$admin->User_Name}}</td>
			    <td>{{$admin->Mail}}</td>
				<td>{{$admin->Password}}</td>
		  		<td> 
			    	<nobr>
				    	<a href="/admins/{{$admin->Admin_Id}}" class="btn btn-info">عرض</a>	
				    	<a href="/admins/{{$admin->Admin_Id}}/edit" class="btn btn-success">تعديل</a>		    	
				    	<a href="/admins/destroy/{{$admin->Admin_Id}}"class="btn btn-danger">حذف</a>
			    	</nobr>		    				    
			    </td>
		  	</tr>
		@endforeach

		<tfoot>
         	<th>رقم المسلسل</th>
		    <th>اسم الادمن</th>
		    <th>اسم المستخدم</th>
		    <th>البريد الاليكتروني</th>
		    <th>كلمة المرور</th>
		</tfoot>
  	</table>
<script type="text/javascript">

  $(document).ready(function(){
    var table= $('.admins').DataTable({ 
	    select:true,
	    responsive: true,
	    "order":[[0,"asc"]],
	    'searchable':true,
	   	"scrollCollapse":true,
	   	"paging":true,
	});

$('.admins tfoot th').each(function () {
    var title = $('.admins thead td').eq($(this).index()).text();
    // alert(title);
	$(this).html( '<input type="text" placeholder="بحث '+title+'" />' );
});

table.columns().every( function () {
  	var that = this;
	$(this.footer()).find('input').on('keyup change', function () {
		that.search(this.value).draw();
		    if (that.search(this.value) ) {
		        that.search(this.value).draw();
		    }
		});     
    });
});

</script>


{!!Form::open(['action'=>'AdminsController@exportadmin','method' => 'post'])!!} 	
  	<input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>

{!!Form::close()!!}

@stop
