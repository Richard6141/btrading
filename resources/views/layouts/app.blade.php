<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper-main">
        {{-- <button class="btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm" id="pageLoader" role="status" aria-hidden="true"></span>
            Loading...
        </button> --}}
        @if(Session::has('success'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        {{-- @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif --}}
        @include('layouts.header')
        @include('layouts.message')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>
<script></script>

</html>