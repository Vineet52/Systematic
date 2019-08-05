<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Finalise Assigned Truck - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Finalise Assigned Truck</a>
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
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="form-group col-12">
                <label>Truck</label>
                <select class="form-control btn-default" onchange="showDeliveries()">
                  <option>Select Truck</option>
                  <option onclick="showDeliveries()">BBC 123 NW  |  2015 Isuzu NPR          | 10 Tonnes</option>
                  <option>DSM 032 NW  |  2017 GMC Savana G33903  | 25 Tonnes</option>
                  <option>CAD 347 NW  |  2017 Freightliner M2    | 40 Tonnes</option>
                  <option>ADW 586 NW  |  2016 Volvo VNL84430     | 50 Tonnes</option>
                </select>
              </div>
               <div class="input-group input-group-rounded input-group-merge col">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter order or invoice # to search" title="Type in a name" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
                  <!-- Button trigger modal -->
            </div>
          </div>
          <div class="tab-content" id="myTabContent">
            <div class="table-responsive">
              <table id="myTable" class="table align-items-center table-flush" style="display: none;">
                <thead class="thead-light">
                  <tr class="header">
                    <th></th>
                    <th>Type</th>
                    <th>Order/Invoice #</th>
                    <th>Date</th>
                    <th>City</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <thead class="table-light">
                    <th><b>25/07/2019</b></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </thead>
                  <tr>
                    <td>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck1" type="checkbox">
                        <label class="custom-control-label" for="customCheck1"> &nbsp;</label>
                      </div>
                    </td>
                    <td>Delivery</td>
                    <td>321</td>
                    <td>25/07/2019</td>
                    <td>Pretoria</td>
                    <td>
                      <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='assign-truck-view-delivery.html'">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i>
                        </span>
                        <span class="btn-inner--text">View</span>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck3" type="checkbox">
                        <label class="custom-control-label" for="customCheck3"> &nbsp;</label>
                      </div>
                    </td>
                    <td>Collection</td>
                    <td>128</td>
                    <td>25/07/2019</td>
                    <td>Pretoria</td>
                    <td>
                      <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='assign-truck-view-collection.html'">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i>
                        </span>
                        <span class="btn-inner--text">View</span>
                      </button>
                    </td>
                  </tr>
                  <tr id="emptySearch" style="display: none;">
                    <td >No Delivery/Collection Found</td>
                  </tr>
                </tbody>
              </table>
            </div>

              <hr class="mt-0">
              <div class="col mt-4">
                <button class="btn btn-icon btn-2 btn-primary mt-0 mb-3" type="button" data-dismiss="modal" data-toggle="modal" data-target="#select">
                  <span class="btn-inner--text">Finalise Assignment</span>
                </button>
              </div>
              <div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to finalise the assignment of the selected delivery(ies)/collection(s) to the selected truck?</p>
                    </div>
                    <div class="modal-footer">
                      
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Assignment finalisation of selected delivery(ies)/collection(s) successful</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal"  onclick="window.location='../../delivery_collection.php'">Close</button> 
                  </div>
                </div>
              </div>
            </div>

            <script>
            function myFunction() 
            {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              var showCount = 0;
              for (i = 0; i < tr.length; i++) 
              {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) 
                {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter)> -1) 
                  {
                    tr[i].style.display = "";
                    showCount += 1;
                  } 
                  else 
                  {
                    tr[i].style.display = "none";
                  }
                }       
              }

              if (showCount === 0)
              {
                console.log("Zero");
                $("#emptySearch").show();
              } 
              else
              {
                $("#emptySearch").hide();
              }
            }

            function showDeliveries()
            {
              document.getElementById("myTable").style.display = "";
            }
            </script>
          </div>
        </div>
        </div>
      </div>
      <?php include_once("../footer.php");?>
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