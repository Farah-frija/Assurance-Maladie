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
                  <li class="active">Bulletins</li>
              </ul>
              <!--breadcrumbs end -->
          </div>
      </div>
    <div class="clear"></div>
      <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Liste bulletins rejetés

                    <?php if (!empty($_GET['msg'])) { ?>
                    <div class="has-success">
                        <p class="help-block"><?php echo $_GET['msg']; ?>
                    </div>
                    <?php } ?>
                </header>
                <form name="delete_cust" method="post" action="delete_customer.php">
             
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr> <th>     </th>
                              <th>STATUT</th>
                              <th>NOM</th>
                              <th>PRENOM</th>
                              <th>NUM CONTRAT</th>
                              <th>SEXE</th>
                              <th>LIEN Parenté</th>
                              <th>DOB</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($result2 as $row2) {
                        ?>         
                            <tr>
                            <td><input type="checkbox" class="boxxxx" name="idbull[]" value="<?php echo $row2['idbulletin']; ?>"></td>
                            <td id="statut" style="background-color:  #fe4c40 ;color:white">En attente</td>
                            <td><?php echo $row2['name']; ?></td>
                              <td><?php echo $row2['prenom']; ?></td>
                              <td><?php echo $row2['numcontrat']; ?></td>
                              <td><?php echo $row2['gender']; ?></td>
                              <td><?php echo $row2['lien']; ?></td>
                             
                              <td><?php echo $row2['dob']; ?></td>
                              <td>
                              <a href="bulletin.php?idbull=<?php echo $row2['idbulletin']; ?>"><span class="label label-info label-mini">Modifer cause rejet</span></a>&nbsp;&nbsp;

                              </td>
                        
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- <div class="row-fluid">
                        <div class="span6">
                            <div class="dataTables_info">Showing 1 to 10 of 15 entries</div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_paginate paging_bootstrap pagination">
                                <ul>
                                    <li class="prev disabled"><a href="#">Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                </form>
            </section>
        </div>
    </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
<script>
  var statuts = [];
  var trs = document.querySelectorAll("tr");
  for (i = 0; i < trs.length; i++)
  statuts[i]=false;
  var i = 0;
  <?php foreach ($result2 as $row2) { ?>
    i++;
    var matri = "<?php echo $row2['idbulletin']; ?>";
   
        if ("<?php echo $row2['cause']; ?>" !== "") {
          statuts[i] = true;
       
        }
       
      
    <?php } ?>
  



  for (i = 0; i < statuts.length; i++) {
    if (statuts[i]) {
      trs[i].querySelector("#statut").textContent = "terminé";
      trs[i].querySelector("#statut").style.backgroundColor = "#90EE90";
    

    }
  }
</script>

<?php
  include('footer.php');
?>
