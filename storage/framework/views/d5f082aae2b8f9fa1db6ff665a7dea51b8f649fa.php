<script type="text/javascript">
    $(document).ready(function() {
        var dataTable = $('#myTable').dataTable();
        $("#searchbox").keyup(function() {
            dataTable.fnFilter(this.value);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var dataTable = $('#myTable').dataTable();
        $("#searchboxAgent").keyup(function() {
            dataTable.fnFilter(this.value);
        });
    });
</script>
<?php /**PATH C:\wamp64\www\OPAT_LIVE_FOR_CMS\resources\views/includes/common_search_datatable.blade.php ENDPATH**/ ?>