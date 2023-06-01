<?php
  include('config/config.php');
  include('config/dbConnection.php');
  include('getcustomers_controleur.php');

  include('header.php');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-home"></i> Accueuil</a></li>
                    <li><a href="list_customers.php">Liste assurés</a></li>
                    <li class="active">Voir assuré</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <section class="panel">
                  <header class="panel-heading">
                      Voir assuré
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                      <div class="col-lg-12">
                      <?php
                        if( !empty($result2['customer_photo']) && file_exists('uploads/customer_photo/'.$result2['customer_photo']) ) {
                            $customer_photo = 'uploads/customer_photo/'.$result2['customer_photo'];
                        } else {
                            $customer_photo = 'img/photo.jpg';
                        }
                      ?>
                        <img alt="Customer Photo" width="140px" height="140px" src="<?php echo $customer_photo; ?>">
                      </div>
                      </div>
                            <!--------------------------------bulletin---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Idenifiant bulletin: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['idbulletin']; ?></p>
                        </div>
                      </div>
                    
                      <!------------------------------matricule-Assuré---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Matricule assuré: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['id']; ?></p>
                        </div>
                      </div>
                       <!------------------------------lien-Assuré---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Lien parenté: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['lien']; ?></p>
                        </div>
                      </div>
                       <!-------------------------------contrat---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">N° contrat : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['numcontrat']; ?></p>
                        </div>
                      </div>
                            <!------------------------------id-intervenant---------->
                            <div class="form-group">
                        <label class="col-lg-2 control-label"> Identifiant intervenant CNAM: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['idintervenant']; ?></p>
                        </div>
                      </div>
                       <!------------------------------Nom-intervnant---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Nom intervenant: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['nomintervenant']; ?></p>
                        </div>
                      </div>
                       <!-----------prenom intervenant--------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Prenom intervenant: </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['prenomintervenant']; ?></p>
                        </div>
                      </div>
                  
                       <!------------------------Nom-acte---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Type d'acte médical : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['nomacte']; ?></p>
                        </div>
                      </div>
                        <!------------------------d'acte d'acte---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Date d'acte : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static">
                          <?php echo date('d-m-Y', strtotime($result2['dateacte'])); ?>
                          </p>
                        </div>
                      </div>
                        <!------------------------montant-payé---------->
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Montnat payé  : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result2['mp'] ?> TND</p>
                        </div>
                      </div>
                    </form>
                  </div>
              </section>
          </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
  include('footer.php');
?>
