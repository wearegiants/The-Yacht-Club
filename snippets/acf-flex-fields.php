<?php
 
// check if the flexible content field has rows of data
if( have_rows('promo_page_sections') ):
 
     // loop through the rows of data
    while ( have_rows('promo_page_sections') ) : the_row();
 
        if( get_row_layout() == '1_column_text_section' ):
 
        	include('acf-flex--1-column.php');
 
        elseif( get_row_layout() == '2_column_text_section' ): 
 
        	include('acf-flex--2-column.php');
        	
        elseif( get_row_layout() == 'rules-faq' ): 
        
           include('acf-flex--faq.php');
           
       elseif( get_row_layout() == 'sponsors' ): 
       
          include('acf-flex--sponsors.php');
 
        endif;
 
    endwhile;
 
else :
 
    // no layouts found
 
endif;
 
?>