
window.onload = function () {
    const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server
  var req;
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
          liff.getProfile().then(function(prof){
            document.getElementById('store').textContent=prof.userId;
            //location.hrefにuserIdのクエリをつける
            window.location.href = 'https://liff.line.me/1657487333-JPeEg6lr/stamps?userId=' + prof.userId + '&store='+document.getElementById('store').value;
  
          })
        }},)}