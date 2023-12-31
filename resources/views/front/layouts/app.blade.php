<!DOCTYPE html>
<html lang="en" dir="rtl">
@include('front.layouts.head')
<body>
@include('front.layouts.header')
@include('front.layouts.intro')
<main id="main">
@yield('content')
</main>
@include('front.layouts.footer')
@include('front.layouts.scripts')
@yield('script')
</body>
</html>
