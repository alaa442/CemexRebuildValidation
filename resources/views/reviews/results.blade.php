@extends('master')
@section('content')

<section class="panel panel-primary">
<div class="panel-body">

<table class="table table-hover table-bordered dt-responsive nowrap display reviews" width="100%">
	<thead>
	    <tr>

		    <td>رقم المسلسل</td>

		    <td>الحالة</td>
		    <td>حالة المكالمة</td>
		    <td>المنطقة</td>		    
		    <td>تصنيف المقاول</td>
		    
		    <td>المهنة</td>
		    <td>Area</td>
		    <td>Gov</td>
		    <td>Distric</td>
		    <td>اللقب</td>

		    <td>اسم المقاول</td>
		    <td>Education</td>
		    <td>اسم الشهرة</td>
		    <td>الديانة</td>

		    <td>رقم التليفون 1</td>
		    <td>رقم التليفون 2</td>
		    <td>التليفون الارضي</td>

		    <td>العنوان بالتفصيل</td>
		    <td>Long</td>
		    <td>Lat</td>

		    <td>البريد الاليكتروني</td>
		    <td>حساب الفيسبوك</td> 
		    <td>هل يمتلك هاتف ذكي</td>
		    
		    <td>متوسط الاستهلاك "الاسمنت العادي"</td>
		    <td>متوسط الاستهلاك "اسمنت المقاوم"</td>
		    <td>متوسط الاستهلاك "اسمنت المهندس"</td>
		    <td>متوسط الاستهلاك "اسمنت الصعيد"</td>
		    <td>متوسط الاستهلاك "اسمنت الفنار"</td>

		    <td>هل يكتلك كمبيوتر</td>
		    <td>تاريخ الميلاد</td>

		    <td>تاجر الاسمنت 1</td>
		    <td>تاجر الاسمنت 2</td>
		    <td>تاجر الاسمنت 3</td>
		    <td>تاجر الاسمنت 4</td>

		    <td>اسم المندوب</td>

		    <td>متوسط عدد المواقع في الشهر</td>
		    <td>متوسط استهلاك الاسمنت</td>
		    <td>متوسط استهلاك الطوب الاسمنتي</td>
		    <td>متوسط اهالك من الخشب</td>

		    <td>متوسط استهلاك الحديد</td>
		    <td>عدد العمال</td>

		    <td>هل يمتلك خشب</td>
		    <td>امتار الخشب</td>
		    <td>هل يمتلك خلاطة</td>

		    <td>عدد الخلاطات</td>
		    <td>رأس المال</td>
		    <td>طريقة الدفع</td>
		    <td>هل يتعامل مع مقاولين من الباطن</td>		   
		      
		    <td>ملاحظات</td>
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
			    	
			    <td>{{$review->getcontractor->getpromoter->Pormoter_Name}}</td>

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

</section>

{!!Form::open(['action'=>'ReviewsController@ExportFilterReview','method' => 'post'])!!} 	
  	<input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>

{!!Form::close()!!}

@stop
