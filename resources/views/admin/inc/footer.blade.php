<footer class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year">2020</span> Copyright Ponpes Dashboard by
            <a class="text-primary" href="#" target="_blank">Arif Frida</a>.
        </p>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  


    <script src="{{ URL::asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/jekyll-search.min.js')}}"></script>

    <script src="{{ URL::asset('admin/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
    jQuery('input[name="dateRange"]').daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: true,
    locale: {
      cancelLabel: 'Clear'
    }
  });
    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
      jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
      jQuery(this).val('');
    });
  });
    </script>



    <script src="{{ URL::asset('admin/assets/plugins/data-tables/jquery.datatables.min.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/data-tables/datatables.bootstrap4.min.js')}}"></script>



    <script>
        jQuery(document).ready(function() {
    jQuery('#basic-data-table').DataTable({
      "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
      
    });
  });
    </script>



    <script src="{{ URL::asset('admin/assets/js/sleek.bundle.js')}}"></script>
    <script>
        var d = new Date();
    var year = d.getFullYear();
    document.getElementById("copy-year").innerHTML = year;
    </script>

</footer>