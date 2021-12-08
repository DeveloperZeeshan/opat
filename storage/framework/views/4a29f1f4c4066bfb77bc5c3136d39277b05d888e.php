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
<?php /**PATH /home2/devcusto/public_html/laravel/opat/resources/views/includes/common_search_datatable.blade.php ENDPATH**/ ?>