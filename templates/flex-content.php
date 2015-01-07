<?php

// check if the flexible content field has rows of data
if( have_rows('events_and_programming') ):

     // loop through the rows of data
    while ( have_rows('events_and_programming') ) : the_row();

        if( get_row_layout() == 'event_block' ):

          include('flex/events.php');

        elseif( get_row_layout() == 'download' ): 

        	$file = get_sub_field('file');

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>