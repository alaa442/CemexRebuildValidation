@extends('master')
@section('title') analytics:: @parent @stop
@section('content')

<div class="row">
    <div class="page-header">
        <h2>Reviews analytics</h2>
    </div>
</div>

<h4>Chart analysis for cement types usage</h4>
<div id="perf_div"></div>
{!! \Lava::render('ColumnChart', 'MyStocks', 'perf_div') !!}
<br/>

<h4>Chart analysis for cement quantites</h4>
<div id="perf_div1"></div>
{!! \Lava::render('ColumnChart', 'MyStocks1', 'perf_div1') !!}
<br/>

<?php
//File
	if(!empty($_COOKIE['FileError'])) {	    
		echo "<div id='FileError'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['FileError'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Project_NOErr'])) {	    
		echo "<div id='Project_NOErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Project_NOErr'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Portland_Err'])) {	    
		echo "<div id='Portland_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Portland_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Resisted__Err'])) {	    
		echo "<div id='Resisted__Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Resisted__Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Eng_regex_Err'])) {	    
		echo "<div id='Eng_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Eng_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Saed_regex_Err'])) {	    
		echo "<div id='Saed_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Saed_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Fanar_regex_Err'])) {	    
		echo "<div id='Fanar_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Fanar_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Workers_regex_Err'])) {	    
		echo "<div id='Workers_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Workers_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Cement_regex_Err'])) {	    
		echo "<div id='Cement_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Cement_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Bricks_regex_Err'])) {	    
		echo "<div id='Bricks_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Bricks_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Steel_regex_Err'])) {	    
		echo "<div id='Steel_regex_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Steel_regex_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['wood_meters_Err'])) {	    
		echo "<div id='wood_meters_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['wood_meters_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Wood_Consumption_Err'])) {	    
		echo "<div id='Wood_Consumption_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Wood_Consumption_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['No_Of_Mixers_Err'])) {	    
		echo "<div id='No_Of_Mixers_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['No_Of_Mixers_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Capital_Err'])) {	    
	echo "<div id='Capital_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Capital_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['MixerErr'])) {	    
	echo "<div id='MixerErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['MixerErr'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Has_WoodErr'])) {	    
	echo "<div id='Has_WoodErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Has_WoodErr'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Has_SubErr'])) {	    
	echo "<div id='Has_SubErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Has_SubErr'];
		echo "</div> </div>";
	} 

	if(!empty($_COOKIE['Seller1_Err'])) {	    
	echo "<div id='Seller1_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Seller1_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Seller2_Err'])) {	    
	echo "<div id='Seller2_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Seller2_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Seller3_Err'])) {	    
	echo "<div id='Seller3_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Seller3_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['Seller4_Err'])) {	    
	echo "<div id='Seller4_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Seller4_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['sub1_Err'])) {	    
	echo "<div id='sub1_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['sub1_Err'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['sub1_Err'])) {	    
	echo "<div id='sub1_Err'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['sub1_Err'];
		echo "</div> </div>";
	} 
	
	if(!empty($_COOKIE['Call_StatusErr'])) {	    
	echo "<div id='Call_StatusErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['Call_StatusErr'];
		echo "</div> </div>";
	} 
	if(!empty($_COOKIE['StatusErr'])) {	    
	echo "<div id='StatusErr'><div class='alert alert-block alert-danger fade in center'>";
		echo $_COOKIE['StatusErr'];
		echo "</div> </div>";
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
    var title = $('.reviews thead td').eq($(this).index()).text();
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