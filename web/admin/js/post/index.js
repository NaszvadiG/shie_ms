$(function() {
	/**
	* 記事タイトルのtdをマウスオーバーで編集ボタンを表示
	*/
	$('.title_td').bind({
		'mouseenter':function(){
			$(this).children('.post_edit_bt_bloc').show();
		},
		'mouseleave':function(){
			$(this).children('.post_edit_bt_bloc').hide();
		}
	});
	/**
	 * ページングボタン作成
	 */
	 if(itemCount / pageLimit >1){ ;
	 	//ページ数が１よりも大きいときのみ作成
	 	$('.pageing_block').pagination({
			//http://flaviusmatis.github.com/simplePagination.js/
			items: itemCount,
			itemsOnPage: pageLimit,
			cssStyle: 'light-theme',
			currentPage :nowPage,
			onPageClick:function(page,e){
				var targUrl = $('.pageing_block').attr('targ').replace('<num>',page);
				location.href = targUrl;
			}
		});
	 }
});

