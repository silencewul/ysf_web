<?php
header("Content-type: text/html; charset=utf-8");
$data = [];
$list = [
    //['title'=>'铜梁300减100券','couponId'=>'10273151','desc'=>''],
    //['title'=>'铜梁150减50券','couponId'=>'10273161','desc'=>''],
    //['title'=>'铜梁60减20券','couponId'=>'10273171','desc'=>''],
    //['title'=>'万州300减100','couponId'=>'3102023020153092','desc'=>''],
    //['title'=>'大足500减200','couponId'=>'3102023020152976','desc'=>''],
    //['title'=>'大足300减100','couponId'=>'3102023020152995','desc'=>'(187/135/136/133未参与)'],
    //['title'=>'大足150减50','couponId'=>'3102023020152990','desc'=>'(199/189/153未参与)'],
    //['title'=>'大足100减30','couponId'=>'3102023020152950','desc'=>''],
    //['title'=>'梁平300减100','couponId'=>'3102023012851838','desc'=>''],
    //['title'=>'梁平100减30','couponId'=>'3102023012851842','desc'=>''],
    //['title'=>'加油200减20','couponId'=>'3102022053067418','desc'=>''],
    //['title'=>'大足300减100','couponId'=>'3102023031363076','desc'=>''],
    //['title'=>'大足200减70','couponId'=>'3102023031363083','desc'=>''],
    //['title'=>'永辉62减10','couponId'=>'3102022040153364','desc'=>''],
	
    //['title'=>'第一期300-100','couponId'=>'3102023081107707','desc'=>''],
    //['title'=>'第一期150-50','couponId'=>'3102023081107700','desc'=>''],
    //['title'=>'第一期50-20','couponId'=>'3102023081107684','desc'=>''],
    //['title'=>'第二期300-100','couponId'=>'3102023081809493','desc'=>''],
    //['title'=>'第二期150-50','couponId'=>'3102023081809490','desc'=>''],
    //['title'=>'第二期50-20','couponId'=>'3102023081809483','desc'=>''],
    //['title'=>'最后300-100','couponId'=>'3102023082511584','desc'=>''],
    //['title'=>'最后150-50','couponId'=>'3102023082511581','desc'=>''],
    //['title'=>'最后50-20','couponId'=>'3102023082511578','desc'=>''],
	//['title'=>'綦江通用消费券','couponId'=>'3102023092421959','desc'=>''],
	//['title'=>'綦江餐饮消费券','couponId'=>'3102023092421952','desc'=>''],
	//['title'=>'永川300元减100','couponId'=>'3102023092421932','desc'=>''],
	//['title'=>'永川150元减50','couponId'=>'3102023092421920','desc'=>''],
	//['title'=>'武隆500元减100元','couponId'=>'3102023101228247','desc'=>''],
	//['title'=>'武隆300元减50元','couponId'=>'3102023101228253','desc'=>''],
	//['title'=>'山姆满1019元减109元优惠','couponId'=>'3102023110736199','desc'=>''],
	//['title'=>'綦向满150元减50元通用','couponId'=>'3102023113043843','desc'=>''],
	//['title'=>'爱尚武隆200元减40元','couponId'=>'3102023121347157','desc'=>''],
	//['title'=>'建行超市满60元减25元','couponId'=>'3102023101829794','desc'=>''],
	//['title'=>'约惠两江618元减600元','couponId'=>'3102023122752268','desc'=>''],
	//['title'=>'约惠两江300元减100元','couponId'=>'3102024021967275','desc'=>''],
	//['title'=>'约惠两江150元减50元','couponId'=>'3102024021967272','desc'=>''],
	//['title'=>'农行借记卡满200元减20元','couponId'=>'3102023102531589','desc'=>''],
	//['title'=>'便利店满20减8元','couponId'=>'3102023092724660','desc'=>''],
	//['title'=>'武隆200元减40元','couponId'=>'3102024010956432','desc'=>''],
	//['title'=>'满300元减100元通用消费券','couponId'=>'3102024011758734','desc'=>''],
	//['title'=>'满200元减50元加油消费券','couponId'=>'3102024021967276','desc'=>''],
	//['title'=>'满100元减20元消费券','couponId'=>'3102024030671303','desc'=>''],
	//['title'=>'满380元减300元消费券','couponId'=>'3102024030671314','desc'=>''],
	//['title'=>'爱购迪信通','couponId'=>'3102024032274707','desc'=>''],
	['title'=>'高新区1000减300','couponId'=>'3102024091227040','desc'=>''],
];
foreach ($list as $v) {
    $url = "https://content.95516.com/koala-pre/koala/coupon/state?couponId=".$v['couponId']."&cityCd=500000";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $res = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($res,true);
    if(empty($arr['params']['couponQuota'])){
        continue;
    }
    if($arr['params']['couponQuota'] == '活动已抢完' || $arr['params']['couponQuota'] == '今日已抢完'){
        $color = '#050505';
    }else{
        $color = 'red';
    }
    echo '<h1>'.$v['title'].'--<a style="color:'.$color.'">'.$arr['params']['couponQuota'].'</a><a style="font-size:20px">'.$v['desc'].'</a></h1>';
}
?>