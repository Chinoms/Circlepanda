<?php
  include_once '../app/connect.php';
  include_once '../module/userdata.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Circlepanda Career</title>
    <?php
    include_once '../metas/external_seo.php';
    $desc = "Circlepanda is offering you the chance to come be part of something great.";
    $keyword = "Circlepanda, Social, Jobs, Career, Work, Opportunity, Team, Employments, Staff, Open Source, Community, Creativity, Fun, Memories, Ideas, Status, Colorful, Family, Friends, Panda, Circle, Group, Partner, People, Blue, Simple, Search, Tools, Images, API, More";
    echo seoMeta($desc, $keyword);
    ?>
    <link rel="icon" href="<?php echo BASE_URL . "asset/images/circlepanda-fa-icon.png" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/fontawesome/css/font-awesome.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/about/about.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/pace.css"; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.css"?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/w3.css" ?>">
    <script type="text/javascript" src="<?php echo BASE_URL . "asset/js/countries.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/jquery.min.js"; ?>"></script>
  </head>
  <body>
    <style media="screen">
      .cr {
        color : #116293;
      }
    </style>
    <?php
      include_once 'menu.php';
    ?>

    <section class="halfbanner fullbanner bg-blue" style="background: url('<?php echo BASE_URL . "asset/images/career-banner.jpg" ?>') no-repeat; background-size: cover;">
      <div class="left-holder negative">
        <h1> Career? </h1>
        <p> Want to be part of something great? </p>
      </div>
    </section>

    <section class="fullbanner bg-grey w3-container">
      <div class="w3-center w3-padding-24">
        <h1>Come work with us!</h1>
        <p>With offices all around the world, we're constantly hiring. Check out our current vacancies below:</p>
      </div>
      <div class="center-holder">
        <!--
        <div class="ui secondary pointing menu">
          <a class="active item">
            Nigeria
          </a>
          <a class="item">
            Morocco
          </a>
          <a class="item">
            Zambia
          </a>
        </div>
        -->
        <div class="w3-container">
          <?php
            $getcareers = "SELECT * FROM career_opportunity ORDER BY career_id ASC LIMIT 6";
            $result = mysqli_query($conn, $getcareers);
            while ($row = mysqli_fetch_array($result)) {
              echo '<div class="w3-col s12 m4">
                <div class="careerbox w3-left" style="border-color: '.$row['career_color'].';">
                  <span class="head">'.$row['career_title'].'</span>
                  <span class="tag">'.$row['career_app'].'</span>
                  <p>
                    '.$row['career_about'].'
                  </p>
                  <button class="ui secondary basic button fluid more_info" data-id="'.$row['career_id'].'">More about this job</button>
                </div>
              </div>';
            }
          ?>
        </div>
        <div class="w3-center w3-padding-24"></div>
      </div>
    </section>

    <!-- Career Modal -->
    <section class="modal-more hide">
      <!-- Job Description -->
      <span class="modal-more-left">
        <span class="ins head">Loading title...</span>
        <span class="ins tag">Loading tag...</span>
        <p>
          Loading bio...
        </p>
        <!-- <table class="ui basic table fixed">
          <thead>
            <tr>
              <th> Requirements </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="vertical-align: top;"><strong>Node Js</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><strong>Angular Js</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><strong>React Js</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><strong>Pure Css</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><strong>Responsiveness</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><strong>Documentations</strong></td>
              <td><i class="checkmark icon"></i></td>
            </tr>
          </tbody>
        </table>-->
          <!--<ul>
            <strong>Requirements</strong>
            <li>Semantic Ui</li>
            <li>React Js</li>
            <li>Angular Js</li>
            <li>Colors</li>
            <li>Responsiveness</li>
            <li>Documentations</li>
          </ul>-->
      </span>
      <!-- Application Form -->
      <form class="ui form modal-more-right" action="<?php echo BASE_URL . "module/applycareer" ?>" method="post" enctype="multipart/form-data">
        <div class="report ui field"></div>
        <div class="ui input small field w3-col s12 m12">
          <input type="hidden" name="id" class="id">
          <input type="text" name="name" class="name" placeholder="Fullname" autofocus>
        </div>
        <div class="ui input small field w3-col s12 m12">
          <input type="text" name="email" class="email" placeholder="Email">
        </div>
        <div class="ui input small field w3-col s12 m12">
          <select class="gender ui search dropdown" name="gender" required="required">
            <optgroup class="gender">
    					<option value="gender">Gender</option>
    					<option value="male">Male</option>
    					<option value="female">Female</option>
    				</optgroup>
          </select>
        </div>
        <div class="ui input small field w3-col s12 m12">
          <select class="country ui search dropdown" name="country" id="country" required="required">
            <optgroup>
	            <option value="Select Country">Select Country</option>
             </optgroup>
          </select>
        </div>
        <div class="ui input small field w3-col s12 m12">
          <select class="state ui search dropdown" name="state" id="state" required="required">
            <optgroup>
	            <option value="Select State">Select State</option>
            </optgroup>
          </select>
        </div>
        <div class="ui input small field w3-col s12 m12">
          <input type="text" name="url" class="url" placeholder="Website">
        </div>
        <div class="ui input small field w3-col s12 m12">
          <textarea name="about" class="about" placeholder="Describe yourself" maxlength="1000"></textarea>
        </div>
        <!--<div class="ui input small field w3-col s12 m12">
          <button class="ui blue button" type="button">
    				<label class="myLabel dp-btn">
    				  <span>
    				  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    					<input type="file" name="cv" class="cv hide">
    					  <i class="fa fa-camera"></i> upload cv
    				  </span>
    				</label>
    			</button>
        </div>-->
        <div class="w3-center field">
          <button type="submit" class="ui w3-grey w3-hover-blue large button" name="send">Apply</button>
        </div>
      </form>
    </section>
    <!--<section class="halfbanner fullbanner bg-blue">
      <div class="center-holder w3-center">
        <h1> What we're doing? </h1>
        <p>
            Our team is small, but we've already got a couple of hands on deck,
          several major open source contributors, as well as amateur web designers,
          graphics designers, content writers, Legal personels, data analyst, and marketers.

          We're kinda like a warehouse commune that's building something crazy and
          wonderful around web, only we're getting paid to do it, which is really the best
          possible scenario.
        </p>
      </div>
    </section>

    <section class="fullbanner bg-grey">
      <div class="center-holder w3-center">
        <h1> What you'll love about working here </h1>
        <p class="black">
            You'll work with talented, passionate people in one of the most exciting and
          vibrant cities on Earth. What's more, we take care of our own. Here are just a few of
          the perks we're proud to offer.
        </p>
      </div>
    </section>-->

    <?php
      include_once '../footer.php';
    ?>
    <script language="javascript">
	    populateCountries("country","state");
    </script>
    <script src="<?php echo BASE_URL . "asset/plugins/semantic-ui/semantic.min.js"?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/about.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/owl.carousel.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/nicescroll.js" ?>"></script>
    <script src="<?php echo BASE_URL . "asset/js/pace.min.js" ?>" charset="utf-8"></script>
    <script async src="<?php echo BASE_URL . "asset/js/wow.js"; ?>"></script>
  </body>
</html>
