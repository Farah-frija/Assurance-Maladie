<?php
include('config/config.php');
include('config/dbConnection.php');
include ('getcustomers_controleur.php');
include("get_rejet.php");
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
                    <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="list_customers.php">List Customers</a></li>
                    <li class="active">View Customer</li>
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
                                    if (!empty($result2['customer_photo']) && file_exists('uploads/customer_photo/' . $result2['customer_photo'])) {
                                        $customer_photo = 'uploads/customer_photo/' . $result2['customer_photo'];
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
                                <label class="col-lg-2 control-label">Montnat payé : </label>
                                <div class="col-lg-10">
                                    <p class="form-control-static"><?php echo $result2['mp'] ?> TND <br></p>
                                </div>
                        </form>
                    </div>
                </section>

                <section id="main-content">
                    <section class="wrapper site-min-height">
                        <section class="panel">
                            <div class="panel-body">
                                <form class="form-horizontal"  enctype="multipart/form-data" method="post" >
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Décision de remboursement: </label>
                                        <div class="col-lg-10">
                                            <p class="form-control-static"><?php echo "Rejet" ?> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Code de la cause du rejet : </label>
                                        <div class="col-lg-10">
                                            <p class="form-control-static"> <select name="cause" id="causeRejet" onchange="updateCommentaire()">
                                            <?php
                                            // Afficher les options de la table CauseRejet
                                          foreach ($resultCauseRejet as $row3) {
                                                      
                                                    echo '<option value="' . $row3["code"] . '">' . $row3["code"] .  '</option>';
                                                     
                                                  }
                                          
                                            ?>
                                        </select> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="commentaire">Cause du Rejet : </label>
                                        <div class="col-lg-10">
                                            <p style="color: red;" id="commentaire" class="form-control-static"> <?php if($result2['cause']) echo $result2['cause']; ?></p>
                                        </div>
                                    </div>
                                    
                                    <input class="btn btn-danger" type="submit" value="valider">
                                    <input class="btn btn-default"type="reset" value="Annuler">
                                    <script>

</script>

                                </form>
                            </div>
                        </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

<script>
    function updateCommentaire() {
        var select = document.getElementById("causeRejet");
        var p = document.getElementById("commentaire");
        var selectedIndex = select.selectedIndex;
        var selectedOption = select.options[selectedIndex];
        var selectedCode = selectedOption.value;
        var libelle = "";

        // Find the corresponding "libellé" for the selected code
        <?php foreach ($resultCauseRejet as $row3) { ?>
            if ("<?php echo $row3['code']; ?>" === selectedCode) {
                libelle = "<?php echo $row3['libellé']; ?>";
            
                
            }
        <?php } ?>

        p.textContent = libelle;
    }
</script>











<!--main content end-->
<?php
include('footer.php');
?>