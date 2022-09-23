

//多分、いちいちinitしなくていい。

//イベントを使ってる。表示と値の取得の順番の為に書く
window.onload = function () {
	const useNodeJS = false;   // if you are not using a node server, set this value to false
	// store_tableから、LIFFIDを持ってくる？
//	const defaultLiffId = '1657181787-2vrnwwlj';   // change the default LIFF value if you are not using a node server
//softnext　のLIFFIDでログイン
const defaultLiffId ='1657487333-JPeEg6lr';
 
const cloudfrontUrl = 'https://dev-liff.herokuapp.com/public/';

    //jQueryを使い、DOMの読み込みが完了したときに処理を実行
	$(document).ready(function () {
		initializeLiff(defaultLiffId);
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
                // liff.scanCodeV2().then(function (string) {
                //     document.getElementById('stamp').value=string.value;
                //     document.getElementById('stamp').textContent=string.value;
                

    if(document.getElementById("qr").onclick){
        liff.scanCodeV2().then(function (string) {
            document.getElementById('stamp').value=string.value;
            document.getElementById('stamp').textContent=string.value;
          }
        
      );
        




       }}}).catch(function (error) {
    window.alert('Error getting profile: ' + error);
  });
}
    function onclick(){
        if(document.getElementById("qr").onclick){
        liff.scanCodeV2().then(function (string) {
            document.getElementById('stamp').value=string.value;
            document.getElementById('stamp').textContent=string.value;
          },
    )}}
  

  

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
  
