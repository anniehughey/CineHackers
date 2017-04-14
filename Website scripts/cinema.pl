#!/usr/local/bin/perl

#	File: cinema.pl
#	©2011 Matthew Low for Cornell Cinema
#	©2000 Mike Solomon for Cornell Cinema
#	Common utility functions for all other Cornell Cinema perl scripts
#	Functions:
#		DbgPrint			-- Prints formatted debug statements
#		VerifyDateRange		-- Parses input argument as date range
#		ReadFlicksheetData	-- Parses flicksheet.dat into global arrays
#		ReadAdvpubData 		-- Parses advpub.dat into global arrays
#		ReadLeisureData		-- Parses leisure.dat into global arrays
#		Formatting functions [Chars, Title, Time, Color, Minutes, Hours, Filenames...]

use Date::Manip;
$TZ = 'EST';  # needed to define timezone for Date::Manip module

# global data :-)


# exported file from FileMaker
$FLICKSHEETDATAFILE = 'flicksheet.dat';
$ADVPUBDATAFILE = 'advpub.dat';
$LEISUREDATAFILE = 'leisure.dat';

@aDate;
@aMovieFile;
@aTitle;
@aTime;
@aLocation;
@aDirector;
@aCast;
@aYear;
@aColor;
@aHrs;
@aMins;
@aCountry;
@aPremier;
@aSeries;
@aCosponsor;
@aBlurb;
@aSubtitled;
@aWebsite;
@aFormat;

# for AdvPub
@aDates;
@aTimes;
@aLocations;
@aDescription;


sub DbgPrint
{
  if ($DEBUG)
  {
    foreach my $str (@_)
    {
      print $str;
    }

    print "\n";
  }
}


sub VerifyDateRange
{
	my ($sDateRange) = @_;

	if ($sDateRange == undef)
	{
	  print "Enter the date range: (eg 5/1/2000 - 5/31/2000)\n";
	  $sDateRange = <STDIN>;
	}

	$sDateRange || die "No date range specified.\nFailed";

	my ($sStartDate, $sEndDate) = split(/[ ]*-[ ]*/,$sDateRange);

	return (ParseDate($sStartDate), ParseDate($sEndDate));
}

# ReadFlicksheetData
# reads tab-delimited export file from FileMaker
# inserts data into global arrays defined previously
# must specify the start and end dates
# returns size of those arrays

sub ReadFlicksheetData
{
  # get start and end dates
  my ($sStartDate, $sEndDate) = @_;

  DbgPrint("Reading data from $FLICKSHEETDATAFILE...");

	# open the text database of movies
	open (INFILE, $FLICKSHEETDATAFILE) || die "Could not find file $FLICKSHEETDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	my $i = 0;
	
	$/ = "\015"; #New Line character
	
	#DbgPrint("Newline char: $/.");
	#print unpack "H*", "$/";

	while (<INFILE>)
 	{
		chomp;  # changed from chop - just to be safe

		my ($sDate,$sTitle,$sTime,$sLocation,$sDirector,$sCast,$sBlurb,$sYear,$sColor,$sHrs,$sMins,$sCountry,$sPremier,$sSeries,$sCosponsor, $sSubtitled, $sWebsite, $sFormat) = split(/\t/,$_,18);

		my ($sThisDate) = ParseDate($sDate);

		# check to see if this show date is within our spec'd bounds
		next if ($sThisDate lt $sStartDate);
		next if ($sThisDate gt $sEndDate);

		# ok, add movie to our global arrays
		$aDate[$i]	  	= ParseDate($sDate);
		$aTitle[$i]		  = FixTitle(FixChars($sTitle));
		$aTime[$i]			= FixTime($sTime);
		$aLocation[$i]	= $sLocation;
		$aDirector[$i]	= FixChars($sDirector);
		$aCast[$i]			= FixChars($sCast);
		$aYear[$i]	    = $sYear;
		$aColor[$i]	  	= FixColor($sColor);
		$aHrs[$i]		  	= $sHrs;
		$aMins[$i]			= $sMins;
		$aCountry[$i]	  = $sCountry;

		$sPremier =~ tr/A-Z/a-z/;
		#$sSeries =~ tr/a-z/A-Z/;
		$sSubtitled =~ tr/A-Z/a-z/;
		#$sFormat =~ tr/a-z/A-Z/;
		
		$aPremier[$i]		= $sPremier;
		$aSeries[$i]		= $sSeries; 
		$aCosponsor[$i] = $sCosponsor;
		$aBlurb[$i]		  = FixChars($sBlurb);
		$aSubtitled[$i]	= $sSubtitled; 
		$aWebsite[$i]	= $sWebsite;
		$aFormat[$i]	= $sFormat; 

		$i++;
	}

	close INFILE;

	DbgPrint('done.');

	return $i;
}

