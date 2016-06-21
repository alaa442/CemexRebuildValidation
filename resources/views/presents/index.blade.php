
@extends('master')
@section('content')
<section class="panel panel-primary">
<div class="panel-body">
 <a href="/presents/create"  class="btn btn-primary" style="margin-bottom: 20px;">أضافه هديه</a>
 
<table  class="table table-hover table-bordered  dt-responsive nowrap display" cellspacing="0" width="100%" id="Presents">
                 <thead >
                       <tr>
							<th>No</th>
							<th>أسم المقاول </th>
							<th>المسابقه</th>
							<th>تاريخ التسليم</th>
							<th>الترتيب </th>
							<th>المده</th>
							<th>تاريخ بدء المسابقه</th>
							<th>تاريخ انتهاء المسابقه</th>
							<th>الجوائز </th>
							<th>العمليات</th>
						  </tr>
				  </thead>
              
				    <tbody>	
							<?php $i=1;?>
							@foreach($present as $item)
								<tr>

									<td> {{$i++}}</td>
									<td>{{$item->getcontractors->Name}}</td>
									<td>{{$item->getcompetitions->Name}}</td>
									<td>{{$item->Delivery_Date}}</td>
									<td>{{$item->Ranking}} </td>
									<td>{{$item->getcompetitions->Period}}</td>
									<td>{{$item->getcompetitions->Start_Date}}</td>
									<td>{{$item->getcompetitions->End_Date}}</td>
								    <td>
									@foreach($item->getwards as $items)
								<span>{{$items->pivot->Amount}} {{$items->Name}} .</span>
								         

										
								    @endforeach
								    </td>

									        <td>
								             
								              <a href="/presents/{{$item->Presents_Id}}" class="btn btn-info"> عرض  </a>
								              <a href="/presents/{{$item->Presents_Id}}/edit" class="btn btn-success">تعديل</a>
								              <a href="/presents/destroy/{{$item->Presents_Id}}" class="btn btn-danger">حذف </a>



									          </td>
								</tr>
							@endforeach


                      </tbody>
                       <tfoot>
                                   <tr>
							<th></th>
							<th>أسم المقاول </th>
							<th>المسابقه</th>
							<th>تاريخ التسليم</th>
							<th>الترتيب </th>
							<th>المده</th>
							<th>تاريخ بدء المسابقه</th>
							<th>تاريخ انتهاء المسابقه</th>
							<th>الجوائز </th>
							<th></th>
							
						  </tr>
                    </tfoot>
   </table>
</div>



</section>
{!!Form::open(['action'=>'PresentsController@exportPresents','method' => 'post'])!!}
    
        <input type="submit" name="export" value="تحميل الملف" class="btn btn-primary" style="margin-bottom: 20px;" />
{!!Form::close()!!}
<script type="text/javascript">

$(document).ready(function(){


	 $('#Presents tfoot th').each(function () {


         	var title = $('#Presents thead th').eq($(this).index()).text();
               
       
        if($(this).index()>=1 && $(this).index()<=8)
        {


        	 $(this).html( '<input type="text" placeholder="بحث '+title+'" />' );

        }

    } );
	
 var table = $('#Presents').DataTable( {

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
 $('#Presents tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );

});



</script>


@stop










