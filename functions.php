<?
// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function insertThumbnailRSS($content) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
    $content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:right;' ) ) . '' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS');

// Puts link in excerpts more tag
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');
?>