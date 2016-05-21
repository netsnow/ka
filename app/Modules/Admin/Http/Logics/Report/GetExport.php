<?php

namespace App\Modules\Admin\Http\Logics\Report;

use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;

class GetExport extends \BaseLogic
{
    protected function execute()
    {
    	try {
	        $this->getReportList();
    	} catch (Exception $e) {
    		$this->result['error']  = $e->getMessage();
    	}
    }

    protected function getReportList()
    {
        $qb= DB::table('order')
            ->select('order.buyer_phone','users.*',DB::raw('floor(attendance_date/100) as attendance_month'),DB::raw('COUNT(1) as plan_day'), DB::raw('COUNT(IF(status=1,1,NULL)) as ac_day'))
            ->leftJoin('users', 'users.phone', '=', 'order.buyer_phone')
            ->groupby('order.buyer_phone',DB::raw('floor(attendance_date/100)'))
            ->orderBy('attendance_month', 'desc');
        $objPHPExcel = new PHPExcel();
        /*以下是一些设置 ，什么作者  标题啊之类的*/
         $objPHPExcel->getProperties()->setCreator("baixue")
                               ->setLastModifiedBy("baixue")
                               ->setTitle("数据EXCEL导出")
                               ->setSubject("数据EXCEL导出")
                               ->setDescription("考勤数据")
                               ->setKeywords("excel")
                              ->setCategory("result file");
        $data=$qb->get();

        $objPHPExcel->setActiveSheetIndex(0)
                     ->setCellValue('A1', '考勤月')
                     ->setCellValue('B1', '手机号')
                     ->setCellValue('C1', '姓名')
                     ->setCellValue('D1', '班级')
                     ->setCellValue('E1', '应出勤天使')
                     ->setCellValue('F1', '实出勤天数');

         /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        foreach($data as $k => $v){
             $num=$k+2;
             $objPHPExcel->setActiveSheetIndex(0)
                         //Excel的第A列，uid是你查出数组的键值，下面以此类推
                          ->setCellValue('A'.$num, $v->attendance_month)
                          ->setCellValue('B'.$num, $v->buyer_phone)
                          ->setCellValue('C'.$num, $v->real_name)
                          ->setCellValue('D'.$num, $v->company_name)
                          ->setCellValue('E'.$num, $v->plan_day)
                          ->setCellValue('F'.$num, $v->ac_day);
            }


        $objPHPExcel->getActiveSheet()->setTitle('Attendance');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Attendance.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');


    }

}
