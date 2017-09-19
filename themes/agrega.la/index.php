<?php get_header(); ?>		
<div class="container sin-padding">
	<div id="container-noticias" class="col-xs-12">
		<!-- content facebook -->
		<div class="col-md-8 sin-padding">
			<div class="col-sm-3 sin-padding">
				<ul class="nav nav-tabs tabs-left">
	                <li class="active medios"><?php echo get_option('fullby_medios'); ?>:</li>
	                <?php obtenerListCategories();?>
	                <?php get_sidebar('secondary'); ?>
	            </ul>
	            
			</div>
			<div class="col-sm-9">
				<div id="content" class="tab-content">
                	<div class="tab-pane active" id="<?php echo idAhora(); ?>">
                		<?php
                			postsPorFecha(date(Y),date(M));
                		?>
                	</div>
	            </div>
			</div>
			<center>
				<a id="inifiniteLoader"><img src="<?php bloginfo('template_directory'); ?>/img/ajax-loader.gif" /></a>
			</center>
		</div>
		<!-- content twitter -->
        <div class="clearfix hidden-lg hidden-md visible-sm visible-xs"></div>
		<div id="container-tweets" class="col-md-4">
			<h2><?php echo get_option('fullby_twitter'); ?></h2>
			<p>
				<?php
					obtenerTweets();
				?>
			</p>
		</div>
	</div>
</div>	
<?php get_footer(); ?>	