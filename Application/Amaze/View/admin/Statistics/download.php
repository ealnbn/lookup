<?php 
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="withdraw.csv"');
	header('Cache-Control: max-age=0');
	
	// 打开PHP文件句柄，php://output 表示直接输出到浏览器
	$fp = fopen('php://output', 'a');
	
	// 输出Excel列名信息
	$head=array('教师姓名','教师电话','提现金额','申请时间','处理时间');
	foreach ($head as $i => $v) {
		// CSV的Excel支持GBK编码，一定要转换，否则乱码
		$head[$i] = iconv('utf-8', 'gbk', $v);
	}
	// 将数据通过fputcsv写到文件句柄
	fputcsv($fp, $head);

	foreach ($data as $t){
		$temp=array();
		array_push($temp,iconv('utf-8', 'gbk', $t['name']));
		array_push($temp,$t['tel']);
		array_push($temp,$t['money']);
		array_push($temp,$t['create_time']);
		array_push($temp,$t['update_time']);
		fputcsv($fp, $temp);
	}
	
	fclose($fp);
?>