        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan QR Kodunuzu Elde Edebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">QR Kod </a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">

<div class="col-md-12">
<div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">QR Menu</h4>
                                <p class="mb-0 subtitle">QR Menu İçin Erişim QR KODU</p>
                            </div>
                           
                            <div class="card-body">
                                 <div class="row">
<div class="col-md-4">
 
</div>
<div class="col-md-4">
                             <?php
                             $urls = 'https://'.$_SERVER['SERVER_NAME'].'';
                             
function qrCode($s, $w = 350, $h = 350){
    $u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
    $url = sprintf($u, $w, $h, $s);
    return $url;
}
$qrkod = qrCode($urls, 300, 300); // 300x300 piksel
?>
<center>
<img src="<?=$qrkod ?>">
</center>
<button id="indir" class="btn btn-danger btn-block">Kodu İndir</button>                
</div>
         

<div class="col-md-4">

</div>  


<script type="text/javascript">
function download(source){
    const fileName = source.split('/').pop();
    var el = document.createElement("a");
    el.setAttribute("href", source);
    el.setAttribute("download", fileName);
    document.body.appendChild(el);
    el.click();
    el.remove();
}
$( "#indir" ).click(function() {
download("<?=$qrkod ?>");
});
</script>
          </div>  

          </div> 

          </div>       
             
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->