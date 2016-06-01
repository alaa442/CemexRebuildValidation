@extends('master')
@section('title') analytics:: @parent @stop
@section('content')

<div class="row">
    <div class="page-header">
        <h2>Reviews analytics</h2>
    </div>
</div>

<script type="text/javascript">
	window.onload = function() {
		var cookies = document.cookie.split(";");
 
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }

	};
</script>


<h4>Chart analysis for cement types usage</h4>
<div id="perf_div"></div>
{!! \Lava::render('ColumnChart', 'MyStocks', 'perf_div') !!}
<br/>

<h4>Chart analysis for cement quantites</h4>
<div id="perf_div1"></div>
{!! \Lava::render('ColumnChart', 'MyStocks1', 'perf_div1') !!}
<br/>

<?php

//ContractorErr 
	if(!empty($_COOKIE['ContractorErr'])) {	    
		echo "<div><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['ContractorErr'];
		echo "</div> </div>";
	} 
//ReviewErr 
	if(!empty($_COOKIE['ReviewErr'])) {	    
		echo "<div><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['ReviewErr'];
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
<a href="/reviews/create" class="btn btn-primary">اضافة بيانات</a>	
<br/>
<table class="table table-hover table-bordered dt-responsive nowrap display reviews" width="100%">
	<thead>
	    <tr>

		    <th>رقم المسلسل</th>

		    <th>الحالة</th>
		    <th>حالة المكالمة</th>
		    <th>المنطقة</th>		    
		    <th>تصنيف المقاول</th>
		    
		    <th>المهنة</th>
		    <th>Area</th>
		    <th>Gov</th>
		    <th>Distric</th>
		    <th>اللقب</th>

		    <th>اسم المقاول</th>
		    <th>Education</th>
		    <th>اسم الشهرة</th>
		    <th>الديانة</th>

		    <th>رقم التليفون 1</th>
		    <th>رقم التليفون 2</th>
		    <th>التليفون الارضي</th>

		    <th>العنوان بالتفصيل</th>
		    <th>Long</th>
		    <th>Lat</th>

		    <th>البريد الاليكتروني</th>
		    <th>حساب الفيسبوك</th> 
		    <th>هل يمتلك هاتف ذكي</th>
		    
		    <th>متوسط الاستهلاك "الاسمنت العادي"</th>
		    <th>متوسط الاستهلاك "اسمنت المقاوم"</th>
		    <th>متوسط الاستهلاك "اسمنت المهندس"</th>
		    <th>متوسط الاستهلاك "اسمنت الصعيد"</th>
		    <th>متوسط الاستهلاك "اسمنت الفنار"</th>

		    <th>هل يمتلك كمبيوتر</th>
		    <th>تاريخ الميلاد</th>

		    <th>تاجر الاسمنت 1</th>
		    <th>تاجر الاسمنت 2</th>
		    <th>تاجر الاسمنت 3</th>
		    <th>تاجر الاسمنت 4</th>

		    <th>اسم المندوب</th>

		    <th>متوسط عدد المواقع في الشهر</th>
		    <th>متوسط استهلاك الاسمنت</th>
		    <th>متوسط استهلاك الطوب الاسمنتي</th>
		    <th>متوسط اسهالك من الخشب</th>

		    <th>متوسط استهلاك الحديد</th>
		    <th>عدد العمال</th>

		    <th>هل يمتلك خشب</th>
		    <th>امتار الخشب</th>
		    <th>هل يمتلك خلاطة</th>

		    <th>عدد الخلاطات</th>
		    <th>رأس المال</th>
		    <th>طريقة الدفع</th>
		    <th>هل يتعامل مع مقاولين من الباطن</th>		   
		      
		    <th>ملاحظات</th>
		</tr>
	</thead>

	<tbody>
		<?php $i=1; ?>
		@foreach($reviews as $review)
		    <tr>
			    <td>{{ $i++}}</td>

			    <td>{{$review->Status}}</td>
			    <td>{{$review->Call_Status}}</td>
			    <td>{{$review->Area}}</td>
			    <td>{{$review->Cont_Type}}</td>

			    <td>{{$review->getcontractor->Job}}</td>
			    <td>{{$review->Area}}</td>
			    <td>{{$review->getcontractor->Goverment}}</td>
			    <td>{{$review->getcontractor->City}}</td>
			    <td>{{$review->getcontractor->Fame}}</td>

			    <td>{{$review->getcontractor->Name}}</td>
			    <td>{{$review->getcontractor->Education}}</td>
			    <td>{{$review->getcontractor->Nickname}}</td>
			    <td>{{$review->getcontractor->Religion}}</td>

			    <td>{{$review->getcontractor->Tele1}}</td>
			    <td>{{$review->getcontractor->Tele2}}</td>
			    <td>{{$review->getcontractor->Home_Phone}}</td>			    

			    <td>{{$review->Address}}</td>
			    <td>{{$review->Long}}</td>
			    <td>{{$review->Lat}}</td> 

			    <td>{{$review->getcontractor->Email}}</td>
			    <td>{{$review->getcontractor->Has_Facebook}}</td>
			    <td>{{$review->getcontractor->Phone_Type}}</td>

			    <td>{{$review->Portland_Cement}}</td>
			    <td>{{$review->Resisted_Cement}}</td>
			    <td>{{$review->Eng_Cement}}</td>
			    <td>{{$review->Saed_Cement}}</td>
			    <td>{{$review->Fanar_Cement}}</td>

			    <td>{{$review->getcontractor->Computer}}</td>
			    <td>{{$review->getcontractor->Birth_Date}}</td>

			    <td>{{$review->Seller1}}</td>
			    <td>{{$review->Seller2}}</td>
			    <td>{{$review->Seller3}}</td>
			    <td>{{$review->Seller4}}</td>
			    	
			   	@if($review->getcontractor->getpromoter)
			    	<td>{{$review->getcontractor->getpromoter->Pormoter_Name}}</td>
			    @else
					<td>لا يوجد</td>>
				@endif

			    <td>{{$review->Project_NO}}</td>
			    <td>{{$review->Cement_Consuption}}</td>
			    <td>{{$review->Cement_Bricks}}</td>
			    <td>{{$review->Wood_Consumption}}</td>
			    <td>{{$review->Steel_Consumption}}</td>
			    <td>{{$review->Workers}}</td>

			    <td>{{$review->Has_Wood}}</td>

			    <td>{{$review->Wood_Meters}}</td>

			    <td>{{$review->Has_Mixers}}</td>			   

			    <td>{{$review->No_Of_Mixers}}</td>
			    <td>{{$review->Capital}}</td>
			    <td>{{$review->Credit_Debit}}</td>
			    <td>{{$review->Has_Sub_Contractor}}</td>

			   
			    <td> <nobr>
			    	<a href="/reviews/{{$review->Review_Id}}" class="btn btn-info">عرض</a>
			    	<a href="/reviews/{{$review->Review_Id}}/edit" class="btn btn-success">تعديل</a>		    	
			    	<a href="/reviews/destroy/{{$review->Review_Id}}" class="btn btn-danger">حذف</a>		   	
			    </nobr>
			    </td>			   
		  	</tr>
		@endforeach
	</tbody>
	
		<tfoot>
         	<th>رقم المسلسل</th>
		    <th>اسم المقاول</th>
		    <th>GPS</th>
		    <th>عدد المواقع</th>
		    <th>المستهلك من الاسمنت</th>
		    <th>الطوب الاسمنتي</th>
		    <th>المستهلك من الحديد</th>
		    <th>العمال</th>
		    <th>امتار الخشب</th>
		    <th>الهالك من الخشب</th>
		    <th>عدد الخلاطات</th>
		    <th>رأس المال</th>
		    <th>طريقة الدفع</th>
		    <th>مقاولين الباطن</th>

		    <th>المستهلك من الاسمنت العادي</th>
		    <th>المستهلك من الاسمنت المقاوم</th>
		    <th>المستهلك من الاسمنت المهندس</th>
		    <th>المستهلك من الاسمنت الصعيدي</th>
		    <th>المستهلك من الاسمنت الفنار</th>
  		</tfoot>
</table>

<script type="text/javascript">

  $(document).ready(function(){
    var table= $('.reviews').DataTable({ 
    select:true,
    responsive: true,
    "order":[[0,"asc"]],
    'searchable':true,
   	"scrollCollapse":true,
   	"paging":true,
});
        
$('.reviews tfoot th').each(function () {
    var title = $('.reviews thead th').eq($(this).index()).text();
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

</div>

{!!Form::open(['action'=>'ReviewsController@importreview','method' => 'post','files'=>true])!!}
    <input type="file" name="file" class="btn btn-primary"/>
    <input type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-bottom: 20px;"/> 	
{!!Form::close()!!}

{!!Form::open(['action'=>'ReviewsController@exportreview','method' => 'post'])!!} 	
  	<input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>

{!!Form::close()!!}


</section>






@endsection