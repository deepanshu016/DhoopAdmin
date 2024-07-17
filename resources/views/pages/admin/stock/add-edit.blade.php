@extends('pages.layout.layout')
@section('title','Divyalok App | Manage Stock')
@section('content')
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="inner-contents">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part">
                    <h2 class="text-dark">{{ (!isset($stock)) ? 'Add Stock' : 'Update Stock' }}</h2>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-header bg-transparent border-0 p-5 pb-0">
                    <h5 class="mb-0">Stock Management</h5>
                </div>

                <div class="card-body pt-3">
                    <form id="stockForm" method="POST" action="{{ (empty($stock)) ? route('stock.save') : route('stock.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" placeholder="Date" value="{{ @$stock->date}}">
                            <input type="hidden" class="form-control" name="id" placeholder="ID" value="{{ @$stock->id}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <select class="form-control" name="type">
                                <option value="">Select Type</option>
                                <option value="dep" {{ (isset($stock) && ($stock->type  == 'dep')) ? 'selected' : ''}}>Dep</option>
                                <option value="fragrance" {{ (isset($stock) && ($stock->type  == 'fragrance')) ? 'selected' : ''}}>Fragrance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity <small>(in ML)</small> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{ @$stock->quantity}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price <small>(per ML)</small<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" placeholder="Price" value="{{ @$stock->price}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ (isset($stock)) ? 'Update' : 'Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@section('page_scripts')
<script>
    $(function(){
        $("body").on('submit','#stockForm',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#stockForm')[0];
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                }else{
                    CommonLib.notification.error(d.msg);
                }
            }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
            });
        });
    });
</script>
@endsection
@endsection
