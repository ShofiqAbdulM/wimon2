<script>
    $(function() {
        @if (Session('success'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 1500
            })
        @endif
        @if (Session('ubah'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session::get('ubah') }}',
            showConfirmButton: false,
            timer: 1500
            })
        @endif
        @if (Session('status'))
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session::get('status') }}',
            showConfirmButton: false,
            timer: 1500
            })
        @endif
        @if (Session('error'))
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ Session::get('error') }}',
            showConfirmButton: false,
            timer: 1500
            })
        @endif
    });
</script>
