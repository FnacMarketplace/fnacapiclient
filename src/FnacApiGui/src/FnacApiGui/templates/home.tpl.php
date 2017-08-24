<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php if ($status == "OK"): ?>
      <?php include('nav.tpl.php'); ?>
    <?php endif; ?>
      
      <div class="jumbotron">
          <div class="container">
            <h1>Welcome!</h1>
            <p>This interface will allow you to manage your Fnac Marketplace seller account by using our API.</p>
            <p>It is fully customizable, and even this text can be changed!</p>

            <?php if ($status == "OK"): ?>
            <p>Now, here are some figures about your account.</p>

            <div id="active_offers" class="infobox">
              <h2>Active offers</h2>
              <p><?php echo $nb_offers; ?></p>
            </div>

            <div id="new_orders" class="infobox">
              <h2>New orders</h2>
              <p><?php echo $nb_new_orders; ?></p>
            </div>

            <div id="to_ship_orders" class="infobox">
              <h2>Orders to ship</h2>
              <p><?php echo $nb_orders_to_ship; ?></p>
            </div>

            <div id="opened_incidents" class="infobox">
              <h2>Opened incidents</h2>
              <p><?php echo $nb_opened_incidents; ?></p>
            </div>

            <div id="enqueued_batches" class="infobox">
              <h2>Enqueued batches</h2>
              <p><?php echo $nb_enqueued_batches; ?></p>
            </div>
            <?php else: ?>
            <div class="panel panel-danger">  
                <div class="panel-heading">Connection error</div>
                <div class="panel-body">
                    Something is wrong with your connection. Please check your authentication parameters, or contact Fnac Marketplace technical support.
                </div>
            </div>        
            <?php endif; ?>

            <hr style="visibility: hidden; clear: both;" />              
          </div>
        </div>
          
        <div class="container">
          <div class="panel panel-primary">            
              <div class="panel-heading">Your connection parameters</div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">Partner_id: <?php echo $partner_id; ?></li>
                  <li class="list-group-item">Key: <?php echo $key; ?></li>
                  <li class="list-group-item">Shop_id: <?php echo $shop_id; ?></li>
                  <li class="list-group-item">Url: <?php echo $url; ?></li>
                </ul>
              </div>          
          </div>
        <?php include('footer.tpl.php'); ?>
        </div>


  </body>
</html>
