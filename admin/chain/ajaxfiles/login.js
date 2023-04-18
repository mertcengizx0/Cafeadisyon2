    $(function() {

$('#giris').click(function(){

if ($("#posta").val()=="" || $("#logpas").val()=="") {
                      toastr.error("Lütfen E-Posta ve Şifre Alanınız Boş Bırakmayınız!", "İşleme Devam Edilemiyor", {
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


} else {

$("#hatalisifre").hide();
$("#recapalert").hide();
$("#girisyap").hide();
$("#logtwo").hide();
$("#logtwox").show();
$("#girisyapiliyor").show();
  var logmail = $("#posta").val();
  var logpass = $("#logpas").val();
$.ajax({
type:"post",
url:"herego.html",
data: {logmail: logmail,
       logpass: logpass
},
success: function( data ) {

    console.log(data);

    var data = $.parseJSON(data);

    if( data.status == 'error' ) {
                toastr.error("Hatalı Şifre veya E-Posta Girdiniz, Lütfen Tekrar Deneyiniz", "Hatalı Giriş", {
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
$("#girisyapiliyor").hide();
$("#girisyap").show();
$("#logtwox").hide();
$("#logtwo").show();
$("#hatalisifre").show();
grecaptcha.reset();

    } else if( data.status == 'success' ) {
                 toastr.success("Başarıyla Giriş Yapıldı :)", "Giriş Başarılı", {
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
$("#girisyapiliyor").hide();
$("#girisyapildi").show();
  window.location.reload()



    } else if( data.status == 'robot' ) {
                      toastr.error("Lütfen Robot Olmadığınızı Doğrulayınız!", "Re-Capcha Güvenlik Bildirimi", {
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
      $("#girisyapiliyor").hide();
$("#girisyap").show();
$("#logtwox").hide();
$("#logtwo").show();
grecaptcha.reset();
$("#recapalert").show();
    }
}
  });

}

});





});
