<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="{{asset('cdn')}}/js/jquery.min.js"></script> -->

<!--plugins-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="{{asset('cdn')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('cdn')}}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('cdn')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--Apex chart-->
<!-- <script src="{{asset('cdn')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> -->
<script src="{{asset('cdn')}}/js/index.js"></script>
<!-- App JS -->
<script src="{{asset('cdn')}}/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('cdn')}}/js/popper.min.js"></script>
<script src="{{asset('cdn')}}/js/bootstrap.min.js"></script>
<!-- <script src="{{asset('cdn')}}/js/pace.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
<script src="{{asset('cdn')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('cdn')}}/site/dashboard_assets/plugins/select2/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: false,
            ordering: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $('.js-example-basic-multiple').select2();

    });
</script>