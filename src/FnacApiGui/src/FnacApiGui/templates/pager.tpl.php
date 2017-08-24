<ul class="pagination">
    <?php if ($page > 1): ?>
        <li><a href="<?php echo $base_page; ?>page=1" title="First page of results">&Lt;</a></li>
        <li><a href="<?php echo $base_page; ?>page=<?php echo $page-1; ?>" title="Previous page of results">&lt;</a></li>
    <?php endif; ?>
    <?php for ($i; $i <= $pager_limit; ++$i): ?>
      <?php if ($page == $i): ?><li class="active"><a href="<?php echo $base_page; ?>page=<?php echo $i; ?>"><?php echo $i; ?></a></span>
      <?php else : ?><li><a href="<?php echo $base_page; ?>page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php endif; ?>
    <?php endfor; ?>
    <li><a href="<?php echo $base_page; ?>page=<?php echo $page+1; ?>" title="Next page of results">&gt;</a></li>
    <li><a href="<?php echo $base_page; ?>page=<?php echo $total_paging; ?>" title="Last page of results">&Gt;</a></li>
</ul>