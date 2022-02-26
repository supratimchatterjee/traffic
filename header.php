<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="facebook-domain-verification" content="7gmuo3kkuykohc3goi6lit7tireuz4" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- Bootstrap core CSS -->
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css"/> 
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/font.css"/>
<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css"/> --> 
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <?php if( is_front_page() ) { ?>
<body <?php body_class(); ?>>
   <?php } else { ?>
  <body class="inner-body">
  <?php } ?>   


  <div class="wrapper">
    <?php if( is_front_page() ) { ?>
      <header>
        <?php } else { ?>
          <header class="inner-header">
    <?php } ?>      
      <div class="container-fluid">
        <div class="header-container">
          <?php $innerLogo = of_get_option('innerlogo'); ?>
          <?php $logo = of_get_option('logo'); ?>
          <div class="logo-cont">
            <?php if( is_front_page() ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo $logo;?>" alt="" title=""  width="100%"></a>
            <?php } else { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo $innerLogo;?>" alt="" title=""  width="100%"></a>
            <?php } ?>   
          </div>
          <div class="right-header for-desktop">
            <div class="navigation" >
                          <nav>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
                            
                          </nav>
						    
						    <div class="sercarea">
							  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">								
								 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/srch.svg" alt="" class="srch">
								<input type="text" placeholder="Waar ben je naar op zoek?" value="<?php echo get_search_query() ?>" name="s">
							  </form>	
							</div>
							
                          <a href="/contact/" class="cont">Contact</a>
                        </div>
                    </div>
                    <div class="right-header for-mobile">
					<div class="navigation2" style="position:relative;">
                          <nav>
						    <?php wp_nav_menu( array( 'theme_location' => 'primary_mobile','container'=>'','menu_class'=>'','menu_id'=>'') ); ?>                            
                          </nav>
						    
						    <div class="sercarea">
							  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">								
								 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/srch.svg" alt="" class="srch">
								<input type="text" placeholder="Waar ben je naar op zoek?" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
							  </form>	
							</div>
							
                          <a href="/contact/" class="cont">Neem contact op</a>
					</div>
          </div>
        </div>
      </div>
      <div class="small_nav"></div>
            <div class="clearfix"></div>
    </header>