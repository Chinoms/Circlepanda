/*--- Update Profile Using Ajax ---*/

  $(".worknedu-switch").on("submit", function(){
    event.preventDefault();
    var wr_at = $(".wr_at").val();
    var wr_frm = $(".wr_frm").val();
    var wr_to = $(".wr_to").val();
    var wr_as = $(".wr_as").val();
    var sch_at = $(".sch_at").val();
    var sch_frm = $(".sch_frm").val();
    var sch_to = $(".sch_to").val();
    $.ajax({
      type: "POST",
      url: "module/updateuserinfo.php",
      data: 'wr_at='+ wr_at +'&wr_frm='+ wr_frm +'&wr_to='+ wr_to +'&wr_as='+ wr_as +'&sch_at='+ sch_at+'&sch_frm='+ sch_frm+'&sch_to='+ sch_to+'&pos='+1,
      cache: false,
      success: function(data){
        if (data == "success") {
          $(".update-report").html('<div class="alert alert-success text-center" role="success">\
  				     <strong>Hehe!</strong> Successfully updated your info .\
  				</div>');
        } else {
          $(".update-report").html('<div class="alert alert-danger text-center" role="alert">\
  				     <strong>Oh snap!</strong> Didn\'t get your work and education data.\
  				</div>');
        }
      }
    });
  });

  $(".contact-switch").on("submit", function(){
    event.preventDefault();
    var hm_address = $(".hm_address").val();
    var fb_url = $(".fb_url").val();
    var instagram_url = $(".instagram_url").val();
    var twitter_url = $(".twitter_url").val();
    $.ajax({
      type: "POST",
      url: "module/updateuserinfo.php",
      data: 'hm_address='+ hm_address+'&fb_url='+ fb_url+'&instagram_url='+ instagram_url+'&twitter_url='+ twitter_url+'&pos='+2,
      cache: false,
      success: function(data){
        if (data == "success") {
          $(".update-report").html('<div class="alert alert-success text-center" role="success">\
  				     <strong>Hehe!</strong> Successfully updated your info .\
  				</div>');
        } else {
          $(".update-report").html('<div class="alert alert-danger text-center" role="alert">\
  				     <strong>Oh snap!</strong> get your contact data right and try again.\
  				</div>');
        }
      }
    });
  });

  $(".photo-switch").on("submit", function(){
    event.preventDefault();
  });

  $(".relationship-switch").on("submit", function(){
    event.preventDefault();
    var relationship = $(".relationship").val();
    var looking = $(".looking").val();
    $.ajax({
      type: "POST",
      url: "module/updateuserinfo.php",
      data: 'relationship='+ relationship+'&looking='+ looking+'&pos='+3,
      cache: false,
      success: function(data){
        if (data == "success") {
          $(".update-report").html('<div class="alert alert-success text-center" role="success">\
  				     <strong>Hehe!</strong> Successfully updated your info .\
  				</div>');
        } else {
          $(".update-report").html('<div class="alert alert-danger text-center" role="alert">\
  				     <strong>Oh snap!</strong> get it right and try again.\
  				</div>');
        }
      }
    });
  });

  $(".about-switch").on("submit", function(){
    event.preventDefault();
    var url = $(".url").val();
    var self_bio = $(".self_bio").val();
    $.ajax({
      type: "POST",
      url: "module/updateuserinfo.php",
      data: 'url='+ url+'&self_bio='+ self_bio+'&pos='+4,
      cache: false,
      success: function(data){
        if (data == "success") {
          $(".update-report").html('<div class="alert alert-success text-center" role="success">\
               <strong>Hehe!</strong> Successfully updated your profile .\
          </div>');
        } else {
          $(".update-report").html('<div class="alert alert-danger text-center" role="alert">\
               <strong>Oh snap!</strong> we didn\'t get that data about you.\
          </div>');
        }
      }
    });
  });
