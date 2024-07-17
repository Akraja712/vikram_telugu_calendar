
<section class="content-header">
    <h1>Monthly Panchangam /<small><a href="home.php"><i class="fa fa-home"></i> Home</a></small></h1>
    <ol class="breadcrumb">
        <a class="btn btn-block btn-default" href="add-month_panchangam.php"><i class="fa fa-plus-square"></i> Add Monthly Panchangam</a>
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
                    <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=month_panchangam" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="false" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "monthly_panchangam-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    
                                    <th  data-field="id" data-sortable="true">ID</th>
                                    <th  data-field="year" data-sortable="true">Year</th>
                                    <th  data-field="month" data-sortable="true">Month</th>
                                    <th data-field="pournami" data-sortable="true">Pournami</th>
                                    <th  data-field="amavasya" data-sortable="true">Amavasya</th>
                                    <th  data-field="akadhashi" data-sortable="true"> Akadhashi</th>
                                    <th  data-field="pradhosha" data-sortable="true"> Pradhosha</th>
                                    <th  data-field="chavithi" data-sortable="true"> Chavithi</th>
                                    <th  data-field="masa_shiva_Rathri" data-sortable="true"> Masa Shiva Rathri</th>
                                    <th  data-field="sankatahara_chathurdhi" data-sortable="true"> Sankatahara Chathurdhi</th>
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