<?php
$current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Save the current url, if needed
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <!-- Set search type which is added when the search is run. If a match is found whin the search.php function the appropriate template will be loaded when the form is processed 
You can replace the value="" field with your own value. You can also rename the name="search-type" field, as long as it matches the statement within the search.php template. -->
    <input type="hidden" name="search-type" value="searchtype" />

    <div class="row">
        <div class="col-md-3">
            <!-- Enter keywords to search for below. Get_search_query is the default function used for WordPress keyword searches and will work here. -->
            <input type="text" class="form-control keywords" name="s" id="search" placeholder="Enter Keywords..."
                value="<?php get_search_query(); ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <!-- Set custom post meta to include within your search. This can be custom field values or standard post values. When the search is run this field will be added to the url and accessible via $_GET. -->
            <select name="searchcriteria" class="form-control" id="searchcriteria">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
            </select>
        </div>
    </div>

</form>