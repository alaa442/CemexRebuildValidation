
@extends('master')
@section('content')


{!! Form::open(['route'=>'competitions.store','method'=>'post']) !!}
<legend>أضافه مسابقه جديده</legend>
<table class=" table form-group">
<tr>
    <td> <label for="inputName" class="control-label">الأسم</label></td>
    <td><input type="text" name="Name" class="form-control" id="inputName" placeholder="Enter Name" >{!!$errors->first('Name','<small class="label label-danger">:message</small>')!!}</td>
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
   ),null,['class'=>'form-control Government chosen-select chosen-rtl','id' => 'prettify']);!!}  
</tr>
<tr>
    <td> <label for="inputName" class="control-label">المركز</label></td>
    <td><input type="text" name="City" class="form-control" id="inputCity" placeholder="Enter City" >{!!$errors->first('City','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
 <td> <label for="inputName" class="control-label">المده</label></td>
 <td><input type="number" name="Period" class="form-control" id="inputName" placeholder="Enter Period" min='0' >{!!$errors->first('Period','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td>  <label for="inputName" class="control-label">تاريخ بدء المسابقه</label></td>
    <td><input type="date" name="Start_Date" class="form-control"  placeholder="Enter Start Date" >{!!$errors->first('Start_Date','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
    <td> <label for="inputName" class="control-label">تاريخ انتهاء المسابقه</label></td>
    <td><input type="date" name="End_Date" class="form-control"  placeholder="Enter Start Date" >{!!$errors->first('End_Date','<small class="label label-danger">:message</small>')!!}</td>
</tr>

</table>
<table class="table table-bordered table-hover">
<thead>
<th> No</th>
<th>أسم الجائزه</th>
<th> الكميه</th>
<th> <input type="button" class="btn btn-primary add" value="+"></th>
</thead>
<tbody class="body">
  <th class="no">1</th>
  <td>{!!Form::select('awards[]', ([null => 'أختر جائزه'] + $awards->toArray()) ,null,['class'=>'form-control','id' => 'prettify'])!!}{!!$errors->first('awards.*','<small class="label label-danger">:message</small>')!!}</td>
   <td><input type="number" name="Total_Amount[]" class="form-control TotalAmount" id="inputName" placeholder="Enter Amount" min="1" ></td>
   <td><a href="#" class="btn btn-danger delete">حذف</a></td>

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
  '<td><input type="number" name="Total_Amount[]" class="form-control TotalAmount" id="inputName" placeholder="Enter Amount" min="1" ></td>'+
  ' <td><a href="#" class="btn btn-danger delete">حذف</a></td></tr>';
$('.body').append(tr);
i++;

});
 $('.body').delegate('.delete','click',function(){
  $(this).parent().parent().remove();
 });

// $('select').change(function() {
  
//    alert($(this).index());
//     $(this)
//         .siblings('select')
//         .children('option[value=' + this.index + ']')
//         .attr('disabled', true)
//         .siblings().removeAttr('disabled');

// });

// $('.TotalAmount').keyup( function() {
//    $('.body').html($('input').map(function(){
//         return this.value + ((this.value.length)?"<br>":"");
//     }).get().join(''));

//   alert($(this).val());
// });
// $(this).append("done");
// });

});
</script>


  @stop











