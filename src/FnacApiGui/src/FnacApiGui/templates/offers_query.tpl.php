<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>
      
    <?php include('debug_info.tpl.php'); ?>

    <div class="container">
    <?php if(isset($batch_id)): ?>
    <div id="confirm_response" class="alert alert-success">
      Offer <strong><?php echo $_GET['offer_sku']; ?></strong> update sent with batch id <a href="batch_query.php?batch_id=<?php echo $batch_id; ?>"><?php echo $batch_id; ?></a>
    </div>
    <?php endif; ?>

    <div id="paging">
      page <?php echo $page ?> / <?php echo $total_paging ?> | offers <?php echo $min_offer_number ?> - <?php echo $max_offer_number ?>  / <?php echo $nb_total_result ?> total offers
    </div>

    <div id="data">
      <table id="offers_query_table" class="table">
        <thead>
          <tr>
            <th class="small" scope="col">&nbsp;</th>
            <th class="small" scope="col">Name</th>
            <th class="small" scope="col">State</th>
            <th class="small" scope="col">SKU</th>
            <th class="small" scope="col">Quantity</th>
            <th class="small" scope="col">Price</th>
            <th class="small" scope="col">Actions</th>
          </tr>
        </thead>

        <?php foreach($offers as $offer): ?>
          <tr>
            <?php if ($offer->getImage() != '') : ?>
            <td><img src="<?php echo $offer->getImage(); ?>" alt="" /></td>
            <?php else : ?>
            <td>&nbsp;</td>
            <?php endif; ?>
            <td>
                <a class="product_link" href="<?php echo $offer->getProductUrl(); ?>"><?php echo $offer->getProductName(); ?></a>
                <p><textarea class="form-control" id="<?php echo strtr($offer->getOfferSellerId(), './', '__'); ?>_description" placeholder="Add a description..."><?php $offer->getDescription(); ?></textarea></p>
            </td>
            <td><span class="badge"><?php echo $offer->getProductStateLabel(); ?></span></td>
            <td><?php echo $offer->getOfferSellerId(); ?></td>
            <td class="col-xs-1"><input type="text" class="form-control" id="<?php echo strtr($offer->getOfferSellerId(), './', '__'); ?>_quantity" size="5" value="<?php echo $offer->getQuantity(); ?>" /></td>
            <td class="col-xs-1">
                <input type="text" class="form-control" id="<?php echo strtr($offer->getOfferSellerId(), './', '__'); ?>_price" size="5" value="<?php echo number_format($offer->getPrice(), 2); ?>" />
                <div class="pricing" id="<?php echo strtr($offer->getOfferSellerId(), './', '__'); ?>_pricing_reponse">
                    <a href="#" onclick="getBestPrices(this, <?php echo $offer->getProductFnacId(); ?>)">Get best prices</a>
                </div>
            </td>
            <td class="col-xs-2">
              <button class="update_button btn btn-success" onclick="updateOffer('<?php echo strtr($offer->getOfferSellerId(), './', '__'); ?>', '<?php echo $offer->getOfferSellerId(); ?>')">Update</button>
              <form action="offers_query.php" method="get" class="delete_form" style="display: inline;">
                <input type="hidden" name="action" value="delete" />
                <input type="hidden" name="offer_sku" value="<?php echo $offer->getOfferSellerId(); ?>" />
                <input type="hidden" name="page" value="<?php echo $page; ?>" />
                <button type="submit" class="delete_button btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

      <script type="text/javascript">
        function updateOffer(id, sku)
        {
          var quantity = $('#' + id + "_quantity").val();
          var price = $('#' + id + "_price").val();
          var description = $('#' + id + "_description").val();

          window.location = "offers_query.php?page=<?php echo $page ?>&action=update&offer_sku=" + sku + "&quantity=" + quantity + "&price=" + price + "&description=" + encodeURI(description);
        }

        $('.delete_form').each(function() {
          $(this).submit(function() {
            return confirm('Delete this offer?');
          });
        });
        
        function getBestPrices(e, product_reference)
        {
            var ajax_load = "Retrieving prices...";
            var loadUrl = "pricing_query.php";
            
            $(e).parent().html(ajax_load)
			.load(loadUrl, "product_reference=" + product_reference);
        }
        
      </script>
    </div>

    <?php $base_page = "offers_query.php?"; ?>
    <?php include('pager.tpl.php'); ?>

    <?php include('footer.tpl.php'); ?>
          
    </div>

  </body>
</html>
