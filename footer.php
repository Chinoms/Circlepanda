<link rel="stylesheet" href="<?php echo BASE_URL . "asset/css/footer.css"?>">

<footer>
  <div class="footer-center-holder padding-lr w3-padding-70">
    <div class="w3-col s12 m3">
      <ul>
        <a href="#"> <li class="blue"> Circlepanda </li> </a>
        <li> <a href="<?php echo BASE_URL . "about/" ?>">About</a> </li>
        <li> <a href="<?php echo BASE_URL . "about/career" ?>">Career</a> </li>
        <li> <a href="<?php echo BASE_URL . "about/blog" ?>">Blog</a> </li>
        <li> <a href="<?php echo BASE_URL . "about/team" ?>">Team</a> </li>
        <li> <a href="<?php echo BASE_URL . "support/" ?>">FAQ</a> </li>
      </ul>
    </div>
    <div class="w3-col s12 m3">
      <ul>
        <a href="#"> <li class="pink"> Using Circepanda </li> </a>
        <li> <a href="<?php echo BASE_URL . "developer/api" ?>">Api</a> </li>
        <li> <a href="<?php echo BASE_URL . "developer/tool" ?>">Tools</a> </li>
        <li> <a href="<?php echo BASE_URL . "developer/" ?>">Developer</a> </li>
        <li> <a href="<?php echo BASE_URL . "ad/" ?>">Create Ad</a> </li>
        <li> <a href="<?php echo BASE_URL . "sitemap" ?>">Sitemap</a> </li>
        <li> <a href="<?php echo BASE_URL . "support/feedback" ?>">Feedback</a> </li>
      </ul>
    </div>
    <div class="w3-col s12 m3">
      <ul>
        <a href="#"> <li class="yellow"> Legal </li> </a>
        <li> <a href="<?php echo BASE_URL . "legal/privacy" ?>">Privacy</a> </li>
        <li> <a href="<?php echo BASE_URL . "legal/policy" ?>">Policies</a> </li>
        <li> <a href="<?php echo BASE_URL . "legal/cookie" ?>">Cookies</a> </li>
        <li> <a href="<?php echo BASE_URL . "legal/security" ?>">Security</a> </li>
        <li> <a href="<?php echo BASE_URL . "legal/" ?>">Terms of service</a> </li>
      </ul>
    </div>
    <div class="w3-col s12 m3">
      <form class="ui form fluid w3-center" action="<?php echo BASE_URL . "module/subscribe_news" ?>" method="post">
        <div class="ui input small w3-col s12">
          <input type="text" name="newslaters" class="news ui fluid" placeholder="Subscribe Email">
        </div>
        <div class="wi input w3-col s12 w3-padding-8">
          <button class="ui primary button">Subscribe</button>
        </div>
      </form>

      <div class="w3-center w3-padding-12">
        <a href="https://www.facebook.com/teamcirclepanda/" class="ui circular facebook icon button">
          <i class="facebook icon"></i>
        </a>
        <a href="https://twitter.com/TeamCirclepanda" class="ui circular twitter icon button">
          <i class="twitter icon"></i>
        </a>
        <a href="https://plus.google.com/collection/Ec6vNE" class="ui circular google plus icon button">
          <i class="google plus icon"></i>
        </a>
      </div>
    </div>
  </div>

  <section class="footer-bottom">
    <div class="w3-container w3-padding-8 w3-col s12 m3">
      <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL . "asset/images/circlepanda-logo.png" ?>" alt="Circlepanda logo"></a>
      <span class="legal-footer w3-right w3-padding-12"> Copyright <script>document.write(new Date().getFullYear())</script>. All rights reserved </span>
    </div>
  </section>

</footer>