# Same as ReadFlicksheetData, except titles are unformatted so alphabetizing is correct
sub ReadFlicksheetDataNoFormat
{
  # get start and end dates
  my ($sStartDate, $sEndDate) = @_;

  DbgPrint("Reading data from $FLICKSHEETDATAFILE...");

	# open the text database of movies
	open (INFILE, $FLICKSHEETDATAFILE) || die "Could not find file $FLICKSHEETDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	my $i = 0;

	$/ = "\015"; #New Line character

	while (<INFILE>)
 	{
		chomp;  # changed from chop - just to be safe

		my ($sDate,$sTitle,$sTime,$sLocation,$sDirector,$sCast,$sBlurb,$sYear,$sColor,$sHrs,$sMins,$sCountry,$sPremier,$sSeries,$sCosponsor, $sSubtitled, $sWebsite, $sFormat) = split(/\t/,$_,18);

		my ($sThisDate) = ParseDate($sDate);

		# check to see if this show date is within our spec'd bounds
		next if ($sThisDate lt $sStartDate);
		next if ($sThisDate gt $sEndDate);

		# ok, add movie to our global arrays
		$aDate[$i]	  	= ParseDate($sDate);
		$aTitle[$i]		  = FixChars($sTitle);
		$aTime[$i]			= FixTime($sTime);
		$aLocation[$i]	= $sLocation;
		$aDirector[$i]	= FixChars($sDirector);
		$aCast[$i]			= FixChars($sCast);
		$aYear[$i]	    = $sYear;
		$aColor[$i]	  	= FixColor($sColor);
		$aHrs[$i]		  	= $sHrs;
		$aMins[$i]			= $sMins;
		$aCountry[$i]	  = $sCountry;
		
		$sPremier =~ tr/A-Z/a-z/;
		#$sSeries =~ tr/a-z/A-Z/;
		$sSubtitled =~ tr/A-Z/a-z/;
		#$sFormat =~ tr/a-z/A-Z/;
		
		$aPremier[$i]		= $sPremier;
		$aSeries[$i]		= $sSeries; 
		$aCosponsor[$i] = $sCosponsor;
		$aBlurb[$i]		  = FixChars($sBlurb);
		$aSubtitled[$i]	= $sSubtitled; 
		$aWebsite[$i]	= $sWebsite;
		$aFormat[$i]	= $sFormat; 

		$i++;
	}

	close INFILE;

	DbgPrint("done processing $i films.");

	return $i;
}

