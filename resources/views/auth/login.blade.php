@extends('pages.layout.layout')
@section('title','Dhoop Admin | Login Page')
@section('content')
<div class="row align-items-center justify-content-center vh-100">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
        <div class="card rounded-2 border-0 p-5 m-0">
            <div class="card-header border-0 p-0 text-center">
                <a href="#" class="w-100 d-inline-block mb-5">
                    <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
                </a>
                <h3>Welcome back!</h3>
                <p class="fs-14 text-dark my-4">Please login using your account.</p>
            </div>

            <div class="card-body p-0">
                <form class="form-horizontal" method="post" id="loginForm" action="{{ route('check.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Username or Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Type Password" @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_scripts')
<script>
    $(function(){
        $("body").on('submit','#loginForm',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#loginForm')[0];
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    window.location = d.url;
                }else{
                    CommonLib.notification.error(d.msg);
                }
            }).catch(e=>{
                const error = JSON.parse(e.responseText);
                CommonLib.notification.error(error.errors);
            });
        });
    });
</script>
@endsection
