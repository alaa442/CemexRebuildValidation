@extends('master')
@section('content')
<h4>Contractors Chart Analysis</h4>
<div id="perf_div"></div>
{!! \Lava::render('ColumnChart', 'MyStocks', 'perf_div') !!}


<?php
//Doublecontractor 
	if(!empty($_COOKIE['Doublecontractor'])) {	    
		echo "<div><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Doublecontractor'];
		echo "</div> </div>";
	} 
//ContractorErr 
	if(!empty($_COOKIE['ContractorErr'])) {	    
		echo "<div><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['ContractorErr'];
		echo "</div> </div>";
	} 
//File
	if(!empty($_COOKIE['FileError'])) {	    
		echo "<div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['FileError'];
		echo "</div>";
	} 

?>

<section class="panel panel-primary">
<div class="panel-body">
<a href="/contractors/create" class="btn btn-primary" style="margin-bottom: 20px;"> أضافة مقاول جديد</a>
<table class="table table-hover table-bordered  dt-responsive nowrap display contractors" cellspacing="0" width="100%">
  <thead>
  		<tr>
			<th>رقم المسلسل</th>
			<th>أسم المقاول</th> 
			<th>المحافظة</th>
			<th>المركز</th>
			<th>العنوان</th>
			<th>تليفون 1 </th>
			<th>تليفون 2 </th>
			<th>التليفون الارضي</th>
			<th>الوظيفة</th>
			<th>اللقب</th>
			<th>التعليم</th>
			<th>اسم الشهرة</th>
			<th>كود المقاول</th>			
			<th>البريد الاليكتروني</th>
			<th>هل يمتلك حساب فيسبوك</th>
			<th>حساب الفيسبوك</th>
			<th>نوع الهاتف</th>
			<th>هل يمتلك كمبيوتر</th>		    
			<th>تاريخ الميلاد</th>
			<th>أسم المندوب</th> 		    		    		    		    	   
			<th>الفئة</th>		    			
			<th>الديانة</th>
		    <th>ملحوظات</th>
		</tr>
	</thead>

	<tbody id="tbody">
		<?php $i=1; ?>
		@foreach($contractors as $contractor)
		    <tr>
		    <td>{{$i++}}</td>
		    <td>{{$contractor->Name}}</td>
		    <td>{{$contractor->Goverment}}</td>
		    <td>{{$contractor->City}}</td>
		    <td>{{$contractor->Address}}</td>
		    <td>{{$contractor->Tele1}}</td>
			<td>{{$contractor->Tele2}}</td>
			<td>{{$contractor->Home_Phone}}</td>			
		    <td>{{$contractor->Job}}</td>		  			
			<td>{{$contractor->Fame}}</td>			
			<td>{{$contractor->Education}}</td>
			<td>{{$contractor->Nickname}}</td>
			<td>{{$contractor->Code}}</td>
			<td>{{$contractor->Email}}</td>
			<td>{{$contractor->Has_Facebook}}</td>
			<td>{{$contractor->Facebook_Account}}</td>
			<td>{{$contractor->Phone_Type}}</td>
			<td>{{$contractor->Computer}}</td>
			<td>{{$contractor->Birthday}}</td>
			<td>
				@if ($contractor->getpromoter)
				    {{$contractor->getpromoter->Pormoter_Name}}
				@else
				    لا يوجد
				@endif 

			</td>
			<td>{{$contractor->Class}}</td>
		  	<td>{{$contractor->Religion}}</td>				
					
<td> 
	<nobr>
	<a href="/contractors/{{$contractor->Contractor_Id}}" class="btn btn-info">عرض</a>	
	<a href="/contractors/{{$contractor->Contractor_Id}}/edit" class="btn btn-success">تعديل</a>		    	
	<a href="/contractors/destroy/{{$contractor->Contractor_Id}}" class="btn btn-danger">حذف</a>		    				    
	</nobr>    
</td>
</tr>
@endforeach
</tbody>

	<tfoot>
 			<th>رقم المسلسل</th>
			<th>أسم المقاول</th> 
			<th>المحافظة</th>
			<th>المدينة</th>
			<th>العنوان</th>
			<th>تليفون 1 </th>
			<th>تليفون 2 </th>
			<th>التليفون الارضي</th>
			<th>الوظيفة</th>
			<th>اللقب</th>
			<th>التعليم</th>
			<th>اسم الشهرة</th>
			<th>كود المقاول</th>			
			<th>البريد الاليكتروني</th>
			<th>هل يمتلك حساب فيسبوك</th>
			<th>حساب الفيسبوك</th>
			<th>نوع الهاتف</th>
			<th>هل يمتلك كمبيوتر</th>		    
			<th>تاريخ الميلاد</th>
			<th>أسم المندوب</th> 		    		    		    		    	   
			<th>الفئة</th>		    			
			<th>الديانة</th>
		    <th>ملحوظات</th>	        
	</tfoot>

</table>

<script type="text/javascript">

  $(document).ready(function(){
    var table= $('.contractors').DataTable({ 
    select:true,
    responsive: true,
    "order":[[0,"asc"]],
    'searchable':true,
   	"scrollCollapse":true,
   	"paging":true,
});


$('.contractors tfoot th').each(function () {
    var title = $('.contractors thead th').eq($(this).index()).text();
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


{!!Form::open(['action'=>'ContractorsController@importcontractor','method' => 'post','files'=>true])!!}
    <input type="file" name="file" class="btn btn-primary"/>
    <input type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-bottom: 20px;"/> 	
{!!Form::close()!!}

{!!Form::open(['action'=>'ContractorsController@expotcontractor','method' => 'post'])!!} 	
  	<input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>

{!!Form::close()!!}

</div>


</section>
@stop
