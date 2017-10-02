<!DOCTYPE html>
<html>
  <?php include('head.tpl.php'); ?>
  <body>

    <?php include('nav.tpl.php'); ?>

    <?php include('debug_info.tpl.php'); ?>
      
    <div class="container">
        
    <?php if (count($messages) > 0): ?>
      <div id="data">
        <table id="messages_query_table" class="table">
          <thead>
            <tr>
              <th scope="col" class="small">Referer</th>
              <th scope="col" class="small">Type</th>
              <th scope="col" class="small">Message</th>
              <th scope="col" class="small">Created</th>
            </tr>
          </thead>

          <?php foreach($messages as $message): ?>
          <tr>
            <td>
                <a class="detailed_message_button" <?php echo $message->getState() == \FnacApiClient\Type\MessageStateType::READ ? "" : "style=\"font-weight: bold\"" ?> href="#" onclick="displayMessageDetails(this);return false;"><?php echo $message->getMessageReferer(); ?></a>
                  <!-- Order detail block -->
                  <div class="detailed_message">
                    <div class="row">
                        <div class="col-xs-11"><?php echo $message->getMessageRefererType(); ?> <?php echo $message->getMessageReferer(); ?> <span class="label <?php echo $message->getState() == \FnacApiClient\Type\MessageStateType::READ ? "label-success" : "label-danger" ?>"><?php echo $message->getState(); ?></span></div>
                        <div class="col-xs-1"><button type="button" class="close" onclick="closeDetails(this);return false;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
                        <div class="col-xs-11"><span class="message_id">Message id <?php echo $message->getMessageId(); ?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 message_content"><?php echo $message->getMessageDescription(); ?></div>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </td>
            <td><span class="label <?php echo $message->getMessageRefererType() == \FnacApiClient\Type\MessageType::OFFER ? "label-primary" : "label-warning" ?>"><?php echo $message->getMessageRefererType(); ?></span></td>
            <td><?php echo nl2br($message->getMessageSubject()); ?></td>
            <td>
              <?php echo date('d/m/Y H:i', strtotime($message->getCreatedAt())); ?><br />
              <?php                
                $label_class = "label-default";
                
                switch ($message->getMessageFromType()) {
                    case \FnacApiClient\Type\MessageFromType::CLIENT:
                        $label_class = "label-danger";
                        break;
                        
                    case \FnacApiClient\Type\MessageFromType::SELLER:
                        $label_class = "label-primary";
                        break;
                        
                    case \FnacApiClient\Type\MessageFromType::CALLCENTER:
                        $label_class = "label-warning";
                        break;
                }
              ?>
              <span class="label label-default">by <?php echo $message->getMessageFrom(); ?></span> <span class="label <?php echo $label_class ?>"><?php echo $message->getMessageFromType(); ?></span>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        <script type="text/javascript">
          // Order detail block displaying script
          function displayMessageDetails(e)
          {
            $(".detailed_message").prev().show();
            $(".detailed_message").hide();
            $(e).toggle();
            $(e).next('.detailed_message').show();
          }

          // Order detail block closing button script
          function closeDetails(e)
          {
            $(e).parents(".detailed_message").hide();
            $(e).parents(".detailed_message").prev(".detailed_message_button").show();
          }
        </script>
      </div>

      <?php $base_page = "messages_query.php?"; ?>
      <?php include('pager.tpl.php'); ?>
        
    <?php else: ?>
      <div class="no_orders">
        No message.
      </div>
    <?php endif; ?>
      
    <?php include('footer.tpl.php'); ?>
        
    </div>

  </body>
</html>
