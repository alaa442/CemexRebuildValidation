@extends('master')

@section('content')
<br/>
<table class="table table-striped table-bordered table-hover">

	<tr>
		<td>الوظيفة</td>
		<td>{{$contractor->Job}}</td>
	</tr>

	<tr>
		<td>المحافظة</td>
		<td>{{$contractor->Goverment}}</td>
	</tr>

	<tr>
		<td>المركز</td>
		<td>{{$contractor->City}}</td>
	</tr>
	<tr>
		<td>اللقب</td>
		<td>{{ $contractor->Fame }}</td>
	</tr>

	<tr>
		<td>أسم المقاول</td>
		<td>{{$contractor->Name}}</td>
	</tr>

	<tr>
		<td>التعليم</td>
		<td>{{$contractor->Education}}</td>
	</tr>

	<tr>
		<td>اسم الشهرة</td>
		<td>{{ $contractor->Nickname}}</td>
	</tr>

	<tr>
		<td>الديانة</td>
		<td>{{$contractor->Religion}}</td>
	</tr>

	<tr>
		<td>تليفون 1</td>
		<td>{{$contractor->Tele1}}</td>
	</tr>		    
			    
	<tr>
		<td>تليفون 2</td>
		<td>{{$contractor->Tele2}}</td>
	</tr>

	<tr>
		<td>التليفون الارضي</td>
		<td>{{$contractor->Home_Phone}}</td>
	</tr>
	<tr>
		<td>العنوان</td>
		<td>{{$contractor->Address}}</td>
	</tr>

	<tr>
		<td>البريد الاليكتروني</td>
		<td>{{$contractor->Email}}</td>
	</tr>

	<tr>
		<td>حساب الفيسبوك</td>
		<td>{{$contractor->Facebook_Account}}</td>
	</tr>	
	
	<tr>
		<td>نوع الهاتف</td>
		<td>{{ $contractor->Phone_Type}}</td>
	</tr>
		    
	<tr>
		<td>الكمبيوتر</td>
		<td>{{$contractor->Computer}}</td>
	</tr>		    
			    
	<tr>
		<td>تاريخ الميلاد</td>
		<td>{{$contractor->Birthday}}</td>
	</tr>		    

	<tr>
		<td>اسم المندوب</td>
		<td>{{ $contractor->getpromoter->Pormoter_Name}}</td>
	</tr>

	<tr>
		<td>الفئة</td>
		<td>{{$contractor->Class}}</td>
	</tr>	
			

	@foreach ($contractor->getproject as $contractors)
	<tr>
		<td>نوع الاسمنت</td>
		<td>{{ $contractors->Cement_Type}}</td>
	

		<td>كمية الاسمنت المستخدمة</td>
		<td>{{ $contractors->Cement_Quantity}}</td>
		
	
		<td>مكان المشروع</td>
		<td>{{$contractors-> Government}}</td>
		
		<td>النقاط</td>
		<td>{{$contractors-> Points}}</td>
	</tr>
	@endforeach

@foreach ($contractor->presents as $present)
	<tr>
		<td>
			<span>{{$present->getcompetitions->Name}}</span>
		@foreach($present->getwards as $items)
			 <span>{{$items->pivot->Amount}} {{$items->Name}} .</span>	         		
	    @endforeach
	     </td>
		
		<td> الترتيب {{$present->Ranking}} </td>
	</tr>
@endforeach


</table>
	 
	

@stop

