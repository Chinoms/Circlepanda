$(".btn-accept").on('click', function(){
  event.preventDefault();
  var all = $(".tint-bottomlayer1, .tint-toplayer1, .intro-container");
  $.ajax({
      type: "POST",
      url: "module/home_tour.php",
      data: {},
      success: function(data) {
        // if successful hide modal
        all.fadeOut(500);
        console.log(data);
      }
  });
});
