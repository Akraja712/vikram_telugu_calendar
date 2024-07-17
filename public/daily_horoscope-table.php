
<section class="content-header">
    <h1>Daily Horoscope /<small><a href="home.php"><i class="fa fa-home"></i> Home</a></small></h1>
    <ol class="breadcrumb">
        <a class="btn btn-block btn-default" href="add-daily_horoscope.php"><i class="fa fa-plus-square"></i> Add Daily Horoscope</a>
    </ol>
</section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    
                    <div  class="box-body table-responsive">
                    <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=daily_horoscope" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="false" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    
                                    <th  data-field="id" data-sortable="true">ID</th>
                                    <th data-field="date" data-sortable="true">Date</th>
                                    <th  data-field="rasi" data-sortable="true">Rasi</th>
                                    <th  data-field="description" data-sortable="true">Description</th>
                                    <th  data-field="title" data-sortable="true">Title</th>
                                    <!-- <th  data-field="lucky_number" data-sortable="true">Lucky Number</th>
                                    <th  data-field="lucky_color" data-sortable="true">Lucky Color</th>
                                    <th  data-field="treatment" data-sortable="true">Treatment</th>
                                    <th  data-field="health" data-sortable="true">Health</th>
                                    <th  data-field="wealth" data-sortable="true">Wealth</th>              
                                    <th  data-field="family" data-sortable="true">Family</th>
                                    <th  data-field="things_love" data-sortable="true">Things related to love</th>
                                    <th  data-field="profession" data-sortable="true">Profession</th>
                                    <th  data-field="married_life" data-sortable="true">Married Life</th> -->
                                    <th  data-field="operate" data-events="actionEvents">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="separator"> </div>
        </div>
    </section>
    <style>
    /* Truncate the description to show only a single line */
    .box-body table td:nth-child(4) {
        max-width: 200px; /* Adjust the width to control the truncation */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<script>
    $('#seller_id').on('change', function() {
        $('#products_table').bootstrapTable('refresh');
    });
    $('#community').on('change', function() {
        $('#users_table').bootstrapTable('refresh');
    });

    function queryParams(p) {
        return {
            "category_id": $('#category_id').val(),
            "seller_id": $('#seller_id').val(),
            "community": $('#community').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>