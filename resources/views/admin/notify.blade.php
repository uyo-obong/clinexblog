 <!--   Core JS Files   -->
 <script src="admins/js/jquery.min.js" type="text/javascript"></script>
 <script src="admins/js/bootstrap.min.js" type="text/javascript"></script>

 <!--  Checkbox, Radio & Switch Plugins -->
 <script src="admins/js/bootstrap-checkbox-radio.js"></script>

 <!--  Charts Plugin -->
 <script src="admins/js/chartist.min.js"></script>

 <!--  Notifications Plugin    -->
 <script src="admins/js/bootstrap-notify.js"></script>

 <!--  Google Maps Plugin    -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

 <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
 {{-- <script src="admins/js/paper-dashboard.js"></script> --}}

 <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
 <script src="admins/js/demo.js"></script>

 @if(session()->has('success'))
 
 <script type="text/javascript">
   $(document).ready(function(){

    demo.initChartist();

    $.notify({
        icon: "ti-gift",
        message: "<b>Post</b> -Updated Successfully."

    },{
        type: "success",
        timer: 4000
    });

});
</script>


@elseif(session()->has('delete'))

<script type="text/javascript">
   $(document).ready(function(){

    demo.initChartist();

    $.notify({
        icon: "ti-gift",
        message: "<b>Post</b> -Deleted Successfully."

    },{
        type: "danger",
        timer: 4000
    });

});
</script>

@elseif(session()->has('created'))

<script type="text/javascript">
   $(document).ready(function(){

    demo.initChartist();

    $.notify({
        icon: "ti-gift",
        message: "<b>Post</b> -Created Successfully."

    },{
        type: "success",
        timer: 4000
    });

});
</script>

@else
<script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Welcome to <b>Clinex Admin</b> - Thanks for being part of us."

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>       
@endif