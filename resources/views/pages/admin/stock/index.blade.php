@extends('pages.layout.layout')
@section('title','Divyalok App | Stock List')
@section('content')
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="inner-contents">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part">
                    <h2 class="text-dark">Stock</h2>
                </div>
            </div>
            <div class="card border-0 p-5">
                <div class="card-header pb-5 bg-transparent border-0 d-flex align-items-center justify-content-between gap-3">
                    <h4 class="mb-0">Stock Info</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="stockList" class="display">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(function(){
        var dynamicParam = ["title"];
        $('#stockList').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('stock.datatables') }}",
                type: 'GET',
            },
            columns: [
                {
                    data: 'date',
                    name: 'Date',
                    render: function(data, type, row, meta){
                        return moment(data).format('Do MMMM YYYY');
                    }
                },
                {
                    data: 'type',
                    name: 'Type',
                    render:function(data, type, row, meta){
                        return row.type.toUpperCase();
                    }
                },
                {
                    data: 'quantity',
                    name: 'Quantity',
                    render:function(data, type, row, meta){
                        return row.quantity;
                    }
                },
                {
                    data: 'price',
                    name: 'Price',
                    render:function(data, type, row, meta){
                        return row.price;
                    }
                },
                {
                    data: 'id',
                    name: 'Action',
                    render:function(data, type, row, meta){
                        return `<a href="${row.id}/edit" class="btn-video square btn btn-outline-primary rounded-2 px-0 py-0 me-3"><i class="bi bi-pencil"></i></a>
                                <a href="javascript:void(0);" class="btn-video square btn btn-outline-danger rounded-2 px-0 py-0 me-3 delete" data-url="${row.id}/delete" data-id="${row.id}"><i class="bi bi-trash"></i></a>`;
                    }
                }
            ],
            language: {
                search: '<i class="bi bi-search"></i>',
                searchPlaceholder: "Search here",
                paginate: {
                next: '<i class="bi bi-chevron-right"></i>',
                previous: '<i class="bi bi-chevron-left"></i>'
                }
            },
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            rowId:'id'
        });
        $("body").on("click",'.delete',function(e){
            e.preventDefault();
            var formData = new FormData();
            var id = $(this).data("id");
            var url = $(this).data("url");
            formData.append('id',id);
            CommonLib.sweetalert.confirm(formData,'DELETE',url);
        });
    });
</script>
@endsection
