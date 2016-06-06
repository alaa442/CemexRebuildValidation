@extends('master')
@section('content')


<?php
//File
  if(!empty($_COOKIE['FileError'])) {     
    echo "<div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['FileError'];
    echo "</div>";
  } 
  //Doublepromoter 
  if(!empty($_COOKIE['Doublepromoter'])) {      
    echo "<div><div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['Doublepromoter'];
    echo "</div> </div>";
  } 
//PromoterErr 
  if(!empty($_COOKIE['PromoterErr'])) {     
    echo "<div><div class='alert alert-block alert-danger fade in center'>";
    echo $_COOKIE['PromoterErr'];
    echo "</div> </div>";
  } 

?>

<section class="panel panel-primary">
<div class="panel-body">
<a href="/promoters/create" class="btn btn-primary" style="margin-bottom: 20px;"> أضافة </a>
<table class="table table-hover table-bordered  dt-responsive nowrap display promoters" cellspacing="0" width="100%">
  <thead>
          <th>No</th>
                <th>أسم المندوب</th>
                <th>رقم التليفون</th>
                <th>المحافظة</th>
                <th>المركز</th>
                <th>البريد الاكترونى</th>
                 <th>حساب الفيسبوك</th>
                <th>حساب الانستجرام</th>
                <th>أسم المستخدم</th>
                <th>الرقم السرى</th>
                <th>الكود</th>
                <th>عدد سنين الخبرة</th>
                <th>تاريخ بدء العمل</th>
                <th>اليومية</th>
                  <th>العمليات</th> 
               
  </thead>
    <tfoot>
          <th></th>
                <th>أسم المندوب</th>
                <th>رقم التليفون</th>
                <th>المحافظة</th>
                <th>المركز</th>
                <th>البريد الاكترونى</th>
                 <th>حساب الفيسبوك</th>
                <th>حساب الانستجرام</th>
                <th>أسم النستخدم</th>
                <th>الرقم السرى</th>
                <th>الكود</th>
                <th>عدد سنين الخبرة</th>
                <th>تاريخ بدء العمل</th>
                <th>اليومية</th>
         
                  </tfoot>
               

<tbody>
  <?php $i=1;?>
  @foreach($promoters as $promoter)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$promoter->Pormoter_Name}}</td> 
    <td>{{$promoter->TelephonNo}}</td>
    <td>{{$promoter->Government}}</td>
    <td>{{$promoter->City}}</td>
    <td>{{$promoter->Email}}</td>
    <td>{{$promoter->Facebook_Account}}</td>
    <td>{{$promoter->Instegram_Account}}</td>
    <td>{{$promoter->User_Name}}</td>
    <td>{{$promoter->Password}}</td>
    <td>{{$promoter->Code}}</td>
    <td>{{$promoter->Experince}}</td>
    <td>{{$promoter->Start_Date}}</td>
     <td>{{$promoter->Salary}}</td>
       <td>
       <a href="/promoters/{{$promoter->Pormoter_Id}}" class="btn btn-info">عرض </a>
     <a href="/promoters/{{$promoter->Pormoter_Id}}/edit" class="btn btn-success">تعديل </a>

       <a href="/promoters/destroy/{{$promoter->Pormoter_Id}}" class="btn btn-danger">حذف </a>
  </td>
   </tr>
     @endforeach
</tbody>
</table>
</div>
    
    </section>
  
  {!!Form::open(['action'=>'PromotersController@importpromoters','method' => 'post','files'=>true])!!}
      <input type="file" name="file" class="btn btn-primary" />



        <input type="submit" name="submit"  class="btn btn-primary" value="اختيار الملف" style="margin-bottom: 20px;"/>
{!!Form::close()!!}
{!!Form::open(['action'=>'PromotersController@exportpromoters','method' => 'post'])!!}
    
        <input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>
{!!Form::close()!!}




  <script type="text/javascript">



  $(document).ready(function(){
     var table= $('.promoters').DataTable({
  
    select:true,

    responsive: true,
        "order":[[0,"asc"]],
    'searchable':true,
   "scrollCollapse":true,
   
        
   "paging":true,

   
});

 
   $('.promoters tfoot th').each(function () {



          var title = $('.promoters thead th').eq($(this).index()).text();
               
 if($(this).index()>=1 && $(this).index()<=13)
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

