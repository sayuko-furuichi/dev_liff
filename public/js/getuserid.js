

//多分、いちいちinitしなくていい。

//イベントを使ってる。表示と値の取得の順番の為に書く
window.onload = function () {
	const useNodeJS = false;   // if you are not using a node server, set this value to false
	const defaultLiffId = '1657181787-2vrnwwlj';   // change the default LIFF value if you are not using a node server
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


  liff.getProfile().then(function (profile) {

    document.getElementById('displayNameField').textContent = profile.displayName;

    //valueに追加 fromのname.子要素のname.value

    
    //getuserid
    document.getElementById('userIdProps').value = profile.userId;




}).catch(function (error) {
    window.alert('Error getting profile: ' + error);
  });
    

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
  }})}
