<?php get_header(); ?>			
	<div class="container sin-padding">	
		<div id="container-single" class="col-md-12 sin-padding">
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<h2 class="titulo-page"><?php echo get_the_title();?></h2>
			<span class="barra-azul"></span>
            <div class='col-sm-8 contenido-page'>
                <p><?php the_content(); ?></p>
            </div>
             <div class='col-sm-4 '></div>
            <div class="clearfix"></div>
            <?php 
                	if(is_page('Medios')){
                ?>
                	<div class="clearfix"></div><br>
                	<div class="col-xs-12">
                		<!-- CATEGORIES-->
                        <?php 
                        $categories = get_categories( array(
                            'orderby' => 'name',
                            'parent'  => 0
                        ) );
                        $contador = 0;
                        foreach ( $categories as $category ) {
                            $contador = $contador+1; 
                        ?>
                        <div id="medio-contenet" class="col-md-6">
							<span class="icon-colectivo"></span>
                			<p class="titulo-note"><?php echo $category->name; ?></p>
                			<p class="lugar-fecha" style="padding-left: 46px;"></p>
                			<div class="col-xs-12 sin-padding">
                				<div class="col-xs-6">
                					<a class="linked" href="<?php echo category_description( $category->term_id ); ?>" target="_blank"><?php echo get_option('fullby_sitio'); ?></a>
                				</div>
                				<div class="col-xs-6">
                					<a class="linked" href="<?php echo get_category_link( $category->term_id );?>" ><?php echo get_option('fullby_publicacoes'); ?></a>
                				</div>
                			</div>
                		</div>
                        <?php 
                            if( (( $contador % 3 ) == 0) ){
                                echo '<div class="clearfix"></div>';
                            }
                        } ?>
                        <!-- END CATEGORIES-->
                	</div>
                <?php } ?>
            <?php endwhile; endif; ?>
		</div>
	</div>	
<?php get_footer(); ?>