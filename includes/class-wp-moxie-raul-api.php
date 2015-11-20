<?php
/**
 * Register a custom endpoint for our JSON API
 *
 * @since      1.0.0
 * @package    Wp_Moxie_Rau
 * @subpackage Wp_Moxie_Raul/includes
 * @author     Raul Marrero
 */

class Movie_Endpoint {
    /**
     * Movie_Endpoint constructor.
     */
    public function __construct() {
        add_rewrite_tag('%movie_id%', '([^&]+)');
        add_rewrite_rule('movies/([^&]+)/?', 'index.php?movie_id=$matches[1]', 'top');

        add_action( 'template_redirect', array($this, 'movie_endpoint_data'));
    }

    /**
     * Collect the data and prepare it. Then, sends in JSON format.
     */
    public function movie_endpoint_data() {
        global $post;

        /*
         * In case we want to get more information of a particular movie, we can use the url:
         * ?movie_id=(ID) and catch the ID with
         * global $wp_query;
         * $wp_query->get('movie_id');
         *
         * We are assuming we want to get the full data for the list and then, render each Movie with the
         * same data, so we don't need to make another API call again.
         */

        $data = array();

        $posts = get_posts(array('posts_per_page' => 5, 'post_type' => 'movie'));

        // Built the object for the response
        foreach($posts as $post) {
            setup_postdata($post);
            $id = get_the_ID();
            $data[] = array(
                'id'                 => $id,
                'title'              => $post->post_title,
                'poster_url'         => wp_get_attachment_image_src(get_post_thumbnail_id($id))[0],
                'short_description'  => $post->post_content,
                'year'               => get_post_meta($id, 'movie_year')[0],
                'rating'             => get_post_meta($id, 'movie_rating')[0]
            );
            wp_reset_postdata();
        }

        wp_send_json($data);
    }
}