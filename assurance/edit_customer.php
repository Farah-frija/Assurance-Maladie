<?php
include('config/config.php');
include('get_customers.php');
include('validation.php'); //validates post data 
include'config/dbConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  if ($_SERVER["REQUEST_METHOD"] == "POST" ) {//check if post data and no errors 
    include('update_customer.php'); //updates data
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
                    <li><a href="list_customers.php">List Customers</a></li>
                    <li class="active">Edit Customer</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Customer
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal" id="edit_customer" 
                            name="edit_customer" method="post" action="edit_customer.php?id=<?php echo $result['id']; ?>" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Nom <span ></span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter First name Last name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $result['name']; ?>" />
                                        <?php
                                        ?>
                                    </div>
                             
                                    </div>
                                    <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Prenom </label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter First name Last name" value="<?php if(isset($_POST['name1'])) echo $_POST['name1']; else echo $result['prenom']; ?>" />
                                    
</div>
                                    </div>
                                <div class="form-group">
                                    <label for="gender" class="control-label col-lg-2">Gender <span class="required_field">*</span></label>
                                    <div class="radio">
                                        <label>
                                        <?php
                                            if( isset($_POST['gender']) ) {
                                                $gender = $_POST['gender'];
                                            } else {
                                                $gender = $result['gender'];
                                            }
                                        ?>
                                        
                                        <input type="radio" value="male" name="gender" <?php if( $gender == 'male' ) { echo "checked"; } ?>>
                                          Male
                                        </label>
                                        <label>
                                          <input type="radio" value="female" name="gender" <?php if( $gender == 'female' ) { echo "checked"; } ?>>
                                          Female
                                        </label>
                                        <?php
                                        if(!empty($genderErr)) {
                                          echo "<label class='error' style='display: inline;'>$genderErr</label>";
                                        } ?>

                                         
                                </div>
                                    </div>

                                <div class="form-group">
                                    <label for="mobile_number" class="control-label col-lg-2">Lien parenté</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="<?php if(isset($_POST['mobile_number'])) echo $_POST['mobile_number']; else echo $result['lien']; ?>"/>
                                      
            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dob" class="control-label col-lg-2">DOB <span class="required_field">*</span></label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter DOB" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; else echo date('d-m-Y', strtotime($result['dob'])); ?>"/>
                                        <span class="help-inline">dd-mm-yyyy</span>
                                        <?php
                                        if(!empty($dobErr)) {
                                          echo "<label class='error' style='display: inline;'>$dobErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customer_photo" class="control-label col-lg-2">Customer Photo <span class="required_field">*</span></label>
                                    
                                    <div class="col-md-4">
                                      <?php
                                        if( !empty($result['customer_photo']) && file_exists('uploads/customer_photo/'.$result['customer_photo']) ) {
                                            $customer_photo = 'uploads/customer_photo/'.$result['customer_photo'];
                                        } else {
                                            $customer_photo = 'img/photo.jpg';
                                        }
                                      ?>
                                        <img alt="Customer Photo" width="140px" height="140px" src="<?php echo $customer_photo; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customer_photo" class="control-label col-lg-2"></label>
                                    <div class="col-md-4">
                                        <input class="default" type="file" name="customer_photo" />
                                        <span class="help-inline"> png, jpg, jpeg, gif, bmp only</span>
                                        <?php
                                        if(!empty($customerPhotoErr)) {
                                          echo "<label class='error' style='display: inline;'>$customerPhotoErr</label>";
                                        } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger" type="submit">Save</button>
                                        <a href="list_customers.php"><button class="btn btn-default" type="button">Cancel</button></a>
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