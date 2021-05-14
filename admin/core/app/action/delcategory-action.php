<?php

$cat = CategoryData::getById($_GET["id_categoria"]);
$cat->del();


Core::alert("Categoria Eliminada");
Core::redir("index.php?view=categories");

?>