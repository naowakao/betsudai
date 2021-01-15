<?php
session_start();
require("../include/encode.php");
require("../include/inc.php");

$now = date("Y/m/d");

// echo "<pre>";print_r($_POST);echo "</pre>";exit;

if(isset($_POST['ticket']) && isset($_SESSION['ticket'])){
  $ticket = $_POST['ticket'];
  if(in_array($ticket, $_SESSION['ticket'])){

//フォームの値セット
if(isset($_POST['naiyou']))			$naiyou				= $_POST["naiyou"];
if(isset($_POST['eventName']))			$eventName				= $_POST["eventName"];
if(isset($_POST['preferred_date1']))			$preferred_date1				= mb_convert_kana($_POST["preferred_date1"],"KVa","UTF-8");
if(isset($_POST['name']))			$name				= mb_convert_kana($_POST["name"],"KVa","UTF-8");
if(isset($_POST['name_kana']))		$name_kana			= mb_convert_kana($_POST["name_kana"],"KVa","UTF-8");
if(isset($_POST['mail_check']))		$mail_check			= mb_convert_kana($_POST["mail_check"],"KVa","UTF-8");
if(isset($_POST['mailAddress']))	$mailAddress		= $_POST['mailAddress'];
if(isset($_POST['tel']))			$tel				= $_POST["tel"];
if(isset($_POST['zip']))			$zip				= $_POST["zip"];
if(isset($_POST['address']))		$address			= mb_convert_kana($_POST["address"],"KVa","UTF-8");
if(isset($_POST['sp_memo']))		$sp_memo			= mb_convert_kana($_POST["sp_memo"],"KVa","UTF-8");
if(isset($_POST['customer_from']))	$customer_from		= $_POST["customer_from"];
if(isset($_POST['customer_from_other']))  $customer_from_other  = $_POST["customer_from_other"];
if(isset($_POST['bkurl']))	$bkurl	= $_POST["bkurl"];

mb_language("Ja") ;
mb_internal_encoding("UTF-8") ;

define("MAIL_MEM_SUBJECT",BLDNAME." ご来場予約");

$header="From: " .$mailAddress;
$header.="\n";
//$header.="Cc:umemoto.junko@betsudai.jp";
//$mailto = "mansion@betsudai.jp";
$mailto = (getenv('APPLICATION_ENV') == 'test' && $_SERVER["REMOTE_ADDR"] == "114.160.221.99")? "betsudai.check@triana.jp" : "mansion@betsudai.jp";

define("MAIL_MEM_BODY1",BLDNAME."からご来場予約がありました。

■URL
".$bkurl."
--ご予約内容--");


define("MAIL_MEM_FOOTER","＜WEB来場予約＞
■".BLDNAME
);

$content = MAIL_MEM_BODY1."\n";
$content .= "\n";

if($customer_from != "" && $customer_from_other != ""){
	$customer_from = $customer_from."(".$customer_from_other.")";
}elseif($customer_from_other){
	$customer_from = $customer_from_other;
}else{
	$customer_from = $customer_from;
}

$content .= "イベント名：" . $eventName . "\n";
if($preferred_date1) $content .= "ご来場日時：" . $preferred_date1 . "\n";
$content .= "\n";
$content .= "お名前：" . $name . "\n";
$content .= "フリガナ：" . $name_kana."\n";
$content .= "E-mailアドレス：" . $mailAddress. "\n";
$content .= "このイベントを何で知りましたか？：" . $customer_from."\n";
if($mail_check) $content .= "住まいづくりに役立つ情報メールをお送りしてもよろしいですか？：" . $mail_check."\n";
if($tel)$content .= "電話番号：" . $tel . "\n";
if($zip)$content .= "郵便番号：" . $zip . "\n";
if($address)$content .= "住所：" . $address."\n";
if(isset($sp_memo))	$content .= "その他通信欄：" . $sp_memo."\n";
$content .= "\n";
$content .= "\n";
$content .= MAIL_MEM_FOOTER;

mb_send_mail($mailto,MAIL_MEM_SUBJECT,$content,$header);

/*
  確認メール
-------------------------------------------------------------------------------*/
$date = date("Y/m/d");
define("MAIL_MEM_SUBJECT_2","" . $name . "様、お問合せありがとうございました【BETSUDAI】");

$header="From: 	betsudai-confirm@betsudai.jp";
$header.="\n";

$mailto = $mailAddress;

define("MAIL_MEM_BODY_2","=========================================================
ご予約内容のご確認   ".$date."
=========================================================
");

define("MAIL_MEM_FOOTER_2","
【お問合せ】
".BLDNAME."
".TEL."
".CONTACT_URL."

----・‥…--━--…‥・‥…--━--…‥・----
株式会社ベツダイ
".OFFICE_URL."
".OFFICE_TEL."
".OFFICE_ZIP." ".OFFICE_ADDRESS."
----・‥…--━--…‥・‥…--━--…‥・----

※このサービスは(株)ベツダイが運営しております。
このメールにお心当たりのない方は、恐れ入りますが下記まで
ご連絡をお願いいたします。
(E-mail: ".CONTACT_MAIL."、TEL:".TEL.")

......................................................................
※このメールは送信専用です。
ご返信いただきましてもお答えできませんので、予めご了承ください。
");


$content = MAIL_MEM_BODY_2."\n";
$content .= "\n";
$content .= $name . "様" . "\n";
$content .= "\n";
$content .= "こんにちは。
このたびはホームページよりお問合せをいただきましてありがとうございました。

いただきましたメールを確認させていただきまして、2〜3日中に対応させていただきます。
万一、それ以上経っても対応がない場合は、サーバの不具合等の可能性がありますので、
誠にお手数をお掛けいたしますが、お電話などでご連絡をお願いいたします。" . "\n";
$content .= "\n";
$content .= "イベント名：" . $eventName . "\n";
if($preferred_date1) $content .= "ご来場日時：" . $preferred_date1 . "\n";
$content .= "\n";
$content .= "お名前：" . $name . "\n";
$content .= "フリガナ：" . $name_kana."\n";
$content .= "E-mailアドレス：" . $mailAddress. "\n";
$content .= "このイベントを何で知りましたか？：" . $customer_from."\n";
if($mail_check) $content .= "住まいづくりに役立つ情報メールをお送りしてもよろしいですか？：" . $mail_check."\n";
if($tel)$content .= "電話番号：" . $tel . "\n";
if($zip)$content .= "郵便番号：" . $zip . "\n";
if($address)$content .= "住所：" . $address."\n";
if(isset($sp_memo))	$content .= "その他通信欄：" . $sp_memo."\n";
$content .= "\n";
$content .= "\n";
$content .= MAIL_MEM_FOOTER_2;

// echo $content;exit;

mb_send_mail($mailto,MAIL_MEM_SUBJECT_2,$content,$header);

//セッション破棄
unset($_SESSION['ticket']);
$checkm = 1;
}else{
//送信が出来なかった場合
$checkm = 2;
}}else{
$checkm = 2;
}
?>
<?php
session_start();
require("../include/inc.php"); ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ご来場予約完了｜<?= TITLE ?></title>
    <meta name="Keywords" content="<?= KEYWORDS ?>" />
    <meta name="description" content="<?= DESCRIPTION ?>">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="../img/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
	<link rel="stylesheet" href="../css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/animate.css"/>
    <link id="switcher" href="../css/default-theme.css" rel="stylesheet">
    <!-- Main Style -->
    <link href="../css/style.css" rel="stylesheet">
	
	<!-- Font -->
	<link href="//fonts.googleapis.com/css?family=Merriweather+Sans:400,800" rel="stylesheet">
	  
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <?php require("../include/tagGTM.php"); ?>
<?php require("../include/tagGTM_thanks.php"); ?>	
  
	<!-- Global site tag (gtag.js) - Google Analytics -->
<?php echo GA; ?>
  </head>
  <body>
<?php include('../include/headerEvent.php');?>

  <!-- Start Title -->
  <section id="title" class="wow fadeIn" data-wow-delay="1.0s">
    <div class="container">
      <div class="row">
		  <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">RESERVE</h2>
            <p>ご来場予約</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Title -->

 <!-- Start Contact -->
<section id="contact">
    <div class="container">
		<div class="row">
        <div class="col-md-12">
			<div>
				<div class="contactBox textC">
                <?php if($checkm == 1){ ?>
<p class="red text16 textB">送　信　完　了</p>
<p class="mb30">ご来場予約を受付致しました。<br>
弊社担当者より詳細につきましてご案内申し上げます。</p>
<p><a href="../">トップページに戻る</a></p>
<?php }else{ ?>

<p class="red text16 textB">送　信　失　敗</p>
<p class="mb30">送信出来ませんでした。</p>
<p><a href="./">お問い合わせフォーム</a>に戻り、再度ご入力ください。</p>
<?php } ?>
</div>
		  </div>
		</div>
		</div>
	 </div>
	  </section>

<?php include('../include/footer.php');?>

  <!-- jQuery library -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- ScrollToDown -->
  <script src="../js/scd.js"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="../js/slick.js"></script>    
  <!-- mixit slider -->
  <script type="text/javascript" src="../js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>
 <!-- counter -->
  <script src="../js/waypoints.js"></script>
  <script src="../js/jquery.counterup.js"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="../js/wow.js"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="../js/bootstrap-progressbar.js"></script>  
  
 
  <!-- Custom js -->
  <script type="text/javascript" src="../js/custom.js"></script>


 
<?php require("../include/tagYTM.php"); ?> 
 
  </body>
</html>