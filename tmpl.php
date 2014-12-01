<!DOCTYPE html>

<html>
<head>
<title>
	<?php
		global $wpdb, $page;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
	?>
</title>
<?php
	$url=get_permalink();
	wp_head();
?>
    <link rel="stylesheet" id="print-css"  href='<?php echo plugins_url( '/style.css', __FILE__ ); ?>' type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
        //Вывод формы печати сразу после того как загрузим страницу
        jQuery(document).ready(function(){
            window.print()
        });
    </script>
</head>

<body>

    <div id="content" class="clearfix">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <p id="print"><a href="javascript:window.print()">Печать</a></p>
        <div id="article">
            <h1 class="article-title">#<?php the_ID(); ?>-<?php the_title(); ?></h1>
            <div>(<?php echo get_the_term_list( $post->ID, 'functions', ' ', ',', '' ); ?>)</div>
            <div class="article-content"><?php echo $post->post_content; ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>