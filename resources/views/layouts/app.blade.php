<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    <div class="wrapper-main">
        <!-- <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
            </div>
          </div> -->
          
          
        @include('layouts.header')
        @include('layouts.message')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>