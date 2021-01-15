<?php
session_start();
require("../include/inc.php");

//ワンタイムチケット発行
$ticket = md5(uniqid(mt_rand(),TRUE));

//セッション化
$_SESSION['ticket'][] = $ticket;

/*
  HTMLをエスケープ処理 XSS対策
  htmlspecialchars・・・不正なタグなどを無効にする
  フォームで入力された値をh()で囲む
  例 $name = h($_POST["name"]);
*/
function h($str){
 return htmlspecialchars($str,ENT_QUOTES);
}
$bkurl = "https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
?>
<?php
session_start();
require("../include/inc.php"); ?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>最終分譲｜<?php echo TITLE; ?></title>
	<meta name="keywords" content="<?php echo KEYWORDS; ?>">
	<meta name="description" content="<?php echo DESCRIPTION; ?>">

	<!-- VIEWPORT -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/icon" href="../img/favicon.ico">

	<!-- Import CSS -->
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/default-theme.css" id="switcher">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,800">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">

	<!-- CSS -->
	<link rel="stylesheet" href="js/vendor/photoswipe/photoswipe.css">
	<link rel="stylesheet" href="js/vendor/photoswipe/default-skin/default-skin.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../css/style.css">
	
	<?php require("../include/tagGTM.php"); ?>
	<?php echo GA; ?>
</head>
	
