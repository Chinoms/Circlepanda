$(".div-category").on('click', function(){
	$(this).addClass('active');
	var i = $(this).closest(".div-category").find('h4').text();
	$(".interest").val(i);
	$(document).ready(function(){
	    $.ajax({
	        type: "POST",
	        url: "module/interest.php",
	        data: "interest=" + i,
	        success: function(data) {
	           console.log(data);
	        }
	    });
	});
});

$(".see-more").on('click', function(){
	event.preventDefault();
	$(".more-category").fadeIn(500);
	$(this).hide(500);
});
