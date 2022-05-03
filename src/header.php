<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="hero-head section">
	<nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="container is-flex is-justify-content-center">
			<h1 class="title"><?php echo get_bloginfo( 'name' ); ?></h1>
		</div>
	</nav>
</header>
<main class="hero-body">
