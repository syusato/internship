<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		#tabcontrol a {
   		display: inline-block;            /* インラインブロック化 */
  		border-width: 1px 1px 0px 1px;    /* 下以外の枠線を引く */
   		border-style: solid;              /* 枠線の種類：実線 */
   		border-color: black;              /* 枠線の色：黒色 */
   		border-radius: 0.75em 0.75em 0 0; /* 枠線の左上角と右上角だけを丸く */
   		padding: 0.75em 1em;              /* 内側の余白 */
   		text-decoration: none;            /* リンクの下線を消す */
   		color: black;                     /* 文字色：黒色 */
   		background-color: white;          /* 背景色：白色 */
   		font-weight: bold;                /* 太字 */
   		position: relative;               /* JavaScriptでz-indexを調整するために必要 */
		}
		/* ▼タブにマウスポインタが載った際(任意) */
		#tabcontrol a:hover {
   		text-decoration: underline;       /* 文字に下線を引く */
		}
		/* ▼タブの中身 */
		#tabbody div {
   		border: 1px solid black; /* 枠線：黒色の実線を1pxの太さで引く */
   		margin-top: -1px;        /* 上側にあるタブと1pxだけ重ねるために「-1px」を指定 */
   		padding: 1em;            /* 内側の余白量 */
   		background-color: white; /* 背景色：白色 */
   		position: relative;      /* z-indexを調整するために必要 */
   		z-index: 0;              /* 重なり順序を「最も背面」にするため */
		}
	</style>
</head>
<body>
	<h1>アプリ開発</h1>
	<form action="newaddition.php" method="POST" align="right">
		<button>新規追加</button>
	</form>
	<br>
	
	<p id="tabcontrol">
		<a href="#webpage">記事</a>
		<a href="#paper">論文</a>
		<a href="#tool">ツール</a>
	</p>
	<!-- タブの中身。ここに新規追加していきたい -->
	<div id="tabbody">
		<div id="webpage">
			<ol>
				<?php foreach ($webpage_lists as $webpage_list): ?>
					<li>
						<a href="#" class="tracked-link"
							data-id="<?php echo $webpage_list['id']; ?>"
							data-url="<?php echo $webpage_list['url']; ?>">
							<?php echo $webpage_list['title']; ?>
						</a>

						<a href=" <?php echo \Uri::base();?>detail/check/<?php echo $webpage_list['id'] ?>">詳細</a> 
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
		<div id="paper">
			<ol>
				<?php foreach ($paper_lists as $paper_list): ?>
					<li>
						<a href="<?php echo $paper_list['url']?>" target="_blank"><?php echo $paper_list['title']?></a>
						<a href=" <?php echo \Uri::base();?>detail/check/<?php echo $paper_list['type']?>/<?php echo $paper_list['id'] ?>">詳細</a>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
		<div id="tool">
			<ol>
				<?php foreach ($tool_lists as $tool_list): ?>
					<li>
						<a href="<?php echo $tool_list['url']?>" target="_blank"><?php echo $tool_list['title']?></a>
						<a href=" <?php echo \Uri::base();?>detail/check/<?php echo $tool_list['type']?>/<?php echo $tool_list['id'] ?>">詳細</a>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>

	<script type="text/javascript">
		// ---------------------------
		// ▼A：対象要素を得る
		// ---------------------------
		var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
		var pages = document.getElementById('tabbody').getElementsByTagName('div');

		// ---------------------------
		// ▼B：タブの切り替え処理
		// ---------------------------
		function changeTab() {
   		// ▼B-1. href属性値から対象のid名を抜き出す
   		var targetid = this.href.substring(this.href.indexOf('#')+1,this.href.length);

   		// ▼B-2. 指定のタブページだけを表示する
   		for(var i=0; i<pages.length; i++) {
      		if( pages[i].id != targetid ) {
         		pages[i].style.display = "none";
      		}
      		else {
         		pages[i].style.display = "block";
      		}
   		}

   		// ▼B-3. クリックされたタブを前面に表示する
   		for(var i=0; i<tabs.length; i++) {
      		tabs[i].style.zIndex = "0";
   		}
   		this.style.zIndex = "10";

   		// ▼B-4. ページ遷移しないようにfalseを返す
   		return false;
		}	

		// ---------------------------
		// ▼C：すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
		// ---------------------------
		for(var i=0; i<tabs.length; i++) {
   		tabs[i].onclick = changeTab;
		}

		// ---------------------------
		// ▼D：最初は先頭のタブを選択しておく
		// ---------------------------
		tabs[0].onclick();
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const links = document.querySelectorAll(".tracked-link");

			links.forEach(function (link) {
				link.addEventListener("click", function (e) {
					e.preventDefault(); // デフォルトのリンク遷移を一旦止める

					const id = this.dataset.id;
					const url = this.dataset.url;

					// AJAXで最終クリック時刻を保存
					fetch("/api/detail/track_click/" + id, {
						method: "POST"
					}).then(function () {
						// 成功後に実際のページに遷移
						window.open(url, "_blank"); // 別タブ。same-tabなら location.href = url;
					}).catch(function (err) {
						console.error("クリック記録に失敗：", err);
						window.open(url, "_blank"); // 失敗しても遷移は実行
					});
				});
			});
		});
	</script>

</body>
</html>

