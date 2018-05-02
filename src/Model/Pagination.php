<?php

require_once('Model.php');

class Pagination extends Model
{

  function Paginate($values,$per_page) {
    $total_values = count($values);

    if(isset($_GET['page'])) {
      $current_page = $_GET['page'];
    }
    else {
      $current_page = 1;
    }
    $counts = ceil($total_values / $per_page);
    $param1 = ($current_page - 1) * $per_page;
    $this->data = array_slice($values,$param1,$per_page);

    for($i=1; $i<= $counts; $i++) {
      $numbers[] = $i;
    }
    return $numbers;
  }

  function fetchResult() {
    $resultValues = $this->data;
    return $resultValues;
  }
}

$pag = new pagination();
$data = array("Hey", "Hello","awesome");

$numbers = $pag->Paginate($data,1);

$result = $pag->fetchResult();

foreach ($result as $r) {
  echo '<div>'.$r.'</div>';
}

foreach ($numbers as $num) {
  echo '<a href="Pagination.php?page='.$num.'">'.$num.'</a>';
}