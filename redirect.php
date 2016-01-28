<?php
/*
URL examples:
• http://mydomain.com/resume      will redirect to http://mydomain.com/John_Doe_RESUME_EN.pdf
• http://mydomain.com/curriculum  will redirect to http://mydomain.com/John_Doe_RESUME_FR.pdf
• http://mydomain.com/linkedin    will redirect to https://www.linkedin.com/in/johndoe
• http://mydomain.com/github      will redirect to https://github.com/skarfr
*/

$redirectCode   = strtolower($_GET['r']);
$redirectTo     = '';
$eventCategory  = '';
$eventAction    = '';
$eventLabel     = '';

switch ($redirectCode) {
  case 'resume':
    $redirectTo = 'http://mydomain.com/John_Doe_RESUME_EN.pdf';
    $eventCategory  = 'Pdf';
    $eventAction    = 'download';
    $eventLabel     = 'John Doe Resume EN';
    break;

  case 'curriculum':
    $redirectTo = 'http://mydomain.com/John_Doe_RESUME_FR.pdf';
    $eventCategory  = 'Pdf';
    $eventAction    = 'download';
    $eventLabel     = 'John Doe Resume FR';
    break;

  case 'linkedin':
    $redirectTo   = 'https://www.linkedin.com/in/johndoe';
    $eventCategory  = 'Web';
    $eventAction    = 'visit';
    $eventLabel     = 'John Doe LinkedIn EN';
    break;

  case 'github':
    $redirectTo     = 'https://github.com/skarfr';
    $eventCategory  = 'Web';
    $eventAction    = 'visit';
    $eventLabel     = 'John Doe gitHub';
    break;

  default:
    $redirectTo = 'http://mydomain.com/404'; //404 not found
    break;
}

$analytics = <<<EOF
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-xxxxxxxx-1', 'auto');
  ga('send', 'pageview'); 
  ga('send', {
    hitType: 'event',
    eventCategory: '$eventCategory',
    eventAction: '$eventAction',
    eventLabel: '$eventLabel',
    hitCallback : function() { window.location = "$redirectTo" }
  }); 
EOF;
?>

<html>
  <head>
    <script>
      <?php echo $analytics; ?>
    </script>
    <script>
      //if doNotTrack or adblock is enabled: Google analytics won't load and it wont redirect
      //although we can not track, we try to redirect after 2 seconds
      setTimeout(function () { window.location = "<?php echo $redirectTo; ?>"}, 2000);
    </script>
    <script src="spin.js"></script>
    
    <!-- if the client doesn't have javascript, we try to redirect through meta refresh -->
    <noscript>
      <meta http-equiv="refresh" content="0;URL=<?php echo $redirectTo; ?>" />
    </noscript>
  </head>

  <body style="background-color:#575B6B;">
    <div id="spinner"></div>
    <script>
    //The loading spin is from: https://fgnass.github.io/spin.js/
    var opts = {
        lines: 15 // The number of lines to draw
      , length: 0 // The length of each line
      , width: 16 // The line thickness
      , radius: 47 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#FFFFFF' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 37 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1.2 // Rounds per second
      , trail: 82 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: false // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
      };
      var target = document.getElementById("spinner");
      var spinner = new Spinner(opts).spin(target); 
    </script>
  </body>
</html>