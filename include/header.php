<div class="w3-container">
  <div class="col-sm-3">
    <div class="logo-holder">
      <span class="menu-toggle">
        <i class="fa fa-bars"></i>
      </span>
      <a href="<?php echo BASE_URL . "home" ?>" class="sitename-tag">| Circlepanda</a>
      <script src="<?php echo BASE_URL . "asset/js/circlepanda.js" ?>"></script>

    </div>
  </div>
  <div class="col-sm-5">
    <form action="#searchbot" method="post" target="_self">
      <input type="search" class="search" id="searchbot" name="q" placeholder="Search Circlepanda">
    </form>
    <section class="result hide">

    </section>
  </div>
  <div class="col-sm-4 padd-left">
    <div class="icon-holder">
      <?php
        if($i = $analytics->realCount($conn, "dash_whatsnew") > 0) {
          echo '<span class="icon-counter">' . $i . '</span>';
        } else {
          echo NULL;
        }
      ?>
      <i class="material-icons sm-ico wn" title="What's New">lightbulb_outline</i>
      <!-- Whats new space -->
      <span class="dropdown-whatsnew hide">
        <p class="head">What's New</p>
        <hr>
        <?php
          $wn = "SELECT * FROM dash_whatsnew ORDER BY new_id DESC";
          $result = mysqli_query($conn, $wn);
          while ($whatsnew = mysqli_fetch_array($result)) {
          $whatsnew_row = sprintf(
          '<span class="whatsnew-caption">
            <div class="w3-container">
              <a href="../#%s" class="heading-new">' . $whatsnew['whatsnew'] . '</a>
              <p>' . $whatsnew['what_desc'] /*substr($whatsnew['what_desc'])*/ . '</p>
            </div>
          </span>',
          $whatsnew['new_id']);
          echo $whatsnew_row;
          }
        ?>
      </span>

      <i class="material-icons sm-ico nwmsg" title="Chat History">chat</i>

      <span class="dropdown-message hide">
        <p class="head">New messages</p>
        <hr>
      </span>

      <?php
        $notif = "SELECT count(*) FROM notification WHERE user_id = $user_id and seen = 0";
        $result = mysqli_query($conn, $notif);
        $row = mysqli_fetch_array($result);
        $not_count = $row[0];
        if ($not_count > 0) {
          echo '<span class="icon-counter">' . $not_count . '</span>';
        } else {
          # Show nothing
        }
      ?>

      <i class="material-icons sm-ico notif" title="Notification">notifications</i>
      <span class="n-tint-bottom-layer"></span>
      <span class="n-tint-top-layer">
      <span class="general-notif">
        <p class="head"> New Notifications <span class="float-right close-notif"><i class="material-icons">clear</i></span></p>
        <hr>

        <?php
          # Build the SELECT statement
          $fetch_notif =
          "SELECT * FROM notification WHERE user_id='$user_id' ORDER BY activity_id DESC";
          # Run the query
          $result = mysqli_query($conn, $fetch_notif);
          while ($notif = mysqli_fetch_array($result)) {
          echo '<div class="notif-holder">
            <div class="col-sm-2">
              <img src="'.BASE_URL . 'uploads/dp/'. idtodp($conn, $notif['your_id']) .'" class="dp w3-circle float-left" alt="Display Picture">
            </div>
            <div class="col-sm-7">
              <a href="'.BASE_URL . 'friend/'.$notif['your_id'].'" class="heading-new">@'.$notif['username'].'</a>
              <span>'.$notif['message'].'</span>
            </div>
            <div class="col-sm-3">
              <time>'. time_elapsed_string($notif['action_date']) .'</time>
            </div>
          </div>';
          }
          ?>
      </span>
    </span>

      <span class="holder-mini-menu">
        <img src="<?php echo $profile_pic_id; ?>" class="dp-big w3-circle" alt="<?php echo $last_name ?>">
        <div class="status">
          <i class="img-circle" id="on"></i>
        </div>
        <span class="drop-down-profile">
          <img src="<?php echo BASE_URL . "asset/images/svgs/tooltip.svg" ?>" class="up-arrow">
          <a href="<?php echo BASE_URL . "profile" ?>" class="a_option"> <i class="fa fa-user"></i> Profile</a>
          <a href="<?php echo BASE_URL . "setting"?>" class="a_option"> <i class="fa fa-cog"></i> Setting</a>
          <a href="<?php echo BASE_URL . "module/logout"?>" class="a_option"> <i class="fa fa-power-off"></i> Logout</a>
        </span>
      </span>
    </div>
  </div>
</div>

<!-- Script Space -->

<script src="<?php echo BASE_URL . "asset/js/hangout/chat.js" ?>"></script>
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/material/iconfont/material-icons.css" ?>">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/hangout/chat.css" ?>" media="screen">
<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/hangout/chatcall.css" ?>" media="screen">
<script src="<?php echo BASE_URL . "asset/js/hangout/message.js" ?>"></script>
<script type="text/javascript">
  var msg = 'We\'re Hiring Developers Ruby, C++, Java, Erlang and Node.js' + '. Click link if you\'re in <?php echo BASE_URL . "about/career" ?>';
  console.log(msg);
</script>
