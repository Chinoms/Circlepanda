//this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};
//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;
//arrays of popups ids
var popups = [];

//this is used to close a popup
function close_popup(id)
{
    for(var iii = 0; iii < popups.length; iii++)
    {
        if(id == popups[iii])
        {
            Array.remove(popups, iii);
            document.getElementById(id).style.display = "none";
            calculate_popups();
            return;
        }
    }
}

//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups()
{
    var right = 220;
    var iii = 0;
    for(iii; iii < total_popups; iii++)
    {
        if(popups[iii] != undefined)
        {
            var element = document.getElementById(popups[iii]);
            element.style.right = right + "px";
            right = right + 255;
            element.style.display = "block";
        }
    }

    for(var jjj = iii; jjj < popups.length; jjj++)
    {
        var element = document.getElementById(popups[jjj]);
        element.style.display = "none";
    }
}
//creates markup for a new popup. Adds the id to popups array.
function register_popup(id, name)
{
    for(var iii = 0; iii < popups.length; iii++)
    {
        //already registered. Bring it to front.
        if(id == popups[iii])
        {
            Array.remove(popups, iii);
            popups.unshift(id);
            calculate_popups();
            return;
        }
    }
    var element = '<form class="popup-box chat-popup" id="'+ id +'" onload="chatRefresh();">';
    element = element + '<div class="popup-head">';
    element = element + '<div class="popup-head-left">'+ name +'</div>';
    element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
    element = element + '<div style="clear: both"></div></div>\
    <div class="popup-messages"> </div>\
    <div class="popup-footer">\
    <input type="text" id="m" placeholder="Type a Message" class="popup-text">\
    <span class="ico-icon"><i class="fa fa-camera"></i></span>\
    <span class="ico-icon"><i class="fa fa-map-marker"></i></span>\
    <span class="ico-icon"><i class="fa fa-microphone"></i></span>\
    <span class="ico-icon"><i class="fa fa-smile-o"></i></span>\
    </div>\
    </form>';
    document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;
    popups.unshift(id);
    calculate_popups();

    $('.chat-popup').on('submit', function(){
    	event.preventDefault();
    	var msgField = $('#m');
    	var msg = msgField.val();
    	$.ajax({
    			type: "POST",
    			url: "module/hangout/msg.php",
    			data: "msg="+ msg +"&id="+ id,
    			success: function(data) {
    				console.log(data);
    				msgField.val('');
    			}
    	});
    });

    function chatfetch(participant_id) {
      $.ajax({
    			type: "POST",
    			url: "module/hangout/fetchchat.php",
    			data: "participant_id="+ participant_id,
    			success: function(data) {
            $(".popup-messages").html(data);
            console.log(data);
    			}
    	});
    }

    setInterval(function(){
        chatfetch(id);
    }, 1000);

}

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups()
{
    var width = window.innerWidth;
    if(width < 540)
    {
        total_popups = 0;
    }
    else
    {
        width = width - 200;
        //320 is width of a single popup box
        total_popups = parseInt(width/320);
    }
    display_popups();
}
//recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);
