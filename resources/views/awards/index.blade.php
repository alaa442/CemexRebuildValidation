
@extends('master')
@section('content')
<section class="panel panel-primary">
<div class="panel-body">
	 <a href="/awards/create" class="btn btn-primary"style="margin-bottom: 20px;">أضافه جائزه جديده</a>
 
<table  class="table table-hover table-bordered  dt-responsive nowrap display" cellspacing="0" width="100%" id="wards">
                 <thead>
                      <tr>
	<th>No </th>
	<th>أسم الجائزه </th>
  <th>الكميه الكليه</th>
  <th>تكلفه القطعه </th>
   <th>تكلفه الكميه الاساسيه </th>
  <th>الحاله</th>
	<th>العمليات</th>
  </tr>
                    </thead>
              
				     <tbody>
 		<?php $i=1;?>
							@foreach($awards as $award)
							<tr>
								<td> {{$i++}}</td>
								<td> {{$award->Name}} </td>
                  <td> {{$award->Total_Amount}} </td>
                    <td> {{$award->Cost}} </td>
                    <td> {{$award->Total_Cost}} </td>
                      <td>  @if($award->Total_Amount >= 1)
                      <img src="/assets/img/right.png"  width="10%" height="5%"/> 
                      @else
                         <img src="/assets/img/Cancel.png" width="10%" height="10%"/> 
                       @endif
      </td>
								        <td>
							              <a href="/awards/{{$award->Awards_Id}}" class="btn btn-info"> عرض  </a>
							              <a href="/awards/{{$award->Awards_Id}}/edit" class="btn btn-success">تعديل</a>
							              <a href="/awards/destroy/{{$award->Awards_Id}}" class="btn btn-danger">حذف </a>



								          </td>
							</tr>
							@endforeach

                 </tbody>
                       <tfoot>                <tr>
                                                  <th></th>
                                                  <th>أسم الجائزه </th>
                                                  <th>الكميه الكليه</th>
                                                  <th>تكلفه القطعه </th>
                                                  <th>الحاله</th>
                                                  <th></th>
                                                  </tr>
                    </tfoot>
   </table>
</div>
</section>
<script type="text/javascript">

$(document).ready(function(){


	 $('#wards tfoot th').each(function () {


        var title = $('#wards thead th').eq($(this).index()).text();
             
       
        if($(this).index()>=1 && $(this).index()<=4)
        {


        	 $(this).html( '<input type="text" placeholder="بحث '+title+'" />' );

        }

    } );
	
 var table = $('#wards').DataTable( {

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
 $('#wards tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );

});



</script>


@stop
