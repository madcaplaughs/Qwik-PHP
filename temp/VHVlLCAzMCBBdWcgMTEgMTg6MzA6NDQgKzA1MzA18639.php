<?php ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Optimize image with canvas</title>
</head>
<body>
	<script type="text/javascript">
		var img = new Image;
			img.onload = function() {
			addNoise(img, 0.2); // pass 'alpha' argument
		};
		img.src = "stage-bg.jpg";
		 
		function addNoise(img, alpha) { // new 'alpha' argument
			var canvas = document.createElement('canvas');
			canvas.width = img.width;
			canvas.height = img.height;
			 
			var ctx = canvas.getContext('2d');
			ctx.drawImage(img, 0, 0);
			 
			var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
			var pixels = imageData.data, r, g, b;
			var alpha1 = 1 - alpha;
			
			// pick the best array length
			var rl = Math.round(ctx.canvas.width * 3.73);
			var randoms = new Array(rl);
			
			// pre-calculate random pixels
			for (var i = 0; i < rl; i++) {
				randoms[i] = Math.random() * alpha + alpha1;
			}
			
			// apply random pixels
			for (var i = 0, il = pixels.length; i < il; i += 4) {
				pixels[i] *= randoms[i % rl];
			}
			 
			ctx.putImageData(imageData, 0, 0);
			
			document.body.appendChild(canvas);
		}
	</script>
</body>
</html>