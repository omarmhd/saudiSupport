<script>
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.closeMethod = 'slideUp';
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;

    @if(session('success'))
    toastr.success('success',"{{session('success')}}")
    @endif

    @if(session('error'))
    toastr.error('success',"{{session('error')}}")
    @endif
</script>
