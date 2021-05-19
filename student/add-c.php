<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>
<?php
if(isset($_POST['submit'])){
$crud->insertReview($_POST);
}

$dy=$crud->displayOneStudent('student',$_SESSION['id']);
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 bg-dark">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Send Review</li>
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
          <div class="col-md-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Send Review/Request: </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="#" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Review/Request Message :</label>
                    <input type="text" name="message" class="form-control" id="exampleInputName" placeholder="Please enter message" required="required">
                     <input type="hidden" name="sender_id" value="<?php echo $dy['id']; ?>">
                     <input type="hidden" name="college_id" value="<?php echo $dy['college_id']; ?>">
                     <input type="hidden" name="department_id" value="<?php echo $dy['department_id']; ?>">
                  </div>
                </div>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-md-3" name="submit">Send</button>
                  <button type="reset" class="btn btn-danger col-md-3">Clear</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <br/><br/>
  <?php
include 'inc/footer.php';
?>