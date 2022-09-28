

//多分、いちいちinitしなくていい。

const { isSet } = require("lodash");

//イベントを使ってる。表示と値の取得の順番の為に書く
window.onload = function () {
	// store_tableから、LIFFIDを持ってくる？
//	const defaultLiffId = '1657181787-2vrnwwlj';   // change the default LIFF value if you are not using a node server
//softnext　のLIFFIDでログイン
const defaultLiffId ='1657487333-JPeEg6lr';
var s_round = '.s_round';
 

    //jQueryを使い、DOMの読み込みが完了したときに処理を実行
	$(document).ready(function () {
		initializeLiff(defaultLiffId);
	
    document.getElementById("qr").onclick= function(){
      liff.scanCodeV2().then(function (string) {

        $str =string.value;
          document.getElementById('stamp').value=string.value;
          document.getElementById('stamp').textContent=string.value;
          document.getElementById('forms').action=string.value;
    //      document.forms.action=string.value;
    

          var p =new RegExp('points=','gi'); 
          var strs =string.value.match(p);
          if(strs != null || strs != 'undifine'){
            document.getElementById('stamp').value='ポイントゲットできます！';
          }
        },
  )}

  
  // $('.flip_box').hover(function() {
  //   $('.b_round').toggleClass('b_round_hover');
  //   return false;
  // });

  $('.flip_box').click(function() {
    $('.flip_box').toggleClass('flipped');
    $(this).addClass('s_round_click');
    // $('.s_arrow').toggleClass('s_arrow_rotate');
    // $('.b_round').toggleClass('b_round_back_hover');
    return false;
  });

  $('.flip_box').on('transitionend', function() {
    $(this).removeClass('s_round_click');
    $(this).addClass('s_round_back');
    return false;
  });
});
  
  }
       



function initializeLiff(myLiffId) {
	liff
		.init({
			liffId: myLiffId
		})
		.then(() => {
			if (!liff.isLoggedIn()) {
				liff.login();
			} else {
        
      liff.getProfile().then(function(prof){
        document.getElementById('user_id').value=prof.userId;
        document.getElementById('points').textContent=prof.userId;

      })

       }}).catch(function (error) {
    window.alert('Error getting profile: ' + error);
  });
}

  

  

function getParam(name, url) {
//表示ページのURLを取得
if (!url) url = window.location.href;
name = name.replace(/[\[\]]/g, "\\$&").replace(/[()]/g, "");
var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
results = regex.exec(url);
if (!results) return null;
if (!results[2]) return '';
return decodeURIComponent(results[2].replace(/\+/g, " "));
}
  
