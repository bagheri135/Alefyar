<!DOCTYPE html>
<html lang="en" dir="rtl">

@include('management.layouts.head')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('management.layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('management.layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('management.layouts.header')
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('management.layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('management.layouts.scripts')
    @yield('script')
</body>

</html>
