<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<!-- <ul class="pagination"> -->
	<div class="row">
			<?php echo $presenter->render(); ?>
	</div>
	<!-- </ul> -->
<?php endif; ?>
