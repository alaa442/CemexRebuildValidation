@extends('master')

@section('content')

<h4>اضافة مقاول جديد</h4>
<table class="table table-striped table-bordered table-hover">
{!!Form::open(['action'=>'ReviewsController@ReportResult','method' => 'post'])!!}

<tr>
  <td>الحالة
    <select id="status" name="status" class = "chosen-select chosen-rtl" >
        <option value ="Reviewed">Reviewed </option>
        <option value ="To Be Reviewed"> To Be Reviewed</option>
    </select> 
  </td>
</tr>

<tr>
  <td>حالة المكالمة
    <select id="call_status" name="call_status" class = "chosen-select chosen-rtl" >
        <option value ="Reviewed">Reviewed </option>
        <option value ="To Be Reviewed"> To Be Reviewed</option>
    </select> 
  </td>
</tr>

<tr>
    <td><input type="submit" name="report" class="btn btn-primary" value="عرض التقرير" /></td>
</tr>  

{!! Form::close() !!}
 </table> 

<script type="text/javascript">
    $(document).ready(function() {                 
        $('#status').chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة',
              allow_single_deselect: true, 
              search_contains:true,
        }); 


        $('#call_status').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة',
            search_contains:true,
        });
    });
</script>      
@stop

