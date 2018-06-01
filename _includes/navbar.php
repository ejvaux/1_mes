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

      <li class="nav-item">
        <a class="nav-link bar hvr-underline-from-center" id="acct_btn" href="#">
          Account
        </a>
      </li>
           
    </ul>         
            
  <span class='navbar-text mr-2' id='usr' >Hi! <b><?php echo $_SESSION['text']; ?></b>.</span>  
  
  <!-- Clock -->
  <span class="navbar-text mr-2" id="clockdate" style="display:block"></span>            
  <span class="navbar-text mr-2" id="clocktime" style="display:block"></span>         
  
  <button type="button" class="nav-item btn btn-outline-secondary p-1 my-2 my-0 hvr-icon-wobble-horizontal" onclick="" id="lgout" >Logout <i class="fas fa-sign-out-alt hvr-icon"></i></a>
  </div>            
</nav>

<script type="text/javascript">      
      
        showclock();          
      
      $(function() {
        $('#acct_btn').on('click', function(){
            $('#acct').modal('show');             
        });

        $('[data-toggle="tooltip"]').tooltip();
      });
      
      /* if(<?php /* echo $log; */?>){
        $('#hme').show();
        $('#prtl').show();
        $('#acct_btn').show();
        $('#usr').show();
        $('#lgout').show();
        $('#lgin').hide();
      }
      else{
        $('#hme').hide();
        $('#prtl').hide();
        $('#acct_btn').hide();
        $('#usr').hide();
        $('#lgout').hide();
        $('#lgin').show();
      } */

      
</script>

<div class="modal hide fade in" data-keyboard="false"  role="dialog" id="acct">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">USER INFO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">                  
                  <div class="container-fluid">

                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Name</b>:</label>
                      </div>
                      <div class="col-sm-9">
                        <span><?php echo $_SESSION['text']; ?></span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Email:</b></labe>
                      </div>
                      <div class="col-sm-9">
                        <span>
                        <?php
                         if(isset($_SESSION['email'])) {
                          echo $_SESSION['email'];
                        }
                        ?>
                        </span>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <label><b>Authority:</b></label>
                      </div>
                      <div class="col-sm-9">
                      <span>
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
                      </span>
                      </div>
                    </div>

                  </div>     
                </div>
                <div class="modal-footer">
                  <a class="btn btn-info" href="/1_MES/_php/change_pass.php">Change Password</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>

<script src="/1_mes/_includes/authentication.js"></script>