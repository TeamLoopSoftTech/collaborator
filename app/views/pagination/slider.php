<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
   <nav>
		<ul class="pagination">
            <?php echo getPrevious($paginator->getCurrentPage(), $paginator->getUrl( $paginator->getCurrentPage()-1 ) ) ?>
            <?php echo $presenter->getPageRange(1, $paginator->getLastPage() ); ?>
            <?php echo getNext($paginator->getCurrentPage(), $paginator->getLastPage(), $paginator->getUrl( $paginator->getCurrentPage()+1 ) )  ?>
        </ul>
    </nav>
<?php endif; ?>

<?php
function getPrevious($currentPage, $url)
{
    if ($currentPage <= 1)
        return '<li class="disabled"><span class="icon-chevron-left">&laquo;</span></li>';
    else
       return '<li class="active"><a class="icon-chevron-left" href="'.$url.'"><span class="icon-chevron-left">&laquo;</span></a></li>';
}

function getNext($currentPage, $lastPage, $url)
{
    if ($currentPage >= $lastPage)
       return '<li class="disabled"><span class="icon-chevron-left">&raquo;</span></li>';
    else
        return '<li class="active"><a class="icon-chevron-right" href="'.$url.'"><span class="icon-chevron-left">&raquo;</span></a></li>';
}
?>