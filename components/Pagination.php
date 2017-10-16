<?php

namespace components;

class Pagination {
	public $pagination;

	public function __construct($newsCount, $activePage, $maxRows, $url) {
		$rows = $newsCount;
		$page_rows = $maxRows;
		$last = ceil($rows/$page_rows);
		if($last < 1){
			$last = 1;
		}

		$pagenum = $activePage;
		if ($pagenum < 1) {
			$pagenum = 1;
		} else if ($pagenum > $last) {
			$pagenum = $last;
		}

		$paginationCtrls = '';
		if($last != 1){
			if ($pagenum > 1) {
				$previous = $pagenum - 1;
				$paginationCtrls .= '<li><a href="' . $url . $previous. '"><span aria-hidden="true">&laquo;</span></a></li> ';
				for($i = $pagenum-2; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'. $url. $i.'">'.$i.'</a></li> ';
					}
				}
			}
			$paginationCtrls .= '<li class="active"><a href="javascript:;">'.$pagenum.'</li>';
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li><a href="' . $url . $i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+2){
					break;
				}
			}
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= '<li><a href="'. $url . $next.'"><span aria-hidden="true">&raquo;</span></a></li> ';
			}
		}
		$paginationCtrls = '<ul class="pagination">' . $paginationCtrls . '</ul>';
		$this->pagination = $paginationCtrls;
	}
}