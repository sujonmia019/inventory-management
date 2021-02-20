
<script src="assets/js/handlebars.min.js"></script>
<script>
    (function($){

        $(document).ready(function() {

        /*===============
            Toastr js
        *===============*/
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif

        /*===========
          Tooltip
        ============*/
        $('[data-toggle="tooltip"]').tooltip();




    });

})(jQuery);
</script>

















