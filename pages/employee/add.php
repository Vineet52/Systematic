<?php include_once("../sessionCheckPages.php");?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Add Employee - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link href="../../assets/jqueryui/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Add Employee</a>
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
              <h3 class="mb-0">Employee Details:</h3>
            </div>
            <div class="card-body">

              <div class="row mt-3">
                <div class="tab-content col" id="myTabContent">
                  <div class="tab-pane fade show active" id="home"  aria-labelledby="home-tab">
                    <form enctype='multipart/form-data' action='' method='' class="card-body" id='picToUpload'>
                      <div class="col">
                        <div class="form-row">
                          <div class="form-group col-6">
                            <label for="employeeName">Name</label>
                            <input type="text" class="form-control" id="employeeName" name="employeeName" aria-describedby="emailHelp" placeholder="Enter name" required>
                            
                          </div>
                          <div class="form-group col-6">
                            <label for="employeeSurname">Surname</label>
                            <input type="text" class="form-control" id="employeeSurname" name="employeeSurname" placeholder="Surname" required>
                          </div>
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-2">
                            <label for="bane">Title</label>
                            <select class="form-control" id="eTitle">
                              <option>Mr</option>
                              <option>Ms</option>
                              <option>Mrs</option>
                            </select>
                          </div>
                          <div class="form-group col-10">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" maxlength="10" class="form-control" id="contactNumber" name="employeeNumber" placeholder="Contact Number" required>
                          </div>
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-6">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="employeeEmail" placeholder="Email" required>
                          </div>
                          <div class="form-group col-6">
                            <label for="exampleInputPassword1">SA ID or Passport number</label>
                            <input type="text" maxlength="15" class="form-control" id="eID" placeholder="ID" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputAddress">Address line 1</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">Suburb</label>
                            <input type="text" class="form-control" id="inputSuburb" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">City</label>
                            <input type="text" class="form-control" id="inputCity" readonly>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip" readonly>
                          </div>
                          <div class="form-group col-12">
                            <label for="bane">Employee Type</label>
                            <select class="form-control" id="eType">
                            </select>
                          </div>
                          
                            <div class='form-group col-12'>
                                <label for="UploadsPic">Upload Employee Picture</label>
                                <input type='hidden' class='form-control' name='set' id="UploadsPic" class="form-control"/>
                                <input type='file' class='form-control' id="fileUpload" name='UploadsPic'  class="form-control"/><br/>
                                
                             
                          </div>
                          
                        </div>
                        <div>
                        <button type="submit" class="btn btn-primary mb-3 px-4" id="SavingDetails">Save</button> 
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
                                          <p>Employee added successfully</p>
                                          
                                      </div>
                                      
                                      <div class="modal-footer">
                                          
                                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../employee.html'">Close</button>
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
      </div>
      <?php include_once("../footer.php");?>
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
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="../../assets/jqueryui/jquery-ui.js"></script>
  <script src="JS/addEmployee-Ajax.js"></script>
</body>

</html>