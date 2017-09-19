<!DOCTYPE html>
<html  <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php echo get_option('fullby_description'); ?>" />
    
    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png" type="image/x-icon"> 

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Analitics -->
	<?php if (get_option('fullby_analytics') <> "") { echo get_option('fullby_analytics'); } ?>
    
	<?php wp_head(); ?> 
    
</head>
<body id="page-top" class="index">
	<div class="container-header">
	<!-- Navigation -->
    <?php
        if(is_single() || is_search() || is_page() || is_category()){
            $varAffix ="affix";
        }
        else{
            $varAffix = "";
        }
    ?>
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom <?php echo $varAffix; ?>" style="background:url('<?php echo get_option('fullby_imagen-header'); ?>') no-repeat;background-size: cover;background-position: top;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
                	<img class="logo" src="<?php echo get_option('fullby_url'); ?>" alt="Logo Agrega.la" />
            	</a>
                <?php
                    $nombreSite = strtolower(get_bloginfo('name'));
				?>
                <select name="myselect" id="myselect">
                  <?php
                  function limpiarCaracteresEspeciales($string ){
                     $string = htmlentities($string);
                     $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
                     return $string;
                    }
                    $subsites = get_sites();
                    $count = 0;
                    foreach( $subsites as $subsite ) {
                        $count = $count+1;
                        //echo "<pre>"; print_r($subsite); echo "</pre>";
                        if($count>1){
                            //$subsite_id = get_object_vars($subsite)["blog_id"];
                            $caena = $subsite->path;
                            $resultado = str_replace("/", "", $caena);
                            ?>
                            <option <?php if ($nombreSite==$resultado){ echo "selected";} ?> label="<?php echo "$resultado" ?>" data-back="<?php echo bloginfo('url')."/wp-content/themes/agrega.la/img/flat_".$resultado.".png" ?>" value="<?php echo bloginfo('url').$subsite->path; ?>">
                                /<?php echo $resultado; ?><span></span>
                            </option>
                        <?php }
                    } 
                    ?>
                </select>
            	<!--
                <div class="tipo-pais">/ CARIBE <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/flat_colombia.png" alt="Flat país local" /> <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></div>
            	-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php wp_nav_menu(array(
                    'menu_id' => 'top-menu',    // id del menu
                    'container' => false,
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-right'
                )); ?>
                <!--
                <div>
                    <li id="new-element" class="page-scroll">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">IDIOMA
                              <span class="caret"></span></button>
                              <?php// wp_nav_menu(array(
                                   // 'menu_id' => 'idioma',    // id del menu
                                   // 'container' => false,
                                   // 'theme_location' => 'secondary',
                                   // 'menu_class' => 'dropdown-menu'
                                // )); ?>
                            </div>
                        </li>
                    </div>
                -->
                <div class="clearfix"></div>
				<div class="container-agregate pull-right">
					<p><?php echo get_option('fullby_mensaje'); ?></p>
                    <a class="btn btn-default" href="<?php echo home_url()."/agrega-te/"?>">agrega.te</a>
				</div>
                <div class="clearfix"></div>
                <div class="container-banner">
	                <h2 class="slogan"><?php bloginfo( 'description' ); ?></h2>
	                <div class="container-search">
		                <form class="navbar-form" role="search" method="get" action="<?php echo home_url() ; ?>">
					        <div class="input-group">
					            <input type="text" class="form-control" placeholder="¿Qué estás buscando?" name="s" id="srch-term">
					            <div class="input-group-btn">
					                <button class="btn btn-default" type="submit"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lupa.png" alt="lupa" /></button>
					            </div>
					        </div>
				        </form>
				    </div>	
			    </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    </div>