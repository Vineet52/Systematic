<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Add User - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Add User</a>
        <?php include_once("../usernavbar.php");?>
        
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-custom pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">User Details</h3>
            </div>
            <div class="card-body">

              <div class="row mt-3">
                <div class="tab-content col" id="myTabContent">
                  <div class="tab-pane fade show active" id="home"  aria-labelledby="home-tab">
                    <form>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputUsername">Email (Username)</label>
                          <input type="email" class="form-control" id="inputUsername" placeholder="Enter email address">
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-6">
                            <label for="inputPassword1">Password</label>
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Enter Password">
                          </div>
                          <div class="form-group col-6">
                            <label for="inputPassword2">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm Password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="bane">Access Level</label>
                          <select class="form-control">
                            <option>Level 1 - Administration 1</option>
                            <option>Level 2 - Sales 1</option>
                            <option>Level 3 - Sales 2</option>
                             <option>Level 4 - Warehouse Manager</option>
                            <option>Level 5 - Driver 1</option>
                          </select>
                        </div>
                        <button type="button" class="btn btn-primary mb-3 px-4" data-toggle="modal" data-target="#modal-default">Save</button> 
                      </div>
                        <div class="form-group col-md-2">
                            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                  <div class="modal-content">
                                    
                                      <div class="modal-header">
                                          <h6 class="modal-title" id="modal-title-default">Success!</h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      
                                      <div class="modal-body">
                                          <p>User added successfully</p>
                                          
                                      </div>
                                      
                                      <div class="modal-footer">
                                          
                                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../user.html'">Close</button> 
                                      </div>
                                      
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
                
                </div>

              </div>
            </div>
          </div>
        </div>
      
      <!-- Footer -->
      <?php include_once("../footer.php");?>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>