//jQuery.noConflict();
(function ($) {
	//sAccodionクラス
	sCollapseCont = {
		elm: {},
		option: {
			icon: {
				openIcon: 'fa fa-angle-down fa-fw',
				closeIcon: 'fa fa-angle-right fa-fw'
			},
			defaultState: 'op', //デフォルトで開く。　空白 or cl　は閉じる
			cookie:{
				saveDay:10	//クッキー保存期間　日数で指定
			}
		},
		param: {
			viewPath: '', //urlpath
			stateId: {
				open: 'op', //開いているの時にclassに入れる文字
				close: 'cl', //閉じているの時にclassに入れる文字
			},
			intStateClass:{		//初期状態を指定するときのclass
				open:'sCollapseOp',		//開く
				close:'sCollapseCl'		//閉じる
			},
			trigerClassName: 'sCollapseTrigerBt',
			iconHtmlClass: 'sCollapseIcon'
		},
		/**
		 * 初期化処理
		 * @param {array} option
		 * 
		 */
		 init: function (option) {
		 	this.margOption(option);
		 	this.param.viewPath = location.pathname;

			//初期表示・アイコン付けて・閉じたりする。
			$.each(this.elm, this.initLoop);

			//this.elmに対して、クリックイベントを作成する。
			$(document).on('click', '.' + this.param.trigerClassName, function () {
				sCollapseCont.clickTrgDom($(this));
			});
		},
		/************************************************************************
		 * 
		 * 
		 * ターゲットのDOMがクリックされたときに実行
		 */
		 clickTrgDom: function (domObj) {
		 	var target = domObj.attr('data-target');
		 	var targDom = $(target);
		 	var state = '';
		 	var iconHtml = '';
		 	var nextState = '';
			//ターゲットの状態を取得
			state = sCollapseCont.getTargState(targDom);
			if (state == sCollapseCont.param.stateId.open) {
				//今ひらいてたら。閉じる
				//アイコンのhtmlをオプションから取得
				iconHtml = sCollapseCont.option.icon.closeIcon;
				nextState = sCollapseCont.param.stateId.close;
				targDom.slideUp(500);
			} else {
				//今閉じてたら。開く。
				iconHtml = sCollapseCont.option.icon.openIcon;
				nextState = sCollapseCont.param.stateId.open;
				targDom.slideDown(500);
			}
			//クラスを整理
			targDom.removeClass(state);
			targDom.addClass(nextState);
			
			//クッキーに保存
			sCollapseCont.saveCookie(target, nextState);

			sCollapseCont.setIcon(domObj, iconHtml);

		},
		/*******************************************************************************
		 * 
		 * 
		 * 
		 * 
		 * 初期化のループ
		 * @param {int} index
		 * @param {str} dom
		 */
		 initLoop: function (index, dom) {
		 	var domObj = $(dom);
		 	var target = domObj.attr('data-target');
		 	var targDom = $(target);
		 	var state = '';
		 	var iconHtml = '';
		 	var nextState ='';

			//初期状態のステートクラスが入っている場合はそっちを優先する。
			if(domObj.hasClass(sCollapseCont.param.intStateClass.open)){
				nextState = sCollapseCont.param.stateId.open;
			}
			if(domObj.hasClass(sCollapseCont.param.intStateClass.close)){
				nextState = sCollapseCont.param.stateId.close;
			}
			if(nextState != ''){
				sCollapseCont.saveCookie(target, nextState);
			}
			//クッキーに表示情報が入っているか？
			if ($.cookie(sCollapseCont.param.viewPath + '/' + target)) {
				//はいってた。
				state = $.cookie(sCollapseCont.param.viewPath + '/' + target);
			} else {
				//入ってない
				state = sCollapseCont.getTargState(targDom)
			}

			//stateに合わせて、開いたり。閉じたり
			if (state == sCollapseCont.param.stateId.open) {
				//アイコンのhtmlをオプションから取得
				iconHtml = sCollapseCont.option.icon.openIcon;
				targDom.addClass(sCollapseCont.param.stateId.open);
				targDom.removeClass(sCollapseCont.param.stateId.close);
				targDom.show();
			} else {
				iconHtml = sCollapseCont.option.icon.closeIcon;
				//閉じる
				targDom.addClass(sCollapseCont.param.stateId.close);
				targDom.removeClass(sCollapseCont.param.stateId.open);
				targDom.hide();
			}
			//アイコン付ける。
			sCollapseCont.setIcon(domObj, iconHtml);
			//クリックイベントトリガーになるクラスを付ける。
			domObj.addClass(sCollapseCont.param.trigerClassName);
		},
		/*********************************************************************
		 * 
		 * 
		 * 
		 * 
		 * ターゲットの状態を返す。
		 * @param {dom} targDom
		 * @returns {String}sCollapseCont.param.stateId.close　か　sCollapseCont.param.stateId.open
		 */
		 getTargState: function (targDom) {
		 	var state = '';
			//ターゲットのクラスにopが有れば初期で開く。
			if (targDom.hasClass(sCollapseCont.param.stateId.open)) {
				//有る。
				state = sCollapseCont.param.stateId.open;
			} else if (targDom.hasClass(sCollapseCont.param.stateId.close)) {
				//clがあるので、閉じてる。
				state = sCollapseCont.param.stateId.close;
			} else {
				//無い
				state = sCollapseCont.option.defaultState;
				//ターゲットにstateを付ける。
				targDom.addClass(state);
			}
			return state;
		},
		/**********************************************************************
		 * 
		 * 
		 * 
		 * 
		 * トリガーのＤＯＭにアイコンのｈｔｍｌを付ける。
		 * @param {obj} domObj
		 * @param {str} iconHtml
		 */
		 setIcon: function (domObj, iconHtml) {
		 	var target = domObj.attr('data-target');
			targObjAry = ($('*[data-target="'+target+'"]'));		//同じターゲットを指定しているDomの配列
			//同じターゲットを指定しているDom分ループしてiconを指定の物に変更する。
			$.each(targObjAry,function(){
				var iObj = $(this).find('i');
				iObj.attr('class','');
				iObj.addClass(iconHtml);
			});
		},
		/**********************************************************************
		 * 
		 * 
		 * 
		 * 
		 * クッキーに保存する。
		 * @param {str} 開閉ターゲットのセレクタ
		 * @param {str} 保存する開閉ステータス文字列　op or cl
		 */
		 saveCookie: function (target, nextState) {
		 	$.cookie(sCollapseCont.param.viewPath + '/' + target, nextState, {
		 		expires: sCollapseCont.option.cookie.saveDay,
		 		path: '/'
		 	});
		 },
		/************************************************************************************************************************
		 * 
		 * 
		 * 
		 * 
		 * オプションをマージする。
		 * @param {list} argOption
		 */
		 margOption: function (argOption) {
		 	$.extend(this.option, argOption);
		 },
		/************************************************************************************************************************
		 * 
		 * 
		 * 
		 * 
		 * 自DOMを変数に
		 * @param {obj} dom
		 */
		 setElm: function (elm) {
		 	this.elm = elm;

		 },
		}
	/**
	 * 自作スライダープラグイン
	 */
	 $.fn.sCollapse = function (options) {
//画面描写完了後に初期処理を実行
// 要素を退避
sCollapseCont.setElm($(this));
		//初期処理
		sCollapseCont.init(options);

		// method chain用に要素を返す
		return this;
	}

})(jQuery)