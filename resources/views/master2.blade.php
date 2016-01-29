<html>
<head>
<title> @yield('title') </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"rel="stylesheet">
<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
<link href={{ url("css/roboto.min.css") }} rel="stylesheet">
<link href={{ url("css/material.min.css") }} rel="stylesheet">
<link href={{ url("css/ripples.min.css") }} rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href={{ url("css/comsen.css") }} rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<style>
hr { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    border-style: solid;
    border-width: 3px;
} 
.navbar-defaultrr {
  background-color: #38830c;
  border-color: #83c02b;
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
@include('shared.navbar')
<hr>
<br><hr>
<div id="masthead"> mmm</div>
@yield('content')


<div text-align="center">
   
@include('shared.footer')
</div>

</body>
</html>
