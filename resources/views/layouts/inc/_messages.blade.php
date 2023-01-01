<script>
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.closeMethod = 'slideUp';
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;

    @if(session('success'))
    toastr.success("{{session('success')}}",'success')
    @endif

    @if(session('error'))
    toastr.error("{{session('error')}}")
    @endif

    @if(session('info'))
    toastr.info("{{session('info')}}")
    @endif
</script>
