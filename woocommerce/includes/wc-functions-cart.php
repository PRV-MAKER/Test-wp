<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'prv_theme_woocommerce_header_cart' ) ) {
			prv_theme_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'prv_theme_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function prv_theme_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		prv_theme_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'prv_theme_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'prv_theme_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function prv_theme_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'prv-theme' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'prv-theme' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'prv_theme_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function prv_theme_woocommerce_header_cart() {
/*		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}*/
		?>
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                	  <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
						  <div class="shp__cart__wrap">
								<ul  class="shp__single__product">
									<li >
										<?php
										$instance = array(
											'title' => '',
										);
										the_widget( 'WC_Widget_Cart', $instance );
										?>
									</li>
								</ul>


                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product/sm-img/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>	
     						</div>
	     					  <ul class="shoping__total">
	                        <li class="subtotal">Subtotal:</li>
	                        <li class="total__price">$130.00</li>
	                    </ul>
	                    <ul class="shopping__btn">
	                        <li><a href="cart.html">View Cart</a></li>
	                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
	                    </ul>
     					</div>
     				</div>
		<?php
	}
}
