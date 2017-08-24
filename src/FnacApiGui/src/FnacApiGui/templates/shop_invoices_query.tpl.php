<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <div class="container">
        
    <?php if (count($shop_invoices) > 0): ?>
      <div id="data">
        <table id="shop_invoices_query_table" class="table">
          <thead>
            <tr>
              <th scope="col" class="small">Date</th>
              <th scope="col" class="small">Invoice ID</th>
            </tr>
          </thead>

          <?php foreach($shop_invoices as $shop_invoice): ?>
          <tr>
            <td><?php echo date('d/m/Y', strtotime($shop_invoice->getCreatedAt())); ?></td>
            <td><a href="<?php echo $shop_invoice->getUrl(); ?>"><?php echo $shop_invoice->getInvoiceId(); ?></a></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    <?php else: ?>
      <div class="no_orders">
        No shop invoice.
      </div>
    <?php endif; ?>

    <?php $base_page = "shop_invoices_query.php?"; ?>
    <?php include('pager.tpl.php'); ?>
      
    <?php include('footer.tpl.php'); ?>
        
    </div>

    <?php include('debug_info.tpl.php'); ?>

  </body>
</html>
