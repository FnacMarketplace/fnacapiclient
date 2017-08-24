<!-- Display xml requests and response for debugging purpose -->

    <div id="debug_info_button">
      <span>Show XML request/response</span>
    </div>

    <section id="debug_info">
      <p id="hideXML">Hide</p>
      <?php if(isset($xml_update_request)): ?>
        <h1>XML Update Request</h1>
<code><?php echo $xml_update_request; ?></code>

        <h1>XML Update Response</h1>
<code><?php echo $xml_update_response; ?></code>
      <?php endif; ?>

      <h1>XML Query Request</h1>
<code><?php echo $xml_request; ?></code>

      <h1>XML Query Response</h1>
<code><?php echo $xml_response; ?></code>
    </section>

    <script>
      $("#debug_info_button").click(function () {
        $("#debug_info").toggle();
      });

      $("#hideXML").click(function () {
        $("#debug_info").hide();
      });
    </script>