<?php
/**
 * The template for displaying search results pages
 * WordPress includes a search.php by default, overwrite with the below function
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
?>

<?php
if(isset($_GET['search-type'])) { //Here we use an IF statement to check if the $_GET variable (within the URL) contains the search-type value
    $type = $_GET['search-type']; //Save the $_GET statement to a $type variable. This makes the code easier to read, but is not necessary.
    if($type == 'searchtype') { //If the search-type ($type) variable = searchtype. Replace searchtype with the search type or term you would like to associate with this search.
        load_template(TEMPLATEPATH . '/searchresults.php'); //Load the seach results template.
    } elseif ($type == 'othersearchtype')  { //Can define a second search term
        load_template(TEMPLATEPATH . '/othersearchresults.php'); //Load the seach results template.
    } else { //Insert else statement if the above is not met.

    }
}
?>