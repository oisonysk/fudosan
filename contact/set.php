<?php 
$type_arr = array('個人','法人');

if(@$_POST['regist']){


 if(!$_POST['name']){
 $error['name'] ='お名前が入力されていません。';
 }
 if(!$_POST['name_kana']){
 $error['name_kana'] ='お名前(フリガナ)が入力されていません。';
 }
 if(!$_POST['email']){
 $error['email'] ='メールアドレスが入力されていません。';
 }
 if(!$_POST['tel']){
 $error['tel'] ='TELが入力されていません。';
 }
 if(!$_POST['body']){
 $error['body'] ='お問い合わせが入力されていません。';
 }
 if(!$error){
  require('confirm.html');
  exit;
 }
}

if(@$_POST['comp']){

    
    //◆メール設定
$tMailFrom = 'info@pegasus-corp.com';
//$tMailFrom = 'yoshioka@oison.com';

//◆メール受信タイトル（管理側）
$tMailSubject  = "お問い合わせ";
//◆管理側
$subject2="株式会社ペガサスにお問い合わせがありました。";
$body2.="--------------------------------------------------------------\n";
$body2.="お問い合わせを受信しました。\n";
$body2.="--------------------------------------------------------------\n\n";
$body2.="以下の内容が送られています。ご確認ください。\n\n";
$body2.="--------------------------------------------------------------\n";
$body2.="個人・法人：".$type_arr[$_POST[type]].$_POST[type_name]."\n";
$body2.="お名前：".$_POST['name']."\n";
$body2.="お名前(フリガナ)：".$_POST['name_kana']."\n";
$body2.="メールアドレス：".$_POST['email']."\n";
$body2.="TEL：".$_POST['tel']."\n";
$body2.="FAX：".$_POST['fax']."\n";
$body2.="郵便番号：".$_POST['postnum']."\n";
$body2.="住所：".$_POST['state']."\n";
$body2.="お問い合わせ内容：".$_POST['body']."\n";
$body2.="\n\n";
$body2.="--------------------------------------------------------------\n";

//◆メール受信タイトル（ユーザー側）
$uMailSubject  = "お問い合わせ(控え)";
//◆ユーザー側
$subject="お問い合わせメール控え";
$body.="".$_POST['name']."様\n\n";
$body.="この度は、株式会社ペガサスにお問い合わせ頂き誠にありがとうございます。\n";
$body.="以下の内容が送られています。ご確認ください。\n\n";
$body.="弊社からご連絡させて頂きますので、今しばらくお待ちください。\n\n";
$body.="--------------------------------------------------------------\n";
$body.="個人・法人：".$type_arr[$_POST[type]].$_POST[type_name]."\n";
$body.="お名前：".$_POST['name']."\n";
$body.="お名前(フリガナ)：".$_POST['name_kana']."\n";
$body.="メールアドレス：".$_POST['email']."\n";
$body.="TEL：".$_POST['tel']."\n";
$body.="FAX：".$_POST['fax']."\n";
$body.="郵便番号：".$_POST['postnum']."\n";
$body.="住所：".$_POST['state']."\n";
$body.="お問い合わせ内容：".$_POST['body']."\n";
$body.="\n\n";
$body.="--------------------------------------------------------------\n";

	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	mb_send_mail($_POST['email'], $uMailSubject, $body, "From: ".$tMailFrom) or die("メールを送信できません！\n");
	mb_send_mail($tMailFrom, $tMailSubject, $body2, "From: ".$_POST['email']) or die("メールを送信できません！\n");

    
    
    require_once('comp.html');
    exit;
}

?>