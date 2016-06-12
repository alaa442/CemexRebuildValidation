@extends('master')
@section('content')


<?php 
//File
  if(!empty($_COOKIE['FileError'])) {     
    echo "<div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['FileError'];
    echo "</div>";
  } 
  //kpiErr 
  if(!empty($_COOKIE['kpiErr'])) {     
    echo "<div><div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['kpiErr'];
    echo "</div> </div>";
  } 
  //promoter kpi Err 
  if(!empty($_COOKIE['prokpiErr'])) {     
    echo "<div><div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['prokpiErr'];
    echo "</div> </div>";
  } 

?>

{!!Form::open(['route' => 'Kpi.store','method' => 'post' ,'files' => true ])!!}
<table class=" table form-group">
 
<tr>
  <td> <label for="inputName" class="control-label">عدد ايام العمل</label></td>
  <td><input type="number" name="Days" class="form-control" id="inputName" placeholder="ادخل عدد ايام العمل " min="1" ></td>
  <td> <label for="inputName" class="control-label">ارسال التقرير فى موعدة</label></td>
  <td><input type="number" name="Reports" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">عدد الزيارت اليومية</label></td>
  <td><input type="number" name="Visits" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">عدد المكالمات اليومية</label></td>
  <td><input type="number" name="Calls" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
 </tr>

<tr>
  <td> <label for="inputName" class="control-label">مقاولين جدد</label></td>
  <td><input type="number" name="NewCon" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">فيس</label></td>
  <td><input type="number" name="FB" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">انستجرام</label></td>
  <td><input type="number" name="Inst" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">المقاولين المشتركين في الأنشطة التسويقية شهريا من اجمالى عدد المقاولين </label></td>
  <td><input type="number" name="Activity" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  </tr>

    <tr>
  <td> <label for="inputName" class="control-label">عدد تسجيلات GPS لمنازل المقاولين </label></td>
  <td><input type="number" name="GPS" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">زيارة الموقع الالكتروني</label></td>
  <td><input type="number" name="WebSite" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">يوتيوب مشاهدة</label></td>
  <td><input type="number" name="Youtube" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">متابعة كل لافتات سيمكس (مواقع - مخازن - مكاتب بيع....)</label></td>
  <td><input type="number" name="Cemexads" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
</tr>

 <tr>
  <td> <label for="inputName" class="control-label">متابعة القهاوى ( التاكد من وجود دعاية الشركة)</label></td>
  <td><input type="number" name="Caffe" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">برامج واخبار المنافسين</label></td>
  <td><input type="number" name="News" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">حصر انواع الاسمنت الموجوده فى السوق + اسعار المنافسين </label></td>
  <td><input type="number" name="Quantity" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">جودة قاعدة بيانات المقاولين</label></td>
  <td><input type="number" name="QuilityDB" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
</tr>

 <tr>
  <td> <label for="inputName" class="control-label">نسبة من تحقيق اهداف مبيعات المقاولين</label></td>
  <td><input type="number" name="Salles" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">مدارس المقاولين او اى برنامج ( جودة انتقاء المقاولين)</label></td>
  <td><input type="number" name="School" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
  <td> <label for="inputName" class="control-label">كمية الاسمنت فى الموقع </label></td>
  <td><input type="number" name="CementQu" class="form-control" id="inputName" placeholder="Enter " min="1" ></td>
</tr>



























<tr>
<th>تاريخ الزيارة او المكالمة:</th>
  <td><input type="date" name=" Date_Visit_Call" ></td>
  <td><input type="file" name="file" class="btn btn-primary" /></td>
 
</tr>
<tr>
<td><input type="submit"name="submit" class="btn btn-primary" value="الحفظ"></td>
</tr>
</table>
{!!Form::close()!!}

@stop