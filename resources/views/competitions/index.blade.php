@extends('master')
@section('content')
<section class="panel panel-primary">
<div class="panel-body">
	 <a href="/competitions/create" class="btn btn-primary"style="margin-bottom: 20px;">أضافه مسابقه جديده</a>
 
<table  class="table table-hover table-bordered  dt-responsive nowrap display" cellspacing="0" width="100%" id="competitions">
                 <thead>
                       <tr>
							<th>No</th>
							<th>كود</th>
							<th>الأسم </th>
							<th>المحافظه</th>
							<th>المركز</th>
							<th>المده</th>
							<th>تاريخ البدء</th>
							<th>تاريخ االانتهاء</th>
							<th>الجوائز المحدده</th>
							<th>العمليات</th>
						  </tr>
                    </thead>
              
				    <tbody>	
							<?php $i=1;?>
							@foreach($competitions as $item)
							<tr>
								<th> {{$i++}}</th>
								<td> {{$item->Code}} </td>
								<td> {{$item->Name}} </td>
								<td> {{$item->Government}} </td>
								<td> {{$item->City}}</td>
							    <td> {{$item->Period}}</td>
								<td> {{$item->Start_Date}} </td>
								<td> {{$item->End_Date}} </td>
								 <td> 
								@foreach($item->awards as $items)
									 <span>{{$items->pivot->Total_Amount}} {{$items->Name}}.</span>	
							    @endforeach
							    </td>

								        <td>
							             
							              <a href="/competitions/{{$item->Competitions_Id}}" class="btn btn-info"> عرض  </a>
							              <a href="/competitions/{{$item->Competitions_Id}}/edit" class="btn btn-success">تعديل</a>
							              <a href="/competitions/destroy/{{$item->Competitions_Id}}" class="btn btn-danger">حذف </a>



								          </td>
							</tr>
							@endforeach



                      </tbody>
                       <tfoot>
                                   <tr>
							<th></th>
							<th>كود</th>
							<th>الأسم </th>
							<th>المحافظه</th>
							<th>المده</th>
							<th>تاريخ البدء</th>
							<th>تاريخ االانتهاء</th>
							<th>الجوائز المحدده</th>
							<th></th>
						  </tr>
                    </tfoot>
   </table>
</div>
</section>
{!!Form::open(['action'=>'CompetitionsController@exportCompetitions','method' => 'post'])!!}
    
        <input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;"/>
{!!Form::close()!!}

<script type="text/javascript">

$(document).ready(function(){


	 $('#competitions tfoot th').each(function () {


         	var title = $('#competitions thead th').eq($(this).index()).text();
               
       
        if($(this).index()>=1 && $(this).index()<=8)
        {


        	 $(this).html( '<input type="text" placeholder="بحث '+title+'" />' );

        }

    } );
	
 var table = $('#competitions').DataTable( {

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
 $('#competitions tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );

});



</script>


@stop
