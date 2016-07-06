<html>
	<head>
		<title>MyHtml.html</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<style type="text/css">
			.windowdiv {
				position: absolute;
				background-color: gray;
				height: 400px;
				border: 0;
			}
			
			.windowtable {
				padding: 0;
				margin: 0;
				width: 100%;
				height: 100%;
			}
			
			.closetd {
				background-color: purple;
				font-family: "黑体";
				cursor: pointer;
				width: 1%;
				height: 1%;
			}
			
			.windowframe {
				width: 100%;
				height: 100%;
				border: 0;
			}
		</style>
		<script type="text/javascript">
			//creatWindow(地址, 横向位置, 纵向位置, 宽度, 高度)
			function creatW(strWindowUrl, intX, intY, intWidth, intHeight) {
				var div = document.createElement("div");
				document.body.appendChild(div);
				div.className = "windowdiv";
				div.style.top = intY;
				div.style.left = intX;
				div.style.width = intWidth;
				div.style.height = intHeight;
				var table = document.createElement("table");
				table.className = "windowtable";
				var frame = document.createElement("iframe");
				frame.className = "windowframe";
				frame.frameBorder = 0;
				frame.src = strWindowUrl;
				var tr, td;
				tr = table.insertRow(0);
				td = tr.insertCell(0);
				td.colSpan = 2;
				td.appendChild(frame);
				tr = table.insertRow(0);
				td = tr.insertCell(0);
				td.innerText = "X";
				td.className = "closetd";
				td.onclick = function () {
					div.style.display = "none";
				};
				td = tr.insertCell(0);
				td.innerText = " ";
				div.appendChild(table);
			}
		</script>
		<script type="text/javascript">
			function content(url){
				var frame = document.createElement("iframe");
				var part=document.getElementById("abd");
				part.appendChild(frame);
				frame.className = "windowframe";
				frame.src = url;			
			}
		</script>
	</head>
	<body>
		<input type="button" value="弹出窗口" onclick="creatWindow('./errors_403.html', 100, 100, 400, 300)">
		<input type="button" value="弹出窗口" onclick="creatW('./errors_404.html', 100, 100, 400, 300)">
		<div id="abd" style="wight:1000px;heigth:500px;
				position: absolute;"></div>
	</body>
</html>