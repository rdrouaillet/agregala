<?php get_header(); ?>		
<div class="container sin-padding">
	<div id="container-single" class="col-xs-12">
		<!-- content facebook -->
		<div class="col-md-8 sin-padding">
			<div class="col-sm-3 sin-padding">
				<ul class="nav nav-tabs tabs-left">
	                <li class="medios active">Medios:</li>
	                <?php obtenerListCategories();?>
	            </ul>
			</div>
			<div class="col-sm-9">
				<div class="tab-content">
                	<div class="tab-pane active" id="<?php echo idAhora(); ?>">
                		<?php 
							$cat = get_category( get_query_var( 'cat' ) );
						    $cat_slug = $cat->slug;
                			postsPorCategory($cat_slug);
                		?>
                	</div>
	            </div>
			</div>
			<center>
				<a id="inifiniteLoader"><img src="<?php bloginfo('template_directory'); ?>/img/ajax-loader.gif" /></a>
			</center>
		</div>
		<!-- content twitter -->
		<div id="container-tweets" class="col-sm-4">
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