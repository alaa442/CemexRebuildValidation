<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Marketing system</title>
    <html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json">
 -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css" />
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/jq-2.2.0,dt-1.10.11/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>
<link rel="stylesheet prefetch" href="http://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-horizon.css"> 
<script src="/assets/js/jQuery.extendext.js"></script>
<script src="/assets/js/doT.min.js"></script>
<script src="/assets/js/query-builder.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/query-builder.default.min.css">
<!-- 
 <script src="/assets/js/bootstrap.min.js"></script>
 -->

<style type="text/css">
body{

      font-family: 'zocial', sans-serif;
   }

.chosen-choices {
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 34px;
    padding: 6px 12px;
}
.chosenContainer .form-control-feedback {
    /* Adjust feedback icon position */
    right: -15px;
}
   tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
 thead input {
        width: 100%;
        padding: 2px;
        box-sizing: border-box;
    }
.footer {
            position: absolute;
             text-align: center;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 5%;
            background-color: #f5f5f5;
        }
        .wrapper{
          width:75%;
          margin: 0 auto;
          background: #eee;
        }
</style>

<?php 
  function RemoveCookies(){
      if (isset($_COOKIE['ContractorErr'])) {
          unset($_COOKIE['ContractorErr']);
          setcookie('ContractorErr', null, -1, '/');     
      }

      if (isset($_COOKIE['ReviewErr'])) {
          unset($_COOKIE['ReviewErr']);
          setcookie('ReviewErr', null, -1, '/');    
      }

      if (isset($_COOKIE['FileError'])) {
          unset($_COOKIE['FileError']);
          setcookie('FileError', null, -1, '/');       
      }
      
      if (isset($_COOKIE['DubleContractorErr'])) {
          unset($_COOKIE['DubleContractorErr']);
          setcookie('DubleContractorErr', null, -1, '/');       
      }
      
  }
?>

</head>


<body class="rtl" onload="<?php echo RemoveCookies() ?>">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <img src="/assets/img/logo.png" width="12%" height="12%" style="float:inherit;">
      <a class="navbar-brand" href="#">Marketing system </a>
    
      
    </div>
 <div class="collapse navbar-collapse" id="myNavbar">
  
      <ul class="nav navbar-nav">   
     	    <li><a href="/admins">الادارة</a></li>
          <li><a href="/promoters">المناديب</a></li>
			    <li><a href="/contractors">المقاولين</a></li>
			    <li><a href="/Charts/TypesCharts">مراجعة البيانات</a></li>
			    <li><a href="/visits">الزيارات</a></li>
  			  <li><a href="/awards">الجوائز</a></li>
  			  <li><a href="/competitions">المسابقات</a></li>
  			  <li><a href="/presents">هدايا المقاولين</a></li>
          <li><a href="/Kpi/create">KPI</a></li>
      </ul><br/>
      <ul class="nav navbar-nav">  
          <li><a href="/contractors/generate/report">تقارير المقاولين</a></li>
          <li><a href="/reviews/generate/report/">تقارير مراجعة البيانات</a></li>
		    
    </ul>

    <ul class="nav navbar-nav navbar-right"> 
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>

  </div>
  </div>
</nav>

	  	<div class="container-fluid">
	  		<main>
	  			@yield('content')
	  		</main>
	  	</div>

	</div>


</body>

</html>