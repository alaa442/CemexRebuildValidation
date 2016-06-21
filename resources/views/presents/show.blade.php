@extends('master')
@section('content')

	 <table class="table table-bordered  table-responsive">

    
    <tr>
      <td scope="row">اسم المقاول</td>
      <td>{{$present->getcontractors->Name}}</td>
      </tr>
    <tr>
      <td scope="row">اسم المسابقه</td>
      <td>{{$present->getcompetitions->Name}}</td>
     </tr>

      <tr>
      <th scope="row">تاريخ استلام الهديه</th>
      <td>{{$present->Delivery_Date}}</td>
     </tr>
    <tr>
      <th scope="row">الترتيب</th>
      <td>{{$present->Ranking}}</td>
      </tr>
    <tr>
      <th scope="row">مده المسابقه</th>
      <td>{{$present->getcompetitions->Period}}</td>
     </tr>
   <tr>
      <th scope="row">تاريخ بدء المسابقه</th>
      <td>{{$present->getcompetitions->Start_Date}}</td>
     </tr>
   <tr>
      <th scope="row">تاريخ انتهاء المسابقه</th>
      <td>{{$present->getcompetitions->End_Date}}</td>
     </tr>
    <tr>
      <th scope="row">الجوائز الحاصل عليها المقاول</th>
      <td>  @foreach($present->getwards as $item)
        <span>{{$item->pivot->Amount}} {{$item->Name}} .</span>
         @endforeach
      </td>
       
     </tr>


















</table>  
@stop