@extends('master')

@section('content')
{!!Form::open(['route' => 'visits.store','method' => 'post'])!!}
<table class=" table form-group">
  <tr>
<td>المحافظة:</td>
<td>{!!Form::select('Government',
 array( 
 '0' => 'اختر محافظة',
 'الإسكندرية' => 'الإسكندرية',
  'الإسكندرية' => 'الإسكندرية',
  'الإسماعيلية' => 'الإسماعيلية',
  'أسوان' => 'أسوان',
  'اسيوط' => 'اسيوط',
  'الأقصر' => 'الأقصر',
  'البحر الأحمر ' =>'البحر الأحمر ',
  'البحيرة' =>'البحيرة',
 'بني سويف' => 'بني سويف',
  'بورسعيد' => 'بورسعيد',
  'جنوب سيناء' => 'جنوب سيناء',
  'الجيزة' => 'الجيزة',
  'الدقهلية' => 'الدقهلية',
  'دمياط ' =>'دمياط ',
  'سوهاج' =>'سوهاج',
  'السويس' => 'السويس',
  'الشرقية' => 'الشرقية',
  'شمال سيناء' => 'شمال سيناء',
  'الغربية' => 'الغربية',
  'الفيوم' => 'الفيوم',
  'القاهرة ' =>'القاهرة ',
  'القليوبية' =>'القليوبية',
  'قنا' => 'قنا',
  'كفر الشيخ' => 'كفر الشيخ',
  'مطروح' => 'مطروح',
  'المنوفية' => 'المنوفية',
  'المنيا' => 'المنيا',
  'الوادي الجديد ' =>'الوادي الجديد '
  
  ),null,['id' => 'Government','class'=>'chosen-select chosen-rtl']);!!}  {!!$errors->first('Government','<small class="label label-danger">:message</small>')!!}</td>
   </tr>
  <tr>
<td>أسم المندوب:  </td>
 <td>
  <select id="Pormoter_Id" name="Pormoter_Id" class="chosen-select chosen-rtl">
   <option value="0">اختار من فضلك أسم المندوب</option>
  


    
</select> {!!$errors->first('Pormoter_Id','<small class="label label-danger">:message</small>')!!} </td> 
</tr>
<tr>
<td>أسم المقاول: </td>
<td><select id="Contractor_Id" name="Contractor_Id" class="chosen-select chosen-rtl">
   <option value="0">اختار من فضلك أسم المقاول</option>
    
<!--   @foreach($contractors as $contractor) -->
  <!-- <option value ="{{$contractor ->Contractor_Id}}">{{$contractor ->Name}} </option> -->
   <!--  @endforeach -->
</select>  {!!$errors->first('Contractor_Id','<small class="label label-danger">:message</small>')!!}</td>

</tr>


<tr>
 <td>العنوان:</td>
 <td>   <input type="text" name="Adress"> </td>
  </tr>
<tr>
<td>GPS</td>
  <td>  <input type="text" name=" GPS" ></td></tr>
  <tr>
    <td> كمية الاسمنت المستخدمة </td>
     <td><input type="text" name=" Cement_Quantity" >{!!$errors->first('Cement_Quantity','<small class="label label-danger">:message</small>')!!}</td></tr>
 <tr>
<td>متابعات يومية:</td>
<td>{!!Form::select('Backcheck', array('نعم' => 'نعم', 'لا' => 'لا','متكرر' => 'متكرر','رقم خطأ' => 'رقم خطأ','خطأ' => 'خطأ','أخرى' =>'أخرى'));!!} </td>
</tr>
<tr>
<td>تعليقات:</td>
  <td><input type="text" name=" Comments" ></td>
</tr>
<tr>
<td>نوع الاسمنت:</td>
<td>{!!Form::select('Cement_Type', array('أسمنت الفهد' => 'أسمنت الفهد', 'أسمنت الفهد 2' => 'أسمنت الفهد 2','أسمنت الصعيدى' => 'أسمنت الصعيدى','أسمت العادى' => 'أسمت العادى','أسمنت المهندس' => 'أسمنت المهندس','أسمنت الفنار' =>'أسمنت الفنار ','أسمنت المقاوم' =>'أسمنت المقاوم','الجبس' =>'الجبس','لا يوجد'=>'لا يوجد'));!!}  {!!$errors->first('Cement_Type','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
<td>تاريخ الزيارة او المكالمة:</td>
  <td><input type="date" name=" Date_Visit_Call" >{!!$errors->first('Date_Visit_Call','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
<td>قم الاوردر</td>
 <td> <input type="number" min="0" name=" OrderNo" >{!!$errors->first('OrderNo','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
<td>عدد النقاط</td>
<td><input type="number"  min="0" name=" Points" >{!!$errors->first('Points','<small class="label label-danger">:message</small>')!!}</td>
</tr>
<tr>
<td>نوع المشروع</td>
<td>{!!Form::select('Project_Type', array('تجارى' => 'تجارى', 'سكنى' => 'سكنى','سكنى تجارى' => 'سكنى تجارى','بنية تحتية' => 'بنية تحتية','مشاريع أخرى' => 'مشاريع أخرى'));!!}</td>
</tr>
<tr>
<td>سبب المكالمة:</td>
<td>{!!Form::select('Call_Reason', array('تسويق' => 'تسويق', 'أخرى' => 'اخرى'));!!} </td>       
</tr>
<tr>
<td>سبب الزيارة:</td>
<td>{!!Form::select('Visit_Reason', array('تسويق' => 'تسويق', 'مبيعات' => 'مبيعات','أخرى' => 'اخرى'));!!} </td>
</tr>
<tr>
<td>تعليقات حول الزيارة او امكالمة:</td>
<td><input type="text" name=" CV_Comments" ></td>
</tr>
<tr>
<td><input type="submit" value="الحفظ"></td>
</tr>
</table>
   


  <script type="text/javascript">
    $(document).ready(function() {
          
            $('#Government')  .chosen({
                width: '100%',
               no_results_text: 'لا توجد نتيجة'
            });
        $("#Government").change(function() {
       
            $.getJSON("../visits/promoters/" + $("#Government").val(), function(data) {
 
                var $promoters = $("#Pormoter_Id");
                $("#Pormoter_Id").chosen("destroy");
                $promoters.empty();
                $.each(data, function(index, value) {
                    $promoters.append('<option value="' + index +'">' + value + '</option>');
                });
              
        
              $('#Pormoter_Id').chosen({
                width: '100%',
                   no_results_text: 'لا توجد نتيجة'
            });
                $("#Pormoter_Id").trigger("chosen:updated");
            $("#Pormoter_Id").trigger("change");
            });

       
        
             $('#Pormoter_Id').chosen({
                width: '100%',
              no_results_text: 'لا توجد نتيجة'
            });
        });
         $("#Pormoter_Id").change(function() {
       
            $.getJSON("../visits/contractors/" + $("#Pormoter_Id").val(), function(data) {
 
                var $contractors = $("#Contractor_Id");
                   $("#Contractor_Id").chosen("destroy");
                $contractors.empty();
                $.each(data, function(index, value) {
                    $contractors.append('<option value="' + index +'">' + value + '</option>');
                });
                  
        
             $('#Contractor_Id').chosen({
                width: '100%',
                no_results_text:'لا توجد نتيجة'
            });
                $("#Contractor_Id").trigger("chosen:updated");
            $("#Contractor_Id").trigger("change");
            });
       
        });


    });
</script>

@stop