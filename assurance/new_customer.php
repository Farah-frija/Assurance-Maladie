<?php
  include('config/config.php');
  include('config/dbConnection.php');
  include('validation.php'); //validates post data 

  if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isError) {//check if post data and no errors 
    include('add_customer.php'); //saves data
  }
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
                    <li class="active">Ajouter assuré</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Ajouter assuré
                    </header>
                    <div class="panel-body">
                        <div class="form">
                           <!---------form------>
                          
                            <form class="cmxform form-horizontal" id="add_customer" 
                            name="add_customer" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                              
                            <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Nom <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Entrer nom" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>" />
                                        <?php
                                        if(!empty($nameErr)) {
                                          echo "<label class='error' style='display: inline;'>$nameErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                 <!------------prenom-------->
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Prenom <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name1" placeholder="Entrer prenom" value="<?php if(!empty($_POST['name1'])) echo $_POST['name1']; ?>" />
                                        <?php
                                        if(!empty($name1Err)) {
                                          echo "<label class='error' style='display: inline;'>$name1Err</label>";
                                        } ?>
                                    </div>
                                </div>
                                 <!------------contrat-------->
                                    <div class="form-group">
                                    <label for="cntr" class="control-label col-lg-2">Num Contrat <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="cntr" name="contrat" placeholder="Entrer le num contrat" value="<?php if(!empty($_POST['contrat'])) echo $_POST['contrat']; ?>" />
                                        <?php
                                        if(!empty($contraterr)) {
                                          echo "<label class='error' style='display: inline;'>$contraterr</label>";
                                        } ?>
                                    </div>
                                </div>
                                   <!------------sexe-------->
                                <div class="form-group">
                                    <label for="gender" class="control-label col-lg-2">Sexe</label>
                                    <div class="radio">
                                        <label>
                                          <input type="radio" value="male" name="gender" <?php if(!empty($_POST['gender']) && $_POST['gender'] == 'male') echo "checked"; ?>>
                                          Homme
                                        </label>
                                        <label>
                                          <input type="radio" value="female" name="gender" <?php if(!empty($_POST['gender']) && $_POST['gender'] == 'female') echo "checked"; ?>>
                                          Femme
                                        </label>
                                        <?php
                                        if(!empty($genderErr)) {
                                          echo "<label class='error' style='display: inline;'>$genderErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                  <!---------lien parenté -------->
                                <div class="form-group">
                                    <label for="mobile_number" class="control-label col-lg-2">Lien parenté <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Entrer le lien parenté" value="<?php if(!empty($_POST['mobile_number'])) echo $_POST['mobile_number']; ?>"/>
                                        <?php
                                        if(!empty($numberErr)) {
                                          echo "<label class='error' style='display: inline;'>$numberErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <!---------DOB -------->
                             <div class="form-group">
                                    <label for="dob" class="control-label col-lg-2">DOB <span class="required_field">*</span></label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter DOB" value="<?php if(!empty($_POST['dob'])) echo $_POST['dob']; ?>"/>
                                        <span class="help-inline">dd-mm-yyyy</span>
                                        <?php
                                        if(!empty($dobErr)) {
                                          echo "<label class='error' style='display: inline;'>$dobErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customer_photo" class="control-label col-lg-2">Customer Photo </label>
                                    <div class="col-md-4">
                                        <input class="default" type="file" name="customer_photo" />
                                        <span class="help-inline"> png, jpg, jpeg, gif, bmp only</span>
                                     
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger" type="submit">Save</button>
                                        <a href="home.php"><button class="btn btn-default" type="button">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
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