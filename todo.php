<?php

// Create array to hold list of todo items
$items = array("let out dalek", "play final fantasy", "eat dinner", "do homework");
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

 function sortMenu($items) {
    echo "(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered: ";
        $input = getInput(true);
            if($input == "A") {
                asort($items);
            }
            elseif($input == "Z") {
                arsort($items);
            }
            elseif($input == "O") {
                ksort($items);
            }
            elseif($input == "R") {
                krsort($items);
            }
        return $items;
 }
 do {
// The loop!
    // echo the list produced by the function
    echo listItems($items);
   	// show the menu options
    echo "(N)ew item, (R)emove item, (S)ort, (Q)uit  : ";	
    	// Display each item and a newline
    $input = getInput(true);
    // Get the input from user
    // Use trim() to remove whitespace and newlines and strtoupper to make all letters work
    // Check for actionable input
    switch($input) {

        case 'N':
            // Ask for entry
            echo 'Enter item: ';
            // Add entry to list array
            $newItem = trim(fgets(STDIN));
            echo "Add this item to (B)eginning or (E)nd of list?";
            $choice = getInput();
                if($choice == "B") {
                    array_unshift($items, $newItem); 
            }
                else {
                    array_push($items, $newItem);
            }
            break;

        case 'R':
            // Remove which item?
            echo 'Enter item number to remove: ';
            // Get array key
            $key = trim(fgets(STDIN));
            // Decrement the numbers when you remove entries in the to do list
            $key--;
            // Remove from array
            unset($items[$key]);
            break;

        case 'S':
            $items = sortMenu($items);
            break;

        case "F": 
            array_shift($items);
            break;
    
        case "L":
            array_pop($items);
        // Exit when input is (Q)uit
        case 'Q':
            // Say Goodbye!
            echo "Goodbye!" . PHP_EOL;
            // Exit with 0 errors
            
    }
}while($input != "Q");

    exit(0);
?>