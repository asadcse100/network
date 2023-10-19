@section('footer') <!-- End Page-content -->
<div class="footer">
     <p class="mb-0">{{ config('app.name') }} © {{date('Y')}} || Developed By : <a href="{{Route('home')}}" target="_blank">{{ config('app.name') }}</a>
     </p>
 </div>
@include('admin.admin_layouts.inc.js')
<script>
    $(document).ready(function() {
        //Default data table
        $('#example').DataTable({
            ordering: false
        });
        var table = $('#example2').DataTable({
            lengthChange: false,
            ordering: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $('.js-example-basic-multiple').select2();

    });
</script>
