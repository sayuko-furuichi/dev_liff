window.onload = function () {
  const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server

  //ペーじが出来上がったら、liffIDを渡してinitさせる
  $(document).ready(function () {
    liff
    .init({
      liffId: defaultLiffId
    })
    .then(() => {
      if (!liff.isLoggedIn()) {
        liff.login();

      }else{
        liff.getProfile().then(function(prof){
          document.getElementById('user').value=prof.userId;
      })
    }}) .catch(function (error) {
        window.alert('エラー :' + error);});}
   
  );}