<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Your word to translate to Pig Latin:
    <input type="text" name="txtName" />
    <input type="submit" name="btn" value="Submit" />
</form>

<?php

# main function to return modified input
function convertPig($input) {
	#regex to match on initial consonants
	if (preg_match("/^[^aeiouAEIOU]/", $input)) {
		$pig = initial_cons($input);	
	#regex to match on initial vowel
	} else if (preg_match("/^aeiouAEIOU/", $input)) {
		$pig = initial_vowel($input);	
		
	}	
	return $pig;
	
}

#function to deal with initial consonants including cluster q
function initial_cons($input) {
	if (preg_match("/^qu/", $input)) {
		$pig = substr($input,2);
		$pig .= "quay";		
	} else {
		$pig = substr($input, 1);
		$consonant = substr($input,0,1);
		$pig .= $consonant;
		$pig .= "ay";			
	}
	return $pig;	
}

#function to deal with initial vowel
function initial_vowel($input) {
	$pig = $input;
	$pig .= "ay";
	return $pig;	
}


$input = $_GET["txtName"];


 
echo $message = convertPig($input);




?>