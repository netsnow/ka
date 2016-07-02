<?php

namespace App\Modules\Admin\Http\Logics\StuReport;

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
      $qb= DB::table('checkin_data')
          ->select('students.*',DB::raw('floor(checkin_datetime/1000000) as attendance_month'),DB::raw('COUNT(1) as ac_day'))
          ->Join('students', 'students.student_id', '=', 'checkin_data.user_id')
          ->groupby('checkin_data.user_id',DB::raw('floor(checkin_datetime/1000000)'))
          ->orderBy('attendance_month', 'desc');

          if($this->month != 'empty') {
              $qb->whereRaw('floor(checkin_datetime/1000000) like "%'.$this->month.'%"');
          }

          if($this->name != 'empty') {
              $qb->whereRaw('real_name like "%'.$this->name.'%"');
          }
          if($this->class != 'empty') {
              $qb->whereRaw('company_name like "%'.$this->class.'%"');
          }



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
                     ->setCellValue('B1', '卡号')
                     ->setCellValue('C1', '姓名')
                     ->setCellValue('D1', '班级')
                     ->setCellValue('E1', '实出勤天数');

         /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
        foreach($data as $k => $v){
             $num=$k+2;
             $objPHPExcel->setActiveSheetIndex(0)
                         //Excel的第A列，uid是你查出数组的键值，下面以此类推
                          ->setCellValue('A'.$num, $v->attendance_month)
                          ->setCellValue('B'.$num, $v->phone)
                          ->setCellValue('C'.$num, $v->real_name)
                          ->setCellValue('D'.$num, $v->company_name)
                          ->setCellValue('E'.$num, $v->ac_day);
            }


        $objPHPExcel->getActiveSheet()->setTitle('Attendance');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Attendance-stu.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');


    }

}
