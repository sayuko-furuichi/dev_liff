window.onload = function () {


	//公開鍵を渡す
	const payjp = Payjp('pk_test_9f39566bd5b48e9d0334cbd2');
	// 大元のElementsインスタンスを生成する
	var elements4 = payjp.elements();
	//各インスタンスを個別に生成する

	//CSSはcreate時にstyleタグとして渡す
	var numberElement = elements4.create('cardNumber', {
		style: {
			base: {
				backgroundColor: '#EBE6FF',
				fontSize: '40px',
				'::placeholder': {
					color: '#757575',
					fontSize:'20px'
				},
				':focus':{
					fontSize:'20px'
					
				}
			},
			invalid: {
				color: 'red',
				fontSize:'20px'
			},
			complete :{
				fontSize:'20px'
			},
		}
	});
	var expiryElement = elements4.create('cardExpiry', {
		style: {
			base: {
				backgroundColor: '#EBE6FF',
				fontSize: '40px',
				'::placeholder': {
					color: '#757575',
					fontSize:'20px'
				},
				':focus':{
					fontSize:'20px'
					
				}
			},
			invalid: {
				color: 'red',
				fontSize:'20px'
			},
			complete :{
				fontSize:'20px'
			},
		}
	});
	var cvcElement = elements4.create('cardCvc', {
		style: {
			base: {
				backgroundColor: '#EBE6FF',
				fontSize: '40px',
				'::placeholder': {
					color: '#757575',
					fontSize:'20px'
				},
				':focus':{
					fontSize:'20px'
					
				}
			},
			invalid: {
				color: 'red',
				fontSize:'20px'
			},
			complete :{
				fontSize:'20px'
			},
		}
	});
	//HTMLの要素にフォームを作成する
	numberElement.mount('#number-form');
	expiryElement.mount('#expiry-form');
	cvcElement.mount('#cvc-form');


	//トークンを生成する
	document.getElementsByClassName('btn-buy hv')[0].onclick = function () {
		payjp.createToken(numberElement, {
			card: {
				name: document.getElementById('card_name').value
			}
		}).then(function (r) {
			if(r.error){
				document.querySelector('#err_msg').innerText =r.error.message;
				return false;
			}else{
				document.querySelector('#err_msg').innerText ='OK'
				document.getElementById('credit_tkn').value=r.id;
				return true;
			}
			
		
		})


	}

}