# Same as ReadFlicksheetData, except titles are unformatted so alphabetizing is correct, and it includes dates on the back side of the flick sheet
sub ReadFlicksheetDataNoFormatSubDateRange
{
  # get start and end dates
  my ($sStartDate, $sEndDate, $sStartDateBig, $sEndDateBig) = @_;

  DbgPrint("Reading data from $FLICKSHEETDATAFILE...");

	# open the text database of movies
	open (INFILE, $FLICKSHEETDATAFILE) || die "Could not find file $FLICKSHEETDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	my $i = 0;
	my %aHash;

	$/ = "\015"; #New Line character

	while (<INFILE>)
 	{
		chomp;  # changed from chop - just to be safe

		my ($sDate,$sTitle,$sTime,$sLocation,$sDirector,$sCast,$sBlurb,$sYear,$sColor,$sHrs,$sMins,$sCountry,$sPremier,$sSeries,$sCosponsor, $sSubtitled, $sWebsite, $sFormat) = split(/\t/,$_,18);

		my ($sThisDate) = ParseDate($sDate);

		# check to see if this show date is within our spec'd bounds
		next if ($sThisDate lt $sStartDate);
		next if ($sThisDate gt $sEndDate);

		#Add title to the hash - ie it is screened within smaller date range
		$aHash{FixChars($sTitle)} = 1;

	}

	close INFILE;
	
	#Done IDing films that are screened within restrictive range, adding film dates for these films that are within larger range...
	open (INFILE, $FLICKSHEETDATAFILE) || die "Could not find file $FLICKSHEETDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	while (<INFILE>)
 	{
	
		chomp;  # changed from chop - just to be safe

		my ($sDate,$sTitle,$sTime,$sLocation,$sDirector,$sCast,$sBlurb,$sYear,$sColor,$sHrs,$sMins,$sCountry,$sPremier,$sSeries,$sCosponsor, $sSubtitled, $sWebsite, $sFormat) = split(/\t/,$_,18);

		my ($sThisDate) = ParseDate($sDate);

		# check to see if this show date is within our spec'd bounds
		next if (($sThisDate lt $sStartDateBig) && ($sThisDate gt $sEndDateBig));
		
		$sTitle = FixChars($sTitle);
		
		if (exists($aHash{$sTitle}))  # Only add film if it is in the hash, ie is screened in small date range
		{
			# ok, add movie to our global arrays
			$aDate[$i]	  	= ParseDate($sDate);
			$aTitle[$i]		  = FixChars($sTitle);
			$aTime[$i]			= FixTime($sTime);
			$aLocation[$i]	= $sLocation;
			$aDirector[$i]	= FixChars($sDirector);
			$aCast[$i]			= FixChars($sCast);
			$aYear[$i]	    = $sYear;
			$aColor[$i]	  	= FixColor($sColor);
			$aHrs[$i]		  	= $sHrs;
			$aMins[$i]			= $sMins;
			$aCountry[$i]	  = $sCountry;
			
			$sPremier =~ tr/A-Z/a-z/;
			#$sSeries =~ tr/a-z/A-Z/;
			$sSubtitled =~ tr/A-Z/a-z/;
			#$sFormat =~ tr/a-z/A-Z/;
			
			$aPremier[$i]		= $sPremier;
			$aSeries[$i]		= $sSeries; 
			$aCosponsor[$i] = $sCosponsor;
			$aBlurb[$i]		  = FixChars($sBlurb);
			$aSubtitled[$i]	= $sSubtitled; 
			$aWebsite[$i]	= $sWebsite;
			$aFormat[$i]	= $sFormat; 
			
			$i++;
		}
		
	}
		
	close INFILE;

	DbgPrint("done processing $i films.");

	return $i;
}


