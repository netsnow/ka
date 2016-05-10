<?php

namespace App\Modules\Admin\Http\Logics\Homepage;

use App\Eloquents\Store;
use App\Eloquents\Brand;
use App\Eloquents\Promotion;
use App\Eloquents\Campaign;

class HomepageIndex extends \BaseLogic
{
	protected function execute()
	{
		$result = array();
		// 店铺数量
		$numberOfStore = Store::count();
		// 品牌数量
		$numberOfBrand = Brand::count();
		// 活动数量
		$numberOfCampaign = Campaign::count();
		// 优惠数量
		$numberOfPromotion = Promotion::count();

		$result['store_n'] = $numberOfStore;
		$result['brand_n'] = $numberOfBrand;
		$result['campaign_n'] = $numberOfCampaign;
		$result['promotion_n'] = $numberOfPromotion;

		$this->result = $result;
	}
}