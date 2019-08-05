<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Search Customer - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Search Customer</a>
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
            <div class="card-header border-0">
               <div class="input-group input-group-rounded input-group-merge">
                 
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Customer name or contact number" title="Type in a name" class="form-control form-control-rounded form-control-prepended" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
            </div>
          </div>
          <div class="table-responsive">

            <table id="myTable" class="table align-items-center table-flush">
               <thead class="thead-light">
              <tr class="header">
                <th>Title</th>
                <th >Name</th>
                <th >Surname</th>
                <th> Contact number</th>
                <th style="width:1rem;"></th>
                <th style="width:1rem;"></th>
                <th style="width:1rem;"></th>
                <th style="width:1rem;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mr</td>
                <td>John</td>
                <td>Smith</td>
                <td>085 515 6262</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='view.php'">
                    <span class="btn-inner--icon"><i class="fas fa-user"></i>
                    </span>
                    <span class="btn-inner--text">View</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain.php'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-toggle="modal" data-target="#del">
                    <span class="btn-inner--icon"><i class="fas fa-trash"></i>
                    </span>
                    <span class="btn-inner--text">Delete</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-default btn-sm" type="button" onclick="window.location='view-credit-account.php'">
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i>
                    </span>
                    <span class="btn-inner--text">View Credit Account</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Mr</td>
                <td>Benny</td>
                <td>Haynes</td>
                <td>065 626 3161</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='view.php'">
                    <span class="btn-inner--icon"><i class="fas fa-user"></i>
                    </span>
                    <span class="btn-inner--text">View</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain.php'" >
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-toggle="modal" data-target="#del">
                    <span class="btn-inner--icon"><i class="fas fa-trash"></i>
                    </span>
                    <span class="btn-inner--text">Delete</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-outline-default btn-sm pr-4" type="button" onclick="window.location='apply-for-credit.php'">
                    <span class="btn-inner--icon"><i class="fas fa-edit"></i>
                    </span>
                    <span class="btn-inner--text">Apply For Account</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Ms</td>
                <td>Annie</td>
                <td>Saynes</td>
                <td>061 656 5551</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='view.php'">
                    <span class="btn-inner--icon"><i class="fas fa-user"></i>
                    </span>
                    <span class="btn-inner--text">View</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain.php'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-toggle="modal" data-target="#del">
                    <span class="btn-inner--icon"><i class="fas fa-trash"></i>
                    </span>
                    <span class="btn-inner--text">Delete</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-default btn-sm" type="button" onclick="window.location='view-credit-account.php'">
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i>
                    </span>
                    <span class="btn-inner--text">View Credit Account</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Mr</td>
                <td>David</td>
                <td>Cooper</td>
                <td>063 213 5122</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-success btn-sm" type="button" onclick="window.location='view.php'">
                    <span class="btn-inner--icon"><i class="fas fa-user"></i>
                    </span>
                    <span class="btn-inner--text">View</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain.php'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-toggle="modal" data-target="#del">
                    <span class="btn-inner--icon"><i class="fas fa-trash"></i>
                    </span>
                    <span class="btn-inner--text">Delete</span>
                  </button>
                </td>
                <td>
                  <button class="btn btn-icon btn-2 btn-outline-default btn-sm pr-4" type="button" onclick="window.location='apply-for-credit.php'">
                    <span class="btn-inner--icon"><i class="fas fa-edit"></i>
                    </span>
                    <span class="btn-inner--text">Apply For Account</span>
                  </button>
                </td>
              </tr>
              <tr id="emptySearch" style="display: none;" class="table-danger mb-3">
                <td><b>No Customer Found</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
            </table>
            <div class="form-group col-md-2 mt-3">
              <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default" onclick="window.history.go(-1); return false;">Back</button>
            </div>

            <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete the selected customer?</p>
                    </div>
                    <div class="modal-footer">
                      
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-succ" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    
                      <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Success!</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      
                      <div class="modal-body">
                          <p>Customer successfully deleted</p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          
                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../customer.php'">Close</button> 
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
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[3];
                if (td || td2) 
                {
                  txtValue = td.textContent || td.innerText;
                  txtValue2 = td2.textContent || td2.innerText;
                  if ((txtValue.toUpperCase().indexOf(filter)> -1)|| txtValue2.replace(/\s/g, '').toUpperCase().indexOf(filter)> -1) 
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
                $("#emptySearch").show();
              } 
              else
              {
                $("#emptySearch").hide();
              }
            }
            </script>
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