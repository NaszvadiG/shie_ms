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
	* http://flaviusmatis.github.com/simplePagination.js/
	*/
	$('.pageing_block').pagination({
		items: itemCount,
		itemsOnPage: pageLimit,
		cssStyle: 'light-theme',
		currentPage :nowPage,
		onPageClick:function(page,e){
			var targUrl = $('.pageing_block').attr('targ').replace('<num>',page);
			location.href = targUrl;
		}
	});
});

