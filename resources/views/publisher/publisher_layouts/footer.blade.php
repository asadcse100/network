@php
$site_setting = App\Models\SiteSetting::find(1);
@endphp

<div class="footer">
    <p class="mb-0">@if(!empty($site_setting->site_name)){{ $site_setting->site_name }}@endif © {{date('Y')}}
    </p>
</div>

@include('publisher.publisher_layouts.inc.js')

<script>
    $(document).ready(function() {
        //Default data table
        $('#example').DataTable({
            ordering: false
        });
        var table = $('#example2').DataTable({

            ordering: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $('.js-example-basic-multiple').select2();

    });
</script>