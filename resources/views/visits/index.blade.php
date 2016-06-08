@extends('master')
@section('content')

<?php 
  //VisitErr 
  if(!empty($_COOKIE['VisitsErr'])) {     
    echo "<div><div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['VisitsErr'];
    echo "</div> </div>";
  } 
//FileErr
  if(!empty($_COOKIE['FileError'])) {     
    echo "<div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['FileError'];
    echo "</div>";
  } 
  //NoContVisitsErr
  if(!empty($_COOKIE['NoContVisitsErr'])) {     
    echo "<div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['NoContVisitsErr'];
    echo "</div>";
  }
  // NoProVisitsErr
  if(!empty($_COOKIE['NoProVisitsErr'])) {     
    echo "<div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['NoProVisitsErr'];
    echo "</div>";
  }

?>

<section class="panel panel-primary">
<div class="panel-body">
<a href="/visits/create" class="btn btn-primary"style="margin-bottom: 20px;"> أضافة </a>
<table class="table table-hover table-bordered  dt-responsive nowrap display visits" cellspacing="0" width="100% " >
  
  <thead>
    <th>No</th>
    <th>تعليقات عن المتابعات</th>
    <th>المتابعات اليومية</th>
    <th>المحافظة</th>
    <th>عنوان</th> 
    <th>نوع المشروع</th>
    <th>أنواع الاسمنت</th>
    <th>تاريخ الزيارة أو المكالمة</th>
    <th>GPS</th>
   <th> رقم الاوردار</th>
   <th>النقاط</th>
   <th>سبب المكالمة</th>
   <th>سبب الزيارة</th>
    <th>تعليقات عن الزيارة أو المكالمة</th>
    <th>حالة الحالية لمشروع</th>
    <th>كمية الاسمنت لمستخدمة</th>
   <th>تعليقات حول نوع المشروع</th>
  <th>اسم المندوب</th>
    <th>اسم المقاول</th>
    <th>تليفون الارضى</th>
    <th>تليقون</th>
    <th>رقم العضوية</th>
     <th>العمليات</th> 

     </thead>
      <tfoot>
        <th></th>
  <th>تعليقات عن المتابعات</th>
    <th>المتابعات اليومية</th>
      <th>المحافظة</th>
    <th>عنوان</th> 
    <th>نوع المشروع</th>
    <th>أنواع الاسمنت</th>
     <th>تاريخ الزيارة أو المكالمة</th>
      <th>GPS</th>
   <th> رقم الاوردار</th>
   <th>النقاط</th>
   <th>سبب المكالمة</th>
   <th>سبب الزيارة</th>
    <th>تعليقات عن الزيارة أو المكالمة</th>
    <th>حالة الحالية لمشروع</th>
    <th>كمية الاسمنت لمستخدمة</th>
   <th>تعليقات حول نوع المشروع</th>
  <th>اسم المندوب</th>
    <th>اسم المقاول</th>
    <th>تليفون الارضى</th>
    <th>تليقون</th>
<th>رقم العضوية</th>

   </tfoot>
               

  <tbody>
    <?php $i=1;?>
    @foreach($visits as $visit)
    <tr>
    <td> {{$i++}}</td>
    <td>{{$visit->Comments}}</td>
     <td>{{$visit->Backcheck}}</td>
    <td>{{$visit->Government}}</td> 
     <td>{{$visit->Adress}}</td>
    <td>{{$visit->Project_Type}}</td> 
    <td>{{$visit->Cement_Type}}</td>
    <td>{{$visit->Date_Visit_Call}}</td>
    <td>{{$visit->GPS }}</td>
    <td>{{$visit->OrderNo }}</td>
    <td>{{$visit->Points }}</td>
    <td>{{$visit->Call_Reason}}</td> 
    <td>{{$visit->Visit_Reason}}</td>
    <td>{{$visit->CV_Comments}}</td>
    <td>{{$visit->Project_Current_State}}</td>
    <td>{{$visit->Cement_Quantity}}</td>
    <td>{{$visit->Project_Type_Comments}}</td>
    <td>{{$visit->getusername->Pormoter_Name}}</td>
    <td> {{ $visit->getcontractorproject->Name}}</td>
    <td>{{ $visit->getcontractorproject->Tele1}}</td>
    <td>{{ $visit->getcontractorproject->Phone}}</td>
    <td>{{ $visit->getcontractorproject->Intership_No}}</td>

   <td>
      <a href="/visits/{{$visit->Visits_id}}" class="btn btn-info">أظهار </a>
       <a href="/visits/{{$visit->Visits_id}}/edit" class="btn btn-success">تعديل </a>
      <a href="/visits/destroy/{{$visit->Visits_id}}" class="btn btn-danger" >حذف </a>
     
   
   </td>
   


  </tr>
@endforeach
</tbody>
</table>

      </div>
    </section>

 {!!Form::open(['action'=>'VisitsController@importvisit','method' => 'post','files'=>true])!!}
      <input type="file" name="file" class="btn btn-primary" /><br />



        <input type="submit" name="submit"  class="btn btn-primary" value="اختيار الملف" style="margin-bottom: 20px;"/>
{!!Form::close()!!}
{!!Form::open(['action'=>'VisitsController@exportvisit','method' => 'post'])!!}
    
        <input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>
{!!Form::close()!!}



     <script type="text/javascript">
   

 var table= $('.visits').DataTable({
   
  select:true,

    
        "order":[[0,"asc"]],
    'searchable':true,
   "scrollCollapse":true,
   responsive: true,
        
   "paging":true,

});
 $(document).ready(function(){


   $('.visits tfoot th').each(function () {


          var title = $('.visits thead th').eq($(this).index()).text();
               
 if($(this).index()>=1 && $(this).index()<=22)
        {


           $(this).html( '<input type="text" placeholder="بحث '+title+'" />' );

        }

    });
   table.columns().every( function () {
  var that = this;
 $(this.footer()).find('input').on('keyup change', function () {
          that.search(this.value).draw();
            if (that.search(this.value) ) {
               that.search(this.value).draw();
           }
        });
      });
    });

  </script>
    @stop
