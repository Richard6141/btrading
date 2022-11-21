<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper-main">
        <!-- <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
            </div>
          </div> -->
          
          
        {{-- <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" id="pageLoader" role="status" aria-hidden="true"></span>
            Loading...
        </button> --}}
        @include('layouts.header')
        @include('layouts.message')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>
<script></script>
</html>