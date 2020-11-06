
<!DOCTYPE html>
<html>

<head>
  <title>Documents</title>
<?php
  include('header.php');

  include('action.php');
 ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <?php  include('menu.php');   ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Documents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Documents</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Documents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="projects" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>Document Name</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $data = new Actions();
                  // echo "<pre/>";print_r($data->getDocumentList());
                  $result = $data->getDocumentList();
               
                    $i=1;
                  
                    if ($result->num_rows > 0) {
                      $i=1;
                      while($row = $result->fetch_assoc()) {
                        echo " <tr><td>" . $i. "</td><td><a download href='".$row["document_path"]."'>" . $row["document_name"]. " </a></td>";
                        echo '<form method="post" action="$data->docDelete()"> <input type="hidden" name="doc_id" value="'.$row['document_id'].'"/>';
                        echo'<td><input type="submit" name="delete" id="delete" class="btn btn-info" value="Delete" />';
                        echo '</td></form></tr>';
                      $i++;
                      }

                    }
                    else{
                      echo "no projects available";
                    }

                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl. No</th>
                    <th>Document Name</th>
                    <th></th>
                    <!-- <th></th> -->
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- page script -->
<script>
  $(function () {
    $("#projects").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

  });
</script>
</body>
</html>
