console.log("test")
scroll_to = function(anchor) {
  // スクロールの速度
  var speed = 400; // ミリ秒
  // 移動先を取得
  var target = jQuery('#' + anchor);

  // 移動先を数値で取得
  var position = target.offset().top;
  // スムーススクロール
  jQuery('body,html').animate({scrollTop:0}, speed, 'swing');
}
