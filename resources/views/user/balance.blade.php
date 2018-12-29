@extends('layouts.app')

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.user_balance').addClass('active');

        $('#user_balance_datatable').DataTable({
            // processing: true,
            // serverSide: true,
            ajax: '{!! route("user.balance.datatable") !!}',
            columns: [
                { data: 'credit', name: 'credit' },
                { data: 'debit', name: 'debit' },
            ]
        });

        // $('#datatables_wrapper .table-caption').html(html);
        $('#user_balance_datatable_wrapper .dataTables_filter input').attr('placeholder', 'Type to filter...');
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });
    });
</script>
@endpush

@section('content')
<!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users</span> - Balance</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">My Balance</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Basic datatable -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">My Balance</h5>
                    </div>

                    <!-- <div class="panel-body">
                        The <code>DataTables</code> is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function. Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. <strong>Datatables support all available table styling.</strong>
                    </div> -->

                    <table class="table" id="user_balance_datatable">
                        <thead>
                            <tr>
                                <th>Credit</th>
                                <th>Debit</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /basic datatable -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->


    
@endsection
