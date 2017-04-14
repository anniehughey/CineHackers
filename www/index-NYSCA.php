<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
  <title>Welcome to Cornell Cinema</title>

  
  
  <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />

  
  <meta http-equiv="Content-Language" content="en-us" />

  
  <link rel="stylesheet" type="text/css" href="styles/CineHome-4a.css" />

</head><body>
<div id="mainwrapper">
<div id="header"><img src="images/cinema-linear-red.gif" alt="Cornell Cinema" height="60" width="750" /></div>
<div id="nav2">
<ul>
  <li><a href="schedule-full-LateSpring2011.html">Films by
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
</div>
<div id="columnswrapper">
<div id="content">
<div id="series-list">
<ul>
  <p>late spring 2011 series</p>
  <li> <a href="series_LateSpring2011/charlie_chaplin.html">Charlie
Chaplin</a></li>
  <li> <a href="series_LateSpring2011/foreign_language_film_co.html">Best
Foreign Language Film Contenders</a></li>
  <li> <a href="series_LateSpring2011/global_icons.html">Global Icons</a></li>
  <li> <a href="series_LateSpring2011/international_women_lovi.html">International
Women Loving Women</a></li>
  <li> <a href="series_LateSpring2011/leechangdong_x2.html">Lee Chang
Dong x 2</a></li>
  <li> <a href="series_LateSpring2011/fantastic_film_friday.html">Fantastic
Film Friday</a></li>
  <li> <a href="series_LateSpring2011/cornell_alums_make_movie.html">Cornell
Alumns Make Movies</a></li>
  <li><a href="series_LateSpring2011/popular_hits.html">Popular Hits!</a></li>
  <p>and more!</p>
</ul>
</div>
<!--end of series-list-->
<div id="contentinner"><br />
<h3 class="urgent">Special Guests this Week!</h3>
<br />
<p style="font-weight: bold;">Society Fellow Kay Dickinson introduces <a href="LateSpring2011/television_pilot_for_an_.html">Television Pilot
for an Egyptian Air Hostess Soap Opera</a>, Wednesday at 7:00<br />
<br />
</p>
<p style="font-weight: bold;">Personal Documentarian Doug Block '75
presents a FREE screening of <a href="LateSpring2011/kids_grow_up.html">The
Kids Grow Up</a>, Thursday at 7:15<br />
<br />
</p>
<p style="font-weight: bold;">Entomology Professor Bryan Danforth
introduces <a href="LateSpring2011/queen_of_the_sun_what_ar.html">Queen
of the Sun: What are the bees telling us?</a>, Friday at 7:15<br />
</p>
<h3><br />
</h3>
<h3><a href="info/jobs/cinemajobs_apr11.html">Summer Positions
Available at Cornell Cinema!</a></h3>
<br />
<h3>SAVE MONEY: <a href="info/newatcinema.html">The Cornell Cinema
Six-Pass!</a></h3>
<h3 class="urgent">USE YOUR CORNELL CARD AT THE WSH BOX
OFFICE AND CONCESSION STAND!</h3>
</div>
<!--end of contentinner--> </div>
<div id="nav">
<div id="hilites"> <img src="images/40th-slug.gif" /> <a href="series_latespring2011/guests-latespring-11.html">
<h2>special guests &amp; events</h2>
<p> filmmakers,
live music and more</p>
</a><a href="press/press.html">
</a>
<h2><a href="press/press.html">Press Releases</a></h2>
<p><a href="press/press.html">download press
releases from Cornell Cinema</a>
</p>
<h2><a href="nysca/index.html">NYSCA Panelists</a></h2>
</div>
<br />
<!-- BEGIN: Constant Contact Basic Opt-in Email List Form -->
<p>Enter your email for weekly updates from
Cornell Cinema:</p>
<form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style=""><input name="m" value="1102308223609" type="hidden" /><input name="p" value="oi" type="hidden" /><input name="ea" size="15" value="" style="border: 1px solid rgb(153, 153, 153); font-size: 10pt;" type="text" /> <input name="go" value="Go" class="submit" style="font-family: Verdana,Geneva,Arial,Helvetica,sans-serif; font-size: 10pt;" type="submit" /></form>
<!-- END: Constant Contact Basic Opt-in Email List Form -->
<br />
<a href="http://www.facebook.com/pages/Cornell-Cinema/215249100528"><img style="border: 0px solid ; width: 100px; height: 28px;" alt="" src="images/Facebook_Badge.gif" /></a><br />
<a href="http://twitter.com/cornellcinema"><img style="border: 0px solid ; width: 100px; height: 25px;" alt="" src="images/Twitter_logo.gif" /></a><br />
<br />
<a href="wordoftheday.html">*</a><br />
</div>
<!--end of nav-->
<div id="rightcolumn">
<div id="schedule">
<h2 style="color: white;">NOW SHOWING</h2>
<?php $subject = 0;
	$start_date = 1;
	$start_time = 2;
	$end_date = 3;
	$end_time = 4;
	$all_day_event = 5;
	$description = 6;
	$location = 7;
	
	$today = strtotime("04/18/11");
		
	for ($c = 0; $c < 3; $c++) {
		$day = $today + 60*60*24*$c;
		echo "<h4>" . strtoupper(date("l", $day)) . " <br /> " . date("F j", $day) . "</h4>\n";
		$mdy = date("m/d/y", $day);
		if (($handle = fopen("calendar_LateSpring2011/cal_full.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000)) !== FALSE) {
				if (trim($data[$start_date]) == $mdy) {
					echo "<div class=\"showing\">\n";
					echo "<p><a class=\"title\" href=\"" . $data[$description] . "\">" . $data[$subject] . "</a></p>\n";
					echo "<p>" . $data[$start_time] . " - " . $data[$location] . "</p>\n";
					echo "</div>\n";
				}
			}
		}
	}
	echo "<br>";
	fclose($handle);
?>
</div>
<!--end of hilites-->
<div id="filmsites"> <img src="images/trailers-3.gif" title="selected trailers" alt="selected trailers" height="53" width="144" /><br />
<br />
<h3>trailers for this week's films</h3>
<ul>
  <li><a href="http://www.foxsearchlight.com/blackswan/">Black Swan</a></li>
  <li><a href="http://www.ifcfilms.com/uncategorized/enter-the-void-2">Enter
the Void</a></li>
  <li><a href="http://kingsspeech.com/">The King's Speech</a></li>
  <li><a href="http://www.nostringsattachedmovie.com/#/video/">No
Strings Attached</a></li>
  <li><a href="http://tadrart.com/tessalit/horslaloi/outsidethelaw.html">Outside
the Law</a></li>
  <li><a href="http://www.kino.com/poetry/">Poetry</a></li>
  <li> <a href="http://trailers.apple.com/trailers/independent/thetaqwacores/">The
Taqwacores</a></li>
  <li><a href="http://www.truegritmovie.com/">True Grit</a></li>
</ul>
</div>
<!--end of filmsites--> </div>
<!--end of rightcolumn div-->
</div>
<!--end of columnswrapper-->
<div class="clearthis"><!--the clearing div to force the footer under the columns--></div>
<div id="footer">
<ul>
  <li><a href="schedule-full-LateSpring2011.html">Films by
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
  <li>© 2006&#8212;2010 Cornell Cinema - R. Haarstad</li>
</ul>
</div>
<!--end of footer--></div>

<!--end mainwrapper-->
</body></html>