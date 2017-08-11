function ajaxUpdate()
{
  $.ajax({
      type: "POST",
      url: "module/active.php",
      data: {},
      success: function(data) {
        // console.log(data);
      }
  });
}

function updateOnlineStatus()
{
    ajaxUpdate();
    $(".status").html('<i class="img-circle" id="on"></i>');
    // document.getElementById("status").innerHTML = "User is online";
}

function updateOfflineStatus()
{
    ajaxUpdate()
    $(".status").html('<i class="img-circle" id="off"></i>');
    // document.getElementById("status").innerHTML = "User is offline";
}

window.addEventListener('online',  updateOnlineStatus);
window.addEventListener('offline', updateOfflineStatus);
