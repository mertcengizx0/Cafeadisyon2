<?php include "admin/chain/connection/tcon.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords"
        content="">
    <meta name="author" content="WEBİMOL" />

    <!-- SITE TITLE -->
    <title>QR MENU</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Bootstrap DateRange Picker CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-date-range.css" />

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>

    <!-- Start header section -->
   
    <!-- End header section -->

    <main>

        <!-- End Shop Version Three Breadcrumb section -->

        <!-- Start Shop Version Four section -->
        <div class="shop-version-four-section">
            <div class="container">
             

                <!-- All Product in Shop Page Three -->
                <div class="shop-version-four-product-wrapper">
                    <center><h3>QR Menu</h3></center>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <aside>
                                <div class="shop-sidebar">
                                    <!-- Product Category -->
                                    <div class="product-category mt-50">
                                        <h4>Kategoriler</h4>
                                        <div class="product-category-list">
                                            <button id="0" style="background-color: #f72b50 !important;" type="button" class="btn btn-primary btn-block filtre">Tümünü Göster</button>

<?php 
 $dsadassd=$db->prepare("SELECT * from kategori");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <button id="<?php echo $dbb["id"] ?>" style="background-color: #f72b50 !important;" type="button" class="btn btn-primary btn-block filtre"><?php echo $dbb["kategoriad"] ?></button>
                                        <?php } ?>
                                           
                                        
                                        </div>
                                    </div>
                                    <!-- Recent Product -->
                               
                                    <!-- Product Tag -->
        
                                   
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="shop-version-four-product-items">
                                <div class="tab-content">
                                    <!-- Shop Grid item -->
                                    <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                        aria-labelledby="grid-tab">
                                        <div class="shop-version-four-product-grid-section">
                                            <div class="row urunayikla">





<?php 
 $dsadassd=$db->prepare("SELECT * from urunler");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>

                                                <div class="col-md-6 col-12">
                                                    <div class="shop-version-four-product-grid-item">
                                                        <div class="shop-version-four-product-card-wrapper">
                                                            <div class="card">
                                                                <a ><img class="card-img-top"
                                                                        src="<?php echo substr($dbb["resim"],6) ?>"
                                                                        alt="Product Images"></a>
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $dbb["ad"] ?></h5>
                                                                    <p class="card-text"></p>
                                                                    <div class="product-rating-price">
                                                                        <div class="product-rating">
                                                                       
                                                                        </div>
                                                                        <div class="product-price">
                                                                            <span style="color: black;"><?php echo $dbb["tutar"] ?> TL</span>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  } ?>


                                   



                                    </div>
                                    <!-- Shop List item -->
                                </div>
                            </div>
                            <!-- Shop Pagination -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Version Four section -->

    </main>

    <!-- Start Footer section -->
    
    <!-- End Footer section -->

    <!--  jquery-3.5.1 -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Isotope js -->
    <script src="assets/js/isotope.pkgd.min.js"></script>

    <!-- Select2 js -->
    <script src="assets/js/select2.min.js"></script>

    <!-- Moment JS -->
    <script src="assets/js/moment.min.js"></script>

    <!-- Bootstrap DateRange Picker js -->
    <script src="assets/js/bootstrap-date-range.min.js"></script>

    <!-- countup js -->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.countup.min.js"></script>

    <!--  Owl Carousel JS  -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!--  Jquery ScrollUp JS  -->
    <script src="assets/js/jquery.scrollUp.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>


<script type="text/javascript">
               
$('.filtre').click(function(){


$("#acmenu").slideUp(500);
var processor= "checkurun";

var katid=$(this).attr("id");
      $.ajax({
         type:"post",
         url:"herego.html",
         data:{'processor':processor,'katid':katid},
         success: function (msg) {
            $(".urunayikla").html(msg);
       }
      })


});   

</script>
                 

</body>

</html>