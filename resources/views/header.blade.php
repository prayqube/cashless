<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/matrix-media.css') }}" />
<link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-colorpicker.js')}}"></script> 
<!-- <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>  -->
<script src="{{asset('js/jquery.toggle.buttons.js')}}"></script> 
<script src="{{asset('js/masked.js')}}"></script> 
<script src="{{asset('js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/select2.min.js')}}"></script> 
<script src="{{asset('js/matrix.js')}}"></script> 
<script src="{{asset('js/matrix.form_common.js')}}"></script> 
<script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script> 
<script src="{{asset('js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
 // $('.textarea_editor').wysihtml5();
$('#datetimepicker6').datetimepicker({
});
           $('#datetimepicker7').datetimepicker({
               useCurrent: false, //Important! See issue #1075
           });
           $("#datetimepicker6").on("dp.change", function (e) {
               $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
           });
           $("#datetimepicker7").on("dp.change", function (e) {
               $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
           });
  
</script>

<style>
@media screen and (max-width:2880px){
.form1{
padding-top: 20px;
width: 80%;
display: grid;
grid-template-columns: repeat(2, 50%);
grid-auto-flow: row;
grid-gap: 30px;
margin-left: 30px;
}
.area{
display: grid;
grid-template-columns: 30% 70%;
}
.fields{
width: 90%;
align: center;

}
.exception{
width: 93%
}

.button{
width: 200px;

align: center;
display: inline-block;
border: 0px;
}
.a{
color: white;
}
.edit{
float: right;
height: 100%;
width: 80px;
}

.save{
margin-left: 76.3%;
width: 80px;
line-height: 25px;

margin-top:30px;
}

}
@media screen and (max-width:730px){
.form1{
margin-left: 10%;
padding-top: 20px;
display: block;
}
.fields{
display: block;
width: 90%;
}
.exception{
display: block;
width: 94%;
}
.save{
width: 80px;
margin-left: 73%;
}
.edit{
float: right;
height: 100%;
width: 80px;
}
}

@media screen and (max-width:601px){
.form1{
margin-left: 10%;
padding-top: 20px;
display: block;
}
.save{
width: 80px;
margin-left: 72%;
}
.fields{
width: 90%;
align: center;

}
.exception{
width: 97%;
padding-bottom: 10px;
align : center;
}
}
@media screen and (max-width:415px){
.form1{
margin-left: 10%;
padding-top: 20px;
display: block;
}
.save{
width: 80px;
margin-left: 68%;
}
.fields{
width: 90%;
align: center;

}
.exception{
width: 97%;
padding-bottom: 10px;
align : center;
}
}
@media screen and (max-width:385px){
.form1{
margin-left: 10%;
padding-top: 20px;
display: block;
}
.save{
width: 80px;
margin-left: 66%;
}
.fields{
width: 90%;
align: center;

}
.exception{
width: 97%;
padding-bottom: 10px;
align : center;
}
}
@media screen and (max-width:320px){
.form1{
margin-left: 10%;
padding-top: 20px;
display: block;
}
.save{
width: 80px;
margin-left: 64%;
}
.fields{
width: 90%;
align: center;

}
.exception{
width: 97%;
padding-bottom: 10px;
align : center;
}
}



</style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">CashlessIndia Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse" style="float:right">
  <ul class="nav">

   <li class="divider"></li>
<li class="" ><a title="" href="logout" ><i class="icon icon-share-alt"></i> <span class="text" >Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->


<script src="{{asset('js/jquery.min.js')}}"></script> 
<script src="{{asset('js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('js/matrix.js')}}"></script> 
<script src="{{asset('js/matrix.dashboard.js')}}"></script>  
<script src="{{asset('js/jquery.validate.js')}}"></script> 
<script src="{{asset('js/jquery.wizard.js')}}"></script> 
<script src="{{asset('js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/select2.min.js')}}"></script> 
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/matrix.tables.js')}}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>