<script type="text/javascript">
	 $('#sidebar ul li').click(function () {
   $('#sidebar ul li').not(this).removeClass('active');
   $(this).addClass('active');
});
</script>
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="{{url('vendors')}}"><i class="icon-group"></i> <span>Vendors</span></a></li>
        <li> <a href="{{url('eventcategories')}}"><i class="icon icon-list"></i><span>Event Categories</span></a></li>
    <li> <a href="{{url('event')}}"><i class="icon icon-magic"></i> <span>Events</span></a></li>
        <li> <a href="{{url('eventitem')}}"><i class="icon icon-magic"></i> <span>Event inventory</span></a></li>
        <li><a href="{{url('suppliers')}}"><i class="icon-group"></i> <span>Suppliers</span></a></li>
        <li> <a href="{{url('transaction')}}"><i class="icon icon-list"></i><span>Transaction </span></a></li>
      </ul>

</div>
<!--sidebar-menu-->



