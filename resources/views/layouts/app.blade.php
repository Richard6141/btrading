<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    <div class="wrapper-main">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
@include('layouts.script')
</body>
</html>