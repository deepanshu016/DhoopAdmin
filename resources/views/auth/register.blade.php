@extends('pages.layout.layout')
@section('title','Mess App | Register Page')
@section('content')
<div class="row align-items-center justify-content-center vh-100">
    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
        <div class="card rounded-2 border-0 p-5 m-0">
            <div class="card-header border-0 p-0 text-center">
                <a href="#" class="w-100 d-inline-block mb-5">
                    @if(!empty(setting()) && isset(setting()->getMedia("SITE_LOGO")[0]))
                        <img src="{{ asset('public/media/').'/'.setting()->getMedia("SITE_LOGO")[0]->id.'/'.setting()->getMedia("SITE_LOGO")[0]->file_name }}" width="100" height="100">
                    @endif
                </a>
                <h3>Welcome to Mess App!</h3>
                <p class="fs-14 text-dark my-4">Signup here to create your own dashboard.</p>
            </div>
            <div class="position-relative text-center my-4">
                <p class="mb-0 position-relative z-index-1 d-inline-block bg-white px-3">or Signup with</p>
                <span class="border border-light position-absolute top-50 start-50 translate-middle d-inline-block w-100"></span>
            </div>
            <div class="card-body p-0">
                <form class="form-horizontal" method="post" id="registerForm" action="{{ route('user.signup') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="" placeholder="Name or User Name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" value="" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" value="" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" value="" placeholder="Type Password">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" value="" placeholder="Re-type Password">
                            </div>
                        </div>
                        @if($type == 'mess_owner')
                        <div class="form-group">
                            <label class="form-label">Country</label>
                            <select class="form-control get-state" name="country_id">
                                <option value="">Select Country</option>
                                @if(!empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"  {{ (isset($messOwner) && ($messOwner->country_id  == $country->id)) ? 'selected' : ''}}>{{ $country->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group state-data">
                            @if(!empty($messOwner) &&  !empty($states))
                                <label class="form-label">State</label>
                                <select class="form-control get-city" name="state_id">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ (isset($messOwner) && ($messOwner->state_id  == $state->id)) ? 'selected' : ''}}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group city-data">
                            @if(!empty($messOwner) && !empty($cities))
                                <label class="form-label">City</label>
                                <select class="form-control" name="city_id">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ (isset($messOwner) && ($messOwner->city_id  == $city->id)) ? 'selected' : ''}}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        @endif
                        @if(!empty($data))
                        <input type="hidden" class="form-control" name="signup_type" value="customer" placeholder="Phone">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Choose Mess</label>
                                <select class="form-control" name="mess_id">
                                    <option value="">Select Mess</option>
                                    @foreach($data as $key=>$mess)
                                        <option value="{{ $mess->id }}">{{ $mess->mess_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="checkbox1"  value="1" name="terms_condition" value="">
                            <label class="form-label mb-0" for="checkbox1">I accept the terms and conditions</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow">Sign up</button>

                    <p class="d-flex align-items-center justify-content-center gap-2 mt-4 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-secondary fw-bold text-decoration-underline">Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_scripts')
<script>
    $(function(){
        $("body").on('submit','#registerForm',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#registerForm')[0];
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
    $("body").on("change",".get-state",function(e){
        e.preventDefault();
        const url = "{{ route('get.state.list') }}";
        const id = $(this).val();
        formData = new FormData();
        formData.append('country_id',id);
        CommonLib.ajaxForm(formData,'POST',url).then(d=>{
            if(d.status === 200){
                $(".state-data").html(d.html);
            }else{
                CommonLib.notification.error(d.msg);
            }
        }).catch(e=>{
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
    $("body").on("change",".get-city",function(e){
        e.preventDefault();
        const url = "{{ route('get.city.list') }}";
        const id = $(this).val();
        formData = new FormData();
        formData.append('state_id',id);
        CommonLib.ajaxForm(formData,'POST',url).then(d=>{
            if(d.status === 200){
                $(".city-data").html(d.html);
            }else{
                CommonLib.notification.error(d.msg);
            }
        }).catch(e=>{
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>
@endsection
