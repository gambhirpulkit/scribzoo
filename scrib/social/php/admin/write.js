function ajax(url,uqry,div)

{ 

	var xmlhttp = false;

	

	if (window.XMLHttpRequest)

	{

		xmlhttp=new XMLHttpRequest();

	}

	else

	{

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange=function()

	{

		if (xmlhttp.readyState==4 && xmlhttp.status==200)

		{ //alert(xmlhttp.responseText);

			document.getElementById(div).innerHTML = xmlhttp.responseText;

		}

	}

	

	xmlhttp.open("POST",url,true);

	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

	xmlhttp.send(uqry);

}



function allocate(val1,val2,val3)

{

    //alert(val1);

	//alert(val2);

	//alert(val3);

	var url  = 'ajax.php';

	var uqry = 'mode=insertrequest&visitor='+val1+'&receiver='+val2+'&request='+val3;



	var div  = 'datadiv';

        ajax(url,uqry,div);

 }

function store_title(val1)

{


var val2  = document.getElementById('input_title').value;
    //alert(val1);

	//alert(val2);

	//alert(val3);

	var url  = 'ajax_write.php';

	var uqry = 'mode=inserttitle&s_email='+val1+'&title='+val2;



	var div  = 'datadiv';

        ajax(url,uqry,div);

 }
