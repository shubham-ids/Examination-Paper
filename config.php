<?php
  $multiAction  = (isset($_REQUEST['multiAction'])) ? $_REQUEST['multiAction'] : '';
  $searchBar    = (isset($_REQUEST['searchBar']) )  ? $_REQUEST['searchBar']   : '';
  $user         = (isset($_REQUEST['users']))       ? $_REQUEST['users']       : '';
  $page         = (isset($_REQUEST['page']) )       ? $_REQUEST['page']        : 1;
  $orderBy      = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  $order        = isset($_REQUEST['order'])         ? $_REQUEST['order']       : 'DESC';
  $entries      = isset($_REQUEST['showEntries'])   ? $_REQUEST['showEntries'] : '';
  $task         = isset($_REQUEST['task'])          ? $_REQUEST['task']        : '';

  $currentPage  = empty($page)      ? 1  : intval( $page );
  $searchBar    = empty($searchBar) ? '' : $searchBar;
  $entries      = empty($entries)   ? 10 : $entries;
  $currentPage  =($currentPage <= 0) ? 1  : $currentPage;
  
  $record_perpage = $entries;
  $queryPart      = "";
  $orderPart      = "";
  
  $record_perpage = intval($entries);
  $limitPosition  = ( $currentPage - 1) * $record_perpage;
  $queryPart      = "";  
?>