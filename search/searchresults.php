<?php
if( !empty( $_GET['searchcriteria'] ) ) { //If the searchcriteria value is within the url. If not, don't do the following.
    $search_criteria = $_GET['searchcriteria']; //Save the $_GET value for searchcriteria as a variable.
}
if( !empty( $_GET['s'] ) ) { //If keywords are being searched
    $search_term = $_GET['s']; //Save the $_GET value for keyword search as $search_term variable.
} 
?>