
<?php 
	if (is_home()) {
		$thisCatSlug = 'homepage';
	} else {
		$thisCatId = get_query_var('cat');
		$thisCat = get_category($thisCatId,false);
		$thisCatSlug = 'hp-'.$thisCat->slug;
	}
	echo '<!--thisCatId:'.$thisCatId.'-->'; 
	//echo '<!--thisCat:'.$thisCat.'-->'; 
	echo '<!--thisCatSlug:'.$thisCatSlug.'-->'; 
?>

<div class="page_body">
  <div class="home">

  <!-- ********** primo piano titolo sovrapposto ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-titolo-sovrapposto'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="primo_piano_tit_sovrapposto">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>   
    <div class="immagine">
      <?php echo get_the_post_thumbnail($page->ID, 'original', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
    </div>    
    <a class="testo" href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">      
        <h2><?php the_title(); ?></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div>
    </a>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <!-- ********** primo piano vertical slider ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-vertical-slider'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <div class="primo_piano_vertical_slider">
  <!-- *** IMG PLACEHOLDER *** -->
  <!-- *** IMG PLACEHOLDER *** -->
  <a class="txt">
    <span class="titolo"></span>
    <span class="excerpt"></span>
  </a>
  <ul>
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>
    <?php echo get_the_post_thumbnail($page->ID, 'original', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
    <span class="titolo_orig"><?php the_title(); ?></span>
    <a class="titolo" href="javascript:void(0)" rel="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
			<?php		
      if ($thisCatSlug == 'homepage') {
        echo '<div class="categoria">';
        foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
        echo '</div>';
      };		
      ?>
			<?php 
      $titolo =  the_title('','',false); 
      $titolo_notizia = substr($titolo ,0 ,40); 
      if($titolo != $titolo_notizia){$titolo_notizia .= "...";}
      echo $titolo_notizia;				
      ?> 
    </a>
    <div class="excerpt"><?php the_excerpt(); ?></div>
  </li>  
  <?php endwhile; ?>  
  </ul>
  </div>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** primo piano titolo sopra ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-primo-piano-titolo-sopra'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="primo_piano_tit_sopra">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li> 
		<?php		
		if ($thisCatSlug == 'homepage') {
			echo '<div class="categoria">';
		  foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
			echo '</div>';
		};		
		?>
    <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>                
    <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    <div class="excerpt">
       <?php the_excerpt(); ?> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
    
  <!-- ********** terzo piano Blog ********** -->	
  <div class="blog-and-banner">
      <script>
		  
		  $(function() {
			$( "#accordion" ).accordion();
		  });
	  </script>
      <ul id="accordion">
      <li>
          <h3 class="blog1">
          		<span class="testata">PANTA REI</span><span class="autore">di Maria Rosa Pant&eacute;</span>
          </h3>
          <div>
            <!-- PANTA REI -->
            

  <?php
	
	$post_count = 0;
	$args = array(
  		'category_name' => 'panta-rei'
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery);
	
	if ( $myquery->have_posts() ) :
	
    	$category_id = get_cat_ID( 'Panta Rei' );
		$category_link = get_category_link( $category_id );
	?>
  <ul class="terzo_piano_blog">
  
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
	<?php if (++$post_count == 1) : ?>
		<div class="immagine">
			<a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
				<?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
            </a>
		</div>
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div> 
   <?php else: ?>
   		<div class="testo">
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
 		</div>
   <?php endif; ?>  
   
  </li>  
  <?php endwhile; ?> 
  <li>
  	<div class="testo">
  		<h2><a href="<?php echo $category_link ?>">><i> Vai al blog... </i></a></h2>
    </div>
  </li>
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>             
            
            
            
          </div>
      </li>
      <li>
          <h3 class="blog2">
          		<span class="testata">Micromacro</span><span class="autore">di Annalisa Arci</span>
          </h3>
          <div>
          
  <?php
	
	$post_count = 0;
	$args = array(
  		'category_name' => 'micromacro'
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery);
	
	if ( $myquery->have_posts() ) :
	
    	$category_id = get_cat_ID( 'Micromacro' );
		$category_link = get_category_link( $category_id );
	?>
  <ul class="terzo_piano_blog">

  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
	<?php if (++$post_count == 1) : ?>
		<div class="immagine">
			<a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
				<?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
            </a>
		</div>
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div> 
   <?php else: ?>
   		<div class="testo">
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
 		</div>
   <?php endif; ?>  
   
  </li>  
  <?php endwhile; ?>  
    <li>
  	<div class="testo">
  		<h2><a href="<?php echo $category_link ?>">> <i>Vai al blog...</i></a></h2>
    </div>
  </li>
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>   
            
          </div>
      </li>
      <li>
		  <h3 class="blog3">
          		<div class="testata">Parchi e Aree protette</div><div class="autore">di Renzo Moschini</div>
          </h3>
          <div>
          
            <?php
	
	$post_count = 0;
	$args = array(
  		'category_name' => 'parchi-e-aree-protette-2'
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery);
	
	if ( $myquery->have_posts() ) :
	
    	$category_id = get_cat_ID( 'Parchi e Aree protette' );
		$category_link = get_category_link( $category_id );
	?>
  <ul class="terzo_piano_blog">
  
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
	<?php if (++$post_count == 1) : ?>
		<div class="immagine">
			<a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
				<?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
            </a>
		</div>
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div> 
   <?php else: ?>
   		<div class="testo">
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
 		</div>
   <?php endif; ?>  
   
  </li>  
  <?php endwhile; ?>  
    <li>
  	<div class="testo">
  		<h2><a href="<?php echo $category_link ?>">> <i>Vai al blog...</i></a></h2>
    </div>
  </li>
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>   
          
          </div>
      </li>
    
    <!-- fine accordion -->
    </ul>

    <div class="box_banner_blog">
    <script type="text/javascript"><!--
			google_ad_client = "ca-pub-1417052182885260";
			/* Quadrato sotto blog */
			google_ad_slot = "4067859267";
			google_ad_width = 250;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="//pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	</div>
    
  </div>    
  <!-- ********** terzo piano stretto ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-terzo-piano-stretto'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="terzo_piano_stretto">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
  <?php if ( has_post_thumbnail() ) : ?> 
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>   
  <?php endif; ?>  
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 

 
  
  <!-- ********** secondo piano ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-secondo-piano'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="secondo_piano">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?> 
  <li>
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>    
    <div class="testo">    
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>  
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  
     <!-- ********** terzo piano ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-terzo-piano'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="terzo_piano">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>  
   
  <?php if ( has_post_thumbnail() ) : ?> 
    <div class="immagine">
      <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    </div>   
  <?php endif; ?>  
     
    <div class="testo">
				<?php
        if ($thisCatSlug == 'homepage') {
          echo '<div class="categoria">';
          foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
          echo '</div>';
        };		
        ?>   
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** quarto piano Sx ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-quarto-piano-sx'
			)
		)
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_sx">

  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>     
    <div class="testo">      
        <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>        
        <div class="excerpt">
           <?php the_excerpt(); ?> 
        </div> 
    </div>    
  </li>  
  <?php endwhile; ?>
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?> 
  
  <!-- ********** quarto piano Dx ********** -->
  <?php $args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'pubblicazione',
				'field' => 'slug',
				'terms' => $thisCatSlug.'-quarto-piano-dx'
			)
		),
		'category__not_in' => array( 7709 )
	);
	$myquery = new WP_Query( $args );
	query_posts($myquery); ?>        
  <?php if ( $myquery->have_posts() ) : ?> 
  <ul class="quarto_piano_dx">
  <?php while ( $myquery->have_posts() ) : $myquery->the_post(); ?>   
  <li>    
		<?php		
		if ($thisCatSlug == 'homepage') {
			echo '<div class="categoria">';
		  foreach((get_the_category()) as $category) {echo $category->cat_name.' ';} 
			echo '</div>';
		};		
		?>
    <h2><a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>"><?php the_title(); ?></a></h2>                
  </li>  
  <?php endwhile; ?>  
  </ul>
  <?php endif; ?>  
  <?php wp_reset_query();?>  
  
  <br clear="all" />
  


  <!-- ********** ultime notizie dalle categorie ********** -->  
  <div class="categorie"> 
  
		<?php 
 	  global $listaCategorie;
    while ( $categoria = each($listaCategorie) ) : 	
    ?> 
			<?php $post_count = 0; ?>	
			<?php query_posts(array( 'category_name' => $categoria[1], 'posts_per_page' => '4' )); 
      $catObj = get_category_by_slug( $categoria[1] );
      $catLink = get_category_link( $catObj->cat_ID );
      $catName = $catObj->cat_name;
      ?>  
      <ul class="box_categorie">
      <h2><a href="<?php echo $catLink; ?>"><?php echo $catName; ?> &raquo;</a></h2>  
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
        <li>
        <?php if (++$post_count == 1) : ?>
        <div class="immagine">
          <?php echo get_the_post_thumbnail($page->ID, 'medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
        </div>
        <?php endif; ?>
        <a href="<?php the_permalink()?>" title="<?php the_title_attribute()?>">
          <?php the_title()?>
        </a>
        </li>	
        <?php endwhile; ?>
        <?php endif; ?>    
      </ul>  
      <?php wp_reset_query();?>
  
    <?php endwhile; ?>  
  </div>
  
  <br clear="all" />
  
  </div>
</div>
    