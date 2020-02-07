Standard WordPress query

The below code is generally used to run a standard WordPress loop. A WordPress loop allows the site to loop through posts and display their appropriate values.
For more information visit WP-Query at the WordPress documentation: https://developer.wordpress.org/reference/classes/wp_query/

<?php
$args = array( //Setup our query as $args variable.
    'posts_per_page' => 6, //How many posts to display per page. Set to -1 to display all posts.
    'post_type' => 'post', //Select a post type to display. Can use custom post types.
	'post_status' => 'publish', //Post status, here we display published posts only.
    'orderby' => 'date', //Sort posts by retrieved paramater. In this case post date.
    'order' => 'ASC', //Ascending from lowest to highest values. DESC displays from highest to lowest.
);
query_posts($args); //Call query_posts on $args ?>

<?php if ( have_posts() ) : //If posts exist, do the following. If statement runs once, if posts are found. While runs each time a post is found (for each post).
    while ( have_posts() ) : the_post(); //While posts exist do the following. ?>

<div class="row">
    <div class="col-md-12">
        <h2><?php the_title(); //The post title ?></h2>
        <p><?php the_field('acf_field'); //Display ACF (Advanced Custom Fields) fields if set. ACF fields can also be saved as variables and displayed that way (see below). ?></p>
        <?php $custom_var = get_field('acf_field'); //Save ACF field as custom variable.
        echo $custom_var; //Display custom variable ?>
    </div>
</div>

<?php endwhile; //End our while loop here
else: //If no posts are found, display the following. ?>
<div class="row">
    <div class="col-md-12">
        <p>We have not been able to locate any posts.</p>
    </div>
</div>
<?php endif; //End your if statement ?>