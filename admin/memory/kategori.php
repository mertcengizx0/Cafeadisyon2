        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h5>Bu Sayfadan Ürünlerinize Kategori Oluştarabilirsiniz. (ÖRN. Yiyecek, İçecek, Meşrubat)</h5>
                      
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                          <button style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block">Yeni Ürün Kategorisi Oluştur</button>
                                  
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ürün Kategorisi Oluştur</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">

                                        <div class="modal-body">
                                           <div class="form-group">
                                            <label>Kategori Adı</label>
                                            <input type="text" class="form-control input-rounded" name="kategoriad" placeholder="Kategori Adı Giriniz (ÖRN. Yiyecek, İçecek)">
                                        </div>

                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="kategoriekle" name="kategoriekle" type="submit" class="btn btn-primary">Kategoriyi Ekle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
 <!-- Modal END -->


                        </ol>
                    </div>
                </div>
              
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ürün Kategorileri</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                          
                                                <th><strong>Kategori Adı</strong></th>
                                            
                                                <th><strong>İşlemler</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php $dsadassd=$db->prepare("SELECT * from kategori ");
$dsadassd->execute();
while($dbb=$dsadassd->fetch(PDO::FETCH_ASSOC)) {  ?>
                                            <tr>
                                                <td>
                                                  <?php echo $dbb["kategoriad"]  ?>
                                                </td>
                                               
                                                <td>
                                                    <div class="d-flex">
                                                        <button data-toggle="modal" data-target="#exampleModalCenter<?php echo $dbb["id"]  ?>" type="button" class="btn btn-primary shadow sharp mr-1" ><i class="fa fa-pencil"></i></button>


<!-- Duzenle --->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["kategoriad"] ?> Adlı Kategoriyi Düzenliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label>Kategori Adı</label>
                                            <input type="text" class="form-control input-rounded" name="kategoriad" placeholder="Kategori Adı Giriniz (ÖRN. Yiyecek, İçecek)" value="<?php echo $dbb["kategoriad"]  ?>">
                                        </div>

                                         </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>
                                        <button id="kategoriduzenle" name="kategoriduzenle" type="submit" class="btn btn-primary">Kategoriyi Düzenle</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>


<!--- Duzenle bitis --->



                <button  data-toggle="modal" data-target="#exampleModalCentersil<?php echo $dbb["id"]  ?>" type="button" class="btn btn-danger shadow  sharp"><i class="fa fa-trash"></i></button>


<!-- Silme Başlar --->

         <div class="modal fade" id="exampleModalCentersil<?php echo $dbb["id"]  ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo $dbb["kategoriad"] ?> Adlı Kategoriyi Siliyorsunuz</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>

                                       <form action="herego.html" method="post">
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-body">
<center>
                                   <img class="img-fluid" style="max-height: 100px;" src="assets/images/dikkat.png">
                                   <p><?php echo $dbb["kategoriad"] ?> Adlı Kategoriyi Silmek İstediğinize Eminmisiniz. Eğer Bu Kategoriyi Silerseniz Bu kategorinin altında ki ürünlerde silinir. Örneğin(İçecek Kategorisine Çay Eklediyseniz. Çay Ürünlerinizden Silinir.)</p>
</center>
                                         </div>
<input type="hidden" name="id" value="<?php echo $dbb["id"]  ?>">
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Kapat</button>

                                        <button id="kategorisil" name="kategorisil" type="submit" class="btn btn-danger">Kategoriyi Sil</button>
                                        </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>




<!-- Silme Bitiş --->


                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>


                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->