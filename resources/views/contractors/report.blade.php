@extends('master')

@section('content')

<h4>اضافة مقاول جديد</h4>
<table class="table table-striped table-bordered table-hover">
{!!Form::open(['action'=>'ContractorsController@ReportResult','method' => 'post'])!!}

<tr>
  <td>اختر المحافظة
  <select id="goverment" name="goverment" class = "chosen-select chosen-rtl" >
  <option value ="all"> </option>
    @foreach($govs as $gov)
      <option value ="{{$gov->gov_name}}"> {{$gov->gov_name}} </option>
    @endforeach
  </select> 
  </td>
</tr>

<tr>
  <td>اسم المركز
    <select id="city_id" name="city_name" class ="chosen-select chosen-rtl">
      <option value=" $('#city_id').val()"> اختر مركز</option>
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
        $('#goverment').chosen({
              width: '100%',
              no_results_text: 'لا توجد نتيجة',
              allow_single_deselect: true, 
              search_contains:true,
        }); 


        $('#city_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة',
            search_contains:true,
        });

        $("#goverment").change(function() {      
            $.getJSON("report/gov/" + $("#goverment").val(), function(data) {
                // console.log(data);
                var $cities = $("#city_id");
                $("#city_id").chosen("destroy");
                $cities.empty();
                $.each(data, function(key,value) {
                  // console.log(key,value);
                  $cities.append('<option value="' + value +'">' + value + '</option>');
                });
              

              $('#city_id').chosen({
                  width: '100%',
                  no_results_text: 'لا توجد نتيجة',
                  search_contains:true,
              });

              $("#city_id").trigger("chosen:updated");
              $("#city_id").trigger("change");   

          });

        $('#city_id').chosen({
            width: '100%',
            no_results_text: 'لا توجد نتيجة'
          });
      
      });
           
    });

</script>
@stop

