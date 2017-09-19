<?php 
if(have_posts()) :     
	/** Loop through each post for this month... */
	while(have_posts()) : the_post();
		$link =  get_permalink(get_the_ID());
		$posttags = get_the_tags();
						if ($posttags) {
						  foreach($posttags as $tag) {
							if($tag->name=="Page"){
								$varSapn = "faceFondo";
							}else{
								$varSapn = "rssFondo";
							}
						  }
						}
		echo '<div class="content-noticias" data-link="'.$link.'" data-span="'.$varSapn.'">';
			echo '<div class="triangulo-equilatero-top-right"><span class="'.$varSapn.'"></span></div>';
	            /** Output each article for this month */
	        	echo '<span class="icon-colectivo"></span><h3 class="titulo-note">'.setCategory(get_the_ID()).'</h3>';  
	        	echo '<p class="lugar-fecha">'.get_bloginfo('name').' / <span class="entry-date"> '.get_the_date().'</span></p>';
    			if ( has_post_thumbnail() ) : 
            		echo the_post_thumbnail( 'full', array('class' => 'contenido-note img-responsive'));
                endif;
	            echo the_excerpt_max_charlength(200);
	            echo '<a class="read-more" href="'.get_permalink(get_the_ID()).'">Leer más</a>';
	    echo '</div>';
	endwhile;
	/** FINALIZA LOOP DE NOTICIAS **/
  	
endif;
?>