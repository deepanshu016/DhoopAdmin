@extends('pages.layout.layout')
@section('title','Mess App | Settings')
@section('content')
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="inner-contents">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part">
                    <h2 class="text-dark">Site Settings</h2>
                    <p class="text-gray mb-0">Website Controls are here !</p>
                </div>
                <div class="right-part">
                    <form class="search-form w-auto" action="https://wpthemebooster.com/demo/themeforest/html/kleon/search.php">
                        <input type="text" name="search" class=" bg-white form-control" placeholder="Search">
                        <button type="submit" class="btn"><img src="{{ asset('/') }}frontend/assets/img/svg/search.svg" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="card border-0">
                <div class="card-header bg-transparent border-0 p-5 pb-0">
                    <h5 class="mb-0">Site Settings</h5>
                </div>

                <div class="card-body pt-3">
                    <form class="all-form" id="settingsForm" method="POST" action="{{ route('update.settings') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ @$setting->title}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" name="site_logo">
                            @if(!empty($setting) && isset($setting->getMedia("SITE_LOGO")[0]))
                                <img src="{{ asset('public/media/').'/'.$setting->getMedia("SITE_LOGO")[0]->id.'/'.$setting->getMedia("SITE_LOGO")[0]->file_name }}" width="100" height="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Favicon</label>
                            <input type="file" class="form-control" name="site_favicon">
                            @if(!empty($setting) && isset($setting->getMedia("SITE_FAVICON")[0]))
                                <img src="{{ asset('public/media/').'/'.$setting->getMedia("SITE_FAVICON")[0]->id.'/'.$setting->getMedia("SITE_FAVICON")[0]->file_name }}" width="100" height="100">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Banner</label>
                            <input type="file" class="form-control" name="site_banner">
                            @if(!empty($setting) && isset($setting->getMedia("SITE_BANNER")[0]))
                                <img src="{{ asset('public/media/').'/'.$setting->getMedia("SITE_BANNER")[0]->id.'/'.$setting->getMedia("SITE_BANNER")[0]->file_name }}" width="100" height="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"  placeholder="Description" maxlength="500" id="settings_description">{{ @$setting->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{ @$setting->meta_title}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description"  placeholder="Meta Description" id="settings_meta_description" maxlength="500">{{ @$setting->meta_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_no" placeholder="Mobile Number"  value="{{ @$setting->mobile_no}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ @$setting->email}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address"  placeholder="Address" maxlength="500">{{ @$setting->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">GST Number</label>
                            <input type="text" class="form-control" name="gst" placeholder="GST Number" value="{{ @$setting->gst}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Facebook Link</label>
                            <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link" value="{{ @$setting->facebook_link}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Instagram Link</label>
                            <input type="text" class="form-control" name="instagram_link" placeholder="Instagram Link" value="{{ @$setting->instagram_link}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Twitter Link</label>
                            <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link" value="{{ @$setting->twitter_link}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Referral Fees</label>
                            <input type="text" class="form-control" name="referral_fees" placeholder="Referral Fees" value="{{ @$setting->referral_fees}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Google Link</label>
                            <input type="text" class="form-control" name="google_link" placeholder="Google Link" value="{{ @$setting->google_link}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">About Us</label>
                            <textarea class="form-control" name="about_us"  placeholder="About Us" id="settings_about_us">{{ @$setting->about_us}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Terms Conditions</label>
                            <textarea class="form-control" name="terms_condition"  placeholder="Terms Conditions" id="settings_terms">{{ @$setting->terms_condition}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Privacy Policy</label>
                            <textarea class="form-control" name="privacy_policy"  placeholder="Privacy Policy   " id="settings_privacy">{{ @$setting->privacy_policy}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Return Refund</label>
                            <textarea class="form-control" name="return_refund"  placeholder="Return Refund" id="settings_refund">{{ @$setting->return_refund}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Analytics Code</label>
                            <textarea class="form-control" name="analytics_code"  placeholder="Analytics Code" id="settings_analytics">{{ @$setting->analytics_code}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
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

        $("body").on('submit','#settingsForm',function(e){
            e.preventDefault();
            const url = $(this).attr('action');
            const method = $(this).attr('method');
            var formData = $('#settingsForm')[0]; // You need to use standard javascript object here
            formData = new FormData(formData);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                if(d.status === 200){
                    CommonLib.notification.success(d.msg);
                    window.location = d.url;
                }
            }).catch(e=>{
                CommonLib.notification.error(e.errors);
            });
        });
        const types = ['description', 'meta_description', 'about_us', 'terms', 'privacy', 'refund','analytics'];
        function createEditor(elementId) {
            ClassicEditor.create(document.querySelector(elementId)).then(editor => {
                    console.log(editor);
            }).catch(error => {
                    console.error(error);
            });
        }
        types.forEach(day => {
            createEditor(`#settings_${day}`);
        });
    });
</script>
@endsection
@endsection
