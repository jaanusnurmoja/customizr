<?php
/**
 * The template for displaying the post list grid item (expanded or not)
 *
 * In WP loop
 *
 * @package Customizr
 * @since Customizr 3.5.0
 */
?>
<article <?php czr_fn_echo( 'article_selectors' ) ?> >
  <section class="tc-grid-post" <?php czr_fn_echo('element_attributes') ?>>
    <div class="tc-grid-figure <?php czr_fn_echo( 'figure_class' ) ?>">
      <?php

      if ( czr_fn_get( 'icon_enabled' ) ):

      ?>
        <div class="tc-grid-icon post-type__icon" <?php czr_fn_echo( 'icon_attributes' ) ?>>
          <i class="icn-format"></i>
        </div>
      <?php

      endif

      ?>
      <?php czr_fn_echo( 'thumb_img' ) ?>
      <div class="tc-grid-excerpt">
        <div class="entry-summary">
          <div class="tc-g-cont"><?php the_excerpt() ?></div>
          <?php

          /* The expanded grid item has the title inside the caption */
          if( czr_fn_get( 'has_title_in_caption' ) ):

          ?>

          <h2 class="entry-title">
            <a href="<?php the_permalink() ?>" title="<?php _e( 'Permalink to' , 'customizr' ) ?> <?php echo esc_attr( strip_tags( get_the_title() ) ) ?>" rel="bookmark"><?php czr_fn_echo( 'title' ) ?></a>
            <?php if ( czr_fn_get( 'has_recently_updated' ) && czr_fn_has( 'recently_updated' ) ) czr_fn_render_template( 'modules/recently_updated', 'recently_updated' ) ?>
          </h2>

          <?php

          /* end expanded title */
          endif

          ?>
        </div>
        <a class="tc-grid-bg-link" href="<?php the_permalink() ?>" title="<?php esc_attr( strip_tags( get_the_title() ) ) ?>"></a>
        <?php

        /* additional effect for not expanded grid items with no img */
        if( czr_fn_get( 'has_fade_expt' ) /* ! ( czr_fn_get( 'is_expanded' ) || czr_fn_get( 'thumb_img' ) ) */ ):

        ?>
        <span class="tc-grid-fade_expt"></span>
        <?php

        endif

        ?>
      </div>
      <?php

      /* Edit link in the figure for the expanded item */
        if( czr_fn_get( 'has_edit_in_caption' ) )
          if ( czr_fn_has( 'edit_button' ) ) czr_fn_render_template( 'modules/edit_button', 'edit_button' );
      ?>
    </div>
  <?php

    /* Header in the bottom for not expanded */
    if( ! czr_fn_get( 'is_expanded' ) ) :

  ?>
    <div class="tc-content">
      <?php if ( czr_fn_has('post_list_header') ) czr_fn_render_template('content/post-lists/headings/post_list_header') ?>
      <?php if ( czr_fn_has('post_list_footer') ) czr_fn_render_template('content/post-lists/footers/post_list_footer') ?>
    </div>
  <?php

    endif

  ?>
  </section>
</article>