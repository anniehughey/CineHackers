<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title>Welcome to Cornell Cinema</title>

   
  <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />

  
  <meta http-equiv="Content-Language" content="en-us" />

  
  <link rel="stylesheet" type="text/css" href="styles/CineHome-new.css" /></head><body>
<div id="mainwrapper">

<div id="columnswrapper">
 <div id="mainsection">
<div id="top">
<img src="images/web-latespring11-splash.jpg"  id="webimage" width="476" height="444" />


<div id="home-ident">
<img src="images/40th-slug.gif" width="144" height="147" />
<br />
<!-- BEGIN: Constant Contact Basic Opt-in Email List Form -->
<p>Enter your email for weekly updates from
Cornell Cinema:</p>
<form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style=""><input name="m" value="1102308223609" type="hidden" /><input name="p" value="oi" type="hidden" /><input name="ea" size="15" value="" style="border: 1px solid rgb(153, 153, 153); font-size: 10pt;" type="text" /> <input name="go" value="Go" class="submit" style="font-family: Verdana,Geneva,Arial,Helvetica,sans-serif; font-size: 10pt;" type="submit" /></form>
<!-- END: Constant Contact Basic Opt-in Email List Form -->
<br />
<a href="http://www.facebook.com/pages/Cornell-Cinema/215249100528"><img src="images/Facebook_Badge.gif"  alt="" width="100" height="28" /></a><br />
<a href="http://twitter.com/cornellcinema"><img src="images/Twitter_logo.gif" alt="" width="100" height="25" /></a><br />


</div><!--end of home-ident-->

 </div><!--end of top-->
 <div id="main-text">
<h2>Special Guests this Week!</h2>
<h3>Academy Award-winning screenwriter David Seidler '59 presents <a href="LateSpring2011/kings_speech.html">The King's Speech</a> Tues Apr 12 @ 8:00, WSH</h3>
 <p> <strong>SOLD OUT &mdash; Call 607-255-3522 to be put on the Wait List</strong>
</p>

<h3><a href="LateSpring2011/taqwacores.html">The Taqwacores</a>, Wed Apr 13 @ 7:00, WSH <br />
introduced by Society Mellon Graduate Fellow Lawrence Chua</h3>

<h3><strong>SAVE MONEY: </strong><a href="info/newatcinema.html">The Cornell Cinema Six-Pass!</a></h3>



<h2>USE YOUR CORNELL CARD AT THE WSH BOX
OFFICE AND CONCESSION STAND!</h2>

 </div><!--end of main-text-->
 </div><!--end of mainsection-->
 <div id="nav">
 <img src="images/cc-logo-rev.gif" alt="Cornell Cinema" height="109" width="260" />
<ul>
  <li><a href="schedule-LateSpring2011.html">Films by
Date</a></li>
  <li><a href="alphalisting_LateSpring2011.html">Films
by Title</a></li>
  <li><a href="info/tickets.html">Prices</a></li>
  <li><a href="info/venues.html">Venues</a></li>
  <li><a href="info/cornell_map.html">Parking</a></li>
  <li><a href="info/info.html">About Us</a></li>
  <li><a href="info/giving.html">Donate</a></li>
  <li> <a href="info/contact.html">Contact Us</a></li>
  <li><a href="cnypg/index.html" title="Central New York Programmers Group">CNYPG</a></li>
  <li><a href="http://theatrefilmdance.cornell.edu/academics/film/index.cfm">Film
@ CU</a></li>
</ul> 
<br />
<a href="wordoftheday.html">*</a>
</div><!--end of nav-->

<div id="rightcolumn">
<div id="schedule">
<h2 style="color:white">NOW SHOWING</h2>
<?php
	$subject = 0;
	$start_date = 1;
	$start_time = 2;
	$end_date = 3;
	$end_time = 4;
	$all_day_event = 5;
	$description = 6;
	$location = 7;
	
	$today = time();
		
	for ($c = 0; $c < 3; $c++) {
		$day = $today + 60*60*24*$c;
		echo "<h4>" . strtoupper(date("l", $day)) . " <br /> " . date("F j", $day) . "</h4>\n";
		$mdy = date("m/d/y", $day);
		if (($handle = fopen("calendar_LateSpring2011/cal_full.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000)) !== FALSE) {
				if (trim($data[$start_date]) == $mdy) {
					echo "<span class=\"showing\">\n";
					echo "<p><a class=\"title\" href=\"" . $data[$description] . "\">" . $data[$subject] . "</a></p>\n";
					echo "<p>" . $data[$start_time] . " - " . $data[$location] . "</p>\n";
					echo "</span>\n";
				}
			}
		}
	}
	echo "<br>";
	fclose($handle);
?>
</div>


<!--end of schedule-->


<div id="filmsites"> 

<h2>trailers </h2>
<h3>for this week's films</h3>
<ul>
<li><a href="http://www.foxsearchlight.com/blackswan/">Black Swan</a></li>
<li><a href="http://www.ifcfilms.com/uncategorized/enter-the-void-2">Enter the Void</a></li>
<li><a href="http://kingsspeech.com/">The King's Speech</a></li>
<li><a href="http://www.nostringsattachedmovie.com/#/video/">No Strings Attached</a></li>
<li><a href="http://tadrart.com/tessalit/horslaloi/outsidethelaw.html">Outside the Law</a></li>
<li><a href="http://www.kino.com/poetry/">Poetry</a></li>
<li> <a href="http://trailers.apple.com/trailers/independent/thetaqwacores/">The Taqwacores</a></li>
<li><a href="http://www.truegritmovie.com/">True Grit</a></li>
</ul>
</div><!--end of filmsites-->


<div id="hilites">

 
<h2><a href="series_latespring2011/guests-latespring-11.html">special guests &amp; events</a></h2>
<p>  filmmakers,
live music and more</p>

<h2><a href="press/press.html">Press Releases</a></h2>
<p>download press
releases from Cornell Cinema</p>
<h2><a href="nysca/index.html">NYSCA Panelists</a></h2>
</div>
<!--end of hilites-->
 </div><!--end of rightcolumn div-->
</div><!--end of columnswrapper-->
<div class="clearthis"></div><!--the clearing div to force the footer under the columns-->
<div id="footer">
<ul>
  <li><a href="schedule-LateSpring2011.html">Films by
Date</a></li>
  <li><a href="alphalisting_LateSpring2011.html">Films
by Title</a></li>
  <li><a href="info/tickets.html">Ticket Prices</a></li>
  <li><a href="info/venues.html">Venues</a></li>
  <li><a href="info/cornell_map.html">Parking</a></li>
  <li><a href="info/info.html">About Us</a></li>
  <li> <a href="info/contact.html">Contact Us</a></li>
  <li><a href="cnypg/index.html" title="Central New York Programmers Group">CNYPG</a></li>
  <li><a href="http://theatrefilmdance.cornell.edu/academics/film/index.cfm">Film
@ Cornell</a></li>
</ul>
<ul class="fineprint">
  <li>© 2006&#8212;2011 Cornell Cinema - R. Haarstad</li>
</ul>
</div><!--end of footer-->


</div><!--end mainwrapper-->
</body></html>