@extends('master')
@section('title') analytics:: @parent @stop
@section('content')

<div class="row">
    <div class="page-header">
        <h2>Reviews analytics</h2>
    </div>
</div>

<h4>Chart analysis for cement types usage</h4>
<div id="perf_div"></div>
{!! \Lava::render('ColumnChart', 'MyStocks', 'perf_div') !!}



@endsection