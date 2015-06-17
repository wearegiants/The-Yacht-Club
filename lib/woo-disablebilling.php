<?php
/**
 * Plugin Name: WooCommerce Remove Billing Fields for Free Virtual Products
 * Plugin URI: https://gist.github.com/BFTrick/7873168
 * Description: Remove the billing address fields for free virtual orders
 * Author: Patrick Rauland
 * Author URI: http://patrickrauland.com/
 * Version: 2.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author      Patrick Rauland
 * @since   1.0
 */

function patricks_billing_fields( $fields ) {
  global $woocommerce;

  // if the total is more than 0 then we still need the fields
  if ( 0 != $woocommerce->cart->total ) {
    return $fields;
  }

  // return the regular billing fields if we need shipping fields
  if ( $woocommerce->cart->needs_shipping() ) {
    return $fields;
  }

  // we don't need the billing fields so empty all of them except the email
  unset( $fields['billing_country'] );
  //unset( $fields['billing_first_name'] );
  //unset( $fields['billing_last_name'] );
  unset( $fields['billing_company'] );
  unset( $fields['billing_address_1'] );
  unset( $fields['billing_address_2'] );
  unset( $fields['billing_city'] );
  unset( $fields['billing_state'] );
  //unset( $fields['billing_postcode'] );
  unset( $fields['billing_phone'] );

  return $fields;
}
add_filter( 'woocommerce_billing_fields', 'patricks_billing_fields', 20 );


// That's all folks!


add_filter( 'woocommerce_payment_complete_order_status', 'virtual_order_payment_complete_order_status', 10, 2 );
 
function virtual_order_payment_complete_order_status( $order_status, $order_id ) {
  $order = new WC_Order( $order_id );
 
  if ( 'processing' == $order_status &&
       ( 'on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status ) ) {
 
    $virtual_order = null;
 
    if ( count( $order->get_items() ) > 0 ) {
 
      foreach( $order->get_items() as $item ) {
 
        if ( 'line_item' == $item['type'] ) {
 
          $_product = $order->get_product_from_item( $item );
 
          if ( ! $_product->is_virtual() ) {
            // once we've found one non-virtual product we know we're done, break out of the loop
            $virtual_order = false;
            break;
          } else {
            $virtual_order = true;
          }
        }
      }
    }
 
    // virtual order, mark as completed
    if ( $virtual_order ) {
      return 'completed';
    }
  }
 
  // non-virtual order, return original status
  return $order_status;
}