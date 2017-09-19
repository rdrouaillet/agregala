	<!-- Footer -->
    <footer  class="text-center">
        <div class="footer-above">
            <div class="container sin-padding">
            	<div class="col-xs-12 sin-padding">
            		<div class="col-sm-8 sin-padding">
                        <?php echo get_option('fullby_footer-desc');?>
            		</div>
            		<div class="col-sm-4 container-logo-footer">
            			<img src="<?php echo get_option('fullby_footer-logo');?>" alt="Logo Footer">
            		</div>
            	</div>
            </div>
        </div>
        <div id="page-bottom" class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo get_option('fullby_derechos');?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <?php
        if(is_single() || is_search() || is_page() || is_category()){
        echo '';
        }else{ ?>
          <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/freelancer.min.js"></script>
        <?php }
    ?>

    <?php wp_footer();?>
    <script type="text/javascript">
        $(function () {
          var $win = $(window);
          // definir mediente $pos la altura en píxeles desde el borde superior de la ventana del navegador y el elemento
          var $pos = 300;
          $win.scroll(function () {
             if ($win.scrollTop() <= $pos){
                //$('.nav-tabs').removeClass('fijar');
                //$('#container-tweets').removeClass('fijar-derecha');
             }else {
                //$('.nav-tabs').addClass('fijar');
                //$('#container-tweets').addClass('fijar-derecha');
             }
           });
        });
        jQuery(document).ready(function($) {
            $( ".content-noticias" ).click(function() {
                //$(location).attr('href',$(this).attr("data-link"));
                if($(this).attr("data-span")=="rssFondo"){
                   window.open($(this).attr("data-link"),'_blank');
                }else{
                  $(location).attr('href',$(this).attr("data-link"));
                }
               
               //alert( $(this).attr("data-link") );
            });
			
			$( "#myselect" ).change(function() {
				var myselect = $( "#myselect option:selected" ).text();
				if(myselect!="Selecciona una región"){
					$(location).attr('href',myselect);
				}
			});
			
            $( ".paddin-contenido" ).click(function() {
                $(location).attr('href',$(this).attr("data-link"));
               //alert( $(this).attr("data-link") );
            });
            //Set the carousel options
            $('#quote-carousel').carousel({
              pause: true,
              interval: 4000,
            });

            var count = 2;
            $(window).scroll(function(){
                  if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                     loadArticle(count);
                     count++;
                  }
            }); 
 
            function loadArticle(pageNumber){    
                  $('a#inifiniteLoader').show('fast');
                  $.ajax({
                      url: "<?php bloginfo('wpurl') ?>/wp-admin/admin-ajax.php",
                      type:'POST',
                      data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop', 
                      success: function(html){
                          $('a#inifiniteLoader').hide('1000');
                          $("#content").append(html);    // This will be the div where our content will be loaded
                      }
                  });
              return false;
          }

            $(".nav-tabs>li>a").click(function (){
                $('html, body').animate({
                    scrollTop: $("#content").offset().top
                }, 2000);
            });

            //$('#new-element').appendTo('#top-menu');

            $("html, body").animate({ scrollTop: $("#myID").scrollTop() }, 1000);

        });
    </script>
  </body>
</html>

    	