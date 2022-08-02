function apagar()
{
	var str = document.calc.visor.value;
	var len = str.length;
	len-=1;
	document.calc.visor.value = (str.substring(0,len));

}