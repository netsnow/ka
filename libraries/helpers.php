<?php

/**
 * 通过切换命名空间，换主题
 * @param  string $view 模板的key
 * @return string       返回新的key
 */
function tpl($view = null)
{
    $theme = 'default';
    $tpl = $theme . '::' . $view;

    $factory = app('Illuminate\Contracts\View\Factory');
    if (!$factory->exists($tpl)) {
        $tpl = 'default::' . $view;
    }

    return $tpl;
}

/**
 * 切换静态文件的cdn，默认不实用cdn
 * @param  string $str 七牛的二级域名
 * @return string      服务器域名
 */
function cdn($str = '')
{
    if (!empty($str)) {
        return sprintf('http://%s.qiniudn.com', $str);
    } else {
        return '';
    }
}

/**
 * 生成css文件的引用，为了方便切换cdn
 * @param  string $asset css文件的路径
 * @return string        css的引用html
 */
function style($asset)
{
    $asset = cdn() . $asset . '?v=' . time();
    return sprintf('<link href="%s" rel="stylesheet">', asset($asset));
}

/**
 * 生成js文件的引用，为了方便切换cdn
 * @param  string $asset js文件的路径
 * @return string        js的引用html
 */
function script($asset)
{
    $asset = cdn() . $asset . '?v=' . time();
    return sprintf('<script src="%s"></script>', asset($asset));
}

/**
 * 把明确时间转化成智能时间（例如：3秒前，5天前）
 * @param  string $str 代表时间的字符串
 * @return string      智能时间（例如：3秒前，5天前）
 */
function smart_time($str)
{
    $ts = strtotime($str);
    $passed = time() - $ts;

    if ($passed < 60) {
        return $passed . '秒前';
    } elseif ($passed < 3600) {
        $minute = floor($passed / 60);
        return $minute . '分钟前';
    } elseif ($passed < 3600 * 24) {
        $hour = floor($passed / 3600);
        return $hour . '小时前';
    } else {
        $day = floor($passed / (3600 * 24));
        if ($day < 31) {
            return $day . '天前';
        }
    }

    return date('Y-m-d', $ts);
}

/**
 * 取得访客的ip地址
 * @return [type] [description]
 */
function get_client_ip()
{
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (!empty($_SERVER["REMOTE_ADDR"])) {
        $ip = $_SERVER["REMOTE_ADDR"];
    } else {
        $ip = "unknown";
    }

    return $ip;
}

/**
 * 生成网页的seo标题
 * @param  mixed  $feed      字符串或数组，组成标题的各级名称
 * @param  string $separator 标题分隔符
 * @return string            网页的标题
 */
function seo_title($feed, $separator = ' - ')
{
    if (!is_array($feed)) {
        $feed = [$feed];
    }

    $title = implode($separator, $feed);

    return $title;
}

/**
 * 生成网页的seo描述
 * @param  string $html 从富文本中截取50文字
 * @return string       网页的标题
 */
function seo_desc($html, $length = 50)
{
    $search = [
        "'<script[^>]*?>.*?</script>'si", // 去掉 javascript
        "'<[\/\!]*?[^<>]*?>'si", // 去掉 HTML 标记
        "'([\r\n])[\s]+'", // 去掉空白字符
        "'&(quot|#34);'i", // 替换 HTML 实体
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i",
        "'&(iexcl|#161);'i",
        "'&(cent|#162);'i",
        "'&(pound|#163);'i",
        "'&(copy|#169);'i",
//        "'&#(\d+);'e"
    ];

    $replace = [
        "",
        "",
        "\\1",
        "\"",
        "&",
        "<",
        ">",
        " ",
        chr(161),
        chr(162),
        chr(163),
        chr(169),
//        "chr(\\1)"
    ];

    $text = preg_replace($search, $replace, $html);

    return iconv_substr($text, 0, $length, 'UTF-8');
}

/**
 * 移除富文本中的javascript
 * @param  string $html 富文本
 * @return string       移除javascript的富文本
 */
function remove_js($html)
{
    $pattern = '/<script[^>]*?>.*?</script>/si';
    $replacement = '';

    return preg_replace($pattern, $replacement, $html);
}

/**
 * 计算比较日期距当前日期还有多少天
 * @param 比较日期 $date
 */
function get_date_difference($start_date,$end_date){
	// 获取当前是日期时间戳
    $now = strtotime(date("y-m-d"));
    // 获取开始日期的时间戳
    $start_date = strtotime($start_date);
    // 获取结束日期的时间戳
    $end_date = strtotime($end_date);
    $day;
    // 结束时间为空，返回0
    if(!$end_date){
        return 0;
    }
    // 当前日期大于结束日期，返回0
    if($now > $end_date){
        return 0;
    }
    // 当前日期小于开始日期，计算开始
    if($now < $start_date){
        $day = ceil(($end_date-$start_date)/86400);
    }else{
        $day = ceil(($end_date-$now)/86400);
    }

    return $day;
}

function utf8_json_encode($array_data)
{
    $array_data = array_map('pre_json_encode', $array_data);
    $array_data = json_encode($array_data);

    return urldecode($array_data);
}

function pre_json_encode($value)
{
    if (is_array($value)) {
        return array_map('pre_json_encode', $value);
    }

	if (is_string($value)) {
		return urlencode($value);
	}

	return $value;
}

function float_to_unixts($float_time)
{
    $days_from_unix = $float_time - 25569;

    return round($days_from_unix * 3600 * 24)  - 3600 * 8;
}

function unixts_to_float($ts)
{
    return ($ts + 3600 * 8) / 3600 / 24 + 25569;
}