<body>
  
  
		<main id="siteMain" class="siteMain">
		
			<div id="mainArea" class="mainArea">  
  
        <!-- ===============================================

        メイン画像

        =============================================== -->  
        <section id="mainimg">
          <div class="top">
            <img class="main-pc" src="img/01-01.jpg" alt="グリーンヒル別府山の手グランパーク【最終分譲】 OPEN／10:00〜18:00（水曜定休）">
            <img class="main-sp" src="img/01-01-sp.jpg" alt="グリーンヒル別府山の手グランパーク【最終分譲】 OPEN／10:00〜18:00（水曜定休）">
          </div>
		  <div class="top-icon">
		    <img src="img/01-02.png" alt="残り3邸">
		  </div>
        </section>


        <!-- ===============================================

        s01

        =============================================== -->  
        <section id="s01">
		  <div class="title">
            <div class="title-top">
              <h1>
                <span>人生を豊かに楽しむ <br class="title-sp">「終の棲家」をあなたに。</span>
                <span>グリーンヒル別府  <br class="title-sp">山の手グランパーク</span>
                <span>最後のチャンスをあなたに</span>
                <span>最終分譲</span>
              </h1>
            </div>
            <div class="title-inner clearfix">
              <div class="inner-box">
                <h2>
                  <span>グリーンヒル別府山の手 <br class="title-sp">グランパーク</span>
                  <span>住み替え２大特典</span>
                  <span>12月末まで</span>
                </h2>
                <p>今なら、マイホームをお持ちで『グリーンヒル別府山の手グランパーク』をご契約いただいたお客様を対象に、売却時と住み替え時の2つの特典をご用意しております。</p>
              </div>
              <div class="inner-contents">
                <div class="contents-box">
                  <h3>マイホームをお持ちで<br class="inner-sp">売却をご希望の方へ</h3>
                  <ul>
                    <li>
                      <span>査定額の120%で高価買取します。</span>
                      <span class="go">※当社査定額を基準とします。</span>
                    </li>
                    <li>
                      <span>引越費用を負担します。</span>
                      <span class="go">※買取または専任媒介契約を条件とします。</span>
                    </li>
                  </ul>
                  <img class="inner-sp" src="img/02-01.jpg" alt="住み替え２大特典">
                </div>
              </div>
            </div>
          </div>
		</section>	
				
		<!-- ===============================================

        s02

        =============================================== -->  
		<section id="s02">
		  <div class="title-catch">
            <h2>すべてを叶える、<br class="inner-sp">セカンドライフの<br class="inner-sp">ゆとりのステージ。</h2>
            <p>今、人生の後半戦を迎える世代を中心に「終の棲家」を検討する方が増えています。<br class="inner-pc">そこで注目を集めているのがマンション。セカンドライフをアクティブに楽しみたいのなら、<br class="inner-pc">維持管理に手間がかかる戸建よりも環境面や建物形態、設備、全てにおいて<br class="inner-pc">暮らしやすいマンションを選ぶ方が増えています。</p>
          </div>
		</section>
				
        <!-- ===============================================

            来場予約ボタン

        =============================================== -->
        <section class="section-btn" id="btn">
            <a href="#reservation">ご来場予約</a>
        </section>				

        <!-- ===============================================

        s03

        =============================================== -->  
        <section id="s03">
		  <div class="lead clearfix">
	        <div class="lead-img">
              <img class="inner-pc" src="img/03-01.jpg" alt="別府、山の手に自由とゆとりのステージ、ついに誕生。">
              <img class="inner-sp" src="img/03-01-sp.jpg" alt="別府、山の手に自由とゆとりのステージ、ついに誕生。">
			</div>
			<div class="lead-contents">
              <h2>別府、山の手に<br class="inner-sp">自由と<br class="inner-pc">ゆとりのステージ、<br class="inner-sp">ついに誕生。</h2>
              <p>穏やかなセカンドライフを送るために<br>「大切なもの」、「必要なこと」別府山の手ならではの安心感。</p>
			  <div class="lead-box clearfix">
                <div class="lead-box-left">
                    <h3 class="org-box">温泉</h3>
                    <img src="img/03-02.jpg" alt="温泉">
                    <h4>源泉掛け流しの湯を心ゆくまで</h4>
                    <p>館内温泉施設は、ひとクラス上のクオリティを追求。洗面カウンターにマーベリイナカウンターを採用。高級感ある設えが魅力です。</p>
                    <span class="go">■泉質…無色透明・無味・無臭（弱アルカリ性・低張性・高温泉） ■効能…筋肉・関節の慢性的な痛み、冷え症や末梢循環障害、胃腸機能の低下、軽症高血圧、糖尿病、ストレスによる諸症状など、病後回復期、疲労回復、健康増進に適しています。</span>
                </div>
                <div class="lead-box-right">
                    <h3 class="grn-box">別府公園</h3>
                    <img src="img/03-03.jpg" alt="別府公園">
                    <h4>早朝ウォーキングで健康を維持</h4>
                    <p>壮大な公園「別府公園」まで徒歩8分。セカンドライフを楽しむためにも、健康でいることが必要不可欠です。朝夕、気軽に訪れることができる公園がそばにあることは、健康維持へつながります。</p>
                </div>
			  </div>
              <span class="go textright">※「公益社団法人大分県薬剤師会 検査センター」による温泉分析報告書より（2019年2月21日）</span>
			</div>
		  </div>
        </section>
				
        <!-- ===============================================

            来場予約ボタン

        =============================================== -->
        <section class="section-btn" id="btn">
          <a href="#reservation">ご来場予約</a>
        </section>	

        <!-- ===============================================

        s04

        =============================================== -->  
        <section id="s04">
          <div class="needs clearfix">
			<h2>別府山の手で叶える<br class="inner-sp">これからの「住まいの理想」<br>４つの住み替えニーズ</h2>
		    <div class="needs-box clearfix">
              <div class="needs-inner">
                <h3>バリアフリー設計［フラット35S対応］</h3>
                <img src="img/04-01.jpg" alt="バリアフリー設計［フラット35S対応］">
                <p>平屋のように生活動線に配慮されたプランを実現。また、転倒・転落を防止する高齢者等配慮対策等級3に適合するバリアフリー設計で老後も安心です。</p>
              </div>
			  <div class="needs-inner">
                <h3>癒しや安らぎをくれるペット</h3>
                <img src="img/04-02.jpg" alt="癒しや安らぎをくれるペット">
                <p>大好きなペットと一緒に暮らせるマンション。エレベーター内にはペットボタンがあり、ボタンを押すと各階の乗場にペットが同乗していることを伝えられます。</p>
			  </div>
			  <div class="needs-inner">
                <h3>24時間監視システムと最新機能</h3>
                <img src="img/04-03.jpg" alt="24時間監視システムと最新機能">
                <p>監視システムや24時間緊急通報システムを導入。緊急時には警備会社が迅速に対応します。また、最新のドア施錠システム導入でうっかりや不審者の侵入を防ぎます。</p>
			  </div>
			  <div class="needs-inner">
                <h3>ととのった医療環境</h3>
                <img src="img/04-01.jpg" alt="ととのった医療環境">
                <p>在宅療養や病床数や医師人数など、別府市は大分・全国平均と比べても高く、もしもの時も安心です。<br>
                &#9632; 在宅療養支援病院…別府市／4.09、大分県／2.57、全国／1.17<br>
                &#9632; 病院病床…別府市／3,003.16、大分県／1,703.37、全国／1,216.46</p>
			  </div>
			</div>
			<span class="go txt">※人口10万人あたり施設・病床数 ※JMAP調べ</span>
		  </div>
        </section>
				
        <!-- ===============================================

            来場予約ボタン

        =============================================== -->
        <section class="section-btn" id="btn">
            <a href="#reservation">ご来場予約</a>
        </section>	

        <!-- ===============================================

        s05

        =============================================== -->  
        <section id="s05">
          <div class="plan-top">
			<div class="plan-line">
              <span class="en-img"><img src="img/05-01.png" alt="PLAN" width="380" height="40"></span>
              <span class="ja-title">間取り</span>
		    </div>
          </div>
          <div class="plan-contents">
            <div class="plan-box">
              <div class="plan-detail">
			    <h3>南向き角住戸の歓びと<br>自分スタイルを謳歌する。</h3>
                <div class="plan-detail-title clearfix">
                  <div class="room-num">
                    <h4>403号</h4>
                    <span>3LDK</span>
                  </div>
                  <ul>
                    <li>&#9632; 専有面積/80.18㎡（24.25坪）</li>
                    <li>&#9632; バルコニー面積/17.90㎡（5.41坪）</li>
                    <li>&#9632; アルコーブ面積/0.54㎡（0.16坪）</li>
                    <li>&#9632; トランクルーム面積/0.70㎡（0.21坪）</li>
                  </ul>
                </div>
                <ul>
                  <li class="plan-indent">&#9632; 南面にセンターオープンサッシを採用した2面採光のLDが魅力。</li>
                  <li class="plan-indent">&#9632; 勝手口付近のキッチンや充実の収納プランが家事をサポート。</li>
                  <li class="plan-indent">&#9632; 2面採光でバルコニー付の主寝室は、7.8帖のゆとりの広さ。</li>
                  <li class="plan-indent">&#9632; 連動性のある洋室(1)・(2)は、ライフスタイルに合わせて使えます。</li>
                </ul>
                <div class="plan-price">
                  <p>販売価格<br class="inner-pc"><span>403号</span></p>
                  <p>3,500<span>万円</span></p>
                </div>
              </div>
              <div class="plan-room">
		        <div class="room-img">
                  <figure>
                    <a href="img/05-02.jpg" data-size="813x1347"><img src="img/05-02.jpg" alt="403号間取り" width="406" height="789"></a>
                  </figure>
				</div>
			    <p class="notes">※クリックで拡大します</p>
              </div>
              <div class="plan-img">
                <p class="image-left"><img src="img/05-03.jpg" alt="403号内観"></p>
                <p class="image-right"><img src="img/05-04.jpg" alt="403号内観"></p>
              </div>
            </div>
          </div>
          <div class="plan-bottom">
            <div class="plan-innner">
              <h3 class="plan-bottom-detail">物件概要</h3>
              <p class="plan-bottom-text">&#9632; 物件概要／●名称/グリーンヒル別府山の手グランパーク●所在地/大分県別府市山の手町3246番3●交通/亀の井バス「上新宅」バス停徒歩2分●建物用途/共同住宅●地目/宅地●都市計画/市街化区域●用途地域/第1種住居地域●建ぺい率/60％●容積率/200％●敷地面積/1,122.58㎡●建築面積/650.98㎡●建築床面積/2,495.19㎡●構造・規模/鉄筋コンクリート造地上5階建●総戸数/22戸●販売戸数/3戸●建築確認番号/第H292479（平成30年1月22日）●住居専有面積83.60㎡（1戸）バルコニー面積16.20㎡（1戸）●駐車場/22台●駐輪場/18台●完成年月/2019年7月完成済●入居予定/即入居可●管理委託会社/株式会社ベツダイ●管理形態／区分所有者全員により管理組合を設立し、管理組合より受託者へ委託。管理員日勤方式●取引態様/売主●広告有効期限／令和2年12月末日</p>
            </div>
          </div>
        </section>
				
        <!-- ===============================================

            来場予約ボタン

        =============================================== -->
        <section class="section-btn" id="btn">
            <a href="#reservation">ご来場予約</a>
        </section>	


        <!-- ===============================================

        s06

        =============================================== -->  
        <section id="s06">
		  <div class="life">
            <div class="plan-top">
              <div class="plan-line">
                <span class="en-img"><img src="img/06-01.png" alt="LIFE INFOMATION" width="380" height="40"></span>
                <span class="ja-title">ライフインフォメーション</span>
              </div>
            </div>
            <p class="life-lead">集約された利便性が、<br class="inner-sp">暮らしを豊かにする。</p>
            <div class="life-box clearfix">
              <div class="life-content">
                <img src="img/06-02.jpg" alt="マックスバリュ別府上原店 徒歩約6分（約450m）">
                <p>マックスバリュ別府上原店<br>徒歩約6分（約450m）</p>
              </div>
              <div class="life-content">
                <img src="img/06-03.jpg" alt="新鮮市場山の手店 徒歩約4分（約260m）">
                <p>新鮮市場山の手店<br>徒歩約4分（約260m）</p>
              </div>
              <div class="life-content">
                <img src="img/06-04.jpg" alt="ビーコンプラザ 徒歩約7分（約550m）">
                <p>ビーコンプラザ<br>徒歩約7分（約550m）</p>
              </div>
              <div class="life-content">
                <img src="img/06-05.jpg" alt="ゆめタウン別府 車で約6分（約3,600m）">
                <p>ゆめタウン別府<br>車で約6分（約3,600m）</p>
              </div>
            </div>
		  </div>
        </section>
        <!-- ===============================================

            来場予約ボタン

        =============================================== -->
        <section class="section-btn" id="btn">
            <a href="#reservation">ご来場予約</a>
        </section>	
    
        <!-- ===============================================

            MAP

        =============================================== -->
        <section id="map">
          <div class="map-inner">
            <div>
              <h3>現地会場のご案内</h3>
              <div>
                <iframe src="https://www.google.com/maps/d/embed?mid=1CwDeqsunz6Qq-eb0lsc-jWaKAefaA3J9&z=15" width="100%" height="500"></iframe>
              </div>
              <p>&rarr; <a href="//www.google.com/maps/d/embed?mid=1CwDeqsunz6Qq-eb0lsc-jWaKAefaA3J9&z=15" target="_blank">大きい地図で見る</a></p>
            </div>
          </div>
        </section>

        <!-- ===============================================

            ご来場予約

        =============================================== -->

        <section id="s07">
          <div class="plan-top">
            <div class="plan-line">
              <span class="en-img"><img src="img/07-01.png" alt="Reservation" width="380" height="40"></span>
              <span class="ja-title">ご来場予約</span>
            </h2>
          </div>

          <!-- Start Contact -->
          <section id="contacts">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div id="no-js_txt">
                              <p class="cap">現在JavaScriptが無効になっています。<br>フォームの機能を利用するためには、JavaScriptの設定を有効にしてください。</p>
                          </div>
                          <div id="no-js">
                              <p class="formNotes"><span class="red">【必須】</span>は必ずご記入ください。</p>
                              <form id="myForm" name="myForm" method="post" action="confirm.php" onsubmit="return EntryCheck()" novalidate>
                                  <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>" />
                                  <input type="hidden" name="bkurl" value="<?php echo $bkurl; ?>" />
                                  <table cellspacing="0" class="table01" summary="来場予約">
                                      <tbody>
                                          <!--<tr>
                  <th>お問い合わせ内容<span class="red">【必須】</span></th>
                  <td>
                  <label><input name="naiyou[]" type="checkbox" value="来場予約" id="checkReservation">来場予約</label> 
                  <label><input name="naiyou[]" type="checkbox" value="資料請求">資料請求</label>
                  <p class="myError" for="naiyou[]" generated="true"></p></td>
              </tr>-->
                                          <tr>
                                              <th>イベント名</th>
                                              <td><input type="hidden" name="eventName" value="グリーンヒル別府山の手グランパーク 最終分譲">
                                                  グリーンヒル別府山の手グランパーク 最終分譲
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>ご来場日時<span class="red">【必須】</span></th>
                                              <td>
                                                  <select name="month" id="month">
                                                      <option value="01">1月</option>
                                                      <option value="02">2月</option>
                                                      <option value="03">3月</option>
                                                      <option value="04">4月</option>
                                                      <option value="05">5月</option>
                                                      <option value="06">6月</option>
                                                      <option value="07">7月</option>
                                                      <option value="08">8月</option>
                                                      <option value="09">9月</option>
                                                      <option value="10">10月</option>
                                                      <option value="11">11月</option>
                                                      <option value="12">12月</option>
                                                  </select>
                                                  <select name="day" id="day">
                                                      <option value="01">1日</option>
                                                      <option value="02">2日</option>
                                                      <option value="03">3日</option>
                                                      <option value="04">4日</option>
                                                      <option value="05">5日</option>
                                                      <option value="06">6日</option>
                                                      <option value="07">7日</option>
                                                      <option value="08">8日</option>
                                                      <option value="09">9日</option>
                                                      <option value="10">10日</option>
                                                      <option value="11">11日</option>
                                                      <option value="12">12日</option>
                                                      <option value="13">13日</option>
                                                      <option value="14">14日</option>
                                                      <option value="15">15日</option>
                                                      <option value="16">16日</option>
                                                      <option value="17">17日</option>
                                                      <option value="18">18日</option>
                                                      <option value="19">19日</option>
                                                      <option value="20">20日</option>
                                                      <option value="21">21日</option>
                                                      <option value="22">22日</option>
                                                      <option value="23">23日</option>
                                                      <option value="24">24日</option>
                                                      <option value="25">25日</option>
                                                      <option value="26">26日</option>
                                                      <option value="27">27日</option>
                                                      <option value="28">28日</option>
                                                      <option value="29">29日</option>
                                                      <option value="30">30日</option>
                                                      <option value="31">31日</option>
                                                  </select>
                                                  <select name="time" id="time">
                                                      <!--<option value="9">9時</option>-->
                                                      <option value="10">10時</option>
                                                      <option value="11">11時</option>
                                                      <option value="12">12時</option>
                                                      <option value="13">13時</option>
                                                      <option value="14">14時</option>
                                                      <option value="15">15時</option>
                                                      <option value="16">16時</option>
                                                      <option value="17">17時</option>
                                                      <option value="18">18時</option>
                                                      <!--
              <option value="19">19時</option>
              <option value="20">20時</option>-->
                                                  </select>
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>お名前<span class="red">【必須】</span></th>
                                              <td><input name="name" type="text" id="name" class="input1"></td>
                                          </tr>
                                          <tr>
                                              <th>フリガナ　<span class="red">【必須】</span></th>
                                              <td><input name="name_kana" type="text" id="name_kana" class="input1 katakana"></td>
                                          </tr>
                                          <tr>
                                              <th>E-mail<span class="red">【必須】</span></th>
                                              <td><input name="mailAddress" class="input1" type="text" style="ime-mode: disabled;"></td>
                                          </tr>
                                          <tr>
                                              <th>このイベントを何で知りましたか？<span class="red">【必須】</span><br>（複数回答可）</th>
                                              <td>
                                                  <table class="tableIn">
                                                      <tbody>
                                                          <?php include('../include/customer_from.php');?>
                                                      </tbody>
                                                  </table>
                                                  <p class="myError" for="customer_from[]" generated="true"></p>
                                              </td>
                                          </tr>
                                          <tr>
                                              <th>住まいづくりに役立つ情報メールをお送りしてもよろしいですか？</th>
                                              <td class="inputLine"><label onclick=""><input type="radio" name="mail_check" value="はい" checked=""> はい </label> 
                                                  <label onclick=""><input type="radio" name="mail_check" value="いいえ"> いいえ</label></td>
                                          </tr>
                                          <!--<tr>
                  <th>先行案内会に参加を希望しますか？<span class="red">【必須】</span></th>
                  <td class="inputLine"><label onClick=""><input type="radio" name="join[]" value="希望する">希望する</label>&emsp;
                  <label onClick=""><input type="radio" name="join[]" value="希望しない">希望しない</label>
                  <p class="myError" for="join[]" generated="true"></p>
                  </td>
                </tr>-->
                                          <tr>
                                              <th>電話番号 （半角数字）<span class="red">【必須】</span></th>
                                              <td><input name="tel" type="tel" onkeydown="return OnlyNumber(event)" oncontextmenu="return false;" maxlength="20" class="ascii input1"></td>
                                          </tr>
                                          <!--<tr>
                  <th>郵便番号<span class="red">【必須】</span></th>
                  <td>
                  <input type="tel" pattern="[0-9]*" name="zip" size="10" class="input2" maxlength="8" onkeyup="AjaxZip3.zip2addr(this,'','address','address');" placeholder="住所自動入力" id="zip"></td>
                </tr>-->
                                          <!--<tr>
                  <th>住所<span class="red">【必須】</span></th>
                  <td><input type="text" name="address" class="input1" id="addr"></td>
                </tr>-->
                                          <tr>
                                              <th>特記事項</th>
                                              <td><textarea name="sp_memo" class="input1" rows="5"></textarea></td>
                                          </tr>
                                      </tbody>
                                  </table>

      <?php
      $php = file_get_contents('../contact/privacy.php');
      eval('?>'. mb_convert_encoding($php, 'UTF-8', 'EUC-JP'));
      ?>

      <div class="douisuru"><label><input name="doui[]" value="doui" type="checkbox">&nbsp;&nbsp;上記に同意する</label>
      <p class="myError" for="doui[]" generated="true" style="text-align:center;"></p>
      </div>

                                  <input type="submit" name="submit" value="送信確認画面" class="btn02">
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </section>


      </section><!-- /section--reservation END -->


				<div class="pageNotesBlock">
					<div class="container">
						<p class="txtRight">※掲載写真はCG・イメージです。</p>
					</div>
				</div>

				

			</div><!-- /mainArea END -->

		</main><!-- /siteMain END -->

		<?php require("../include/footer.php"); ?>

		<!-- <a id="pageTopBtn" class="js-scroll" href="#top">PAGE TOP</a> -->



