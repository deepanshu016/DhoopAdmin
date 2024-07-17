@extends('pages.layout.layout')
@section('title','Mess App | Profile')
@section('content')
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="inner-contents">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part">
                    <h2 class="text-dark">Profile</h2>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-classic-icon" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#profile" data-bs-toggle="tab" role="tab"><i class="bi bi-person-check"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#changePassword" data-bs-toggle="tab" role="tab"><i class="bi bi-lock"></i> Change Password</a>
                        </li>
                        @can('mess_owner')
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-12" data-bs-toggle="tab" role="tab"><i class="bi bi-gear-fill"></i> Settings</a>
                            </li>
                        @endcan
                    </ul>
                    <div class="tab-content nav-classic-icon">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <form id="profileFrom" method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{ @$user->id}}">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name"  value="{{ @$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ @$user->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ @$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="changePassword" role="tabpanel">
                            <form id="changePasswordFrom" method="POST" action="{{ route('change.password') }}">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{ @$user->id}}">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password </label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        @can('mess_owner')
                        <div class="tab-pane fade" id="tab-12" role="tabpanel">
                            <form id="paymentFrom" method="POST" action="{{ route('save.payment.details') }}">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{ @$user->id}}">
                                <div class="form-group">
                                    <label class="form-label">Mess Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mess_name" placeholder="Mess Name" value="{{ @$messOwner->mess_name}}">
                                    <input type="hidden" class="form-control" name="mess_owner_id" value="{{ @$messOwner->id}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="mess_logo" accept="images/*">
                                    @if(!empty($messOwner) && isset($messOwner->getMedia("MESS_LOGO_IMAGE")[0]))
                                        <img src="{{ asset('public/media/').'/'.$messOwner->getMedia("MESS_LOGO_IMAGE")[0]->id.'/'.$messOwner->getMedia("MESS_LOGO_IMAGE")[0]->file_name }}" width="100" height="100">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mess Banner</label>
                                    <input type="file" class="form-control" name="mess_banner" accept="images/*">
                                    @if(!empty($messOwner) && isset($messOwner->getMedia("MESS_BANNER")[0]))
                                        <img src="{{ asset('public/media/').'/'.$messOwner->getMedia("MESS_BANNER")[0]->id.'/'.$messOwner->getMedia("MESS_BANNER")[0]->file_name }}" width="100" height="100">
                                    @endif
                                </div>
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

                                <div class="form-group">
                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address"  placeholder="Address" maxlength="500">{{ @$messOwner->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="{{ @$messOwner->pincode}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Map Link</label>
                                    <input type="text" class="form-control" name="address_link" placeholder="Map Link" value="{{ @$messOwner->address_link}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">About Mess <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="mess_description" id="about_mess"  placeholder="About Mess" maxlength="500">{{ @$messOwner->mess_description}}</textarea>
                                </div>
                                <p>Food type <span class="text-danger">*</span></p>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input bg-primary border-0 choose_food_type" id="radio10" name="food_type" value="veg" {{ (isset($messOwner) && $messOwner->food_type == 'veg') ? 'checked' : '' }}>
                                    <label class="form-label mb-0" for="radio10">Veg</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input bg-secondary border-0 choose_food_type" id="radio11" name="food_type" value="non_veg" {{ (isset($messOwner) && $messOwner->food_type == 'non_veg') ? 'checked' : '' }}>
                                    <label class="form-label mb-0" for="radio11">Non Veg</label><br>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input bg-warning border-0 choose_food_type" id="radio11" name="food_type" value="both" {{ (isset($messOwner) && $messOwner->food_type == 'both') ? 'checked' : '' }}>
                                    <label class="form-label mb-0" for="radio11">Both</label><br>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Cuisines</label>
                                    <select class="form-control kleon-select-simple" name="cuisine_id[]"  multiple="multiple">
                                        @php
                                            $cuisines = get_all_cuisines();
                                        @endphp
                                        @if(!empty($cuisines))
                                            @foreach ($cuisines as $cuisine)
                                                <option value="{{ $cuisine->id }}" {{ (!empty($messOwner) && in_array($cuisine->id,$messOwner->mess_cuisines)) ? 'selected' : ''}}>{{ $cuisine->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                @if(!empty($messOwner) && ($messOwner->food_type == 'veg' || $messOwner->food_type == 'both'))
                                    <div class="veg_price">
                                        <p>Veg Price <span class="text-danger">*</span></p>
                                        <div class="form-group">
                                            <label class="form-label">Breakfast Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_breakfast_price" placeholder="Breakfast Price" value="{{ @$messOwner->veg_breakfast_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lunch Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_lunch_price" placeholder="Lunch Price" value="{{ @$messOwner->veg_lunch_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dinner Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_dinner_price" placeholder="Dinner Price" value="{{ @$messOwner->veg_dinner_price}}">
                                        </div>
                                    </div>
                                @else
                                    <div class="veg_price">
                                        <p>Veg Price <span class="text-danger">*</span></p>
                                        <div class="form-group">
                                            <label class="form-label">Breakfast Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_breakfast_price" placeholder="Breakfast Price">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lunch Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_lunch_price" placeholder="Lunch Price">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dinner Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="veg_dinner_price" placeholder="Dinner Price">
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($messOwner) && ($messOwner->food_type == 'non_veg' || $messOwner->food_type == 'both'))
                                    <div class="non_veg_price">
                                        <p>Non Veg Price <span class="text-danger">*</span></p>
                                        <div class="form-group">
                                            <label class="form-label">Breakfast Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_breakfast_price" placeholder="Breakfast Price" value="{{ @$messOwner->non_veg_breakfast_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lunch Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_lunch_price" placeholder="Lunch Price" value="{{ @$messOwner->non_veg_lunch_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dinner Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_dinner_price" placeholder="Dinner Price" value="{{ @$messOwner->non_veg_dinner_price}}">
                                        </div>
                                    </div>
                                @else
                                    <div class="non_veg_price d-none">
                                        <p>Non Veg Price <span class="text-danger">*</span></p>
                                        <div class="form-group">
                                            <label class="form-label">Breakfast Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_breakfast_price" placeholder="Breakfast Price">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lunch Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_lunch_price" placeholder="Lunch Price">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dinner Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="non_veg_dinner_price" placeholder="Dinner Price">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="form-label">Account/UPI Details</label>
                                    <textarea class="form-control" name="account_details"  placeholder="Account/UPI Details" id="account_details">{{ @$messOwner->account_details}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">QR Code </label>
                                    <input type="file" class="form-control" name="qr_code">
                                    @if(!empty($messOwner) && isset($messOwner->getMedia("MESS_QR_CODE")[0]))
                                        <img src="{{ asset('public/media/').'/'.$messOwner->getMedia("MESS_QR_CODE")[0]->id.'/'.$messOwner->getMedia("MESS_QR_CODE")[0]->file_name }}" width="100" height="100">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('page_scripts')

<script>
    $(function(){
        const types = ['account_details'];
        function createEditor(elementId) {
            ClassicEditor.create(document.querySelector(elementId)).then(editor => {
                    console.log(editor);
            }).catch(error => {
                    console.error(error);
            });
        }
        types.forEach(type => {
            createEditor(`#${type}`);
        });
        $("body").on('submit','#profileFrom',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#profileFrom')[0];
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                }else{
                    CommonLib.notification.error(d.errors);
                }
            }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
            });
        });
        $("body").on('submit','#changePasswordFrom',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#changePasswordFrom')[0];
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                }else{
                    CommonLib.notification.error(d.errors);
                }
            }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
            });
        });
        $("body").on('submit','#paymentFrom',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#paymentFrom')[0];
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                }else{
                    CommonLib.notification.error(d.errors);
                }
            }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
            });
        });
        $("body").on("click",'.choose_food_type',function(e){
            var currentWrapper = $(this);
            const food_type = currentWrapper.val();
            $(".veg_price, .non_veg_price").addClass('d-none');
            switch (food_type) {
                case 'veg':
                    $(".veg_price").removeClass('d-none');
                    break;
                case 'non_veg':
                    $(".non_veg_price").removeClass('d-none');
                    break;
                case 'both':
                    $(".veg_price, .non_veg_price").removeClass('d-none');
                    break;
                default:
                    break;
            }
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
    });
</script>
@endsection
