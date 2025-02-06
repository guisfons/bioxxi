<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<?php
		wp_head();

		global $current_user;
		wp_get_current_user();
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
	
	<title><?php echo get_bloginfo('name'); ?> | <?php if(is_home() || is_front_page()) { echo get_bloginfo('description'); } else { echo get_the_title(); } ?></title>
</head>

<body <?php body_class($post->post_name ?? ''); ?>>

	<header class="header">
		<div class="wrapper header__container">
			<a href="<?php echo home_url(); ?>" title="Home Project Title">
				<?php if (is_front_page()) : ?>
					<h1 class="header__logo">
						<?php echo get_the_title(); ?>
						<img width="355" height="142" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo.webp'); ?>" alt="Logo">
					</h1>
				<?php else : ?>
					<span class="header__logo">
						<img width="355" height="142" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/logo.webp'); ?>" alt="Logo">
					</span>
				<?php endif; ?>
			</a>
			<div class="header__menu">
				<button class="header__trigger">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php wp_nav_menu( array( 
					'menu' => 'Menu',
				) ); ?>
			</div>
		</div>
	</header>

	<main>