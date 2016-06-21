@extends('master')

@section('content')

{!! Form::open(['route'=> ['contractors.update',$contractor->Contractor_Id ], 'method' => 'put']) !!}
	
<table class="table table-striped table-bordered table-hover">

<tr>
	<td>اسم المقاول </td>
	<td><input type="text" name="name" id="name" value="{{$contractor->Name}}" />
	<span type="hidden" class="label label-danger">{{ $errors->first('name') }}</span></td>
<tr/>
<tr>	
    <td>المحافظة</td>
	<td>
		<select id="goverment" name="goverment" class = "chosen-select chosen-rtl" >
		    <option value="{{$contractor->Goverment}}">{{$contractor->Goverment}}</option>
		    <option value ="الإسكندرية">الإسكندرية</option>
		    <option value ="أسوان">أسوان</option>
		    <option value ="اسيوط">اسيوط</option>
		    <option value ="الأقصر">الأقصر</option>
		    <option value ="البحر الأحمر">البحر الأحمر</option>
		    <option value ="البحيرة">البحيرة</option>
		    <option value ="بني سويف">بني سويف</option>
		    <option value ="بورسعيد">بورسعيد</option>
		    <option value ="جنوب سيناء">جنوب سيناء</option>
		    <option value ="الجيزة">الجيزة</option>
		    <option value ="الدقهلية">الدقهلية</option>
		    <option value ="دمياط">دمياط</option>
		    <option value ="سوهاج">سوهاج</option>
		    <option value ="السويس">السويس</option>
		    <option value ="الشرقية">الشرقية</option>
		    <option value ="شمال سيناء">شمال سيناء</option>
		    <option value ="الغربية">الغربية</option>
		    <option value ="الفيوم">الفيوم</option>
		    <option value ="القاهرة">القاهرة</option>
		    <option value ="القليوبية">القليوبية</option>
		    <option value ="قنا">قنا</option>
		    <option value ="كفر الشيخ">كفر الشيخ</option>
		    <option value ="مطروح">مطروح</option>
		    <option value ="المنوفية">المنوفية</option>
		    <option value ="المنيا">المنيا</option>
		    <option value ="الوادي الجديد">الوادي الجديد</option>
  		</select>
  		</td>
	</tr>
<tr>
	<td>المركز</td>
	<td><input type="text" name="city"  value="{{$contractor->City}}" />
	<span class="label label-danger">{{ $errors->first('city') }}</span></td>
</tr>
<tr>
	<td>العنوان</td>
	<td><input type="text" name="address"  value="{{$contractor->Address}}" />
	<span class="label label-danger">{{ $errors->first('address') }}</span></td>
</tr>
<tr>
	<td>التليفون 1</td>
	<td><input type="text" name="tele1"  value="{{$contractor->Tele1}}"/>
	<span class="label label-danger" >{{ $errors->first('tele1') }}</span></td>
</tr>
<tr>
	<td>التليفون 2</td>
	<td><input type="text" name="tele2" value="{{$contractor->Tele2}}"/>
	<span class="label label-danger" >{{ $errors->first('tele2') }}</span></td>
</tr>
		
<tr>
	<td>التليفون الارضي</td>		
	<td><input type="text" name="home_phone" value="{{$contractor->Home_Phone}}"/>
	<span class="label label-danger" >{{ $errors->first('home_phone') }}</span></td>
</tr>

<tr>	
	<td>الوظيفة</td>
	<td><input type="text" name="job"  value="{{$contractor->Job}}"/>
	<span class="label label-danger">{{ $errors->first('job') }}</span></td>
</tr>

<tr>
	<td> اللقب </td>
	<td><input type="text" name="fame" id="fame" value="{{$contractor->Fame}}" />
	<span class="label label-danger">{{ $errors->first('fame') }}</span></td>
<tr>

<tr>
  <td>التعليم</td>
  <td>
    <select id="education" name="education" class = "chosen-select chosen-rtl" >
      <option value ="{{$contractor->Education}}"> {{$contractor->Education}}</option>
      <option value ="No Education"> No Education </option>
      <option value ="Low Education"> Low Education </option>
      <option value ="Medium Education"> Medium Education </option>
      <option value ="High Education"> High Education </option>
    </select> 
  </td>
</tr>

<tr>	
	<td>اسم الشهرة</td>		
	<td><input type="text" name="nickname" value="{{$contractor->Nickname}}"/>
	<span class="label label-danger">{{ $errors->first('nickname') }}</span></td>
