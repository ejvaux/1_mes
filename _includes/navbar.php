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
    <span class="navbar-text mr-2" id="con" style="display:block;color:orange;" title='Database Connection'><i class="fas fa-plug"></i></span>
    <span class="navbar-text mr-2" id="" style="display:block">
      <a data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-link p-1 ml-sm-0 mr-1 hvr-icon-wobble-horizontal" href='#' onclick="" id="b_report" style="display:block;" title="Report Bug"><small class='text-muted'><i class="fas fa-bug"></i></small></a>
    </span>       
  
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

        $('#b_report').on('click', function(){
          $('#bugreportmod').modal('show');             
        });

        $('#r_message').on('keyup', function(){
          $('#char_length').html(1000 - $('#r_message').val().length + ' character/s left.');
        });

        $('#bugreportmod').on('submit','#bugreportform', function (e) {
          e.preventDefault();
          e.stopImmediatePropagation();
          /* alert($('#r_message').val()); */
          var formdata =  $('#bugreportform').serializeArray();
          formdata.push({name: 'action', value: 'insert'});
          $.ajax({
            type: 'POST',
            url: '/1_mes/database/table_handler/admin/bugreportsHandler.php',
            global:false,
            data: $.param(formdata),
            success: function (data) {      
              if(data==true){
                
                $('#bugreportform').trigger('reset');
                $('#bugreportmod').modal('hide');          
                
                iziToast.show({
                  title: 'SENT:',
                  message: 'Thank you for your feedback. Have a nice day!',
                  position: 'topCenter',
                  titleSize: '20px',
                  messageSize: '18px',
                  transitionIn: 'fadeInDown',
                  transitionOut:	'fadeOutUp',
                  timeout: 5000,
                  pauseOnHover: false
                });
              }
              else{
                alert(data);          
              }
            }
          });
        });
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

                try{
                  $auth = $_SESSION['auth'];
                  include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/connect.php";  

                      $sql = "SELECT USER_AUTHORITY FROM dmc_user_authority WHERE AUTHORITY_CODE = '$auth'";
                      $result = $conn->query($sql);
                      
                          while($row = $result->fetch_assoc()) {

                              echo $row['USER_AUTHORITY'];                           
                              
                          }
                      
                      $conn->close();
                }
                catch(Exception $e){
                  echo $e->getMessage();
                }                  

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

<!-- Bug Report Modal -->

    <div class="modal fade in" tabindex="-1" role="dialog" id='bugreportmod' data-backdrop="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bug Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id='bugreportform'>
          <div class="modal-body">
            <div class='container-fluid'>
                  <div class='row'>
                    <div class='col'>
                      <h5>Name: <small><?php echo $_SESSION['text'] ?></small></h5>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col'>
                      <h5>Message:</h5>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col'>
                      <textarea name='r_message' id='r_message' rows="4" cols="50" maxlength="1000" placeholder="Enter message here......"></textarea>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col mt-0 pt-0'>
                      <small class='text-muted' id='char_length'>1000 character/s left.</small>
                    </div>
                  </div>
            </div>
            
          </div>
          <div class="modal-footer">            
            <button type="submit" class="btn btn-primary">Send Report</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div> <!-- END Bug Report Modal -->

<script src="/1_mes/_includes/authentication.js"></script>