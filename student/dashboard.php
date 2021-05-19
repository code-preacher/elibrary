<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid bg-dark">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <?php $a=array('bg-success','bg-warning','bg-info','bg-dark','bg-secondary','bg-danger','bg-success','bg-warning','bg-info','bg-dark','bg-secondary','bg-danger','bg-success','bg-warning','bg-info','bg-dark','bg-secondary','bg-danger','bg-success','bg-warning','bg-info','bg-dark','bg-secondary','bg-danger'); ?>

                          <?php
    $qt=$crud->displayAllWithOrder('college','name','desc');
    $c=0;
    if ($qt) {

     foreach($qt as $dy){
         ?>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box <?=$a[$c];?>">
              <div class="inner">
                <h4><?php echo $dy['name'];  ?></h4>
                <p>&nbsp;</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>  <i class="fa fa-book"></i>
              </div>
              <a href="department.php?id=<?=$dy['id'];?>" class="small-box-footer">Click to access books <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

                                    <?php
   $c++; }
                    
    } else {
    echo "<center>No Data at the moment</center</td></tr>";
    }
    ?>
        </div>
        <!-- /.row -->
        
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <?php
include 'inc/footer.php';
?>