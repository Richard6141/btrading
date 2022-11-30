<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/filter.js')}}"></script>
<script src="{{asset('js/jquery.appear.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>
//   $("#button").on('click', function(e){
//     e.preventDefault()
//     console.log(e);
//         $('#loader').show();
//         $('#button').hide();
// })
</script>

<!-- <script>
    @if (session()->has('success'))
        swal({
            title: '{{ session('success') }}',
            icon: 'success'
        })
    @endif

    @if (session()->has('error'))
        swal({
            title: '{{ session('error') }}',
            icon: 'error'
        })
    @endif

    @if (session()->has('warning'))
        swal({
            title: '{{ session('warning') }}',
            icon: 'warning'
        })
    @endif
</script> -->
