@extends('master')
@section('content')
<h4>Contractors Chart Analysis</h4>
<div id="perf_div"></div>
{!! \Lava::render('ColumnChart', 'MyStocks', 'perf_div') !!}

<?php

//ContractorErr 
	if(!empty($_COOKIE['ContractorErr'])) {	    
		echo "<div><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['ContractorErr'];
		echo "</div> </div>";
	} 

//Tele1 regex
	if(!empty($_COOKIE['Tele1_regex'])) {	    
		echo "<div id='Tele1_regex'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Tele1_regex'];
		echo "</div> </div>";
	} 
//Tele 1 datatype
	if(!empty($_COOKIE['TypeTele1Err'])) {	    
		echo "<div id='TypeTele1Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeTele1Err'];
		echo "</div> </div>";
	}
//Tele1 null
	if(!empty($_COOKIE['Tele1Error'])) {	    
	echo "<div id='Tele1Error'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Tele1Error'];
		echo "</div> </div>";
	} 

//Date regex error
	if(!empty($_COOKIE['TypeDateErr'])) {	    
		echo "<div id='TypeDateErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeDateErr'];
		echo "</div> </div>";
	}
// facebook account type
	if(!empty($_COOKIE['TypeFBaccErr'])) {	    
		echo "<div id='TypeFBaccErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeFBaccErr'];
		echo "</div> </div>";
	}
//  has_facebook type
	if(!empty($_COOKIE['TypeHasFaceErr'])) {	    
		echo "<div id='TypeHasFaceErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeHasFaceErr'];
		echo "</div> </div>";
	}
//  phone_type 
	if(!empty($_COOKIE['TypePhoneErr'])) {	    
		echo "<div id='TypePhoneErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypePhoneErr'];
		echo "</div> </div>";
	}
// Computer
	if(!empty($_COOKIE['TypeCompErr'])) {	    
		echo "<div id='TypeCompErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeCompErr'];
		echo "</div> </div>";
	}
// mail 
	if(!empty($_COOKIE['TypeMailErr'])) {	    
		echo "<div id='TypeMailErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeMailErr'];
		echo "</div> </div>";
	} 
// religion 
	if(!empty($_COOKIE['TypeReligionErr'])) {	    
		echo "<div id='TypeReligionErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeReligionErr'];
		echo "</div> </div>";
	} 
//  home_phone
	if(!empty($_COOKIE['TypeHomeErr'])) {	    
		echo "<div id='TypeHomeErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeHomeErr'];
		echo "</div> </div>";
	} 
//  name
	if(!empty($_COOKIE['TypeNameErr'])) {	    
		echo "<div id='TypeNameErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeNameErr'];
		echo "</div> </div>";
	} 
//  government 
	if(!empty($_COOKIE['TypeGovErr'])) {	    
		echo "<div id='TypeGovErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeGovErr'];
		echo "</div> </div>";
	} 
// fame
	if(!empty($_COOKIE['TypeFameErr'])) {	    
		echo "<div id='TypeFameErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeFameErr'];
		echo "</div> </div>";
	} 
//  Nickname
	if(!empty($_COOKIE['TypeNickErr'])) {	    
		echo "<div id='TypeNickErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeNickErr'];
		echo "</div> </div>";
	} 
//  Job
	if(!empty($_COOKIE['TypeJobErr'])) {	    
		echo "<div id='TypeJobErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeJobErr'];
		echo "</div> </div>";
	} 
//  address 
	if(!empty($_COOKIE['TypeAddressErr'])) {	    
		echo "<div id='TypeAddressErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeAddressErr'];
		echo "</div> </div>";
	} 
 
//Tele2 datatype
	if(!empty($_COOKIE['TypeTele2Err'])) {	    
		echo "<div id='TypeTele2Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['TypeTele2Err'];
		echo "</div> </div>";
	} 
//File
	if(!empty($_COOKIE['FileError'])) {	    
		echo "<div id='FileError'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['FileError'];
		echo "</div> </div>";
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
