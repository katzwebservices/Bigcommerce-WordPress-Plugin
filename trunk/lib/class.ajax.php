<?php

class Bigcommerce_ajax {
	public function BuildAjaxiFrame() {
		@set_time_limit(0);
		@ob_implicit_flush(1);
		ob_start();
		echo '<div class="wrap" style="padding:0 30px;">';
		echo('<!-- '.str_pad('asdasdasdasdsd',2048," ").' -->');

		echo '<h3>Categories</h3>';
		echo '<ul class="ul-disc">';
			Bigcommerce_parser::BuildCategoriesSelect(true, true);
		echo '</ul>';

		echo '<h3>Products</h3>';
		echo '<ul class="ul-disc">';
			Bigcommerce_parser::BuildProductsSelect(true, true);
		echo '</ul>';
		ob_flush();

		echo '<h3>Data Validation</h3>';
		echo '<ul>';
		echo '<li>Confirming Product List: ';
		ob_flush();
		$list = Bigcommerce_parser::BuildProductsSelect( false );
		if($list) { echo 'confirmed'; } else { echo 'ERROR'; }
		echo '</li>';
		ob_flush();


		echo '<li>Confirming Category List: ';
		ob_flush();
		$list = Bigcommerce_parser::BuildCategoriesSelect( false );
		if($list) { echo 'confirmed'; } else { echo 'ERROR'; }
		echo '</li>';
		echo '</ul>';

		echo sprintf('<a href="#" class="button" onclick="window.parent.location = \'%s\'">%s</a>', admin_url('options-general.php?page=bigcommerce'), __('Close Window', 'wpinterspire'));

		ob_flush();

		echo '</div>';

		ob_clean();

		die();// Necessary to avoid "0" WordPress output.
	}

	public function BuildAjax() {
		@wp_iframe( array('Bigcommerce_ajax', 'BuildAjaxiFrame') );
	}
}