sub ReadAdvPubData
{
  DbgPrint("Reading data from $ADVPUBDATAFILE...");

	open (INFILE, $ADVPUBDATAFILE) || die "Could not find file $ADVPUBDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	my $i = 0;
	
	$/ = "\015"; #New Line character
	#print unpack "H*", "$/";

	while (<INFILE>)
	{
		#chomp;

		#my ($sTitle,$sPremier,$sDates,$sTimes,$sLocations,$sYear,$sCountry,$sDirector,$sCast,$sDescription) = split(/\t/,$_,10);
		
		my ($sTitle,$sPremiere,$sDates,$sTimes,$sLocations,$sYear,$sCountry,$sDirector,$sCast,$sDescription,$sHrs,$sMins, $sSubtitled, $sWebsite, $sFormat) = split(/\t/,$_,15);

		chomp($sMins);  # Remove newline char from end
		
		$sPremiere
		=~ tr/A-Z/a-z/;
		
		$aTitle[$i] = FixTitle($sTitle);
		$aPremier[$i]		= $sPremiere;
		$aDates[$i]				= $sDates;
		$aTimes[$i]				= $sTimes;
		$aLocations[$i]		= $sLocations;
		$aYear[$i]				= $sYear;
		$aCountry[$i]			= $sCountry;
		$aDirector[$i]		= $sDirector;
		$aCast[$i]				= $sCast;
		$aDescription[$i]	= $sDescription;
		$aHrs[$i]					= $sHrs;
		$aMins[$i]				= $sMins;
		$sSubtitled =~ tr/A-Z/a-z/;
		$aSubtitled[$i]	= $sSubtitled; 
		$aWebsite[$i]	= $sWebsite;
		$aFormat[$i]	= $sFormat; 
		
		$i++;
		
#		print "$i:\t$aTitle[$i-1]\n";
#		print "Prem:\t$sPremier\n";
#		print "Dates:\t$sDates\n";
#		print "Times:\t$sTimes\n";
#		print "Locs:\t$sLocations\n";
#		print "Year:\t$sYear\n";
#		print "Coun:\t$sCountry\n";
#		print "Dir:\t$sDirector\n";
#		print "Cast:\t$sCast\n";
#		print "Desc:\t$sDescription\n";
#		print "Len:\t$sHrs hour(s) and $sMins minues\n\n";
	}

	close INFILE;

	DbgPrint('done.');

	return $i;
}

sub ReadLeisureData
{
  DbgPrint("Reading data from $LEISUREDATAFILE...");

	open (INFILE, $LEISUREDATAFILE) || die "Could not find file $LEISUREDATAFILE.\nPlease make sure it is in the same folder as this script.\nFailed";

	my $i = 0;

	while (<INFILE>)
	{
		chomp;

		my ($sTitle,$sPremier,$sDates,$sTimes,$sLocations,$sYear,$sCountry,$sDirector,$sCast,$sDescription,$sHrs,$sMins) = split(/\t/,$_,12);

		$aTitle[$i]				= FixTitle($sTitle);
		$aPremiere[$i]		= $sPremier;
		$aDates[$i]				= $sDates;
		$aTimes[$i]				= $sTimes;
		$aLocations[$i]		= $sLocations;
		$aYear[$i]				= $sYear;
		$aCountry[$i]			= $sCountry;
		$aDirector[$i]		= $sDirector;
		$aCast[$i]				= $sCast;
		$aDescription[$i]	= $sDescription;
		$aHrs[$i]					= $sHrs;
		$aMins[$i]				= $sMins;

		$i++;
	}

	close INFILE;

	DbgPrint('done.');

	return $i;
}



# FixChars
#
# returns input string with pesky characters removed

sub FixChars
{
	
	my ($str) = @_;
	$str =~ s/é/e/g;
	$str =~ s/è/e/g;
	$str =~ s/á/a/g;
	$str =~ s/ó/o/g;
	$str =~ s/ñ/n/g;
	$str =~ s/’/'/g;
	$str =~ s/”/"/g;
	$str =~ s/“/"/g;
	$str =~ s/‘/'/g;
	$str =~	s/—/ - /g;
	$str =~ s/…/.../g;
	$str =~ s///g;

	return $str;
} # end <FixChars>


# FixTitle
# prevents titles with commas from getting screwed up
#
# returns title with bizarre-ness dealt with

sub FixTitle
{
	my ($sTitle) = @_;
	my $article;

	$sOldTitle = $sTitle;
	
	($sTitle, $sArticle) = split(/,/,$sTitle);
	$sArticle =~ tr/A-Za-z0-9//cd;  # strips out white space

	if (($sArticle eq 'The') || ($sArticle eq 'Le')	|| ($sArticle eq 'La')	|| ($sArticle eq 'Les')	|| ($sArticle eq 'El') || ($sArticle eq 'Das') || ($sArticle eq 'A') || ($sArticle eq 'An'))
	{
		$sTitle = $sArticle . ' ' . $sTitle;
	}
	else
	{
		$sTitle = $sOldTitle; # In case we try to parse a title with a comma but no article
	}
	
	$sTitle =~ s/\(2nd\)//ig;

	return $sTitle;
} # end <FixTitle>


