<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <div class="container">

        <div id="batch">
            <?php if($status == "ERROR"): ?>
            <div class="panel panel-danger">
            <?php elseif($status == "ACTIVE"): ?>
            <div class="panel panel-warning">
            <?php else: ?>            
            <div class="panel panel-success">            
            <?php endif; ?>
                <div class="panel-heading">Status <?php echo $status; ?></div>
                <div class="panel-body">Batch id <?php echo $batch_id; ?></div>
            </div>

          <div id="batch_status_data">
            <table class="table">
            <?php foreach($offers as $offer): ?>
              <?php if($offer->getStatus() == 'OK'): ?>
              <tr>
                <td class="col-xs-5">
                  <strong>SKU</strong> <?php echo $offer->getOfferSellerId(); ?><br />
                  <strong>Product Fnac Id</strong> <?php echo $offer->getProductFnacId(); ?><br />
                  <strong>Offer Fnac Id</strong> <?php echo $offer->getOfferFnacId(); ?>
                </td>
                <td><h1><span class="label label-success">OK</span></h1></td>
              </tr>

              <?php else: ?>
              <tr>
                <?php $error = $offer->getErrors(); ?>
                <td class="col-xs-5">
                  <strong>SKU</strong> <?php echo $offer->getOfferSellerId(); ?><br />
                  <strong>Error code</strong> <?php echo $error->offsetGet(0)->getCode() ?><br />
                  <strong>Message</strong> <?php echo $error->offsetGet(0)->getMessage(); ?>
                </td>
                <td><h1><span class="label label-danger">ERROR</span></h1></td>
              </tr>
              <?php endif; ?>
            <?php endforeach; ?>
            </table>
          </div>
        </div>
    <?php include('footer.tpl.php'); ?>

    </div>

    <?php include('debug_info.tpl.php'); ?>

  </body>
</html>
