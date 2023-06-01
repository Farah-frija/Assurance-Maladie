<?php
  include ('header.php');
  include('get_counts.php');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li class="active"><i class="fa fa-home"></i> Home</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Total Assurés - <?php echo $result['customer_count']; ?></div>
                </section>
            </div>
        </div>
       <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-body">Total bulletins rejetés- <?php echo $result1['customer_count1'];  ?></div>
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
