

//多分、いちいちinitしなくていい。

//イベントを使ってる。表示と値の取得の順番の為に書く
window.onload = function () {

const defaultLiffId ='1657487333-JPeEg6lr';

 

    //jQueryを使い、DOMの読み込みが完了したときに処理を実行
	$(document).ready(function () {
		initializeLiff(defaultLiffId);
	
    document.getElementById("qr").onclick= function(){
      liff.scanCodeV2().then(function (string) {
       
        if(string.value != null){
      //  window.location.href = string.value + '&user=' + document.getElementById('user_id').value;
      window.location.href = string.value + '&card_no=' + document.getElementById('card_no').value
    
    }}).catch(function (error) {
      window.alert('Error getting profile: ' + error);
      });
 
    }

  $('.flip_box').hover(function() {
    $('.b_round').toggleClass('b_round_hover');
    return false;
  });

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
  
 createStamp();
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

      })

       }}).catch(function (error) {
    window.alert('Error getting profile: ' + error);
  });
}

  function createStamp(){
    for (let index = 0; index < document.getElementById('total_p').textContent; index++) {
      // const element = array[index];
      document.getElementsByClassName('emp_stamp_line').src=url('../img/stamps/present.svg');

      //クーポンの
      document.getElementsByClassName('point_mark').textContent;
    }

   
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
  
