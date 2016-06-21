
@extends('master')

@section('content')
    
 <p>
Created on: {{ $visits->created_at }} 
Last modified: {{ $visits->updated_at }}<br />


هذه الزيارة تمت بواسطة المندوب{{$visits->getusername->Pormoter_Name}}</p>
هذا المشروع تم عن طريق المقاول{{$visits->getcontractorproject->Name}}</p>




  
    

  

 
@stop



