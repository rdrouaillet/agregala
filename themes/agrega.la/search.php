<?php 
get_header(); 
wp_reset_query();
?>	
<div class="container sin-padding">
	<div id="container-single" class="col-xs-12">
		<!-- content facebook -->
		<div class="col-sm-8 sin-padding">
			<div class="col-sm-3 sin-padding">
				<ul class="nav nav-tabs tabs-left">
	                <li class="medios active">Medios:</li>
	                <?php obtenerListCategories();?>
	            </ul>
			</div>
			<div class="col-sm-9">
				<div class="tab-content">
					<h3 class="resulta-title">Resultados obtenidos para: <span><?php echo wp_kses($_GET['s']); ?></span></h3>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
                	<div id="" class="tab-pane active" id="single">
						<div   class="tab-content">
	                		<?php
	                			postsPorBusqueda(wp_kses($_GET['s']));
	                		?>
			            </div>
                	</div>
                		<?php endwhile; ?>
					<?php endif; ?>
	            </div>
			</div>
		</div>
		<!-- content twitter -->
		<div id="container-tweets-single" class="col-sm-4">
			<h2>¿Qué hay en Twitter?</h2>
			<p>
				<?php
					obtenerTweets();
				?>
			</p>
		</div>
	</div>
</div>	
<?php get_footer(); ?>	