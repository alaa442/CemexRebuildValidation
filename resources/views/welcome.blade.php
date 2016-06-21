<!DOCTYPE html>
<html>
    <head>
        <title>Database system</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <html dir="rtl" lang="ar">
        <html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
        <link href="/assets/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- hidden menu -->
<script type="text/javascript" src="/assets/js/ddaccordion.js"></script>

<script type="text/javascript">
ddaccordion.init({
    headerclass: "submenuheader", //Shared CSS class name of headers group
    contentclass: "submenu", //Shared CSS class name of contents group
    revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
    mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
    collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
    defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
    onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
    animatedefault: false, //Should contents open by default be animated into view?
    persiststate: true, //persist state of opened contents within browser session?
    toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
    togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
        //do nothing
    },
    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
        //do nothing
    }
})
</script>

<!-- <script type="text/javascript" src="jconfirmaction.jquery.js"></script> -->
<script type="text/javascript">
    
    $(document).ready(function() {
        $('.ask').jConfirmAction();
    });
    
</script>
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-horizon.css">
<link rel="stylesheet" type="text/css" href="/assets/css/rtl.css">
<style type="text/css">
body{
    
   
 
   font-family: 'zocial', sans-serif;
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

</style>


</head>

<body>


    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a class="navbar-brand" href="#">Marketing system</a>
      
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
    </ul>

    <ul class="nav navbar-nav navbar-right"> 
      <a href="/"><img src="/assets/img/images.png"></a>
    </ul>
  </div>
  </div>
</nav>


   <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                           
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="/assets/img/5.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="/assets/img/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="/assets/img/3.jpg" alt="">
                            </div>
                <div class="item">
                                <img class="img-responsive img-full" src="/assets/img/4.jpg" alt="">
                            </div>
                
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Cemex DB System</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Digital Marketing Team</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

       
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Digital Marketing Team <a href="http://www.cemex.com/">cemex.com</a></p>

                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</body>

</html>