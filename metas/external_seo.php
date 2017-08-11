<?php
  function seoMeta($desc, $keyword) {
    $meta = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="'. $desc .'">
    <meta name="keywords"  content="'. $keyword .'">
    <meta name="author" content="Precious Tom">
    <meta name="revisit-after" content="1 day">
    <meta name="robots" content="index, follow">
    <meta property="og:site_name" content="www.circlepanda.com">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="oCSHljxejmzb_Th2saT_HmnVfkuqkIytczxfzVXrM5I">
    <meta name="msvalidate.01" content="A062C888B57D8D07F7CD2B3E6DDD3084">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta property="fb:app_id" content="1764963443768629">
  	<meta property="og:type" content="website">
  	<meta name="fragment" content="!">
  	<meta name="distribution" content="global">
  	<meta name="rating" content="general">
  	<meta name="apple-mobile-web-app-title" content="circlepanda">
  	<meta name="application-name" content="circlepanda">
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="'. BASE_URL .' metas/sitemap.xml">
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "http://www.circlepanda.com",
      "logo": "http://www.circlepanda.com/asset/images/circlepanda-logo.png",
      "contactPoint": [{
        "@type": "ContactPoint",
        "telephone": "+234-817-968-5649",
        "contactType": "customer service"
      }]
    }
    </script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : \'1764963443768629\',
          cookie     : true,
          xfbml      : true,
          version    : \'v2.8\'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, \'script\', \'facebook-jssdk\'));
    </script>

    <script>
      (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

      ga(\'create\', \'UA-85636302-1\', \'auto\');
      ga(\'send\', \'pageview\');
      </script>';
    return $meta;
  }
?>
