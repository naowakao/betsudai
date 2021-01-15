<?php
session_start();
//チケットのないアクセスをはじく
if(isset($_POST['ticket']) && isset($_SESSION['ticket'])){
	  $ticket = $_POST['ticket'];
  if(!in_array($ticket, $_SESSION['ticket'])){
    die('不正アクセスの疑いがあります。');
  }
}else{
  die('不正アクセスの疑いがあります。');
}

require("../include/encode.php");
require("../include/inc.php");

$now = date("Y/m/d");
/*
  HTMLをエスケープ処理 XSS対策
  htmlspecialchars・・・不正なタグなどを無効にする
  フォームで入力された値をh()で囲む
  例 $name = h($_POST["name"]);
*/
function h($str){
 return htmlspecialchars($str,ENT_QUOTES);
}

// echo "<pre>";print_r($_POST);echo "</pre>";

//フォームの値セット
if(isset($_POST['naiyou'])){ 		$naiyou 		= join(", ",$_POST["naiyou"]);}
if(isset($_POST['eventName']))					$eventName			= $_POST['eventName'];

if(isset($_POST['month']))					$month			= $_POST['month'];
if(isset($_POST['day']))					$day			= $_POST['day'];
if(isset($_POST['time']))					$time			= $_POST['time'];
$preferred_date1 = $month. "/". $day . " ". $time . "時";

if(isset($_POST['name']))					$name			= mb_convert_kana($_POST["name"],"KVa","UTF-8");
if(isset($_POST['name_kana']))				$name_kana		= mb_convert_kana($_POST["name_kana"],"KVa","UTF-8");
if(isset($_POST['mail_check']))				$mail_check		= mb_convert_kana($_POST["mail_check"],"KVa","UTF-8");
if(isset($_POST['mailAddress']))			$mailAddress	= $_POST['mailAddress'];
if(isset($_POST['tel']))					$tel			= $_POST["tel"];
if(isset($_POST['zip']))					$zip			= $_POST["zip"];
if(isset($_POST['address']))				$address		= mb_convert_kana($_POST["address"],"KVa","UTF-8");
if(isset($_POST['sp_memo']))				$sp_memo		= mb_convert_kana($_POST["sp_memo"],"KVa","UTF-8");
if(is_array($_POST['customer_from'])){		$customer_from_str		= join(", ",$_POST["customer_from"]);}
if(isset($_POST['customer_from_other']))	$customer_from_other	= mb_convert_kana($_POST["customer_from_other"],"KVa","UTF-8");
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
    <title>ご来場予約確認画面｜<?= TITLE ?></title>
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
				<p style="width:90%; margin:0 auto 10px">入力内容をご確認ください。</p>
			<form id="myForm" name="myForm" method="post" action="complete.php" onsubmit="return EntryCheck()" novalidate>			
<input type="hidden" name="ticket" value="<?php echo h($ticket); ?>" />
<input type="hidden" name="bkurl" value="<?php echo $_POST["bkurl"]; ?>" />
	<table cellspacing="0" class="table01" summary="ご来場予約">
		<tbody>
		<!--<tr>
			<th>お問い合わせ内容</th>
			<td><?php echo h($naiyou);?>
			<input type="hidden" name="naiyou" value="<? echo $naiyou;?>" /></td>
		</tr>-->
       
       <tr>
			<th>イベント名</th>
			<td><?php echo h($eventName);?>
<input type="hidden" name="eventName" value="<?php echo $eventName;?>" /></td>
		</tr>
        
<?php if(($month)){ ?>
		<tr>
		<th>ご来場日時</th>
		<td>
<? echo $month;?>月<? echo $day;?>日<? echo $time;?>時
<input type="hidden" name="preferred_date1" value="<? echo $preferred_date1;?>" /></td>
		</tr>
<?php } ?>
		<tr>
			<th>お名前</th>
			<td><?php echo h($name);?>
<input type="hidden" name="name" value="<?php echo $name;?>" /></td>
		</tr>
		<tr>
			<th>フリガナ</th>
			<td><?php echo h($name_kana);?>
<input type="hidden" name="name_kana" value="<?php echo $name_kana;?>" /></td>
		</tr>
		<tr>
			<th>E-mail</th>
			<td><?php echo $mailAddress;?>
<input type="hidden" name="mailAddress" value="<?php echo $mailAddress;?>" /></td>
		</tr>
		<tr>
			<th>このイベントを何で知りましたか？<br>（複数回答可）</th>
			<td><?php echo $customer_from_str;?>
<input type="hidden" name="customer_from" value="<?php echo $customer_from_str;?>" />
<? if($customer_from_other) echo "("; ?><?php echo h($customer_from_other);?>
<input type="hidden" name="customer_from_other" value="<?php echo h($customer_from_other);?>" /><? if($customer_from_other) echo ")"; ?></td>
		  </tr>
		  <tr>
			<th>住まいづくりに役立つ情報メールをお送りしてもよろしいですか？</th>
			<td><? echo $mail_check;?>
<input type="hidden" name="mail_check" value="<? echo $mail_check;?>" /></td>
		  </tr>
		  <!--<tr>
			<th>先行案内会に参加を希望しますか？<span class="red">【必須】</span></th>
			<td class="inputLine"><label onClick=""><input type="radio" name="join[]" value="希望する">希望する</label>&emsp;
			<label onClick=""><input type="radio" name="join[]" value="希望しない">希望しない</label>
			<p class="myError" for="join[]" generated="true"></p>
			</td>
		  </tr>-->
		  <tr>
			<th>電話番号 （半角数字）</th>
			<td><?php echo h($tel);?>
<input type="hidden" name="tel" value="<?php echo $tel;?>" /></td>
		  </tr>
		   <!--<tr>
			<th>郵便番号</th>
			<td>
			<?php echo h($zip);?>
<input type="hidden" name="zip" value="<?php echo $zip;?>" /></td>
		  </tr>-->
		  <!--<tr>
			<th>住所</th>
			<td><?php echo h($address);?>
<input type="hidden" name="address" value="<?php echo $address;?>" /></td>
		  </tr>-->
<?php if(($sp_memo)){ ?>
		  <tr>
			<th>特記事項</th>
			<td><? echo $sp_memo;?>
<input type="hidden" name="sp_memo" value="<? echo $sp_memo;?>" /></td>
		  </tr>
<?php } ?>
		</tbody></table>
<input type="submit" name="submit" value="送  信" class="btn02">
</form>
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