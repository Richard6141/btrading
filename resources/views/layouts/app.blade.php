<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper-main">
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