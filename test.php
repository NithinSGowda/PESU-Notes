<?php 

function is_pdf ( $file ) { 
	$file_content = file_get_contents( $file ); 
	
	if ( preg_match( "/^%PDF-[0-1]\.[0-9]+/", $file_content ) ) { 
		return true; 
	} 
	else { 
		return false; 
	} 
} 

function create_preview ( $file ) { 
	$output_format = "jpeg"; 
	$antialiasing = "4"; 
	$preview_page = "1"; 
	$resolution = "120"; 
	$output_file = $_GET["file"].".jpg"; 

	$exec_command = "gs -dSAFER -dBATCH -dNOPAUSE -sDEVICE=" . $output_format . " "; 
	$exec_command .= "-dTextAlphaBits=". $antialiasing . " -dGraphicsAlphaBits=" . $antialiasing . " "; 
	$exec_command .= "-dFirstPage=" . $preview_page . " -dLastPage=" . $preview_page . " "; 
	$exec_command .= "-r" . $resolution . " "; 
	$exec_command .= "-sOutputFile=" . $output_file . " '" . $file . "'"; 

	echo "Executing command...\n"; 
	exec( $exec_command, $command_output, $return_val ); 
	
	foreach( $command_output as $line ) { 
		echo $line . "\n"; 
	} 

	if ( !$return_val ) { 
        echo "Preview created successfully!!\n";
        echo "<br><img src=\"content/Profile.pdf.jpg\">"; 
	} 
	else { 
		echo "Error while creating the preview.\n"; 
	} 
} 

function __main__() { 

	$input_file = $_GET["file"]; 

	if ( is_pdf( $input_file ) ) { 
		// Create preview for the pdf 
		create_preview( $input_file ); 
	} 
	else { 
		echo "The input file " . $input_file . " is not a valid PDF document.\n"; 
	} 
} 

__main__(); 
	
?> 
