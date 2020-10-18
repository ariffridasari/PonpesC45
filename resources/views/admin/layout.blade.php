<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('admin.inc.head')

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">

    <script>
        NProgress.configure({ showSpinner: false });
    NProgress.start();
    </script>


    <div id="toaster"></div>

    <div class="wrapper">
        <!-- Github Link -->
        {{-- <a href="https://github.com/tafcoder/sleek-dashboard" target="_blank" class="github-link">
            <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
            </svg>
            <i class="mdi mdi-github-circle"></i>
        </a> --}}

        {{-- NAVBAR --}}
        @include('admin.inc.navbar')

        <div class="page-wrapper">

            <!-- Header -->
            @include('admin.inc.header')


            <div class="content-wrapper">
                @include('admin.inc.messages')
                @yield('content')
            </div>

            <!-- Footer -->
            @include('admin.inc.footer')


        </div>
    </div>
{{-- 
    <script src="{{ URL::asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/jekyll-search.min.js') }}"></script>



    <script src="{{ URL::asset('admin/assets/plugins/charts/Chart.min.js') }}"></script>



    <script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>



    <script src="{{ URL::asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
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



    <script src="{{ URL::asset('admin/assets/plugins/toastr/toastr.min.js') }}"></script>



    <script src="{{ URL::asset('admin/assets/js/sleek.bundle.js') }}"></script> --}}
</body>

</html>