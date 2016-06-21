@extends('master')

@section('content')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
{!!Form::open(['route' =>[ 'visits.update',$visits->Visits_id],'method' => 'put'])!!}
<table class=" table form-group">
   <tr>
<td>المحافظة:</td>
<td>{!!Form::select('Government',
 array( 
  'أختر محافة' => 'أختر محافظة',
 'الإسكندرية' => 'الإسكندرية',
  'الإسكندرية' => 'الإسكندرية',
  'الإسماعيلية' => 'الإسماعيلية',
  'أسوان' => 'أسوان',
  'أسيوط' => 'أسيوط',
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
  
  ),null,['id' => 'Government']);!!}  {!!$errors->first('Government','<small class="label label-danger">:message</small>')!!}</td>
   </tr>
  <tr><td>المناديب</td> 
<td><select id="Pormoter_Id" name="Pormoter_Id">

  </select> </td> </tr></td>
<tr>
  <td>المقاول</td>
 <td> <select id="Contractor_Id" name="Contractor_Id">
  @foreach($contractors as $contractor)
  <option value ="{{$contractor ->Contractor_Id}}">{{$contractor ->Name}} </option>
    @endforeach
  </select></td></tr>
      
 <tr> <td> لمتابعة اليومية</td>
<td>{!!Form::select('Backcheck', array('نعم' => 'نعم', 'لا' => 'لا','متكرر' => 'متكرر','رقم خطأ' => 'رقم خطأ','خطأ' => 'خطأ','أخرى' =>'أخرى'));!!} </td></tr>
  
 <tr><td> العنوان</td>
  <td><input type="text" name="Adress" value="{{$visits->Adress}}"></td></tr>
<tr><td>تعليقات عن المتابعة اليومية</td>
 <td> <input type="text" name=" Comments" value="{{$visits->Comments}}" ></td></tr>

<tr><td>نوع الاسمنت</td>
<td>{!!Form::select('Cement_Type', array('أسمنت الفهد' => 'أسمنت الفهد', 'أسمنت الفهد 2' => 'أسمنت الفهد 2','أسمنت الصعيدى' => 'أسمنت الصعيدى','أسمت العادى' => 'أسمت العادى','أسمنت المهندس' => 'أسمنت المهندس','سمنت الفنار ' =>'سمنت الفنار ','أسمنت المقاوم' =>'أسمنت المقاوم','الجبس' =>'الجبس','لا يوجد'=>'لا يوجد'));!!}</td></tr>
<tr>
<td>تاريخ الزيارة أو المكالمة</td>
      <td><input type="date" name=" Date_Visit_Call" value="{{$visits->Date_Visit_Call}}">{!!$errors->first('Date_Visit_Call','<small class="label label-danger">:message</small>')!!}</td>
<tr>  
<td>الحالة الحاية لمشروه</td>
 <td> <input type="text" name=" Project_Current_State" value="{{$visits->Project_Current_State}}"></td>
     
<tr><td>GPS</td>
 <td> <input type="text" name=" GPS" value="{{$visits->GPS}}"></td></tr>

<tr><td>رقم الازردار</td>
  <td><input type="OrderNo" name=" OrderNo" value="{{$visits->OrderNo}}" >{!!$errors->first('OrderNo','<small class="label label-danger">:message</small>')!!}</td></tr>
 <tr><td>       
النقاط</td>
 <td> <input type="text" name=" Points" value="{{$visits->Points}}" >{!!$errors->first('Points','<small class="label label-danger">:message</small>')!!}</td></tr>
<tr><td>
كمية الاسمنت المستخدمة </td>
  <td><input type="text" name=" Cement_Quantity" value="{{$visits->Cement_Quantity}}" >{!!$errors->first('Cement_Quantity','<small class="label label-danger">:message</small>')!!}</td></tr>        
<tr><td>نوع المشروع</td>
 <td> {!!Form::select('Project_Type', array('تجارى' => 'تجارى', 'سكنى' => 'سكنى','سكنى تجارى' => 'سكنى تجارى','بنية تحتية' => 'بنية تحتية','مشاريع أخرى' => 'مشاريع أخرى'));!!} </td></tr>
<tr><td>
سبب المكالمة</td>
<td>{!!Form::select('Call_Reason', array('تسويق' => 'تسويق', 'أخرى' => 'أخرى'));!!}</td> </tr> 
<tr><td>سبب لزيارة</td>
<td>{!!Form::select('Visit_Reason', array('تسويق' => 'تسويق', 'مبيعات' => 'مبيعات','أخرى' => 'اخرى'));!!} </td></tr>      
<tr><td>
تعليقات عن الزيارة او المكالمة 
  <td><input type="text" name=" CV_Comments" value="{{$visits->CV_Comments}}"></td></tr>
  <tr><td>            
<td><input type="submit" value="حفظ"></td></tr>
</table>  
 <script type="text/javascript">
    $(document).ready(function() {
        $("#Government").change(function() {
   var id=$("#Pormoter_Id").attr("value");

            $.getJSON("../visits/promoters/",{id:id}, function(data) {
 alert(data);
                var $promoters = $("#Pormoter_Id");
                $promoters.empty();
                $.each(data, function(index, value) {
                    $promoters.append('<option value="' + value.id +'">' + value.name + '</option>');
                });
            $("#Pormoter_Id").trigger("change");
            });
       
        });
          });
    
</script>
@stop