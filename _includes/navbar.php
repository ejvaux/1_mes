<script src="/1_mes/_includes/clock.js"></script>


<nav class="navbar navbar-brdr navbar-expand-xl navbar-light bg-white fixed-top m-0 px-2 pb-1 pt-0 ">
          
  <a class="navbar-brand" href="http://primatechcorporation.com/">
      <div class="navbar">            
          <img class="img-fluid animated flipInX" style="width: 146px; height: 28px" src="/1_MES/_images/primatech-logo.png" alt="Primatech Logo"  >                        
      </div>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>                  
  </button>
                
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a id="hme" class="nav-link bar hvr-underline-from-center" href="/1_mes/">Home</a>
      </li>
      
      <li class="nav-item">
        <a id="prtl" class="nav-link bar hvr-underline-from-center" href="/1_MES/_php/portal.php">Portal</a>
      </li>

      <li class="nav-item dropdown" style="overflow:visible;">
        <a class="nav-link dropdown-toggle bar hvr-underline-from-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown" >                  
            <div class="container dropdown-header text-left">
              <div class="row">
                <div class="col">
                  <h6 class="text-center">USER INFO</h6>
                </div>                      
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label><b>Name</b>:</label>
                </div>
                <div class="col-sm-4">
                  <span><?php echo $_SESSION['text']; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label><b>Email:</b></labe>
                </div>
                <div class="col-sm-4">
                  <?php

                  if(isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                  }


                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label><b>Authority:</b></label>
                </div>
                <div class="col-sm-4">
                  <?php

                    $auth = $_SESSION['auth'];
                    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                        $sql = "SELECT USER_AUTHORITY FROM dmc_user_authority WHERE AUTHORITY_CODE = '$auth'";
                        $result = $conn->query($sql);
                        
                            while($row = $result->fetch_assoc()) {

                                echo $row['USER_AUTHORITY'];                           
                                
                            }
                        
                        $conn->close();

                  ?>
                </div>
              </div>                  
            </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/1_MES/_php/change_pass.php">Change Password</a>          
        </div>
      </li>      
    </ul>         
            
  <span class='navbar-text mr-2' id='usr' >Hi! <b><?php echo $_SESSION['text']; ?></b>.</span>  
  
  <!-- Clock -->            
  <span class="navbar-text mr-2" id="clock"></span>         
  
  <button type="button" class="btn btn-outline-secondary p-1 my-2 my-0 hvr-icon-wobble-horizontal" onclick="" id="lgout" >Logout <i class="fas fa-sign-out-alt hvr-icon"></i></a>
  </div>            
</nav>

<script type="text/javascript">      
      
        showclock();          
      
      $(function() {
        
        $('[data-toggle="tooltip"]').tooltip();
      });    

      
</script>
<script src="/1_mes/_includes/authentication.js"></script>