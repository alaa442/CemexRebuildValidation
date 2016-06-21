
@extends('master')
@section('content')


{!! Form::open(['route'=>'presents.store','method'=>'post']) !!}
<legend>أضافه هديه</legend>
<table class=" table form-group">


 <tr>
   <td> <label for="inputName" class="control-label">المحافظه</label></td>
   <td>{!!Form::select('Government', array(
     '0' => 'برجاء أختيار محافظه',
    'أسيوط' => 'أسيوط', 
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
   ),null,['class'=>'form-control chosen-select chosen-rtl Government','id' => 'prettify']);!!} 
    {!!$errors->first('Government','<small class="label label-danger">:message</small>')!!}</td>
</tr>
 
   <tr>
    <td> <label for="inputName" class="control-label">كود المسابقه</label></td>
 

<td> <select class="form-control chosen-select chosen-rtl competition"  name="competition" id="prettify" data-placeholder="بحث" >

    <option value="0">أختر كود المسابقه</option>
</select>{!!$errors->first('competition','<small class="label label-danger">:message</small>')!!}
</td></tr>
 
</tr>
  <tr>
    <td> <label for="inputName" class="control-label">أسم المقاول</label></td>
  <td>
    <select class="form-control chosen-select chosen-rtl"  name="contractor" id="contractor" data-placeholder="بحث" >
      <option value="0">أختر المقاول</option>
    </select>{!!$errors->first('contractor','<small class="label label-danger">:message</small>')!!}</td> 

</tr>




<tr>
 <td> <label for="inputName" class="control-label">الترتيب</label></td>
 <td><input type="number" name="Ranking" class="form-control" id="inputName" placeholder="Enter Ranking" min="1" >{!!$errors->first('Ranking','<small class="label label-danger">:message</small>')!!}</td>
</tr>

<tr>
    <td>  <label for="inputName" class="control-label">تاريخ التسليم</label></td>
 <td><input type="date" name="Delivery_Date" class="form-control"  placeholder="Enter Delivery Date" >{!!$errors->first('Delivery_Date','<small class="label label-danger">:message</small>')!!}</td>
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
  <th class="no">1</th>
  <td> <select class="form-control chosen-select chosen-rtl awards"  name="awards[]" id="prettify" data-placeholder="بحث" ></select></td>

   <td><input type="number" name="Amount[]" class="form-control" id="inputName" placeholder="Enter Amount" min='1' required></td>
   <td><a href="#" class="btn btn-danger delete">حذف</a></td>

</tbody>
</table>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">حفظ</button>
  </div>
	{!!Form::close()!!}

<script type="text/javascript">
$(function(){

 var i=1;




$(".Government").chosen({ 
                   width: '100%',
                  no_results_text: "لا توجد نتيجه", });




   $(".Government").change(function() {


                               $.getJSON("../presents/competitions/" + $(".Government").val(), function(data) {


                                   var $competition = $(".competition");
             
                  
                                   $(".competition").chosen("destroy");
                
                                   $competition.empty();
                                   $competition.append('<option value="0">اختر المسابقه</option>');
                                   $.each(data, function(index, value) {
                                   $competition.append(
                                    '<option value="' + index +'">'+value+'</option>');
                                    });

                                 $(".competition").chosen({
                                   width: '100%',
                                   no_results_text:"لا توجد نتيجه",
                                   allow_single_deselect: true, 
                                   search_contains:true, });

                                 $(".competition").trigger("chosen:updated");

                                 });


                            $.getJSON("../presents/contractors/" + $(".Government").val(), function(data) {  
                                 
                                   var $stations = $("#contractor");
                          
                                   $("#contractor").chosen("destroy");
                              
                                   $stations.empty();
                                   $stations.append('<option value="0">اختر المقاول</option>');
                                   $.each(data, function(index, value) {
                                   $stations.append('<option value="' + index +'">'+value+'</option>');
                                    });

                                 $("#contractor").chosen({
                                    width: '100%',
                                    allow_single_deselect: true,
                                    no_results_text: "لا توجد نتيجه", });
                                     
                                 $("#contractor").trigger("chosen:updated");
                                 }); 
                     

            });

/*new*/

 $(".competition").change(function() {


  $.getJSON("../presents/awards/"+ $(".competition").val(), function(data) {





                                   var $awards = $(".awards");

                                  $(".awards").chosen("destroy");
                
                                   $awards.empty();
                                   $awards.append('<option value="0">اختر الجائزه</option>');
                                   $.each(data, function(index, value) {
                                   $awards.append('<option value="' + index +'">'+value+'</option>');
                                    });

                                   $(".awards").chosen({
                                     width: '100%',
                                     no_results_text:"لا توجد نتيجه",
                                     allow_single_deselect: true, 
                                     search_contains:true, });

                                   $(".awards").trigger("chosen:updated");

                                   });

 });

$( ".add" ).on( "click", function() {

  var n=($('.body  tr').length-0)+1;
  var tr=' <tr><th class="no">'+n+'</th>'+'<td> <select class="form-control chosen-select chosen-rtl awards"  name="awards[]" id="prettify" data-placeholder="بحث" >'+'</select></td>'+
  '<td><input type="number" name="Amount[]" class="form-control" id="inputName" placeholder="Enter Amount" min="1" required></td>'+
  ' <td><a href="#" class="btn btn-danger delete">حذف</a></td></tr>';
  $('.body').append(tr);

i++;

});
 $('.body').delegate('.delete','click',function(){
  $(this).parent().parent().remove();
 });
     
          
      


});
</script>


  @stop










