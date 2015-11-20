<!DOCTYPE html>
<html>
    <head>
        <base href="<?php $url_info = parse_url( home_url() ); echo trailingslashit( $url_info['path'] ); ?>">
        <title>Home | Movie List</title>
        <?php wp_head(); ?>
        <!-- We need to load app.js script manually (ReactJS) -->
        <script type="text/babel" src="./wp-content/plugins/wp-moxie-raul/public/js/app.js"></script>
    </head>

        <body>
        <div class="container movie-container">
            <div class="row">
                <div id="content" class="col-md-12">
                    <h1 class="divider">Movie List</h1>
                </div>
                <div id="movie-list" class="col-md-12 movie-list">

                </div>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>