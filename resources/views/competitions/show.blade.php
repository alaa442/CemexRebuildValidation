@extends('master')
@section('content')

	
	
	<h2> {{$competition->Name}} </h2>
	<h2> {{$competition->Period}}</h2>
	<h2> {{$competition->Start_Date}} </h2>
	<h2> {{$competition->End_Date}} </h2>
	 @foreach($competition->awards as $item)
 <span><h2>{{$item->pivot->Total_Amount}} {{$item->Name}} .</h2></span>
         

		
     @endforeach
	   
@stop
