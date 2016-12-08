$(document).ready(function() {
	// Belgium National Debt
	currentDebt = setInterval(dette_publique,1000);
	
	//Launch some random quotes
	randomQuotes();
	
});

function format(object)
{
	object = '' + Math.round(object);
	if(object.length > 3)
	{
		var mod = object.length % 3;
		var output = (mod > 0 ?(object.substring(0,mod)): '');
		for(var i=0; i<Math.floor(object.length/3); i++)
		{
			if((mod==0)&&(i==0))
			{
				output+=object.substring(mod+3*i,mod+3*i+3);
			}
			else
			{
				output+='.'+object.substring(mod+3*i,mod+3*i+3);
			}
		}
		return(output);
	}
	else
	{
		return object;
	}
}

// Dette publique belge
function dette_publique() 
{
    var detteOrigine = 362253000000;
	var increment = 26000000 / 30 / 24 / 60 / 60;
	var nbre = "";
    var str_nbre = "";
    
    var	days = ((new Date()).getTime() - (new Date(2014, 03, 28)).getTime())/1000;
    nbre = detteOrigine + Math.floor(days*increment);

    //Séparateur de milliers (ici de milliards !)
    for (cpt = nbre.toString().length -3 ; cpt >= 0; cpt = cpt - 3 ) {
        str_nbre = nbre.toString().substr(cpt, 3) + " " + str_nbre;
    }

    if ( (nbre.toString().length % 3) != 0 )
        str_nbre = nbre.toString().substr(0, nbre.toString().length % 3) + " " + str_nbre;
   
    str_nbre = str_nbre.substr(0, str_nbre.length - 1);
		
		if (document.getElementById("debt"))
		{
			document.getElementById("debt").innerHTML = str_nbre + " €";
		}
		
		
    timerRunning = true;
}

function randomQuotes()
{
	if($('.textItem').length > 1)
	{
		$('.textItem:first').addClass('current').show();
		setInterval('textRotate()', 10000);
	}
}

function textRotate()
{
	var current = $('#quotes > .current');
	if(current.next().length == 0)
	{
		current.removeClass('current').fadeOut(2000);
		$('.textItem:first').addClass('current').fadeIn(2000);
	}
	else
	{
		current.removeClass('current').fadeOut(2000);
		current.next().addClass('current').fadeIn(2000);
	}
}