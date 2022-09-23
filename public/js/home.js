
const cloudfrontUrl = 'https://dev-liff.herokuapp.com/public/'

window.onload = function () {
  const useNodeJS = false;   // if you are not using a node server, set this value to false
  const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server

  //ペーじが出来上がったら、liffIDを渡してinitさせる
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
      }},)}