
window.onload = function () {
  const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server
var req;
  //ペーじが出来上がったら、liffIDを渡してinitさせる
  $(document).ready(function () {
    liff
    .init({
      liffId: defaultLiffId
    })
    .then(() => {
      if (!liff.isLoggedIn()) {
        liff.login();
      }}) .catch(function (error) {
        window.alert('エラーです' + error);});}
   
  );}


 
