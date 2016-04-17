<div class="left-sidebar">
	<h2>Categorias</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	<!-- Conectar a la base de datos -->
	<?php
		$mysqli = new mysqli("localhost", "espanoles", "coco_1drilo", "espenedin2");
		if ($mysqli->connect_errno) {
			echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		};
		$mysqli->set_charset("utf8");

		//MySqli Select Query
		$results = $mysqli->query("SELECT DISTINCT LEFT( category.category, 1 ) AS  'letra' FROM category INNER JOIN list on list.category=category.id ORDER BY letra");

		while($row = $results->fetch_assoc()) {
			print '<div class="panel panel-default">';
			print '<div class="panel-heading">';
			print '<h4 class="panel-title">';
			print '<a data-toggle="collapse" data-parent="#accordian" href="#category'.$row["letra"].'">';
			print '<span class="badge pull-right"><i class="fa fa-plus"></i></span>';
			print '<div class="item-subtitle">'.$row["letra"].'</div>';
			print '</a>';
			print '</h4>';
			print '</div>';
			print '<div id="category'.$row["letra"].'" class="panel-collapse collapse">';
			print '<div class="panel-body">';
			print '<ul>';
			//MySqli Select Query
			$results2 = $mysqli->query("SELECT distinct category.category, category.id FROM category INNER JOIN list on list.category=category.id WHERE category.category like '".$row["letra"]."%'");
						
			while($row2 = $results2->fetch_assoc()) {
				print '<li><a href="listado.php?cat='.$row2["category"].'"><div class="item-category">'.$row2["category"].'</div></a></li>';
			}  
			print '</div>';
			print '</div>';
			print '</div>';
		} 
	?>
	<!--y aqui acaba -->
	</div><!--/category-products-->
</div>