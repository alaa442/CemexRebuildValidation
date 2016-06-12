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

<section class="panel panel-primary">
<div class="panel-body">
 
<table  class="table table-hover table-bordered  dt-responsive nowrap display" cellspacing="0" width="100%" id="analysis">

    <thead>
    <tr>
							<th style="text-align:center;">أسم المندوب</th>
              <th style="text-align:center;">اليوميه</th>
							<th style="text-align:center;">المراجعه الشهريه</th>
               <th style="text-align:center;">عدد ايام العمل</th>

              <th style="text-align:center;">نسبه تحقيق الهدف من ايام العمل </th>
							<th style="text-align:center;">عدد مرات ارسال الGPS </th>
             <th style="text-align:center;">نسبه تحقيق الهدف من ارسال الGPS </th>

             
							<th style="text-align:center;">كميه الاسمنت </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من كميه الاسمنت </th>
							<th style="text-align:center;">عدد الزيارات </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من الزيارات </th>
							<th style="text-align:center;">عدد المكالمات </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من المكالمات  </th>
              <th style="text-align:center;">facebook </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من facebook </th>

              <th style="text-align:center;">instgram </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من instgram </th>
              <th style="text-align:center;">Website </th>
              <th style="text-align:center;"> نسبه تحقيق الهدف من Website </th>
              <th style="text-align:center;">youtube </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من youtube </th>
              <th style="text-align:center;">reports </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من reports </th>
              <th style="text-align:center;"> لالمقاولين الجدد </th>

              <th style="text-align:center;">نسبه تحقيق الهدف من لالمقاولين الجدد </th>
              <th style="text-align:center;">اجمالى المرتب </th>
              <th style="text-align:center;">اجمالي المرتب بعد المراجعه </th>

     </tr>
 </thead>
 <tbody>
@foreach($Final as $items=>$value) 	
 <tr style="text-align:center;">
       <td>{{$value['Name']}}</td>
        <td>{{$value['Salary']}}</td>
@if($value['Backcheck']>50)
      <td style="background-color:rgba(59, 121, 38, 0.9);color: white;direction: ltr;">{{$value['Backcheck']}}%</td>
     
 @else

  <td style="background-color: brown;color: white;direction: ltr;">{{$value['Backcheck']}}%</td>
  @endif  
       
  <td>{{$value['Work_Day']}}</td>
  <td>{{$value['Work_Day%']}}%</td>
  <td style="direction: ltr;">{{$value['GPS']}}</td>
  <td style="direction: ltr;">{{$value['GPS%']}}%</td>

  <td>{{$value['Cement_Quantity']}}</td>
  <td>{{$value['Cement_Quantity%']}}%</td>
  <td>{{$value['Visit_count']}}</td>
  <td>{{$value['Visit_count%']}}%</td>
  <td>{{$value['Call_count']}}</td>
  <td>{{$value['Call_count%']}}%</td>
  <td>{{$value['facebook']}}</td>
  <td>{{$value['facebook%']}}%</td>
  <td>{{$value['instgram']}}</td>
  <td>{{$value['instgram%']}}%</td>
  <td>{{$value['Website']}}</td>
  <td>{{$value['Website%']}}%</td>
  <td>{{$value['youtube']}}</td>
  <td>{{$value['youtube%']}}%</td>
  <td>{{$value['reports']}}</td>
  <td>{{$value['reports%']}}%</td>
  <td>{{$value['newcon']}}</td>
  <td>{{$value['newcon%']}}%</td>
  <td>{{$value['sumation']}}</td>
  <td>{{$value['resumation']}}</td>
   


    </tr>
    @endforeach
 </tbody>
     <tfoot>
        <tr>
              <th style="text-align:center;"></th>
              <th style="text-align:center;">اليوميه</th>
              <th style="text-align:center;">الأداء خلال  هذا الشهر </th>
              <th style="text-align:center;">عدد ايام العمل</th>
              <th style="text-align:center;">نسبه تحقيق الهدف من ايام العمل </th>
              <th style="text-align:center;">عدد مرات ارسال الGPS </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من ارسال الGPS </th>
           
              <th style="text-align:center;">كميه الاسمنت </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من كميه الاسمنت </th>
              <th style="text-align:center;">عدد الزيارات </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من الزيارات </th>
              <th style="text-align:center;">عدد المكالمات </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من المكالمات  </th>
              <th style="text-align:center;">facebook </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من facebook </th>

              <th style="text-align:center;">instgram </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من instgram </th>
              <th style="text-align:center;">Website </th>
              <th style="text-align:center;"> نسبه تحقيق الهدف من Website </th>
              <th style="text-align:center;">youtube </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من youtube </th>
              <th style="text-align:center;">reports </th>
              <th style="text-align:center;">نسبه تحقيق الهدف من reports </th>
              <th style="text-align:center;"> لالمقاولين الجدد </th>

              <th style="text-align:center;">نسبه تحقيق الهدف من لالمقاولين الجدد </th>
              <th style="text-align:center;">اجمالى المرتب </th>
              <th style="text-align:center;">اجمالي المرتب بعد المراجعه </th>

        </tr>
     </tfoot>  
     
</table>
</div>
</section>
<script type="text/javascript">

$(document).ready(function(){


   $('#analysis tfoot th').each(function () {


          var title = $('#analysis thead th').eq($(this).index()).text();
               
       
        if($(this).index()>=1 && $(this).index()<=8)
        {


           $(this).html( '<input type="text" placeholder="بحث '+title+'" />' );

        }

    } );
  
 var table = $('#analysis').DataTable( {

        select:true,
        responsive: true,
        'searchable':true,
        "order":[[0,"asc"]],
        "paging" :true,
          "scrollCollapse":true,

      });
 
table.columns().every( function () {
  var that = this;
 $(this.footer()).find('input').on('keyup change', function () {
          that.search(this.value).draw();
            if (that.search(this.value) ) {
               that.search(this.value).draw();
           }
        } );
      
    } );
 $('#analysis tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );

});



</script>
@stop

