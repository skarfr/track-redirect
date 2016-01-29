# Track & Redirect
This php script allows you to create specific URLs on your domain and to redirect them to their final destination. Before doing the redirection, this script will record visitors data using your own Google Analytics tracking system.
It is basically the same principle as url shorteners except that you own the URL, and traffic information are linked to your Analytics account only.

### Examples
* John Doe wants to add on his linkedIn profile, a link to his pdf resume. Using this script, he will be able to redirect an url such as http://johndomain.doe/resume to the exact pdf location, and track all visits on his Google Analytics account.
* John Doe wants to share his gitHub address on his blog. Using this script, he will be able to redirect an url such as http://johndomain.doe/github to his real gitHub address, and track all visits on his Google Analytics account.

### Requirements
* URL Rewriting enabled on your web server
* PHP knowledge
* A Google Analytics account
* spin.min.js from https://fgnass.github.io/spin.js/

### How does it works ?
* To create URLs on your domain and link them to "redirect.php", you must edit the file ".htaccess". If your URL is http://johndomain.doe/lolilol, then you must add "|lolilol" at the "RewriteRule" line, within existing parenthesis. I provided few examples in the file.
* To setup your URL redirection, you must edit the file "redirect.php". All you have to do is edit/add a "case" within the "switch". I provided few examples in the file.
* To enable Google Analytics tracking, you must replace the tracking code "UA-xxxxxxxx-1" with your own. This code is provided by Google Analytics itself.
* While waiting for the redirection, the script will display a spinning loading wheel. This javascript comes from https://fgnass.github.io/spin.js/. Thanks.
* This script use the Event Tracking system from Google Analytics. More info: https://developers.google.com/analytics/devguides/collection/analyticsjs/events

### Demo
If you visit the page http://skar.fr/github, you will be redirected to this github profile, and i should have a record of your visit in my Google Analytics
