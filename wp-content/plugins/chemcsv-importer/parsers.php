<?php
class CSV_Parser {
	var $posts = array();
	var $term_default = array('domain'=>'category','slug'=>'products','name'=>'产品中心');
	var $content_tpl = '';
	var $title_index = 1;

	function CSV_Parser() {
	$this->content_tpl .= '<table class="pdt-tab">';
	$this->content_tpl .= '<tr class="pdt-row">';
	$this->content_tpl .= '<td class="pdt-td1">#head#</td>';
	$this->content_tpl .= '<td class="pdt-td2">#body#</td>';
	$this->content_tpl .= '</tr>';
	$this->content_tpl .= '</table>';
	}

	function parse( $file ) {
		$file = fopen($file, 'r');
		$heads = fgetcsv($file, 1024);
		$cols_all = count($heads);
		for ($i = 0; $i < $cols_all; $i++) {
			$heads[$i] = iconv("GBK", "UTF-8", $heads[$i]);
		}

		while (!feof($file)) {
			$bodys = fgetcsv($file, 1024);
			$cols_cur = count($bodys);
			if ($cols_cur < 1) {
				continue;
			}
			if ($cols_cur == $cols_all) {
				$cols_cur = $cols_all - 1;
				$termed = TRUE;
			} else {
				$termed = FALSE;
			}

			$content = '';
			$content .= '<table class="pdt-tab">';
			for ($i = 0; $i < $cols_cur; $i++) {
				$bodys[$i] = iconv("GB2312", "UTF-8", $bodys[$i]);
				$content .= '<tr class="pdt-row">';
				$content .= '<td class="pdt-td1">'.$heads[$i].'</td>';
				$content .= '<td class="pdt-td2">'.$bodys[$i].'</td>';
				$content .= '</tr>';
			}
			$content .= '</table>';

			$term = $this->term_default;
			if ($termed) {
				$term['slug'] = $bodys[$cols_cur];
				$term['name'] = $bodys[$cols_cur - 1];
			}
			$terms[0] = $term;
			$date_now = date('Y-m-d h:i:s');
			$post = array(
				'post_type' => 'post',
				'status' => 'publish',
				'post_title' => $bodys[$this->title_index],
				'post_date' => $date_now,
				'post_date_gmt' => $date_now,
				'post_content' => $content,
				'terms' => $terms
			);
			$this->posts[] = $post;
		}
		return array(
			'posts' => $this->posts
		);
	}
}
?>