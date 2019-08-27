<?php include_once("../sessionCheckPages.php");?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Make Sale - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Validation Stylesheet -->
  <link rel="stylesheet" href="../../assets/css/site-demos.css">
</head>

<style type="text/css">
  .dropdown-menu{
    transform: translate3d(0px, 5rem, 0px)!important;
  }
</style>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Make Sale</a>
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
      <div class="row mb-3">
                <div class="card card-stats shadow col-lg-8 px-0">
                    <div class="card-header border-0 bg-secondary">
                      <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchProduct" placeholder="Enter Product Name" autofocus="true" onchange="focusSearch()">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <span class="fa fa-search"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                  <input type='hidden'class="btn btn-default dropdown-toggle btn-block col" type="button" id="dropdown_coins" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="focusSearch()" ></input>
                  <div id="menu" class="dropdown-menu col px-4 mb-4" aria-labelledby="dropdown_coins">
                    <div id="menuItems"></div>
                    <div id="empty" class="dropdown-header table-danger" style="color: black">
                      No product found
                    </div>
                  </div>
                <div class="card-body">
                  <div class="table-responsive col-12">

                    <table id="productsTable" class="table align-items-center table-flush">
                       <thead class="thead-light">
                      <tr class="header">
                        <th> Quantity</th>
                        <th class="pl-0"> Item Name</th>
                        <th class="pl-4" style="text-align: center;"> Unit Price</th>
                        <th class="text-right pr-1"> Total </th>
                        <th class="text-right pr-1 pl-2"> Guide Price</th>
                        <th class="text-right pr-1"> Cost Price</th>
                        <th class="text-right pr-1"> Profit </th>
                        <th class="text-left px-0" style="width: 0.5rem"></th>
                      </tr>
                    </thead>
                    <tbody>
                      </tbody>
                      <tfoot class="tfoot-light">
                      <tr class="footer">
                        <td></td>
                        <td></td>
                        <th class="text-right pr-1"><b>TOTAL</b></th>
                        <td class="text-right pr-1" id="totalOfSale"><b>R11 280.00</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                       <tr class="footer">
                        <td></td>
                        <td></td>
                        <th class="text-right pr-1"><b>VAT (15%)</b></th>
                        <td class="text-right pr-1" id="vatOfSale"><b>R2 820.00</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>

                <div class="col-sm-6 col-lg-4 bg-transparent ">
                  <div class="card card-stats table" id="myTabContent" >
                    <div class="card-header bg-secondary">
                      <div class="row"> 
                        <div class="mx-2">
                          <form id="searchCustomertForm" class="needs-validation" novalidate>
                            <div class="input-group input-group-rounded input-group-merge mx-2">
                              <input type="text" id="customerSearchInput" placeholder="Search Customer ID" title="Type in a name" class="form-control form-control-rounded form-control-prepended" aria-label="Search" required>
                              <div class="input-group-prepend mr-3">
                                <button class="input-group-text btn-info bg-customGreen" id="searchCustomerButton">
                                <span class="fa fa-search" style="color: white"></span>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="card-body px-3" style="height: 18rem">

                      <table class="table align-items-center table-flush table-borderless" id= "customerCard">
                        <tbody class="list">    
                            <tr>
                              
                          </tr>
                          <tr>
                              <th> No Customer Added</th>
                              <td >
                                  
                              </td>
                            </tr>                  
                        </tbody>
                      </table>

                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                           <div class="custom-control custom-checkbox mb-3">
                            
                            <input class="custom-control-input" style="font-size: 5rem" id="customCheck2" type="checkbox" checked>
                            <label class="custom-control-label" for="customCheck2">Add Sale Delivery</label>
                          
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pl-2" style="height: 5rem">
                      <span class="col">
                          <button class="btn btn-primary ">Finalise Sale</button>
                        </span>
                    </div>
                  </div>
                </div>


 <!--          <div class="card shadow col">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Sale Details</h3>
            </div>
            <div class="card-body">
              <div class="row mb-3"> -->
                