# FixTime
# replaces 12 o'clock with midnight
#
# returns time with bizarre-ness dealt with

sub FixTime
{
  my ($sTime) = @_;

	$sTime = 'midnight' if ($sTime eq '12:00');

	return $sTime;
} # end <FixTime>


# FixColor
#
# returns b&w or color

sub FixColor
{
  my ($sColor) = @_;
  
  $sColor =~ tr/A-Z/a-z/;

	$sColor = 'b&w' if ($sColor ne 'yes');

	$sColor = 'color' if ($sColor eq 'yes');

	return $sColor;
} # end <FixColor>


# Minutes
#
# returns the singular or plural form based on input

sub Minutes
{
  my ($sMinutes) = @_;

	if ($sMinutes == 1)
	{
		return 'minute';
	}
	else
	{
		return 'minutes';
	}
}

# Hours
#
# returns the singular or plural form based on input

sub Hours
{
  my ($sHours) = @_;

  if ($sHours == 1)
  {
		return 'hour';
	}
	else
	{
		return 'hours';
	}
}

# Mins
#
# returns the singular or plural abbreviated form based on input

sub Mins
{
  my ($sMinutes) = @_;

	if ($sMinutes == 1)
	{
		return 'min';
	}
	else
	{
		return 'mins';
	}
}

# Hrs
#
# returns the singular or plural abbreviated form based on input

sub Hrs
{
  my ($sHours) = @_;

  if ($sHours == 1)
  {
		return 'hr';
	}
	else
	{
		return 'hrs';
	}
}

# SplitFields
#
# returns array of entries in a recurring field

sub SplitFields	# at this point this is just gonna be a hack
{
  my ($sField) = @_;

  my $sVerticalTab = chr(29);

  my @aFields = split(/$sVerticalTab/,$sField);

  return @aFields;
}

# CreateFileName
#
# returns the filename for the movie file (one per film)

sub CreateFileName
{
	my ($sFileName) = @_;

	my $sArticle;
	
	#($sFileName) = split(/,/,$sFileName);   # forget the bits after a comma
	($sArticle, $sFileName) = split(/ /,$sFileName,2); # strip leading articles
	
	if (($sArticle eq 'The') || ($sArticle eq 'Le')	|| ($sArticle eq 'La')	|| ($sArticle eq 'Les')	|| ($sArticle eq 'El') || ($sArticle eq 'Das') || ($sArticle eq 'A') || ($sArticle eq 'An'))
	{
		$sFileName = $sFileName; # Do nothing
	}
	else
	{
		$sFileName = $sArticle . ' ' . $sFileName; # strip
	}
	
	$sFileName =~ s/ /_/ig;

	$sFileName =~ tr/a-zA-Z0-9_//cd;         # strip non-alphanumeric characters

	$sFileName = substr($sFileName,0,24);   # keep is short for the Mac

	$sFileName =~ tr/A-Z/a-z/;            # make link names lowercase

	$sFileName = $sFileName . '.html';

  return $sFileName;
}

sub CreateFileNameNoHtml
{
	my ($sFileName) = @_;

	my $sArticle;
	
	#($sFileName) = split(/,/,$sFileName);   # forget the bits after a comma
	($sArticle, $sFileName) = split(/ /,$sFileName,2); # strip leading articles
	
	if (($sArticle eq 'The') || ($sArticle eq 'Le')	|| ($sArticle eq 'La')	|| ($sArticle eq 'Les')	|| ($sArticle eq 'El') || ($sArticle eq 'Das') || ($sArticle eq 'A') || ($sArticle eq 'An'))
	{
		$sFileName = $sFileName; # Do nothing
	}
	else
	{
		$sFileName = $sArticle . ' ' . $sFileName; # strip
	}
	
	$sFileName =~ s/ /_/ig;

	$sFileName =~ tr/a-zA-Z0-9_//cd;         # strip non-alphanumeric characters

	$sFileName = substr($sFileName,0,24);   # keep is short for the Mac

	$sFileName =~ tr/A-Z/a-z/;            # make link names lowercase

  return $sFileName;
}

1;