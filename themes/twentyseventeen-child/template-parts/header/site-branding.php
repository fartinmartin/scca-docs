<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div class="wrap">

		<?php the_custom_logo(); ?>

		<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/docs' ) ); ?>" rel="home">SCCA <span class="hom">Docs</span></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/docs' ) ); ?>" rel="home">SCCA <span class="hom">Docs</span></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
    <?php endif; ?>

    <div class="header-nonlogostuff">

      <?php

      // the following php inserts the custom widget area in the header
      // in the widget section of the admin dashboard you can choose to
      // use the weDocs search or the algolia search (through WP default search widget)
      //
      //  if you are using the weDocs search widget know that
      //  two edits were made to `plugins/wedocs/includes/class-search-widget.php` on line 46
      //  number 1: the input now has the placeholder text "Search the docs (Press "/" as a shortcut)"
      //  number 2: the input now has an id of "wedocs-search-input-field"

      if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
          <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
            <?php dynamic_sidebar( 'custom-header-widget' ); ?>
          </div>

          <!-- following script is to style search button upon input focus
               and create a keyboard shortcut to focus on said input.
               it is currently grabbing algolia id'd elements if search is
               switched to wordpress default or wedocs search, this script will break! -->
          <script>
            wedocsInput = document.getElementById("search-form-1");
            wedocsSubmit = document.querySelectorAll(".search-submit");

            wedocsInput.addEventListener("focusin", submitDark);
            wedocsInput.addEventListener("focusout", submitLight);

            // swap classes to style search button when input field is focused
            function submitDark() { wedocsSubmit[0].classList.add("search-is-focused"); }
            function submitLight() { wedocsSubmit[0].classList.remove("search-is-focused"); }

            // listens for "/" keydown event and focuses on the search input field
            document.addEventListener("keydown", function(e) {
              if (e.keyCode == 191) {
                e.preventDefault();
                wedocsInput.focus();
              }
            });

            // allows "/" to be typed in the input
            wedocsInput.addEventListener("keydown", function(e) {
              e.stopPropagation();
            });
          </script>
      <?php endif; ?>

      <button class="menu-toggle hot" aria-controls="top-menu" aria-expanded="false" onclick="scrollToTop()">
        <script type="text/javascript">function scrollToTop() { window.scrollTo(0, 0); }</script>
        <?php
        echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
        echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
        _e( '', 'twentyseventeen' );
        ?>
      </button>

      <!-- hamburger menu toggle -->
      <script>
        menuToggle = [...document.querySelectorAll(".menu-toggle")];

        if (document.querySelectorAll(".home .wedocs-shortcode-wrap")) {
          menuToggle[0].addEventListener("click", function(){
            homeMenu = [...document.querySelectorAll(".home .wedocs-shortcode-wrap")];

            this.toggleAttribute("aria-expanded");
            this.classList.toggle("expanded");

            homeMenu[0].classList.toggle("dn");
          });
        };

        if (document.querySelectorAll(".wedocs-single-wrap .wedocs-sidebar")) {
          menuToggle[0].addEventListener("click", function(){
            docMenu = [...document.querySelectorAll(".wedocs-single-wrap .wedocs-sidebar")];

            this.toggleAttribute("aria-expanded");
            this.classList.toggle("expanded");

            docMenu[0].classList.toggle("dn");
          });
        }

      </script>

      <div class="contact-link">
        <?php if ( wedocs_get_option( 'email', 'wedocs_settings', 'on' ) == 'on' ): ?>
            <span class="wedocs-help-link wedocs-hide-print wedocs-hide-mobile">
                <i class="wedocs-icon wedocs-icon-envelope" style="vertical-align: -1.5px;"></i>
                <?php printf( '%s <a id="wedocs-stuck-modal" href="%s">%s</a>', __( '', 'wedocs' ), '#', __( 'Give us feedback!', 'wedocs' ) ); ?>
            </span>
        <?php endif; ?>
      </div>

    </div>
	</div><!-- .wrap -->
</div><!-- .site-branding -->
