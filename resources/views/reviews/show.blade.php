@extends('master')

@section('content')
<br/>
<table class="table table-striped table-bordered table-hover">


	<tr>
		<td>الحالة</td>
		<td>{{$review->Status}}</td>
	</tr>
	<tr>
		<td>حالة المكالمة</td> 
		<td>{{$review->Call_Status}}</td>
	</tr>
	<tr>
		<td>المنطقة</td>
		<td>{{$review->Area}}</td>
	</tr>
	<tr>
		<td>نوع المقاول</td>
		<td>{{$review->Cont_Type}}</td>
	</tr>

	<tr>
		<td>اسم المقاول</td>
		<td>{{$review->getcontractor->Name}}</td>
	</tr>
	<tr>
		<td>Long</td> 
		<td>{{$review->Long}}</td>
	</tr>
	<tr>
		<td>Lat</td> 
		<td>{{$review->Lat}}</td>
	</tr>


	<tr>
		<td>المستهلك من الاسمنت العادي</td>
		<td>{{$review->Portland_Cement}}</td>
	</tr>

	<tr>
		<td>المستهلك من الاسمنت المقاوم</td>
		<td>{{$review->Resisted_Cement}}</td>
	</tr>

	<tr>
		<td>المستهلك من الاسمنت المهندس</td>
		<td>{{$review->Eng_Cement}}</td>
	</tr>

	<tr>
		<td>المستهلك من الاسمنت الصعيدي</td>
		<td>{{$review->Saed_Cement}}</td>
	</tr>

	<tr>
		<td>المستهلك من الاسمنت الفنار</td>
		<td>{{$review->Fanar_Cement}}</td>
	</tr>

	<tr>
		<td>عدد المواقع</td>
		<td>{{$review->Project_NO}}</td>
	</tr>
	<tr>
		<td>المستهلك من الاسمنت</td>
		<td>{{$review->Cement_Consuption}}</td>
	</tr>
	<tr>
		<td>المستهلك من الحديد</td>
		<td>{{$review->Cement_Bricks}}</td>
	</tr>
	<tr>
		<td>المستهلك من الحديد</td>
		<td>{{$review->Steel_Consumption}}</td>
	</tr>
	
	<tr>
		<td>العمال</td>
		<td>{{$review->Workers}}</td>
	</tr>
	<tr>
		<td>امتار الخشب</td>
		<td>{{$review->Wood_Meters}}</td>
	</tr>
	<tr>
		<td>الهالك من الخشب</td>
		<td>{{$review->Wood_Consumption}}</td>
	</tr>
	<tr>
		<td>عدد الخلاطات</td>
		<td>{{$review->No_Of_Mixers}}</td>
	</tr>

	
	<tr>
		<td>رأس المال</td>
		<td>{{$review->Capital}}</td>
	</tr>
	<tr>
		<td>ظريقة الدفع</td>
		<td>{{$review->Credit_Debit}}</td>
	</tr>
	<tr>
		<td>مقاولين الباطن</td>
		<td>{{$review->Has_Sub_Contractor}}</td>
	</tr>




</table>
@stop