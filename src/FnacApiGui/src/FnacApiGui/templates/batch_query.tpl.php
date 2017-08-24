<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <div class="container">

    <?php if (count($batches) > 0): ?>
      <div id="data">
        <table id="batch_query_table" class="table">
          <thead>
            <tr>
              <th scope="col">Batch id</th>
              <th scope="col" class="small">Lines</th>
              <th scope="col" class="small">Status</th>
              <th scope="col">Created at</th>
            </tr>
          </thead>

          <?php foreach($batches as $batch): ?>
          <tr>
            <td><a href="batch_query.php?batch_id=<?php echo $batch->getBatchId(); ?>"><?php echo $batch->getBatchId(); ?></a></td>
            <td><?php echo $batch->getNbLines(); ?></td>
            <td><?php echo $batch->getStatus(); ?></td>
            <td><?php echo date('d/m/Y H:i', strtotime($batch->getCreatedAt())); ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    <?php else: ?>
      <div class="no_orders">
        No batch to display.
      </div>
    <?php endif; ?>
      
    <?php include('footer.tpl.php'); ?>
    
    </div>

    <?php include('debug_info.tpl.php'); ?>

  </body>
</html>
