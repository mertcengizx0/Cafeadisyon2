        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Cafenize Masalar Ekleyebilirsiniz ve Masaları Düzenleyebilirsiniz.</h5>
                      
                        </div>
                    </div>
                    <div>
                  
                        <ol class="breadcrumb">
                          <button style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block">Yeni Masa Oluştur</button>
                                                            <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Masa Oluştur</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post" enctype="multipart/form-data">




                                        <div class="modal-body">



                                           <div class="form-group">
                                            <label>Masa Adı</label>
                                            <input type="text" required class="form-control input-rounded" name="masaad" placeholder="Masa Adı Giriniz (ÖRN. Teras-1)">
                                        </div>



                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="masaekle" name="masaekle" type="submit" class="btn btn-primary">Masa Ekle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
 <!-- Modal END -->
                        </ol>
                  
                    
                     
               
                    </div>
                </div>
                <div class="row">




<?php 
 $dsadassd=$db->prepare("SELECT * from cafemasa");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="">
                                        <img class="img-fluid" src="assets/images/masa.png" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?php echo $dbb["masaad"] ?></h4>
                                       <hr>
                                      <div class="row">
                                         
<div class="col-md-6">
            <button data-toggle="modal" data-target="#exampleModalCenter<?php echo $dbb["id"]  ?>" type="button" class="btn btn-success">Masayı Düzenle</button>




<!-- Duzenle --->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["masaad"] ?> Adlı Masayı Düzenliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">

                                       
                                           <div class="form-group">
                                            <label>Masa Adı</label>
                                            <input type="text" required class="form-control input-rounded" name="masaad" placeholder="Masa Adı Giriniz (ÖRN. Teras-1)" value="<?php echo $dbb["masaad"] ?>">
                                        </div>



                                         

                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="masaduzenle" name="masaduzenle" type="submit" class="btn btn-primary">Masayı Düzenle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


<!--- Duzenle bitis --->





</div>
<div class="col-md-6">
            <button data-toggle="modal" data-target="#exampleModalCentersil<?php echo $dbb["id"]  ?>" type="button" class="btn btn-danger">Masayı Sil</button>





<!-- Silme Başlar --->

         <div class="modal fade"  id="exampleModalCentersil<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["masaad"] ?> Adlı Masayı Siliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">
<center>
                                   <img class="img-fluid" style="max-height: 100px;" src="assets/images/dikkat.png">
                                   <p><?php echo $dbb["masaad"] ?> Adlı Masayı Silmek İstediğinize Eminmisiniz. Silinen Veriler Geri Getirelemez.</p>
</center>
                                         </div>
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>

                                        <button id="masasil" name="masasil" type="submit" class="btn btn-danger">Masayı Sil</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>




<!-- Silme Bitiş --->


</div>

                                      </div>
                              

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>







                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->