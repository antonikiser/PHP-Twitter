function odliczanie()
	{
		var teraz= new Date();
		var dzien=teraz.getDate();
		var miesiac=teraz.getMonth()+1; 
		var rok=teraz.getFullYear();

		var sekunda=teraz.getSeconds();
		if (sekunda<10) sekunda="0" + sekunda;
		var minuta=teraz.getMinutes();
		if (minuta<10) minuta="0" + minuta;
		var godzina=teraz.getHours();
		if (godzina<10) godzina="0" + godzina;
		
		document.getElementById("zegar").innerHTML = 
		dzien+"/"+miesiac+"/"+rok+" || "+godzina+":"+minuta+":"+sekunda;
		setTimeout("odliczanie()",1000);
	}