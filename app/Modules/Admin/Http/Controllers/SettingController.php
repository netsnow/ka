<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Setting;

class SettingController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'setting');
    }

    public function getEditionIos()
    {
        $logic = new Setting\GetEditionIos();
        $result = $logic->run();
        return view(tpl('admin.setting.edition_ios'))->with('result', $result);
    }

    public function postSetEditionIos()
    {
        $logic = new Setting\PostSetEdition_Ios();
        $result = $logic->run();
        return $result;
    }

    public function getEditionAnd()
    {
        $logic = new Setting\GetEditionAnd();
        $result = $logic->run();
        return view(tpl('admin.setting.edition_and'))->with('result', $result);
    }

    public function postSetEditionAnd()
    {
        $logic = new Setting\PostSetEdition_And();
        $result = $logic->run();
        return $result;
    }
    
    public function getIndex()
    {
        return view(tpl('admin.setting.index'));
    }

    public function getWifi()
    {
        $logic = new Setting\GetWifi();
        $result = $logic->run();
        return view(tpl('admin.setting.wifi'))->with('result', $result);
    }

    public function postSetWifi()
    {
        $logic = new Setting\PostSetWifi();
        $result = $logic->run();
        return $result;
    }

    public function getProtocol()
    {
        $logic = new Setting\GetProtocol();
        $result = $logic->run();
        return view(tpl('admin.setting.protocol'))->with('result', $result);
    }

    public function postSetProtocol()
    {
        $logic = new Setting\PostSetProtocol();
        $result = $logic->run();
        return $result;
    }

    public function getAboutus()
    {
        $logic = new Setting\GetAboutus();
        $result = $logic->run();
        return view(tpl('admin.setting.aboutus'))->with('result', $result);
    }
	
    public function postSetAboutus()
    {
        $logic = new Setting\PostSetAboutus();
        $result = $logic->run();
        return $result;
    }
	
    public function getWeather()
    {
        $logic = new Setting\GetWeather();
        $result = $logic->run();
        return view(tpl('admin.setting.weather'))->with('result', $result);
    }

    public function postSetWeather()
    {
        $logic = new Setting\PostSetWeather();
        $result = $logic->run();
        return $result;
    }
    
    public function getStoreCode()
    {
    	$logic = new Setting\GetStoreCode();
    	$result = $logic->run();
    	return view(tpl('admin.setting.store_code'))->with('result', $result);
    }
    
    public function postStoreCode()
    {
    	$logic = new Setting\PostStoreCode();
    	$result = $logic->run();
    	return $result;
    }
}
