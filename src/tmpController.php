<?php

	include 'Tokens.php';
	include 'Metrics.php';
	
	$file = 'Function';
	
	$tokenizer = new Tokenizer();
	$tokenizer->setFile('./tests/test-files/' . $file . '.php');
	if ($tokenizer->getTokens()) echo 'Successfuly loaded tokens into file ' . $file . ".json\n";
	else {
		echo 'Couldnt save tokens into file ' . $file . ".json\nEnding now...\n";
		exit();
	}
	
	$metrics = new Metrics();
	if ($metrics->setFile('./tokens/' . $file . '.json')) echo 'Successfuly decode ' . $file . ".json\n";
	else {
		echo 'Couldnt decode file ' . $file . ".json\nEnding now...\n";
		exit();
	}
	
	// print tokens
	print_r($metrics->getContent());
	
	// print functions count
	$metrics->getMetrics();
	echo 'Number of functions in ' . $file . '.php = ' . $metrics->getFunctionCount() . "\n";
	echo 'Number of global variables in ' . $file . '.php = ' . $metrics->getGlobalVarCount() . "\n";
	echo 'Number of @ in ' . $file . '.php = ' . $metrics->getAtUsageCount() . "\n";	
	 
?>
