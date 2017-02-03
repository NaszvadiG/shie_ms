<?php 
		$this->load->view($this->elementPath."header");
		 ?>
				<div class="col-xs-12">
					ここがコンテンツ
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!--  / #page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php $this->html->js(); ?>
	<!-- <script src="[rooturl]theme/vender/highlight/highlight.pack.js"></script> -->
	<script>
		hljs.initHighlightingOnLoad();
		$(function() {
			//かっこ良いセレクトを実行
			$(".select2").select2();
			//アコーディオンプラグイン＆状態cookie保存
			$('.sCollapse').sCollapse();

			// #で始まるアンカーをクリックした場合に処理
			$('a[href^="#"]').click(function() {
				// スクロールの速度
					var speed = 400; // ミリ秒
				// アンカーの値取得
				var href= $(this).attr("href");
				// 移動先を取得
				var target = $(href == "#" || href == "" ? 'html' : href);
				// 移動先を取得を数値で取得
				var position = target.offset().top;
				// スムーススクロール
				$('body,html').animate({scrollTop:position}, speed, 'swing');
				return false;
			});
		});
	</script>
</body>

</html>
