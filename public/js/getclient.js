window.onload = function () {
	const defaultLiffId = '1657487333-JPeEg6lr';   // change the default LIFF value if you are not using a node server
	liffInit(defaultLiffId);

	valid();
	//公開鍵を渡す
	const payjp = Payjp('pk_test_9f39566bd5b48e9d0334cbd2');
	// 大元のElementsインスタンスを生成する
	var elements4 = payjp.elements();
	//各インスタンスを個別に生成する

	//CSSはcreate時にstyleタグとして渡す
	var numberElement = elements4.create('cardNumber', {
		style: {
			base: {
				backgroundColor: '#FECEC6',
				fontSize: '15px',
				'::placeholder': {
					color: '#757575',
				}
			},
			invalid: {
				color: 'red'
			}
		}
	});
	var expiryElement = elements4.create('cardExpiry', {
		style: {
			base: {
				backgroundColor: '#FECEC6',
				fontSize: '15px',
				'::placeholder': {
					color: '#757575',
				}
			},
			invalid: {
				color: 'red'
			}
		}
	});
	var cvcElement = elements4.create('cardCvc', {
		style: {
			base: {
				backgroundColor: '#FECEC6',
				fontSize: '15px',
				'::placeholder': {
					color: '#757575',
				}
			},
			invalid: {
				color: 'red'
			}
		}
	});
	//HTMLの要素にフォームを作成する
	numberElement.mount('#number-form');
	expiryElement.mount('#expiry-form');
	cvcElement.mount('#cvc-form');


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


						})
					
					
					
					}
				}).catch(function (error) {
					window.alert('エラー :' + error);
				});
		}
		);
	}
	//トークンを生成する
	document.getElementById("create_tkn").onclick = function () {
		payjp.createToken(numberElement, {
			card: {
				name: document.getElementById('credit_name').value
			}
		}).then(function (r) {

			document.querySelector('#token2').innerText = r.error ? r.error.message : '照会が完了しました';
			if (r.id != 'undefined') {
				document.getElementById('credit_token').value = r.id;
			}
		})


	}

	function valid(){
		var valid =document.getElementById('token2').innerText;

		if (valid != '照会が完了しました'){
			return true;
		}else{
			return false;
		}
	}

}


