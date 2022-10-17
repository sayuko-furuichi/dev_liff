
window.onload = function () {
  const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server
liff(defaultLiffId);


  function liff(defaultLiffId){
  //https://liff.line.me/1657487333-wakMRydO

  //ペーじが出来上がったら、liffIDを渡してinitさせる
  document.ready(
    liff.init({
      liffId: defaultLiffId
    })
    .then(() => {
      if (!liff.isLoggedIn()) {
        liff.login();
      }}) .catch(function (error) {
        window.alert('エラーです' + error);}));}
   
  ;}


 
