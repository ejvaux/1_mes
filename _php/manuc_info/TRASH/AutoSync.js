
//var int=setInterval(SyncToProdOutputSystem, 5000);
function SyncToProdOutputSystem()
{

  $.ajax({
          method:'POST',
          url:'/1_mes/_php/manuc_info/CloningResults.php',
          global:false,
          success: function(data) 
          {

          }
          
});
}



var int=setInterval(JOSyncToProdOutputSystem, 5000);
function JOSyncToProdOutputSystem()
{

  $.ajax({
          method:'POST',
          url:'/1_mes/_php/manuc_info/SyncToProductionOutputDb.php',
          global:false,
          success: function(data) 
          {

            
          }
          
});
}
