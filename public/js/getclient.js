window.onload = function () {
	const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server
	liffInit(defaultLiffId);



	//ペーじが出来上がったら、liffIDを渡してinitさせる
	function liffInit(defaultLiffId) {
		$(document).ready(function () {
			liff
				.init({
					liffId: defaultLiffId
				})
				.then(() => {
					if (!liff.isLoggedIn()) {
						liff.login();
					} else {
						liff.getProfile().then(function (prof) {

							document.getElementById('user').value = prof.userId;
							if(document.getElementById('creditForm').textContent != null){
							var elements4 = payjp.elements()
							var numberElement = elements4.create('cardNumber')
							var expiryElement = elements4.create('cardExpiry')
							var cvcElement = elements4.create('cardCvc')
							numberElement.mount('#number-form')
							expiryElement.mount('#expiry-form')
							cvcElement.mount('#cvc-form')
						}
						})
					}
				}).catch(function (error) {
					window.alert('エラー :' + error);
				});
		}
		);
	}
	document.getElementById("create_tkn").onclick= function(){
		payjp.createToken(numberElement).then(function (r) {
			document.querySelector('#token2').innerText = r.error ? r.error.message : r.id
		})


}
}


