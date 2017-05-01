#!/usr/local/bin/perl

#	File: advpub.pl
#	©2011 Matthew Low for Cornell Cinema
#	©2000 Mike Solomon for Cornell Cinema
#	Produces formatted advanced publicity text data for a given range of films
#	Input:	advpub.dat, advpub.tmpl
#	Output: advpub.txt

#use Date::Manip;

require 'cinema.pl';

# constants
$FILENAME = 'advpub.txt';
$TEMPLATE = 'advpub.tmpl';
$DEBUG = 1;

my $sDateRange = shift || undef;

my ($sStartDate, $sEndDate) = VerifyDateRange($sDateRange);

DbgPrint("Date range: $sStartDate - $sEndDate");

my $sNumFilms = ReadAdvPubData($sStartDate, $sEndDate);

print "Found $sNumFilms films.\n";

WriteAdvPub($sNumFilms, $sStartDate, $sEndDate);

exit(0);


# subroutines

sub WriteAdvPub
{
	my ($sNumFilms, $sStartDate, $sEndDate) = @_;

	my $sContent = '';
	
	DbgPrint("Writing $FILENAME...");
	

	for (my $i = 0; $i < $sNumFilms; $i++)
	{
		my $sPremier = 'Ithaca Premiere' if (@aPremier[$i] eq 'yes');
		
		my @aShowDates = SplitFields($aDates[$i]);
		my @aShowTimes = SplitFields($aTimes[$i]);
		my @aShowLocations = SplitFields($aLocations[$i]);
		
		my $sNumShowings = @aShowDates;
    
		my $sShowTimes;
    
		my $sNumTabs = 0;
	
		# Calculate tabs needed to generate even spacing with variable length date strings
		for (my $j = 0; $j < $sNumShowings; $j++)
		{
			use integer; # We want integer division

			$sUnixDate = UnixDate (ParseDate ($aShowDates[$j]), "%A, %B %e");
			$sUnixDate =~ s/  / /ig; # Remove redundant spaces from single digit days
			$sTempTabs = length ($sUnixDate);
			{
				use integer;
				$sTempTabs = $sTempTabs / 4;
			}
			$sTempTabs += 1;
			$sNumTabs = $sTempTabs if ($sTempTabs > $sNumTabs);
		}
	
		for (my $j = 0; $j < $sNumShowings; $j++)
		{
			my $sDate = ParseDate($aShowDates[$j]);
      
			# FIXME
			# do we want these lines?
			# if so, we may have to re-order the records in the database ourselves
			#
			next if ($sDate lt $sStartDate);
			next if ($sDate gt $sEndDate);
			
			$sShowTimes = $sShowTimes . "\n";
			$sUnixDate = UnixDate ($sDate, "%A, %B %e");
			$sUnixDate =~ s/  / /ig;
			$sTempTabs = length ($sUnixDate);
			{
				use integer;
				$sTempTabs = $sTempTabs / 4;
			}
			$sTempTabs += 1;
			$sTempTabs = $sNumTabs - $sTempTabs;
			$sTabs = "\t" if ($sTempTabs == 0);
			$sTabs = "\t" if ($sTempTabs == 1);
			$sTabs = "\t\t" if ($sTempTabs == 2);
			$sTabs = "\t\t\t" if ($sTempTabs == 3);
			$sTabs = "\t\t\t\t" if ($sTempTabs == 4);
			$sShowTimes = $sShowTimes . $sUnixDate;
			$sShowTimes = $sShowTimes . $sTabs . $aShowTimes[$j] . "\t" . $aShowLocations[$j];
		}
		$sShowTimes = substr($sShowTimes, 1); # chop the first \n
		
		$sShowTimes =~ s/  / /ig; # Remove double spaces
    	
		open (INFILE, $TEMPLATE) || die "Could not find file $TEMPLATE.\nPlease make sure it is in the same folder as this script.\nFailed";
	
		while (<INFILE>)
		{
			chomp;
		  
			if (s/:::blankline::://ig)
			{
				$sContent = $sContent . "\n"; # This added a redundant line return . "\n";
				next;
			}
			
			$sHrs = Hrs($aHrs[$i]);
			$sMins = 'min'; # Mins($aMins[$i]); -- Per request, using min, not mins
			
			s/:::title:::/$aTitle[$i]/ig;
			s/:::showtimes:::/$sShowTimes/ig;
			s/:::cast:::/$aCast[$i]/ig;
			s/:::director:::/$aDirector[$i]/ig;
			s/:::year:::/$aYear[$i]/ig;
			s/:::country:::/$aCountry[$i]/ig;
			s/:::description:::/$aDescription[$i]/ig;
			s/:::premier:::/$sPremier/ig;
			s/:::hrs:::/$aHrs[$i]/ig;
			s/:::mins:::/$aMins[$i]/ig;
			s/:::hr:::/$sHrs/ig;
			s/:::min:::/$sMins/ig;
			
			($aSubtitled[$i] eq 'yes') ? s/:::subtitled:::/ Subtitled./ig : s/:::subtitled::://ig;
			
			if (length($aWebsite[$i]) > 0)
			{
				s/:::website:::/ More at $aWebsite[$i]/ig;
			} else {
				s/:::website::://ig;
			}
			chomp $aFormat[$i];
			s/:::format:::/ $aFormat[$i]/ig;
      
			$sContent = $sContent . $_ . "\n" unless ($_ eq '');
		}
    
		close INFILE;
	}
	
	$sContent = FixChars($sContent);
	
	open (OUTFILE, ">$FILENAME");
	MacPerl::SetFileInfo('MSWD', 'TEXT', $FILENAME) if ($MACOS);
	print OUTFILE $sContent;
	close OUTFILE;
	
	DbgPrint('done.');
} # end <WritePubData>
