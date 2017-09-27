<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <?php include('debug_info.tpl.php'); ?>

    <div class="container">

    <?php if (count($incidents) > 0): ?>
      <div id="data">
        <table id="incidents_query_table" class="table">
          <thead>
            <tr>
              <th scope="col" class="small">Order</th>
              <th scope="col" class="small">Status</th>
              <th scope="col" class="small">Message</th>
              <th scope="col" class="small">Created</th>
              <th scope="col" class="small">Closed</th>
              <th scope="col" class="small">Refunded</th>
            </tr>
          </thead>

          <?php foreach($incidents as $incident): ?>
          <tr>
            <td><?php echo $incident->getOrderId(); ?></td>
            <td><span class="label <?php echo $incident->getStatus() == "CLOSED" ? "label-default" : "label-danger" ?>"><?php echo $incident->getStatus(); ?></span></td>
            <td><?php echo nl2br($incident->getMessage()); ?></td>
            <td>
              <?php echo date('d/m/Y H:i', strtotime($incident->getCreatedAt())); ?><br />
              <span class="label label-default">by <?php echo $incident->getOpenedBy(); ?></span>
            </td>
            <td>
              <?php if ($incident->getClosedAt()): ?>
              <?php echo date('d/m/Y H:i', strtotime($incident->getClosedAt())); ?><br />
              <span class="label label-default">by <?php echo $incident->getClosedBy(); ?></span>
              <?php else : ?>
              -
              <?php endif; ?>
            </td>
            <td>
              <?php foreach($incident->getOrderDetailsIncident() as $order_detail_incident): ?>
                <?php foreach($order_detail_incident->getRefunds() as $refund): ?>
                  <p>
                    <?php echo date('d/m/Y H:i', strtotime($refund->getCreatedAt())); ?><br />
                    <span class="label label-info"><?php echo $refund->getProductAmount(); ?> €</span>
                  </p>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    <?php else: ?>
      <div class="no_orders">
        No incident.
      </div>
    <?php endif; ?>

    <?php include('footer.tpl.php'); ?>

    </div>

  </body>
</html>
