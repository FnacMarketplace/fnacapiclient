 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">      
      <ul class="nav navbar-nav">
        <li><a href="index.php">Fnac Marketplace API Client</a></li>
        <li><a href="offers_query.php">Offers</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Orders <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="orders_query.php">All</a></li>
            <li><a href="orders_query.php?state=Created">Created</a></li>
            <li><a href="orders_query.php?state=Accepted">Accepted</a></li>
            <li><a href="orders_query.php?state=ToShip">ToShip</a></li>
            <li><a href="orders_query.php?state=Shipped">Shipped</a></li>
            <li><a href="orders_query.php?state=Received">Received</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Incidents <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="incidents_query.php">All</a></li>
            <li><a href="incidents_query.php?status=OPENED">Opened</a></li>
            <li><a href="incidents_query.php?status=CLOSED">Closed</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Batches <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="batch_query.php">Running batches</a></li>
            <li><a href="batch_query.php?show_recent">Recent batches</a></li>
          </ul>
        </li>
        <li><a href="shop_invoices_query.php">Invoices</a></li>
      </ul>
  </div>
</nav>