@extends('master')

@section('content')
	
{!! Form::open(['route'=> ['reviews.update',$review->Review_Id], 'method' => 'put']) !!}

<table class="table table-striped table-bordered table-hover">
	<tr>
	  <td>الحالة </td> 
	  <td><input type="text" name="status" id="status" value="{{$review->Status}}"/></td>
	  <td><span class="label label-danger" id="status_invalid">{{ $errors->first('status') }}</span></td>
	</tr>

<tr>
  <td>حالة المكالمة</td>  
  <td><input type="text" name="call_status" id="call_status" value="{{$review->Call_Status}}"/></td>
  <td><span class="label label-danger" id="call_status_invalid">{{ $errors->first('call_status') }}</span></td>
</tr>

<tr>
  <td>المنطقة </td> 
  <td><input type="text" name="area" id="area" value="{{$review->Area}}"/></td>
  <td><span class="label label-danger" id="area_invalid">{{ $errors->first('area') }}</span></td>
</tr>

<tr>
  <td>تصنيف المقاول</td>  
  <td><input type="text" name="cont_type" id="cont_type" value="{{$review->Cont_Type}}"/></td>
  <td><span class="label label-danger" id="cont_type_invalid">{{ $errors->first('cont_type') }}</span></td>
</tr>


	<tr>
		<td>اسم المقاول</td>
		<td><select id="contractor_id" name="contractor_id">
				@foreach($contractors as $contractor)
					<option value=" {{ $contractor->Contractor_Id }} "> {{ $contractor->Name }} 
					</option>			
				@endforeach
			</select></td>
		<td></td>
	</tr>	
	<tr>
  <td>Long</td> 
  <td><input type="text" name="long" id="long" value="{{ Input::old('long') }}" /></td>
  <td><span class="label label-danger" id="long">{{ $errors->first('long') }}</span></td>
</tr>
<tr>
  <td>Lat</td> 
  <td><input type="text" name="lat" id="lat" value="{{ Input::old('lat') }}" /></td>
  <td><span class="label label-danger" id="lat">{{ $errors->first('lat') }}</span></td>
</tr>

	<tr>
<td>متوسط استهلاك "الاسمنت العادي"" </td>
	<td><input type="number" name="portland_cement" id="portland_cement" value="{{ $review->Portland_Cement }}"/></td>
	<td><span class="label label-danger" id="portland_cement_invalid">{{ $errors->first('portland_cement') }}</span></td>
</tr>
<tr>
	<td>متوسط استهلاك "اسمنت المقاوم"</td>
	<td><input type="number" name="resisted_cement" id="resisted_cement" value="{{ $review->Resisted_Cement }}"/></td>
	<td><span class="label label-danger" id="resisted_cement_invalid">{{ $errors->first('resisted_cement') }}</span></td>
</tr>

<tr>
	<td>متوسط استهلاك "اسمنت المهندس"</td>
	<td><input type="number" name="eng_cement" id="eng_cement" value="{{ $review->Eng_Cement }}"/></td>
	<td><span class="label label-danger" id="eng_cement_invalid">{{ $errors->first('eng_cement') }}</span></td>
</tr>

<tr>
	<td>متوسط استهلاك "اسمنت الصعيد"</td>
	<td><input type="number" name="saed_cement" id="saed_cement" value="{{ $review->Saed_Cement }}"/></td>
	<td><span class="label label-danger" id="saed_cement_invalid">{{ $errors->first('saed_cement') }}</span></td>
</tr>
<tr>
	<td>متوسط استهلاك "الاسمنت الفنار"" </td>
	<td><input type="number" name="fanar_cement" id="fanar_cement" value="{{ $review->Fanar_Cement }}"/></td>
	<td><span class="label label-danger" id="fanar_cement_invalid">{{ $errors->first('fanar_cement') }}</span></td>
</tr>

<tr>
	<td>تاجر الاسمنت 1</td>
	<td><input type="text" name="seller1" value="{{$review->Seller1}}"/></td>
	<td><span class="label label-danger" id="seller1_invalid">{{ $errors->first('seller1') }}</span></td>	
</tr>
<tr>
	<td>تاجر الاسمنت 2</td>
	<td><input type="text" name="seller2" value="{{$review->Seller2}}" /></td>
	<td><span class="label label-danger" id="seller2_invalid">{{ $errors->first('seller2') }}</span></td>
</tr>
<tr>
	<td>تاجر الاسمنت 3</td>
	<td><input type="text" name="seller3" value="{{$review->Seller3}}"/></td>
	<td><span class="label label-danger" id="seller3_invalid">{{ $errors->first('seller3') }}</span></td>
</tr>

<tr>
	<td>تاجر الاسمنت 4</td>
	<td><input type="text" name="seller4" value="{{$review->Seller4}}"/></td>
	<td><span class="label label-danger" id="seller4_invalid">{{ $errors->first('seller4') }}</span></td>
