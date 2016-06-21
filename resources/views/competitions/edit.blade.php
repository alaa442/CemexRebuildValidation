
@extends('master')
@section('content')

{!! Form::open(['route'=>['competitions.update',$competition->Competitions_Id],'method'=>'PUT']) !!}
<legend>تعديل المسابقه</legend>
<table class=" table form-group">
  <tr>
    <td> <label for="inputName" class="control-label">الأسم</label></td>
 <td><input type="text" name="Name" class="form-control" id="inputName" value="{{$competition->Name}}" >{!!$errors->first('Name','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
   <td> <label for="inputName" class="control-label">المحافظه</label></td>
    <td>{!!Form::select('Government', array('أسيوط' => 'أسيوط', 
    'المنيا' => 'المنيا',
    'الإسكندرية' => 'الإسكندرية',
    'الإسماعيلية' => 'الإسماعيلية',
    'أسوان' => 'أسوان',
    'الأقصر' => 'الأقصر',
    'البحر الأحمر' => 'البحر الأحمر',
    'البحيرة' => 'البحيرة',
    'بني سويف' => 'بني سويف',
    'بورسعيد' => 'بورسعيد',
    'جنوب سيناء' => 'جنوب سيناء',
    'الجيزة' => 'الجيزة',
    'الدقهلية' => 'الدقهلية',
    'دمياط' => 'دمياط',
    'سوهاج' => 'سوهاج',
    'السويس' => 'السويس',
    'الشرقية' => 'الشرقية',
    'شمال سيناء' => 'شمال سيناء',
    'الغربية' => 'الغربية',
    'الفيوم' => 'الفيوم',
    'القاهرة' => 'القاهرة',
    'القليوبية' => 'القليوبية',
    'قنا' => 'قنا',
    'كفر الشيخ' => 'كفر الشيخ',
    'مطروح' => 'مطروح',
    'المنوفية' => 'المنوفية',
    'الوادي الجديد' => 'الوادي الجديد',
   ),$competition->Government,['class'=>'form-control Government chosen-select chosen-rtl','id' => 'prettify']);!!}  </td>
</tr>
<tr>
    <td> <label for="inputName" class="control-label">المركز</label></td>
    <td><input type="text" name="City" class="form-control" id="inputCity" value="{{$competition->City}}" >{!!$errors->first('City','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
 <td> <label for="inputName" class="control-label">المده</label></td>
 <td><input type="number" name="Period" class="form-control" id="inputName" value="{{$competition->Period}}" >{!!$errors->first('Period','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td>  <label for="inputName" class="control-label">تاريخ بدء المسابقه</label></td>
 <td><input type="date" name="Start_Date" class="form-control"  value="{{$competition->Start_Date}}" >{!!$errors->first('Start_Date','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td>  <label for="inputName" class="control-label">تاريخ انتهاء المسابقه</label></td>
 <td><input type="date" name="End_Date" class="form-control"  value="{{$competition->End_Date}}" >{!!$errors->first('End_Date','<small class="label label-danger">:message</small>')!!}</td>
</tr>
</table>
<table class="table table-bordered table-hover">
<thead>
<th> No</th>
<th>أسم الجائزه</th>
<th>الكميه</th>
<th> <input type="button" class="btn btn-primary add" value="+"></th>
</thead>

<tbody class="body">
   <?php $var =1; ?> 
  @foreach($competition->awards as $item)
 
<tr>
  <th class="no">{{$var}}</th>
  <td>{!!Form::select('awards[]', $awards ,$item->Awards_Id,['class'=>'form-control','id' => 'prettify'])!!}</td>
   <td><input type="number" name="Total_Amount[]" class="form-control" id="inputName" value="{{$item->pivot->Total_Amount}}" min="1" required></td>
   <td><a href="#" class="btn btn-danger delete">حذف</a></td>
</tr>
<?php $var++; ?>
  @endforeach
  
</tbody>

</table>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
  {!!Form::close()!!}

<script type="text/javascript">
$(function(){
   $(".Government").chosen({ 
                   width: '100%',
                  no_results_text: "لا توجد نتيجه", });

 var i=1;

 $( ".add" ).on( "click", function() {

  var n=($('.body  tr').length-0)+1;
  var tr=' <tr><th class="no">'+n+'</th>'+
  '<td>{!!Form::select('awards[]', $awards ,null,['class'=>'form-control','id' => 'prettify'])!!}</td>'+
  '<td><input type="number" name="Total_Amount[]" class="form-control" id="inputName" placeholder="Enter Amount"   min="1" required></td>'+
  ' <td><a href="#" class="btn btn-danger delete">Delete</a></td></tr>';
$('.body').append(tr);
i++;

});
 $('.body').delegate('.delete','click',function(){
  $(this).parent().parent().remove();
 });

});
</script>


  @stop



















