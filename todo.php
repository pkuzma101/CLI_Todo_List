<?php

// Create array to hold list of todo items
$items = array("let out dalek", "eat dinner");

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
        if($upper == true) {
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

 function openFile($filename) {
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        $contentArray = explode("\n", $contents);
        fclose($handle);
        return $contentArray;
 }

 do {
// The loop!
    // echo the list produced by the function
    echo listItems($items);
   	// show the menu options
    echo "(N)ew item, (O)pen file, (R)emove item, (S)ort, (Q)uit  : ";	
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
                    //Move new item to the front of the list
                    array_unshift($items, $newItem); 
            }
                else {
                    //Move new item to the back of the list
                    array_push($items, $newItem);
            }
            break;

        case 'O':
            echo "Enter name of file to be opened" . PHP_EOL;
            $name = getInput();
            echo "Opening $name..." . PHP_EOL;
                $arrayToAdd = openFile($name);
                $items = array_merge($items, $arrayToAdd);
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

            // Sort the list
        case 'S':
            $items = sortMenu($items);
            break;

            // Removes first item on the list
        case "F": 
            array_shift($items);
            break;

            // Removes last item on the list
        case "L":
            array_pop($items);
            break;

        // Exit when input is (Q)uit
        case 'Q':
            // Say Goodbye!
            echo "Goodbye!" . PHP_EOL;
            
    }
}while($input != "Q");
    // Exit with 0 errors
    exit(0);
?>