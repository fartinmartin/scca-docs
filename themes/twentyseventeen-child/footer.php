<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
        <div class="footer-site-stuff">
          <?php global $current_user; wp_get_current_user(); ?>
          <?php if ( is_user_logged_in() ) {
            echo '<span>';
            echo '👋 Hello, ' . $current_user->user_login . '!';
            echo '</span>'; }
          else { wp_loginout(); } ?>

          <?php if ( wedocs_get_option( 'email', 'wedocs_settings', 'on' ) == 'on' ): ?>
            <span class="wedocs-help-link wedocs-hide-print wedocs-hide-mobile hod">
              <!-- <i class="wedocs-icon wedocs-icon-envelope" style="vertical-align: -1.5px;"></i> -->
              <?php printf( '%s <a id="wedocs-stuck-modal" href="%s">%s</a>', __( '', 'wedocs' ), '#', __( 'Give us feedback!', 'wedocs' ) ); ?>
            </span>
          <?php endif; ?>
        </div>
        <ul class="scca-links">
          <li><a href="http://seattlecentralcreativeacademy.com/" target="_blank" rel="noopener noreferrer">SCCA</a></li>
          <li><a href="http://seattlecentralnewmedia.com/YOURNAMEHERE" target="_blank" rel="noopener noreferrer">NME Blog</a></li>
          <li><a href="https://seattlecentral.edu/current-students" target="_blank" rel="noopener noreferrer">SC Student Portal</a></li>
        </ul>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
