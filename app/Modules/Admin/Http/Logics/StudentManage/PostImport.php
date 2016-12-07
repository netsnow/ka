<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;

use Exception;
use Request;
use Validator;
use DB;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use ReflectionClass;
use ReflectionMethod;

class PostImport extends \BaseLogic
{
	protected $_attecdance = array('student_no', 'buyer_phone', 'status');

	protected function execute()
	{
		$attendanceFileName = "";
		try {
			if (Request::hasFile('studentFile')) {
				$studentFile = Request::file('studentFile');
				$studentFileName = $this->moveFile($studentFile);
				$data = $this->getDataFromExcel($studentFileName);
				//$this->validate('s', $data);
				//$today = "20".date('ymd',time());
				$this->saveData('s', $data);
			}

			$this->result['result']  = true;
            $this->result['message'] = "导入数据成功";
		} catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
		}
		finally {
			if ($studentFileName != "") {
				unlink($studentFileName);
			}
		}
	}

    protected function validate($flag, $data)
    {
    	$prefix = '';
    	$fieldNames = null;

    	if ($flag == 's') {
    		$fieldNames = $this->_fieldsStudent;
    		$prefix = '学生';
    	} else if ($flag == 't') {
    		$fieldNames = $this->_fieldsTeacher;
    		$prefix = '教师';
    	}

    	if (count($data) < 2) {
    		throw new Exception($prefix . '数据为空');
    	}

    	$titles = $data[0];
    	$diff = array_diff($fieldNames, $titles);
    	if (count($diff) > 0) {
	    	throw new Exception($prefix . '数据表缺少 "' . implode(',', $diff) . '" 字段');
	    }

	    for ($i = 1; $i < count($data); $i++) {
    		$tmpArr = $data[$i];
    		foreach ($fieldNames as $k => $v) {
    			$pos = array_search($v, $titles);
    			if ($pos !== false && ($tmpArr[$pos] == null || $tmpArr[$pos] == '')) {
    				throw new Exception ($prefix . "数据表(" . ($i + 2) . ", " . ($pos + 1) . ")为空");
    			}
    		}
    	}
    }

    protected function moveFile($file)
    {
		$targetDir = public_path() . '/data/excel/';
		$newName = time(). '_' . rand( 1 , 1000000 ) . ".xlsx";
		$file->move($targetDir, $newName);

		return $targetDir . $newName;
    }

	protected function getDataFromExcel($path)
	{
		$objReader = PHPExcel_IOFactory::createReaderForFile($path);
		$objPHPExcel = $objReader->load($path);
		$activesheet = $objPHPExcel->getActiveSheet();

		$data = array();
		$rows = $activesheet->getHighestRow();
		$col = $activesheet->getHighestColumn();
		$columns = PHPExcel_Cell::columnIndexFromString($col);

		for ($i = 1; $i <= $rows; $i++) {
			$arr = array();
			for($j = 0; $j < $columns; $j++) {
				$v = $activesheet->getCellByColumnAndRow($j, $i)->getValue();
				array_push($arr, $v);
			}
			array_push($data, $arr);
		}

		return $data;
	}

	protected function saveData($flag, $data)
	{
		$titles = $data[0];
		$status = 99;
		$fieldNames = $this->_attecdance;
        $clsName = 'App\Eloquents\Student';


		$modelClass = new ReflectionClass($clsName);
		$instance = $modelClass->newInstance();
		for ($i = 1; $i < count($data); $i++) {
			$arr = $data[$i];

			$studentnumber = $arr[1];
			$studentname = $arr[2];
			$cardnumber = $arr[3];
			$parentphone = $arr[4];
			$classname = $arr[5];

			if ($studentnumber != "") {
				$student = new Student();
				$student->phone = $studentnumber;
				$student->real_name = $studentname;
				$student->card_num = $cardnumber;
				$student->company_name = $classname;
				$student->store_name = $parentphone;

				$student->save();
			}
		}
	}

	// protected function getSalt()
	// {
	// 	$salt = '';
	// 	$i = 0;
	// 	while($i < 4) {
	// 		$salt .= substr($this->_saltSeed, rand(0,strlen($this->_saltSeed) - 1), 1);
	// 		$i++;
	// 	}

	// 	return $salt;
	// }

}