</tr>   
<tr>	
	<td>الديانة</td>		
	<td><input type="text" name="religion" value="{{$contractor->Religion}}"/>
	<span class="label label-danger" >{{ $errors->first('religion') }}</span></td>
</tr>

<tr>
	<td>البريد الاليكتروني</td>
	<td><input type="text" name="mail" value="{{$contractor->Email}}"/>
	<span class="label label-danger">{{ $errors->first('mail') }}</span></td>
</tr>

<tr>  
 <td> هل يمتلك حساب فيسبوك</td>
  <td>
  <select id="has_facebook" name="has_facebook" class="chosen-select chosen-rtl">
    <option value ="{{$contractor->Has_Facebook}}">{{$contractor->Has_Facebook}}</option>
    <option value="لا">لا</option>
    <option value="نعم">نعم</option>
  </select>
  </td>
</tr>

<tr>
	<td>حساب الفيسبوك</td>
	<td><input type="text" name="facebook" id="facebook" value="{{$contractor->Facebook_Account}}" />
	<span type="hidden" class="label label-danger"></span></td>
</tr>

<tr>  
 <td> نوع الهاتف </td>
  <td>
    <select id="phone_type" name="phone_type" class="chosen-select chosen-rtl">
      <option value="{{$contractor->Phone_Type}}">{{$contractor->Phone_Type}}</option>
      <option value="حديث">حديث</option>
      <option value="قديم">قديم</option>
    </select>
  </td>
</tr>

<tr>  
 <td> هل يمتلك كمبيوتر</td>
  <td>
    <select id="computer" name="computer" class="chosen-select chosen-rtl">
      <option value ="{{$contractor->Computer}}">{{$contractor->Computer}}</option>
      <option value="لا">لا</option>
      <option value="نعم">نعم</option>
    </select>
  </td>
</tr>

<tr>
	<td>تاريخ الميلاد</td>
	<td><input type="date" name="birthday" value="{{$contractor->Birthday}}"/>
	<span class="label label-danger">{{ $errors->first('birthday') }}</span></td>
</tr>



<tr>
  <td>اسم المندوب</td>
<td>
<select id="pormoter_id" name="pormoter_id" class = "chosen-select chosen-rtl">
@if ($contractor->getpromoter)
  <option name="pormoter_id" value ="{{$contractor->Pormoter_Id}}">{{$contractor->getpromoter->Pormoter_Name}}
  </option>
@endif 
</select> 
<span class="label label-danger">{{ $errors->first('pormoter_id') }}</span></td>
</tr>

<tr>
  <td>الفئة</td>
  <td>
    <select id="class" name="class" class="chosen-select chosen-rtl">
      <option value ="{{$contractor->Class}}">{{$contractor->Class}}</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
    </select>
</tr>


<tr>
    <td><input type="submit" id="submit" class="btn btn-primary" value="حفظ">
</tr>	

	{!! Form::close() !!} 
</table>

<script type="text/javascript">
  $("#has_facebook").change(function () { 
        var has_facebook = this.value;
        if (has_facebook == 'لا') {
          $("#facebook").prop('disabled', true);
        }
        else {
          $("#facebook").prop('disabled', false);
        }
  });

</script>
<script type="text/javascript">
	 $(document).ready(function() {                 
        $('#goverment').chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة'
        });
        $('#education').chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة'
        });
        $('#has_facebook').chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة'
        });

        $('#pormoter_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة'
        });
        $('#class')  .chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة',
              search_contains:true,
        });
        $('#computer')  .chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة',
              search_contains:true,
        });
         $('#phone_type')  .chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة',
              search_contains:true,
        });

        $("#goverment").change(function() {      
            $.getJSON("contractors/promoters/" + $("#goverment").val(), function(data) {
                console.log(data);
                var $promoters = $("#pormoter_id");
                $("#pormoter_id").chosen("destroy");
                $promoters.empty();
                $.each(data, function(key, value) {
                    $promoters.append('<option value="' + key +'">' + value + '</option>');
                });
            
              $('#pormoter_id').chosen({
                width: '100%',
                no_results_text: 'لا توجد نتيجة'
              });

              $("#pormoter_id").trigger("chosen:updated");
                  $("#pormoter_id").trigger("change");             
          });
                  
          $('#pormoter_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة'
          });

      });

    });
</script>

@stop

 