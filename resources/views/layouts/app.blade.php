@include('layouts.header')

<!-- MAIN  -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
@include('layouts.scripts')
</body>
</html>