<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	<!-- Background of PhotoSwipe.
		 It's a separate element as animating opacity is faster than rgba(). -->
	<div class="pswp__bg"></div>

	<!-- Slides wrapper with overflow:hidden. -->
	<div class="pswp__scroll-wrap">

		<!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>

		<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
		<div class="pswp__ui pswp__ui--hidden">

			<div class="pswp__top-bar">

				<!--  Controls are self-explanatory. Order can be changed. -->

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

				<button class="pswp__button pswp__button--share" title="Share"></button>

				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

				<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
				<!-- element will get class pswp__preloader--active when preloader is running -->
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
					  <div class="pswp__preloader__cut">
						<div class="pswp__preloader__donut"></div>
					  </div>
					</div>
				</div>
			</div>

			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>

			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
			</button>

			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
			</button>

			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>

		</div>

	</div>

</div>









	</div><!-- /siteWrapper END -->


	<!-- Modernizr -->
	<script src="js/vendor/modernizr-3.7.1.min.js"></script> 
	
	<!-- Import Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
	<script src="../js/date.js" charset="UTF-8"></script>
	<script src="https://zipaddr.com/js/zipaddrx.js" charset="UTF-8"></script>
	<script src="../js/jquery.validate.min.js" charset="UTF-8"></script>
	<script src="../js/valueconvertor.js" charset="UTF-8"></script>
	<script src="../js/jquery.validate.japlugin.js" charset="UTF-8"></script>
	<script src="../js/default.validate.js" charset="UTF-8"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- Bootstrap -->
	<script src="../js/bootstrap.js"></script>
	<!-- ScrollToDown -->
	<script src="../js/scd.js"></script>
	<!-- Slick Slider -->
	<script src="../js/slick.js"></script>
	<!-- mixit slider -->
	<script src="../js/jquery.mixitup.js"></script>
	<!-- Add fancyBox -->
	<script src="../js/jquery.fancybox.pack.js"></script>
	<!-- Wow animation -->
	<script src="../js/wow.js"></script>
	<!-- Custom js -->
	<script src="../js/custom.js"></script>

	<!-- Plugins -->
	<script src="js/vendor/photoswipe/photoswipe.min.js"></script>
	<script src="js/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
	<script src="js/photoswipe-set.js"></script>

	<!-- Scripts -->
	<script src="js/common.scripts-min.js"></script>

	<script>
		function fchk7(obj, idx){ // fchk7()のオブジェクト
			var frm=document.myForm;
			if(idx == 1){
				textBox = "customer_from_other"; // name="customer_from_otheri"に対して
			}
			if(!obj.checked){
				frm.elements[textBox].value=""; //入力値をクリア
				frm.elements[textBox].disabled=true; //チェックされたら、テキストボックスを有効化
			}else{
				frm.elements[textBox].disabled=false; //チェックが外されたら、テキストボックスを無効化
			}
		}
		
		$("#no-js").css('display' , 'block');
		$("#no-js_txt").css('display' , 'none');

		if(!navigator.userAgent.match(/(iPhone|Android)/)){
			$(function(){
				$('a.telLink').click(function(){
					return false;
				})
			});
		}
	</script>

	<?php require("../include/tagYTM.php"); ?>
	
</body>
</html>
