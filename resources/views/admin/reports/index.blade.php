@extends('admin.master')

@section('title')
Reports
@endsection

@section('content')
<div class="container ">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">Reports</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">Advertisements</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_2" role="tabpanel">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>From:</label>
                            <input type="date" class="form-control" name="trans_from" id="trans_from">
                        </div>
                        <div class="col-lg-4">
                            <label>To:</label>
                            <input type="date" class="form-control" name="trans_to" id="trans_to">
                        </div>
                        <div class="col-lg-2" style="margin-top: 26px;">
                            <button type="submit" id="trans_submit" class="btn btn-block btn-color mr-2">Submit</button>
                        </div>
                    </div>
                    <div class="table-responsive bg-white p-5">
                        <table id="customDataTable" class="table table-hover">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Time</th> --}}
                            </tr>
                          </thead>
                          <tbody id="transaction_table"></tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>From:</label>
                            <input type="date" class="form-control" name="ads_from" id="ads_from">
                        </div>
                        <div class="col-lg-4">
                            <label>To:</label>
                            <input type="date" class="form-control" name="ads_to" id="ads_to">
                        </div>
                        <div class="col-lg-2" style="margin-top: 26px;">
                            <button type="submit" id="ads_submit" class="btn btn-block btn-color mr-2">Submit</button>
                        </div>
                    </div>
                    <div class="table-responsive bg-white p-5">
                        <table id="customDataTable" class="table table-hover">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                {{-- <th scope="col">Is Verified</th> --}}
                            </tr>
                          </thead>
                          <tbody id="ads_table"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $('#ads_submit').on('click', function() {
        $.ajax({
            url: "{{route('advertisement.report')}}",
            type: "POST",
            data: {
                '_token': '{{csrf_token()}}',
                'ads_from': $('#ads_from').val(),
                'ads_to': $('#ads_to').val(),
                
            },
            success:function(data) {
                var ads = '';
                $.each(data.data, function(index, val) {
                    $("#ads_table").empty();
                    // adHref = "{{route('admin.advertisement.show', base64_encode("+val.id+"))}}";
                    // adHref = adHref.replace('advertiseId', val.id);
                    ads += '<tr>';
                    ads += '<td>'+(index+1)+'</td>';
                    ads += "<td>"+val.title+"</td>";
                    // ads += '<td>'+val.is_verified+'</td>';
                    ads += '</tr>';
                });
                $("#ads_table").append(ads);
            },
            error:function() {
                // 
            }
        });
    });
    $('#trans_submit').on('click', function() {
        $.ajax({
            url: "{{route('transaction.report')}}",
            type: "POST",
            data: {
                '_token': '{{csrf_token()}}',
                'trans_from': $('#trans_from').val(),
                'trans_to': $('#trans_to').val(),
                
            },
            success:function(data) {
                $("#transaction_table").empty();
                var trans = '';
                $.each(data.data, function(index, val) {
                    trans += '<tr>';
                    trans += '<td>'+(index+1)+'</td>';
                    trans += '<td>'+val.transaction_id+'</td>';
                    trans += '<td>'+val.amount+'</td>';
                    // trans += '<td>'+val.created_at+'</td>';
                    trans += '</tr>';
                });
                $("#transaction_table").append(trans);
            },
            error:function() {
                // 
            }
        })
    })
</script>

@endsection