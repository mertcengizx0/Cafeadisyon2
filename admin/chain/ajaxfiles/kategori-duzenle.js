    $(function() {

$('#kategoriduzenle').click(function(){


    var form = $('#hizmetxm')[0];

    var data = new FormData(form);


$.ajax({  
url:"herego.html",  
method:"POST",  
 processData: false,
 contentType: false,
 cache: false,
 timeout: 600000,
 data: data,
beforeSend:function(){  

},  
success: function( data ) {

    console.log(data);

    var data = $.parseJSON(data);


if( data.status == 'empty' ) {
                toastr.info("Lütfen Boş Bırakmayınız", "Boş İnput Tespit Edildi.", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })


    }


  if( data.status == 'error' ) {
                toastr.warning("Üzgünüm, Bir Şeyler Hatalı Gitti", "SYSTEM ERROR :(", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })


    } if( data.status == 'success' ) {
        $("#adimbir").slideUp();
                 toastr.success("Hizmeti Başarıyla Eklediniz Şimdide Sayfaya Resim Ekleyelim", "2. Adıma Geçiyorsunuz", {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })

 $("#adimiki").slideDown();

   setTimeout(function(){   
        window.location.assign("kategoriler.html");
        //3 saniye sonra yönlenecek
        }, 2000);
    }

}
 }); 









});
});