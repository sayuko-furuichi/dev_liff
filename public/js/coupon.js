
window.onload = function () {
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
  // req.open('POST','/',true)
  // req.setRequestHeader('');
        //   liff.getProfile().then(function(prof){
        //     document.getElementById('store').textContent=prof.userId;
            
        //     liff.getProfile().then(function(prof){
              
        //     //location.hrefにuserIdのクエリをつける
        //     // LIFFURLを使用すると、何度もredirectするので注意
        //     window.location.href ='https://dev-liff.herokuapp.com/public/stamps/index?userId=' + prof.userId + '&store='+ document.getElementById('store').value;
  
        //   })
        }}).catch(function (error) {
          window.alert('Error getting profile: ' + error);});}