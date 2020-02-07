Multisite WordPress query

The below code is generally used to loop through posts within a WordPress multisite installation.
This code requires the plugin True Multisite Post Indexer to run and allows the site to display posts from all selected blogs/sites within a multisite on a single page.
For information on True Multisite Post Indexer: https://rudrastyh.com/plugins/get-posts-from-all-blogs-in-multisite-network

<?php
global $wp_query;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //Set page numbers, required if pagination is needed.

$args = array( //Setup our query as $args variable.
    'posts_per_page' => 6, //How many posts to display per page. Set to -1 to display all posts.
    'post_type' => 'post', //Select a post type to display. Can use custom post types.
	'post_status' => 'publish', //Post status, here we display published posts only.
    'orderby' => 'date', //Sort posts by retrieved paramater. In this case post date.
    'order' => 'ASC', //Ascending from lowest to highest values. DESC displays from highest to lowest.
    'paged' => $paged, //Set pagination.
);
$network_posts = network_query_posts( $args ); //Call posts from all indexed sites using network_query_posts
?>

<?php
    if( $network_posts ) : //If there are posts within the $network_posts query.

    /* Start the Loop */
    foreach( $network_posts as $nw_post ) : //Foreach post within the query perform the following.
        
    // the get_permalink() function won't work without switch_to_blog()
    // you can use network_get_permalink() instead but it is a little slower    
    switch_to_blog( $nw_post->BLOG_ID );

    $blog_id = $nw_post->BLOG_ID; //Save current blog id (site id) as $blog_id variable.
    $blogname = get_blog_option( $blog_id, 'blogname' ); //Save current blog name (site name) as $blogname variable.
    $bloghome = get_blog_option( $blog_id, 'home' ); //Save current blog home url as $bloghome variable.
    ?>

<div class="row">
    <div class="col-md-12">
    <a href="<?php the_permalink($nw_post->ID); //Call post permalink. Notice $nw_post->ID being added for network query. ?>">

    </a>
        <h2><?php echo $nw_post->post_title; //The post title. Varies from standard WordPress get_title(); ?></h2>
        <p><?php the_field('acf_field', $nw_post->ID); //Display ACF (Advanced Custom Fields) fields if set. Notice $nw_post->ID being added for network query. ?></p>
        <?php $custom_var = get_field('acf_field' , $nw_post->ID); //Save ACF field as custom variable.
        echo $custom_var; //Display custom variable ?>
    </div>
</div>

<?php restore_current_blog(); //Switch back to previous website (where the loop is being called). ?>

<?php endforeach; //End foreach loop. ?>

<?php endif; //End if loop. ?>

<?php 
// we should change the global $wp_query value to work correctly with pagination.
$wp_query = $GLOBALS['network_query']; ?>
<div class="row">
    <div class="col-md-12 text-center">
        <?php wp_pagenavi(); //Here we are using the pagenavi plugin to handle pagination. ?>
    </div>
</div>
<?php wp_reset_query(); ?>