</tr>

<tr>
		<td>متوسط عدد عدد المواقع في الشهر</td>
		<td><input type="number" name="project_no" id="project_no" value="{{ $review->Project_NO }}"/></td>
		<td><span class="label label-danger" id="project_no_invalid">{{ $errors->first('project_no') }}</span></td>
	</tr>
	<tr>
		<td>متوسط المستهلك من الاسمنت</td>
		<td><input type="number" name="cement_consuption" id="cement_consuption" value="{{ $review->Cement_Consuption }}" /></td>
		<td><span class="label label-danger" id="cement_consuption">{{ $errors->first('cement_consuption') }}</span></td>
	</tr>
	<tr>
		<td>متوسط استهلاك الطوب الاسمنتي</td>
		<td><input type="number" name="cement_bricks" id="cement_bricks" value="{{ $review->Cement_Bricks }}"/></td>
		<td><span class="label label-danger" id="cement_bricks_invalid">{{ $errors->first('cement_bricks') }}</span></td>
	</tr>

	<tr>
  <td>متوسط استهلاك الحديد</td>
	<td><input type="number" min="0" max="99" id="steel_consumption" name="steel_consumption" value="{{ $review->steel_consumption }}"/></td>
	<td><span class="label label-danger" id="steel_consumption_invalid">{{ $errors->first('steel_consumption') }}</span></td>
</tr>
<tr>
	<td>عدد العمال</td>
	<td><input type="number" name="workers" id="workers" value="{{ $review->Workers }}"/></td>
	<td><span class="label label-danger" id="workers_invalid">{{ $errors->first('workers') }}</span></td>
</tr>
<tr>
  <td>هل يمتلك خشب</td>
  <td>{!!Form::select('has_wood', array('نعم' => 'نعم', 'لا' => 'لا'));!!}  </td>
      <td><span type="hidden" class="label label-danger"></span></td>
</tr>

<tr>
	<td>امتار الخشب</td>
	<td><input type="number" id="wood_meters" name="wood_meters" value="{{ $review->Wood_Meters }}"/></td>
	<td><span class="label label-danger" id="wood_meters_invalid">{{ $errors->first('wood_meters') }}</span></td>
</tr>
<tr>
	<td>متوسط المستهلك من الخشب</td>
	<td><input type="number" name="wood_consumption" id="wood_consumption" value="{{ $review->Wood_Consumption }}"/></td>
	<td><span class="label label-danger" id="wood_consumption_invalid">{{ $errors->first('wood_consumption') }}</span></td>
</tr>
<tr>
  <td>هل يمتلك خلاطة</td>
  <td>{!!Form::select('has_mixers', array('نعم' => 'نعم', 'لا' => 'لا'));!!}  </td>
      <td><span type="hidden" class="label label-danger"></span></td>
</tr>


<tr>
	<td>عدد الخلاطات</td>
	<td><input type="number" name="no_of_mixers" id="no_of_mixers" value="{{ $review->No_Of_Mixers }}"/></td>
	<td><span class="label label-danger" id="no_of_mixers_invalid">{{ $errors->first('no_of_mixers') }}</span></td>
</tr>
<tr>
	<td>رأس المال</td>
	<td><input type="number" name="capital" id="capital" value="{{ $review->Capital }}"/></td>
	<td><span class="label label-danger" id="capital_invalid">{{ $errors->first('capital') }}</span></td>
</tr>
<tr>
	<td>طريقة الدفع</td>
	<td><input type="text" name="credit_debit" id="credit_debit" value="{{ $review->Credit_Debit }}"/></td>
	<td><span class="label label-danger" id="credit_debit_invalid">{{ $errors->first('credit_debit') }}</span></td>
</tr>
<tr>
  <td>هل يتعامل مع مقاولين من الباطن</td>
  <td>{!!Form::select('has_sub_contractor', array('نعم' => 'نعم', 'لا' => 'لا'));!!}  </td>
      <td><span type="hidden" class="label label-danger"></span></td>
</tr>


<tr>
  <td>اسم مقاولين من الباطن 1</td>
  <td><input type="text" name="sub_contractor1" id="sub_contractor1" value="{{ $review->Sub_Contractor1}}" /></td>
  <td><span class="label label-danger" id="sub_contractor_invalid">{{ $errors->first('sub_contractor') }}</span></td>
</tr>
<tr>
  <td>اسم مقاولين من الباطن 2</td>
  <td><input type="text" name="sub_contractor2" id="sub_contractor2" value="{{ $review->Sub_Contractor2 }}" /></td>
  <td><span class="label label-danger" id="sub_contractor_invalid">{{ $errors->first('sub_contractor') }}</span></td>
</tr>


<tr>
	<td><input type="submit" id="submit" value="حفظ"></td>
	<td></td>
	<td></td>
</tr>
	<!-- </form>	 -->
	{!! Form::close() !!} 

@stop

 