#!/usr/local/bin/perl

#	File:   flicksheet_titles.pl
#	©2011 Matthew Low for Cornell Cinema
#	©1999,2000 Mike Solomon for Cornell Cinema.  
#	Unauthorized reproduction prohibited.
#	Produces formatted flicksheet document
#	Input:	flicksheet.dat, flicksheet.tmpl
#	Output: flicksheet.txt

require 'cinema.pl';

# constants
$FILENAME = 'flicksheet.txt';
$TEMPLATE = 'flicksheet_new.tmpl';

$DEBUG = 1;
#$MACOS = ($^O eq 'MacOS') ? 1 : 0;
$OPTIONAL = '<optional>';  # string representing optional lines in the flicksheet

# get command line args
# this is mostly to aid debugging on other platforms that don't support Macperl'Ask

my $sDateRange = shift || undef;

my ($sStartDate, $sEndDate) = VerifyDateRange($sDateRange);

DbgPrint("Now enter the larger date range that includes the back side of the calendar.");

my ($sStartDateBig, $sEndDateBig) = VerifyDateRange();

DbgPrint("Date range: $sStartDate - $sEndDate");

DbgPrint("Full date range: $sStartDateBig - $sEndDateBig");

my $sNumFilms = ReadFlicksheetDataNoFormatSubDateRange($sStartDate, $sEndDate, $sStartDateBig, $sEndDateBig);

WriteFlicksheet($sNumFilms);

exit(0);


# subroutines

sub WriteFlicksheet
{
	my ($sNumFilms) = @_;

	my $sContent = '';
	
	my %aContent;
	
	DbgPrint("Writing $FILENAME...");
	
	my %hFirstShowDate;
	my $sLastDate;

	for (my $i = 0; $i < $sNumFilms; $i++)
	{
		# Movie is in associative array, so modify date
		if (exists($aContent{$aTitle[$i]}))
		{
			@{$aContent{$aTitle[$i]}}[0] = @{$aContent{$aTitle[$i]}}[0] . " " . $aDate[$i];
		}
		# Movie isn't in associative array yet, so add it
		else {
			
			$aContent{$aTitle[$i]} = [$aDate[$i], $aDirector[$i], $aCast[$i], $aBlurb[$i], $aYear[$i], $aColor[$i], $aHrs[$i], $aMins[$i], $aCountry[$i], $aPremier[$i], $aSeries[$i], $aCosponsor[$i], $aSubtitled[$i], $aWebsite[$i], $aFormat[$i]];
		}
	}
	
	foreach $title (sort keys %aContent)
	{
		
		@info = @{$aContent{$title}};
		
		my $sHrs = Hrs($info[6]);
		my $sMins = 'min'; # Mins($info[7]);  -- Per request, no plural mins
		
		my $fixTitle = FixTitle($title);
		
		# Format date
		$date = "";
		$month = "";
		@dates = split(/ /, $info[0]);
		@dates = sort(@dates);
		for (my $i = 0; $i < scalar @dates; $i++)
		{
			if ($month eq UnixDate($dates[$i], "%b"))
			{
				$date = $date . UnixDate($dates[$i], ", %e");
			}
			else {
				$date = $date . UnixDate($dates[$i], " %b %e");
				$month = UnixDate($dates[$i], "%b");
			}
		}
 		
		$date = substr($date, 1);
		$date =~ s/  / /ig;
		#$date = uc($date);  -- removed per request, Feb not FEB
		
		open(INFILE, $TEMPLATE) or die "Could not find file $TEMPLATE.\nPlease make sure it is in the same folder as this script.\nFailed";

		while (<INFILE>)
		{
			chomp;
		  
			if (s/:::blankline::://ig)
			{
				$sContent = $sContent . "\n";
				next;
			}
     						
			s/:::series:::/$info[10]/ig;
			
			$info[9] =~ tr/A-Z/a-z/;
			($info[9] eq 'yes') ? s/:::premiere:::/Ithaca Premiere/ig : s/:::premiere::://ig;
			
			s/:::dates:::/$date/ig;
			s/:::title:::/$fixTitle/ig;
			s/:::director:::/$info[1]/ig;
			s/:::cast:::/$info[2]/ig;
			s/:::blurb:::/$info[3]/ig;
			s/:::year:::/$info[4]/ig;
			s/:::color:::/$info[5]/ig;
			s/:::hrs:::/$info[6]/ig;
			s/:::hr_plural:::/$sHrs/ig;
			s/:::mins:::/$info[7]/ig;
			s/:::min_plural:::/$sMins/ig;
			s/:::country:::/$info[8]/ig;
			
			$info[12] =~ tr/A-Z/a-z/;

			($info[12] eq 'yes') ? s/:::subtitled:::/Subtitled./ig : s/:::subtitled::://ig;
			
			if (length($info[13]) > 0)
			{
				s/:::website:::/More at $info[13]/ig;
			} else {
				s/:::website::://ig;
			}
			s/:::format:::/$info[14]/ig;
				
			# we just want to eat the optional tag, not the whole line.
			s/$OPTIONAL//ig;
				
			$sContent = $sContent . $_ . "\n" unless ($_ eq '');
				
		}
		
	close INFILE;
	}
		

	open(OUTFILE, ">$FILENAME") or die "Could not find file $FILENAME.\nPlease make sure it is in the same folder as this script.\nFailed";
	MacPerl::SetFileInfo('MSWD', 'TEXT', $FILENAME) if ($MACOS);
  print OUTFILE $sContent;	
	close OUTFILE;
}
