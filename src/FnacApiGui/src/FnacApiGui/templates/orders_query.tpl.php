<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <div class="container">
    <?php if (count($orders) > 0): ?>
      <div id="paging">
        Orders <?php echo $min_order_number; ?> - <?php echo $max_order_number; ?> / <?php echo $nb_total_result ?> total orders
      </div>
      <div id="data">
        <table id="orders_query_table" class="table">
          <thead>
            <tr>
              <th scope="col" class="small">Order No</th>
              <th scope="col" class="small">Order State</th>
              <th scope="col" class="small">Total amount</th>
              <th scope="col" class="small">Client</th>
              <th scope="col" class="small">Date</th>
              <th scope="col">Order details</th>
            </tr>
          </thead>
          <?php // Calculating total amount for each order ?>
          <?php foreach ($orders as $order): ?>
            <?php
              $orders_details = $order->getOrdersDetail();
              $total_amount = 0;

              foreach ($orders_details as $order_detail) {
                $total_amount += $order_detail->getQuantity() * $order_detail->getPrice() + $order_detail->getShippingPrice();
              }
            ?>
            <tr>
              <td><?php echo $order->getOrderId(); ?></td>
              <td><?php echo $order->getState(); ?></td>
              <td><?php echo $total_amount; ?> &euro;</td>
              <td><?php echo $order->getClientFirstName() . ' ' . $order->getClientLastName(); ?></td>
              <td><?php echo date('d/m/Y H:i', strtotime($order->getCreatedAt())); ?></td>
              <td>
                <a class="detailed_order_button" href="#" onclick="displayOrderDetails(this);return false;">Details</a>

                <!-- Order detail block -->
                <div class="detailed_order">
                    <div class="row">
                        <div class="col-xs-11"><h2>Order No. <?php echo $order->getOrderId(); ?></h2></div>
                        <div class="col-xs-1"><button type="button" class="close" onclick="closeDetails(this);return false;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
                    </div>
                    <?php foreach($orders_details as $order_detail): ?>
                    <div class="row order_detail_row">
                        <div class="col-xs-1">
                            <h3><?php echo $order_detail->getOrderDetailId(); ?>.</h3>
                        </div>
                        <div class="col-xs-6">
                            <p class="main_info"><?php echo $order_detail->getProductName(); ?></p>
                            <p class="side_info">SKU <?php echo $order_detail->getOfferSellerId(); ?> | State <?php echo $order_detail->getProductStateLabel(); ?> <span class="badge"><?php echo $order_detail->getState(); ?></span></p>
                        </div>
                        <div class="col-xs-3 order_detail_price">
                            <p class="main_info"><?php echo $order_detail->getQuantity(); ?> x <?php echo number_format($order_detail->getPrice(), 2); ?> &euro;</p>
                            <p class="side_info">+ Shipping cost <strong><?php echo number_format($order_detail->getShippingPrice(), 2); ?></strong> &euro;</p>
                        </div>
                        <div class="col-xs-2 order_detail_price">
                            <p class="main_info"><?php echo number_format($order_detail->getQuantity() * $order_detail->getPrice() + $order_detail->getShippingPrice(), 2); ?> &euro;</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="row">
                        <div class="col-xs-12 text-right order_detail_total_amount"> Total amount <?php echo number_format($total_amount, 2); ?> &euro;</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                        <h3>Billing address</h3>
                        <address>
                            <?php $billing_address = $order->getBillingAddress(); ?>
                            <strong><?php echo $billing_address->getLastName() . " " . $billing_address->getFirstName() . "<br />"; ?></strong>
                            <?php echo $billing_address->getCompany() ? $billing_address->getCompany() . "<br />" : ""; ?>
                            <?php echo $billing_address->getAddress1() ? $billing_address->getAddress1() . "<br />" : ""; ?>
                            <?php echo $billing_address->getAddress2() ? $billing_address->getAddress2() . "<br />" : ""; ?>
                            <?php echo $billing_address->getAddress3() ? $billing_address->getAddress3() . "<br />" : ""; ?>
                            <?php echo $billing_address->getZipCode() . "<br />"; ?>
                            <?php echo $billing_address->getCity() . "<br />"; ?>
                            <?php echo $billing_address->getCountry() . "<br />"; ?>
                        </address>
                        </div>
                        <div class="col-xs-5">
                            <h3>Shipping address</h3>
                            <address>
                            <?php $shipping_address = $order->getShippingAddress(); ?>
                            <strong><?php echo $shipping_address->getLastName() . " " . $shipping_address->getFirstName() . "<br />"; ?></strong>
                            <?php echo $shipping_address->getCompany() ? $shipping_address->getCompany() . "<br />" : ""; ?>
                            <?php echo $shipping_address->getAddress1() ? $shipping_address->getAddress1() . "<br />" : ""; ?>
                            <?php echo $shipping_address->getAddress2() ? $shipping_address->getAddress2() . "<br />" : ""; ?>
                            <?php echo $shipping_address->getAddress3() ? $shipping_address->getAddress3() . "<br />" : ""; ?>
                            <?php echo $shipping_address->getZipCode() . "<br />"; ?>
                            <?php echo $shipping_address->getCity() . "<br />"; ?>
                            <?php echo $shipping_address->getCountry() . "<br />"; ?>

                            </address>
                        </div>
                        <div class="col-xs-2">
                        <h3>&nbsp;</h3>
                        <?php if($order->getState() == 'Created'): ?>
                        <div>
                            <a class="btn btn-success" href="orders_query.php?<?php echo isset($state) ? "state=".$state."&amp;" : ""; ?>page=<?php echo $page; ?>&amp;action=accept&amp;order_id=<?php echo $order->getOrderId(); ?>">Accept</a>
                            <br /><br />
                            <a class="btn btn-danger" href="orders_query.php?<?php echo isset($state) ? "state=".$state."&amp;" : ""; ?>page=<?php echo $page; ?>&amp;action=refuse&amp;order_id=<?php echo $order->getOrderId(); ?>">Refuse</a>
                        </div>
                        <?php elseif($order->getState() == 'ToShip'): ?>
                        <div>
                            <a class="btn btn-success" href="orders_query.php?<?php echo isset($state) ? "state=".$state."&amp;" : ""; ?>page=<?php echo $page; ?>&amp;action=ship&amp;order_id=<?php echo $order->getOrderId(); ?>">Ship</a>
                        </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <script type="text/javascript">
          // Order detail block displaying script
          function displayOrderDetails(e)
          {
            $(".detailed_order").prev().show();
            $(".detailed_order").hide();
            $(e).toggle();
            $(e).next('.detailed_order').show();
          }

          // Order detail block closing button script
          function closeDetails(e)
          {
            $(e).parents(".detailed_order").hide();
            $(e).parents(".detailed_order").prev(".detailed_order_button").show();
          }
        </script>
      </div>

      <?php $base_page = "orders_query.php?" . (isset($state) ? "state=".$state."&amp;" : ""); ?>

      <?php include('pager.tpl.php'); ?>
    <?php else: ?>
      <div class="no_orders">
        No orders.
      </div>
    <?php endif; ?>

    <?php include('footer.tpl.php'); ?>

    </div>

    <?php include('debug_info.tpl.php'); ?>

  </body>
</html>
