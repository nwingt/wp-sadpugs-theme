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
	<div class="container">
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a class="media is-align-items-center" href="<?php echo site_url(); ?>">
					<div class="media-left">
						<figure class="image is-48x48">
							<img class="is-rounded" src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>">
						</figure>
					</div>
					<div class="media-content">
						<h1 class="title"><?php echo get_bloginfo( 'name' ); ?></h1>
					</div>
				</a>
				<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>

			<div class="navbar-menu">
					<?php
					$theme_locations = get_nav_menu_locations();
					if (isset($theme_locations['header-menu'])) {
						// https://developer.wordpress.org/reference/functions/wp_nav_menu/
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'container' => '',
								'items_wrap' => '<ul id="%1$s" class="%2$s navbar-end">%3$s</ul>',
								'depth' => 1,
								'fallback_cb' => 'false'
							)
						);
					} else { ?>
						<div class="navbar-end">
							<div class="notification is-danger is-light has-text-centered">
								Please set header-menu
							</div>
						</div>
					<?php } ?>
			</div>
		</nav>
	</div>
</header>
<main class="hero-body">
