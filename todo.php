<?php

// Create array to hold list of todo items
$items = array();
 //List array items formatted for CLI
 function listItems($list) {
    $string = "";
    foreach($list as $key => $item) {
        $key++;
        $string .="[{$key}] {$item}" . PHP_EOL;
    }

    return $string;
 }

 function getInput($upper = false) {
    $input = trim(fgets(STDIN));
        if($upper = true) {
            $input = strtoupper($input);
        }
    return $input;
 }
// The loop!
do {
    // echo the list produced by the function
    echo listItems($items);
   	// show the menu options
    echo "(N)ew item, (R)emove item, (Q)uit : ";	
    	// Display each item and a newline
    $input = getInput(true);
    // Get the input from user
    // Use trim() to remove whitespace and newlines and strtoupper to make all letters work
    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = trim(fgets(STDIN));
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
        // Decrement the numbers when you remove entries in the to do list
        $key--;
        // Remove from array
        unset($items[$key]);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);





?>