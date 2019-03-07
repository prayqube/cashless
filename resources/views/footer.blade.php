<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; Rayqube. <a href="http://www.rayqube.com">RayQube</a> </div>
</div>

<!--end-Footer-part-->

<script src="{{ URL::asset('js/excanvas.min.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.min.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.ui.custom.js') }}"></script> 
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.flot.min.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script> 
<script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.dashboard.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.gritter.min.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.interface.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.chat.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.validate.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.form_validation.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.wizard.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.uniform.js') }}"></script> 
<script src="{{ URL::asset('js/select2.min.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.popover.js') }}"></script> 
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ URL::asset('js/matrix.tables.js') }}"></script> 
<script src="{{asset('js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-colorpicker.js')}}"></script> 
<!-- <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>  -->
 
<script src="{{asset('js/masked.js')}}"></script> 
<script src="{{asset('js/matrix.js')}}"></script> 
<script src="{{asset('js/matrix.form_common.js')}}"></script> 
<script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script> 
<script src="{{asset('js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
<script>
    $("#image").on("change", function() {
         if($("#image")[0].files.length > 5) {
                   alert("You can select only 5 files");
                   return false;
         }
         if($("#image")[0].files.length <= 0) {
                   alert("Please select at least 1 file.");
                   return false;
         }
    });
    function upload_attachment($count){
        if($count == 5) {
                   alert("Please remove unnecessary files.");
                   return false;
         }

        if($(".image")[0].files.length > 5-$count) {
          var c=5-$count;
                   alert("You can select only "+c +" files");
                   return false;
         }
         if($(".image")[0].files.length <= 0) {
                   alert("Please select at least 1 file.");
                   return false;
         }
    }
    
</script>

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
