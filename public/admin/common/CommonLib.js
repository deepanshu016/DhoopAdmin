const CommonLib = {
    ajaxForm:function(formData='',method,url) {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        return $.ajax({
            type: method,
            url: url,
            data:formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function() {;},
            success: function(d){;}
        });
    },
    notification:{
        success:function(message){
            return cuteToast({
                url:'',
                type: "success",
                title: "Success",
                message: message,
                buttonText: "Okay"
            });
        },
        error:function(message){
            return cuteToast({
                url:'',
                type: "error",
                title: "Failure",
                message: message,
                buttonText: "Okay"
            });
        },
        warning:function(message){
            return cuteToast({
                url:'',
                type: "warning",
                title: "Warning",
                message: message,
                buttonText: "Okay"
            });
        },
    },
    sweetalert:{
        confirm:function(formData,method,url){
            cuteAlert({
                type: "question",
                title: "Are you sure ?",
                message: "Data can't be reverted",
                confirmText: "Okay",
                cancelText: "Cancel"
              }).then((e)=>{
                if ( e == 'confirm'){
                    CommonLib.ajaxForm(formData,method,url).then(d=>{
                        if(d.status === 200){
                            CommonLib.notification.success(d.msg);
                            setTimeout(function(){
                                window.location = d.url;
                            },1000);
                        }
                    }).catch(e=>{
                        CommonLib.notification.error(e.errors);
                    });
                } else {
                  CommonLib.notification.warning("Action Cancelled!!!");
                }
              })
        },
        success:function(){

        },
    },
    baseUrl:()=>{
        var base_url = window.location;
        console.log(base_url);
    },
    truncateString:(str, maxLength)=>{
        if (str.length > maxLength) {
            return str.substring(0, maxLength) + "...";
        }
        return str;
    }
}
