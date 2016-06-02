var clouds = new Array('#cloud1', '#cloud2', '#cloud3', '#cloud4', '#cloud5', '#cloud6', '#cloud7', '#cloud8', '#cloud9', '#cloudA', '#cloudB', '#cloudC', '#cloudD', '#cloudE', '#cloudF', '#cloudG', '#cloudH', '#cloudI');
var skys = new Array('#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere', '#stratosphere');
var cloudMoved = new Array();
var weather = 6500 + 9000 * Math.random() + 8000 * Math.random() + 4000 * Math.random();

for (var i=0;i<clouds.length;i++) { 
	cloudMoved[i] = false;
}

$(init);

function init()
{
	for (var i=0;i<clouds.length;i++) { 
		cloudMove(clouds[i], skys[i], 33550 * Math.random() + weather);
	}
}


function cloudMove(element, skyelement, base)
{
	if (!cloudMoved[element])
	{
		$(element)
			.css("left", $(element).offset().left)
	}

	$(element)
		.animate(
			{
				left: $(skyelement).width()
			},
			cloudMoved[clouds.indexOf(element)] ? base * Math.random() + (base * Math.random() * (5.45 * Math.random())) : base * Math.random() + (base * Math.random() * (2.35 * Math.random())),
			"linear",
			function()
			{
				$(this).css("left", -parseInt($(this).css("width")));				$(this).css("z-index", parseInt(35 * Math.random()));				$(this).css("top", parseInt(85 * Math.random()) + '%');
				cloudMoved[clouds.indexOf(element)] = true;
				cloudMove(element, skyelement, base);
			}
		)
}