<!--                 <div class="col-sm-6 col-lg-6 mt-3 mt-sm-0 table">
                  <div class="card card-stats table light" id="myTabContent" >
                    <div class="card-body px-3" style="height: 21.7rem">
                      <table class="table align-items-center table-flush table-borderless table-responsive">
                        <tbody class="list">    
                            <tr>
                              <th style="width: 12rem">
                                Date 
                              </th>
                              <td >
                                25/07/2019
                              </td>
                            </tr>                               
                            <tr>
                              <th>
                                Invoice #
                              </th>
                              <td >
                                321
                              </td>
                            </tr> 
                            <tr>
                              <th>
                                Salesperson
                              </th>
                              <td >
                                Alana
                              </td>
                            </tr>      
                        </tbody>
                      </table>
                  </div>
                </div>
              </div> -->
<!--             </div>
            <div class="row">
              <div class="col-12">
                <div class="card shadow">
                  <div class="card-header border-0">
                    <div class="input-group input-group-rounded input-group-merge">
                        <button class="btn btn-default dropdown-toggle btn-block col" type="button" id="dropdown_coins" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="focusSearch()" >
                            Add Product
                        </button>
                        <div id="menu" class="dropdown-menu col px-4 mb-4" aria-labelledby="dropdown_coins">
                            <form class="px-1 py-2">
                              <div class="input-group input-group-rounded input-group-merge">
                                <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchProduct" placeholder="Enter Product Name" autofocus="true" onchange="focusSearch()">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <span class="fa fa-search"></span>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <div id="menuItems"></div>
                            <div id="empty" class="dropdown-header table-danger" style="color: black">
                              No product found
                            </div>
                        </div>
                      </div>
                  </div>
                <div class="table-responsive">

                  <table id="productsTable" class="table align-items-center table-flush">
                     <thead class="thead-light">
                    <tr class="header">
                      <th> Quantity</th>
                      <th class="pl-0"> Item Name</th>
                      <th class="pl-4" style="text-align: center;"> Unit Price</th>
                      <th class="text-right pr-1"> Total </th>
                      <th class="text-right pr-1 pl-2"> Guide Price</th>
                      <th class="text-right pr-1"> Cost Price</th>
                      <th class="text-right pr-1"> Profit </th>
                      <th class="text-left px-0" style="width: 0.5rem"></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                    
                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>TOTAL</b></th>
                      <td class="text-right pr-1" id="totalOfSale"><b>R11 280.00</b></td>
                    </tr>
                     <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>VAT (15%)</b></th>
                      <td class="text-right pr-1" id="vatOfSale"><b>R2 820.00</b></td>
                    </tr>
                    </tfoot>
                  </table> -->

<!--                 </div>
              </div>
            </div>
            <br>

              <div class="col mt-4">
                <button class="btn btn-icon btn-2 btn-success mt-0" type="button" data-toggle="modal" data-target="#modal-creditlimit">
                  <span class="btn-inner--text">Finalise Sale</span>
                </button>
              </div>
                <div class="modal fade" id="modal-creditlimit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                      
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Finalise Sale</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group col">
                            <label for="bane">Sales Manager Password</label>
                            <input type="password" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-success  ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Approve Sale</button> 
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
                        
                        <div class="modal-body text-left">
                          <p>Sale successful. Printing invoice...</p>
                            
                        </div>
                        
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="callTwo()">Close</button> 
                        </div>
                        
                    </div>
                </div>
              </div>
          </div> -->
          
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
  <!-- Validation JS -->
  <script src="../../assets/js/jquery.validate.min.js"></script>
  <script src="../../assets/js/additional-methods.min.js"></script>
  <!-- Make Sale JS -->
  <script src="JS/makeSale.js"></script>
</body>

</html>