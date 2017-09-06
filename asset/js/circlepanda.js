function ajaxUpdate($status)
{
  $.ajax({
      type: "POST",
      url: "module/active.php",
      data: "status=" + $status,
      success: function(data) {
        // console.log(data);
      }
  });
}

function updateOnlineStatus()
{
    ajaxUpdate(1);
    $(".status").html('<i class="img-circle" id="on"></i>');
    // document.getElementById("status").innerHTML = "User is online";
}

function updateOfflineStatus()
{
    ajaxUpdate(0)
    $(".status").html('<i class="img-circle" id="off"></i>');
    // document.getElementById("status").innerHTML = "User is offline";
}

window.addEventListener('online',  updateOnlineStatus);
window.addEventListener('offline', updateOfflineStatus);
