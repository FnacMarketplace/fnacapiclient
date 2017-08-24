  <footer>
    Fnac Marketplace API Client - 2016
  </footer>

  <script>
    var found = false;
    $("nav li").each(function() {
      var link = $(this).children('a').attr('href');
      var path = window.location.pathname;
      var filename = path.split('/').pop();
      if (link == filename) {
        $(this).addClass("active");
        found = true;
      }
    });
    if (!found) {
      $("nav li:first-child").addClass("active");
    }

    $(".subnav li").each(function() {
      var link = $(this).children('a').attr('href');
      var fullpath = window.location.href;
      var query = fullpath.split('/').pop();
      query = query.split('&').shift();
      if (link == query) {
        $(this).addClass("active");
      }
    });
  </script>