<html>
<head>
<title> @yield('title') </title>
<link rel="shortcut icon" href={{ url("favicon.ico") }}>
  <!-- Custom CSS -->
<!--<link href={{ url("css/comsen.css") }} rel="stylesheet">

<link href={{ url("css/main.css") }} rel="stylesheet">
  
   
   <link href={{ url("css/patros.css") }} rel="stylesheet">-->
   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"rel="stylesheet">
<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
<link href={{ url("css/roboto.min.css") }} rel="stylesheet">
      
<link href={{ url("css/material.min.css") }} rel="stylesheet">
<link href={{ url("css/ripples.min.css") }} rel="stylesheet">
<link href={{ url("css/blog-home.css") }}  rel="stylesheet">



<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <!-- Bootstrap Core CSS -->
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
    

<style>
hr { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    line-style: solid;
    
    border: none;
    height: 2px;
    /* Set the hr color */
    color: #000; /* old IE */
    background-color: #000; /* Modern Browsers */
} 
h1.page-header {
    border-width: 4px;
    size: 3px;
    border-color: #2f9254; 
    color: #16226c;
    line-style: none
}
.well {
  background-color: #16226c; 
    background-color: #009C00;
  border-color: #83c02b;
  color:#ffffff;
}
.navbar-default{
      background-color: #009C00;
      background-color: #2f9254; 
      background-color: #16226c; 
    background-color: #009C00;             
          
      color:#ffffff;
  background-image: kkkkurl("css/bluesky.jpg");
  background-repeat: no-repeat;
}
.panel-default{
      backgroundcolor: #009C00;
      backgroundcolor: #2c5da3;     
      colors:#ffffff;
          padding-top: 0;
    padding-bottom: 0;
}

.panel > .panel-heading {
    background-image: none;
    background-color: #1c70ae;
    background-color: #009C00; 
  

    color: white;

}
.panel > .panel-body {

  
    padding-top: 0;
    padding-bottom: 0;
    color: black;

}

.navbar .nav > li > a {
   
    color:  #fff;
}
h1 {
    font-size: 250%;
    
}

h2 {
    font-size: 200%;
    
}
h3 {
    font-size: 150%;
  }
.blogtitle {
    font-size: 150%;
    background-color: #2f9254;
    background-color: #009C00;
    //background-color: #16226c; 
    //background-color: #2f9254;
    padding-top: 1%;
    padding-bottom: 5;
    padding-left: 10;
    padding-right: 5%;
    
    //border-radius:5px;
    border-top-left-radius:5px; 
border-top-right-radius:5px; 
border-bottom-left-radius:5px; 
border-bottom-right-radius:5px;
}
.titlecolor{
    color: #fff;
    hover: #CC2804;
}
.titlecolor:hover{
        color: #CC2804;
        color: #16226c;
}
.pageheader {
    font-size: 150%;
    background-color: #2f9254;
    background-color: #009C00;
        padding-top: 1%;
    padding-bottom: 5;
        padding-left: 10;
    padding-right: 5%;
    
    //border-radius:5px;
    border-top-left-radius:5px; 
border-top-right-radius:5px; 
border-bottom-left-radius:5px; // i use percentage  u can use pix.
border-bottom-right-radius:5px;
}

p {
    font-size: 100%;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {

    background-color: #16226c; 
    background-color: #2f9254;
    background-color: #009C00;
    border-color: #2f9254;
}
a {
    color: #009C00;
    color: #CC2804;
    color: #16226c;
}
.wps{
    word-spacing: 30px;
}

</style>


<style>
hrhhh { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    border-style: solid;
    border-width: 3px;
} 


.well {
  background-color: #3b4045;
  background-color: #2f9254;
      background-color: #16226c; 
  border-color: #83c02b;
  color:#ffffff;
}
.navbar-default{
      background-color: #009C00;
      background-color: #2f9254; 
      background-color: #16226c; 
          
      color:#ffffff;
  background-image: kkkkurl("css/bluesky.jpg");
  background-repeat: no-repeat;
}

.panel-default{
      backgroundcolor: #009C00;
      backgroundcolor: #2f9254;     
      colors:#ffffff;
}

.panel > .panel-heading {
    background-image: none;
    background-color: #1c70ae;
          background-color: #009C00;

    color: white;

}
.navbar .nav > li > a {
  
    color:  #fff;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {

    background-color: #16226c; 
        background-color: #009C00;
    //background-color: #2f9254;
    border-color: #2f9254;
}
.navbarnnn .navkk > li > a {
    float: none;
    line-height: 19px;
    padding: 9px 10px 11px;
    text-decoration: none;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    color:  #fff;
}

a {
    color: #009C00;
    
    color: #16226c;
    color: #2f9254;
    color: #CC2804;
}
.wps{
    word-spacing: 30px;
}


</style>   
</head>

<script src={{ url("js/ckeditor_std/ckeditor.js") }}></script>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src={{ url("js/ripples.min.js") }}></script>
<script src={{ url("/js/material.min.js") }}></script>

<script>
$(document).ready(function() {
// This command is used to initialize some elements and make them work properly
$.material.init();
});
</script>

<body>
    
   <!-- <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">-->
     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
         @include('shared.navbar')      

         <BR/>
@yield('content')
                </div>   
            </div>
      
        </div>
   
<br>
 <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
@include('shared.footer')
                </div>
            </div>
        </div>

</body>
</html>
