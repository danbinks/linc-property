<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linc Properties | Home</title>
<link href="resourcs/stylesheets/reset.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" />
<link href="resourcs/stylesheets/main.css" rel="stylesheet" type="text/css" />

<link rel="icon" type="image/png" href="favicon.png">
</head>

<body>

<div id="main_wrapper" class="home">
	
	<div id="tileWrap" style="width:1024px;height:700px;position:relative;"></div>
    
	<div id="logo"><a href="index.php"><h1>LINC<br/><span id="logospacer">PROPERTY</span></h1></a></div>
    <p id="tagline">"Revealing Perth's commercial real estate potential"</p>
    
    <div id="navWrapper">
        <a href="about-us/index.php" class="link_navi_main">About Us</a> 
        <a href="projects/index.html" class="link_navi_main">Projects</a> 
        <a href="contact/index.php" class="link_navi_main">Contact</a> 
    </div>
</div>

<img id="loadlogo" style="display:none;" src="resourcs/images/hero1.jpg" />
<img style="display:none;" src="resourcs/images/hero2.jpg" />
<img style="display:none;" src="resourcs/images/hero3.jpg" />
<img style="display:none;" src="resourcs/images/hero4.jpg" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

<script type="text/javascript">
	//test for ipad
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
	var m = 1;
	if(isiPad)
	{
		m = 1;
	}
	//get width and height of tiled area
	var width = $("#tileWrap").width();
	var height = $("#tileWrap").height();
	
	//test for integer
	function is_int(value){
	  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
		  return true;
	  } else {
		  return false;
	  }
	}
	
	//create tiled grid
	function makeTiles(width, height)
	{
		for(var x=-1; x <= (width/25) + 1; x++)
		{
			for(var y=-1; y <= (height/42) + 1; y++)
			{
				var offset = 0;
				var colour = "background:url(resourcs/images/t1.png)";
				if( is_int(x / 2) )
				{
					colour = "background:url(resourcs/images/t2.png)";
				}
				if(is_int(y/2))
				{
					colour = "background:url(resourcs/images/t2.png)";
					if( is_int(x / 2) )
					{
						colour = "background:url(resourcs/images/t1.png)";
					}
				}
				$("<div id=\""+x+"-"+y+"\" style=\"position:absolute;width:50px;height:42px;left:"+((x*25))+"px;top:"+(y*42)+"px;"+colour+";\"></div>").appendTo("#tileWrap");
			}
		}
	}
	
	makeTiles(width,height);
	
	//length of fade in ms
	var t = 200 * m;
	//offset of fade
	var o = 120 * m;
	
	//function to fade out tiles
	function fadeArrOut(arr)
	{
		for(var i=0;i<arr.length;i++)
		{
			var d = i*(t-o);
			$("#"+(arr[i][0][0])+"-"+(arr[i][0][1])).delay(d).fadeOut(t, "swing", false);
			
			if(i == (arr.length - 1))
			{
				$("#"+(arr[i][1][0])+"-"+(arr[i][1][1])).delay(d).fadeOut(t, "swing", false); //function(){to = window.setTimeout(fadeArrIn, 8000, arr);});
			}else{
				$("#"+(arr[i][1][0])+"-"+(arr[i][1][1])).delay(d).fadeOut(t, "swing", false);		
			}
		}
	}
	
	//function to fade in tiles
	function fadeArrIn(arr)
	{
		for(var i=0;i<arr.length;i++)
		{
			var d = i*(t-o);
			$("#"+(arr[i][0][0])+"-"+(arr[i][0][1])).delay(d).fadeIn(t, "swing", false);
			
			if(i == (arr.length - 1))
			{
				$("#"+(arr[i][1][0])+"-"+(arr[i][1][1])).delay(d).fadeIn(t, "swing", false); //function(){to = window.setTimeout(fadeArrOut, 2000, arr);});
			}else{
				$("#"+(arr[i][1][0])+"-"+(arr[i][1][1])).delay(d).fadeIn(t, "swing", false);		
			}
		}
	}
	
	//arrays of shapes to fade in/out
	
	var arr = {0 : [[[1,0],[0,2]], [[0,0],[0,3]], [[0,1],[1,3]], [[1,1],[2,3]], [[1,2],[2,2]]] ,
1 : [[[30,10],[33,9]], [[31,10],[34,9]], [[31,9],[34,8]], [[32,9],[33,8]], [[,],[32,8]]] ,
47 : [[[25,0],[30,1]], [[26,0],[31,1]], [[27,0],[32,1]], [[28,0],[32,0]], [[29,0],[31,0]], [[,],[30,0]]] ,
2 : [[[36,5],[34,4]], [[35,5],[33,4]], [[34,5],[32,4]], [[33,5],[32,5]]] ,
46 : [[[9,4],[8,4]], [[7,4],[6,4]], [[10,3],[3,5]], [[9,3],[2,5]], [[8,3],[2,4]], [[7,3],[3,4]], [[6,3],[3,3]], [[5,3],[4,3]]] ,
3 : [[[2,11],[2,14]], [[2,10],[3,14]], [[1,10],[4,14]], [[0,10],[5,14]], [[0,11],[5,13]], [[1,11],[4,13]], [[1,12],[3,13]], [[2,12],[2,13]]] ,
45 : [[[3,0],[8,2]], [[2,0],[9,2]], [[2,1],[10,2]], [[3,1],[11,2]], [[3,2],[11,1]], [[4,2],[10,1]], [[5,2],[9,1]], [[6,2],[8,1]], [[7,2],[7,1]]] ,
4 : [[[31,15],[36,14]], [[32,15],[37,14]], [[33,15],[38,14]], [[34,15],[38,15]], [[35,15],[37,15]], [[,],[36,15]]] ,
44 : [[[4,7],[7,8]], [[5,7],[7,7]], [[6,7],[8,7]], [[6,6],[8,6]], [[,],[7,6]]] ,
5 : [[[4,8],[3,11]], [[5,8],[4,11]], [[6,8],[5,11]], [[6,9],[6,11]], [[7,9],[6,10]], [[,],[7,10]]] ,
43 : [[[9,0],[18,1]], [[10,0],[18,0]], [[11,0],[17,0]], [[12,0],[16,0]], [[13,0],[15,0]], [[,],[14,0]]] ,
6 : [[[34,7],[38,2]], [[35,7],[38,3]], [[35,8],[37,3]], [[36,8],[36,3]], [[37,8],[35,3]], [[37,7],[35,4]], [[38,7],[36,4]], [[38,6],[37,4]], [[37,6],[38,4]], [[37,5],[38,5]]] ,
42 : [[[9,12],[9,15]], [[9,11],[8,15]], [[10,11],[8,14]], [[10,10],[9,14]], [[9,10],[9,13]], [[8,10],[8,13]], [[8,11],[8,12]], [[7,11],[7,12]]] ,
7 : [[[5,4],[4,9]], [[4,4],[5,9]], [[4,5],[5,10]], [[5,5],[4,10]], [[5,6],[3,10]], [[4,6],[3,9]], [[3,6],[2,9]], [[2,6],[2,8]], [[2,7],[3,8]], [[,],[3,7]]] ,
41 : [[[6,5],[14,5]], [[7,5],[13,5]], [[8,5],[13,6]], [[9,5],[12,6]], [[9,6],[11,6]], [[,],[10,6]]] ,
8 : [[[15,4],[14,4]], [[13,4],[12,4]], [[12,5],[16,3]], [[11,5],[15,3]], [[10,5],[14,3]], [[10,4],[13,3]], [[11,4],[12,3]], [[,],[11,3]]] ,
40 : [[[18,2],[19,2]],[[20,2],[15,5]], [[21,2],[16,5]], [[22,2],[16,4]], [[22,3],[17,4]], [[21,3],[17,3]], [[20,3],[18,3]], [[,],[19,3]]] ,
9 : [[[11,8],[17,5]], [[10,8],[18,5]], [[10,9],[19,5]], [[9,9],[19,6]], [[8,9],[18,6]], [[8,8],[17,6]], [[9,8],[16,6]], [[9,7],[15,6]], [[10,7],[14,6]], [[11,7],[14,7]], [[12,7],[13,7]]] ,
39 : [[[11,9],[16,14]], [[11,10],[17,14]], [[12,10],[17,13]], [[13,10],[16,13]], [[14,10],[16,12]], [[14,11],[15,12]], [[,],[15,11]]] ,
10 : [[[13,11],[15,13]], [[12,11],[15,14]], [[11,11],[14,14]], [[11,12],[13,14]], [[10,12],[12,14]], [[10,13],[12,15]], [[11,13],[11,15]], [[11,14],[10,15]], [[,],[10,14]]] ,
38 : [[[13,12],[12,12]], [[14,12],[12,13]], [[14,13],[13,13]]] ,
11 : [[[13,15],[18,14]], [[14,15],[19,14]], [[15,15],[20,14]], [[16,15],[20,15]], [[17,15],[19,15]], [[,],[18,15]]] ,
37 : [[[18,11],[18,13]], [[19,11],[19,13]], [[20,11],[20,13]], [[21,11],[20,12]], [[,],[21,12]]] ,
12 : [[[19,12],[21,15]], [[18,12],[22,15]], [[17,12],[22,14]], [[17,11],[21,14]], [[16,11],[21,13]], [[16,10],[22,13]], [[17,10],[22,12]], [[18,10],[23,12]], [[19,10],[23,11]], [[20,10],[22,11]], [[21,10],[22,10]], [[21,9],[23,10]], [[22,9],[23,9]]] ,
36 : [[[15,7],[15,10]], [[16,7],[15,9]], [[17,7],[16,9]], [[18,7],[17,9]], [[19,7],[18,9]], [[20,7],[19,9]], [[21,7],[20,9]], [[21,8],[20,8]]] ,
13 : [[[15,5],[20,2]], [[16,5],[21,2]], [[16,4],[22,2]], [[17,4],[22,3]], [[17,3],[21,3]], [[18,3],[20,3]], [[,],[19,3]]] ,
35 : [[[14,9],[19,8]], [[13,9],[18,8]], [[12,9],[17,8]], [[12,8],[16,8]], [[13,8],[15,8]], [[,],[14,8]]] ,
14 : [[[19,0],[29,2]], [[20,0],[29,1]], [[21,0],[28,1]], [[22,0],[27,1]], [[23,0],[26,1]], [[24,0],[25,1]], [[,],[24,1]]] ,
34 : [[[19,1],[33,1]], [[20,1],[33,2]], [[21,1],[32,2]], [[22,1],[31,2]], [[23,1],[30,2]], [[23,2],[30,3]], [[24,2],[31,3]], [[25,2],[31,4]], [[26,2],[30,4]], [[27,2],[29,4]], [[28,2],[29,3]], [[,],[28,3]]] ,
15 : [[[18,4],[20,4]], [[19,4],[21,4]], [[20,5],[28,5]], [[21,5],[28,4]], [[22,5],[27,4]], [[22,4],[27,3]], [[23,4],[26,3]], [[23,3],[25,3]], [[,],[24,3]]] ,
33 : [[[23,6],[31,6]], [[23,5],[30,6]], [[24,5],[30,7]], [[24,4],[31,7]], [[25,4],[31,8]], [[26,4],[30,8]], [[26,5],[30,9]], [[27,5],[29,9]], [[27,6],[29,10]], [[26,6],[28,10]], [[26,7],[27,10]], [[25,7],[27,9]], [[25,8],[26,9]], [[,],[26,8]]] ,
16 : [[[20,6],[25,5]], [[21,6],[25,6]], [[22,6],[24,6]], [[22,7],[24,7]], [[,],[23,7]]] ,
32 : [[[22,8],[25,9]], [[23,8],[24,9]], [[,],[24,8]]] ,
17 : [[[24,12],[32,12]], [[25,12],[31,12]], [[25,11],[31,11]], [[24,11],[30,11]], [[24,10],[29,11]], [[25,10],[28,11]], [[26,10],[27,11]], [[,],[26,11]]] ,
31 : [[[23,15],[27,12]], [[24,15],[26,12]], [[25,15],[26,13]], [[26,15],[25,13]], [[26,14],[24,13]], [[25,14],[23,13]], [[24,14],[23,14]], [[,],[27,15]]] ,
18 : [[[30,12],[35,11]], [[29,12],[34,11]], [[28,12],[34,10]], [[28,13],[33,10]], [[27,13],[32,10]], [[27,14],[32,11]], [[28,14],[33,11]], [[28,15],[33,12]], [[29,15],[34,12]], [[30,15],[34,13]], [[30,14],[35,13]], [[31,14],[35,14]], [[32,14],[34,14]], [[,],[33,14]]] ,
19 : [[[29,14],[33,13]], [[29,13],[32,13]], [[30,13],[31,13]]] ,
30 : [[[12,1],[12,2]], [[13,1],[13,2]], [[14,1],[14,2]], [[15,1],[15,2]], [[16,1],[16,2]], [[17,1],[17,2]]] ,
20 : [[[35,12],[36,13]], [[36,12],[37,13]], [[37,12],[38,13]], [[,],[38,12]]] ,
29 : [[[38,8],[36,11]], [[38,9],[37,11]], [[37,9],[38,11]], [[36,9],[38,10]], [[35,9],[37,10]], [[35,10],[36,10]]] ,
21 : [[[1,4],[1,9]], [[0,4],[0,9]], [[0,5],[0,8]], [[1,5],[1,8]], [[1,6],[1,7]], [[0,6],[0,7]]] ,
28 : [[[33,7],[36,7]], [[32,7],[36,6]], [[32,6],[35,6]], [[33,6],[34,6]]] ,
22 : [[[31,5],[29,7]], [[30,5],[29,8]], [[29,5],[28,8]], [[29,6],[27,8]], [[28,6],[27,7]], [[28,9],[28,7]]] ,
27 : [[[3,12],[7,15]], [[4,12],[6,15]], [[5,12],[6,14]], [[6,12],[7,14]], [[6,13],[7,13]]] ,
23 : [[[0,12],[5,15]], [[0,13],[4,15]], [[1,13],[3,15]], [[1,14],[2,15]], [[0,14],[1,15]], [[,],[0,15]]] ,
26 : [[[33,0],[34,1]], [[34,0],[35,1]], [[35,0],[36,1]], [[36,0],[37,1]], [[37,0],[38,1]], [[,],[38,0]]] ,
24 : [[[8,0],[6,1]], [[7,0],[5,1]], [[6,0],[4,1]], [[5,0],[4,0]]] ,
25 : [[[32,3],[37,2]], [[33,3],[36,2]], [[34,3],[35,2]], [[,],[34,2]]] };
	
	//var arr0 = [[[,],[,]], [[,],[,]]
	
	if(isiPad)
	{
		m = 4;
	}
	
	function randNum()
	{
		var ran = (120 * m) + Math.floor((Math.random()*5)+1);
		
		return ran;
	}
	
	var fadeState = {
	"in" : fadeArrIn,
	"out": fadeArrOut	
	};
	var v = Math.floor((Math.random()*4)+1);;
	function fadeLoop(state)
	{
		for (var x = 0; x <= 47; x++)
		{
			to  = window.setTimeout(fadeState[state], randNum() * x, arr[x]);
			if(x == 44)
			{
				if(state == "in")
				{
					
					rerun = window.setTimeout(fadeLoop, 6800 * m, "out");
				}else{
					v++;
					if(v == 5){v = 1};
					$("#tileWrap").fadeOut(0);
					$("#tileWrap").css({'background':'url(resourcs/images/hero'+v+'.jpg) no-repeat'});
					$("#tileWrap").fadeIn(0);
					rerun = window.setTimeout(fadeLoop, 9000 * m, "in");
				}
			}
		}
	}
	
	(function ($) {
	$.event.special.load = {
		add: function (hollaback) {
			if ( this.nodeType === 1 && this.tagName.toLowerCase() === 'img' && this.src !== '' ) {
				// Image is already complete, fire the hollaback (fixes browser issues were cached
				// images isn't triggering the load event)
				if ( this.complete || this.readyState === 4 ) {
					hollaback.handler.apply(this);
				}

				// Check if data URI images is supported, fire 'error' event if not
				else if ( this.readyState === 'uninitialized' && this.src.indexOf('data:') === 0 ) {
					$(this).trigger('error');
				}
				
				else {
					$(this).bind('load', hollaback.handler);
				}
			}
		}
	};
}(jQuery));

	window.onload = function () {
		
		$("#loadlogo").bind('load', function (e) {
	 		//alert ("The image has loaded!"); 
			fadeLoop("out"); 
	 	});

		
		
		
	
	}
	/*
	to0 = window.setTimeout(fadeArrOut, randNum(), arr0);
	to1 = window.setTimeout(fadeArrOut, randNum(), arr1);
	to2 = window.setTimeout(fadeArrOut, 500, arr2);
	to3 = window.setTimeout(fadeArrOut, 500, arr3);
	to4 = window.setTimeout(fadeArrOut, 500, arr4);
	to5 = window.setTimeout(fadeArrOut, 500, arr5);
	to6 = window.setTimeout(fadeArrOut, 500, arr6);
	to7 = window.setTimeout(fadeArrOut, 500, arr7);
	to8 = window.setTimeout(fadeArrOut, 500, arr8);
	to9 = window.setTimeout(fadeArrOut, 500, arr9);
	to10 = window.setTimeout(fadeArrOut, 500, arr10);
	to11 = window.setTimeout(fadeArrOut, 500, arr11);
	to12 = window.setTimeout(fadeArrOut, 500, arr12);
	to13 = window.setTimeout(fadeArrOut, 500, arr13);
	to14 = window.setTimeout(fadeArrOut, 500, arr14);
	to15 = window.setTimeout(fadeArrOut, 500, arr15);
	to16 = window.setTimeout(fadeArrOut, 500, arr16);
	to17 = window.setTimeout(fadeArrOut, 500, arr17);
	to18 = window.setTimeout(fadeArrOut, 500, arr18);
	to19 = window.setTimeout(fadeArrOut, 500, arr19);
	to20 = window.setTimeout(fadeArrOut, 500, arr20);
	to21 = window.setTimeout(fadeArrOut, 500, arr21);
	to22 = window.setTimeout(fadeArrOut, 500, arr22);
	to23 = window.setTimeout(fadeArrOut, 500, arr23);
	to24 = window.setTimeout(fadeArrOut, 500, arr24);
	to25 = window.setTimeout(fadeArrOut, 500, arr25);
	to26 = window.setTimeout(fadeArrOut, 500, arr26);
	to27 = window.setTimeout(fadeArrOut, 500, arr27);
	to28 = window.setTimeout(fadeArrOut, 500, arr28);
	to29 = window.setTimeout(fadeArrOut, 500, arr29);
	to30 = window.setTimeout(fadeArrOut, 500, arr30);
	to31 = window.setTimeout(fadeArrOut, 500, arr31);
	to32 = window.setTimeout(fadeArrOut, 500, arr32);
	to33 = window.setTimeout(fadeArrOut, 500, arr33);
	to34 = window.setTimeout(fadeArrOut, 500, arr34);
	to35 = window.setTimeout(fadeArrOut, 500, arr35);
	to36 = window.setTimeout(fadeArrOut, 500, arr36);
	to37 = window.setTimeout(fadeArrOut, 500, arr37);
	to38 = window.setTimeout(fadeArrOut, 500, arr38);
	to39 = window.setTimeout(fadeArrOut, 500, arr39);
	to40 = window.setTimeout(fadeArrOut, 500, arr40);
	to41 = window.setTimeout(fadeArrOut, 500, arr41);
	to42 = window.setTimeout(fadeArrOut, 500, arr42);
	to43 = window.setTimeout(fadeArrOut, 500, arr43);
	to44 = window.setTimeout(fadeArrOut, 500, arr44);
	*/
	/*
	var arr1 = [[[2,0],[16,0]], [[3,0],[16,1]], [[4,0],[15,1]], [[5,0],[14,1]], [[6,0],[13,1]], [[6,1],[13,2]], [[7,1],[14,2]], [[8,1],[14,3]], [[9,1],[13,3]], [[10,1],[12,3]], [[11,1],[12,2]], [[,],[11,2]]];
	var arr2 = [[[2,1],[1,3]], [[3,1],[2,3]], [[4,1],[3,3]], [[5,1],[3,4]], [[5,2],[4,4]], [[6,2],[5,4]], [[6,3],[5,3]]];
	var arr3 = [[[4,0],[6,2]], [[3,0],[6,3]], [[2,0],[5,3]], [[2,1],[4,3]], [[1,1],[3,3]], [[1,2],[3,4]], [[2,2],[2,4]], [[2,3],[1,4]], [[,],[1,3]]];
	var arr4 = [[[4,0],[3,6]], [[4,1],[4,6]], [[3,1],[4,7]], [[3,2],[3,7]], [[4,2],[2,7]], [[4,3],[2,6]], [[3,3],[1,6]], [[2,3],[1,5]], [[1,3],[2,5]], [[1,4],[2,4]]];
	var arr5 = [[[4,2],[7,6]], [[4,3],[6,6]], [[3,3],[5,6]], [[2,3],[5,5]], [[2,2],[6,5]], [[1,2],[6,4]], [[1,1],[7,4]], [[2,1],[7,3]], [[3,1],[8,3]], [[4,1],[8,2]], [[5,1],[7,2]], [[6,1],[7,1]], [[6,0],[8,1]], [[7,0],[8,0]]];
	var arr6 = [[[3,2],[7,0]], [[2,2],[6,0]], [[1,2],[5,0]], [[1,1],[4,0]], [[2,1],[3,0]], [[,],[2,0]]];
	var arr7 = [[[10,0],[12,3]], [[11,0],[11,3]], [[12,0],[10,3]], [[12,1],[9,3]], [[11,1],[8,3]], [[10,1],[7,3]], [[9,1],[7,4]], [[8,1],[6,4]], [[7,1],[5,4]], [[7,2],[5,3]], [[6,2],[4,3]], [[5,2],[3,3]], [[4,2],[3,4]], [[3,2],[2,4]], [[2,2],[1,4]], [[2,3],[1,3]]];
	var arr8 = [[[1,2],[9,2]], [[1,1],[8,2]], [[2,1],[8,3]], [[2,0],[9,3]], [[3,0],[9,4]], [[4,0],[8,4]], [[4,1],[8,5]], [[5,1],[7,5]], [[5,2],[7,6]], [[4,2],[6,6]], [[4,3],[5,6]], [[3,3],[5,5]], [[3,4],[4,5]], [[,],[4,4]]];
	var arr9 = [[[11,0],[4,2]], [[12,0],[3,2]], [[12,1],[2,2]], [[13,1],[2,3]], [[13,2],[1,3]], [[12,2],[1,4]], [[11,2],[2,4]], [[11,1],[2,5]], [[10,1],[3,5]], [[9,1],[4,5]], [[8,1],[4,4]], [[8,0],[5,4]], [[7,0],[6,4]], [[6,0],[7,4]], [[6,1],[8,4]], [[7,1],[9,4]], [[7,2],[9,3]], [[8,2],[8,3]]];
	var arr10 = [[[6,0],[1,5]], [[5,0],[2,5]], [[5,1],[2,6]], [[4,1],[3,6]], [[3,1],[4,6]], [[2,1],[4,5]], [[2,2],[5,5]], [[3,2],[5,4]], [[4,2],[4,4]], [[5,2],[4,3]], [[,],[5,3]]];
	//var arr0 = [[[,],[,]], [[,],[,]]
	var t = 200;
	var o = 120;
	var to;
	to0 = window.setTimeout(fadeArrOut, 500, arr1,[16,0]);
	to1 = window.setTimeout(fadeArrOut, 3000, arr2, [0,10]);
	to2 = window.setTimeout(fadeArrOut, 13000, arr3, [8,10]);
	to3 = window.setTimeout(fadeArrOut, 9000, arr4, [0,2]);
	to4 = window.setTimeout(fadeArrOut, 1000, arr5, [14,8]);
	to5 = window.setTimeout(fadeArrOut, 4000, arr6, [8,2]);
	to6 = window.setTimeout(fadeArrOut, 5500, arr7, [6,4]);
	to7 = window.setTimeout(fadeArrOut, 10000, arr8, [21,3]);
	to8 = window.setTimeout(fadeArrOut, 7000, arr9, [25,9]);
	to9 = window.setTimeout(fadeArrOut, 13000, arr10, [32,1]);
*/

</script>
</body>
</html>