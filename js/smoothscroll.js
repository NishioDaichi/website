		$(function () {
			// ScrollSpeed  1000=1秒
			var speed = 1000;

			//<a href="ID名">がクリックされたら処理開始
			$('a[href^="#"]').click(function () {
				//変数名hrefにhref属性の値を代入
				var href = $(this).attr("href");
				//href属性の中身が「#(ID名)」であれば
				//変数名targetに""（中身なし）を代入
				//href属性の中身に「html」が含まれる場合は
				//以下の処理をせず指定のページへジャンプする
				var target = $(href == "#" || href == "" ? 'html' : href);
				//変数名positionにジャンプする先（target）の座標の上（top）を取得し代入
				var position = target.offset().top;
				//animate関数でアニメーション処理を開始
				$('body,html').animate({
					//変数positionの座標まで変数speedで指定した時間でスクロールさせる
					//JQuery easingで用意された値を入れた挙動で動かす
					scrollTop: position
				}, speed, 'easeInOutCirc');
				return false;
			});
		});

		//JQuery easingの挙動
		//linear
		//swing
		//jswing
		//easeInQuad
		//easeOutQuad
		//easeInOutQuad
		//easeInCubic
		//easeOutCubic
		//easeInOutCubic
		//easeInQuart
		//easeOutQuart
		//easeInOutQuart
		//easeInQuint
		//easeOutQuint
		//easeInOutQuint
		//easeInSine
		//easeOutSine
		//easeInOutSine
		//easeInExpo
		//easeOutExpo
		//easeInOutExpo
		//easeInCirc
		//easeOutCirc
		//easeInOutCirc
		//easeInElastic
		//easeOutElastic
		//easeInOutElastic
		//easeInBack
		//easeOutBack
		//easeInOutBack
		//easeInBounce
		//easeOutBounce
		//easeInOutBounce

