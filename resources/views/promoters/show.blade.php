
@extends('master')

@section('content')
         
 

<table class="table table-bordered table-hover">
<thead>
<th>
Contractors
</th>	
<th>
visits
</th>
</thead>	
<tbody>
@foreach ($promoters->getcontractor as $contractor)
<tr>
<td>{{$contractor->	Name}}</td>
<td>
 @foreach ($contractor->getproject as $visit)
 <div>
 <span class="btn btn-primary">{{$visit-> Government}}</span>
 <span class="btn btn-primary">{{$visit-> Cement_Type}}</span>
 <span class="btn btn-primary">{{$visit-> Cement_Quantity}}</span>
  <span class="btn btn-primary">{{$visit-> Visit_Reason}}</span>
 </div>
  @endforeach
</td>
</tr>
 @endforeach
</tbody>



</table>




    



@stop



