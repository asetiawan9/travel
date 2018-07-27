
 function removeCharacter(v, ch)
 {
 	var tempValue = v+"";
 	var becontinue = true;
 	while(becontinue == true)
 	{
 		var point = tempValue.indexOf(ch);
 		if( point >= 0 )
 		{
 			var myLen = tempValue.length;
 			tempValue = tempValue.substr(0,point)+tempValue.substr(point+1,myLen);
 			becontinue = true;
 		}else{
 			becontinue = false;
 		} 
 	}
 	return tempValue;
 }
 
 /*
 *  using by function ThausandSeperator!!
 */
 function characterControl(value)
 {
 	var tempValue = "";
 	var len = value.length;
 	for(i=0; i<len; i++)
 	{
 		var chr = value.substr(i,1);
 		if( (chr < '0' || chr > '9') && chr != '.' && chr != ',' )
 		{
 			chr = '';
 		}
 		
 		tempValue = tempValue + chr;
 	}
 	return tempValue;
 }
 
 /*
 *	Automaticly converts the value in the textbox in a currency format with 
 *	thousands seperator and decimal point
 *
 */
 function Nominal(value, digit)
 {
 	var thausandSepCh = ".";
 	var decimalSepCh = ",";
 	
 	var tempValue = "";
 	var realValue = value+"";
 	var devValue = "";
 	realValue = characterControl(realValue);
 	var comma = realValue.indexOf(decimalSepCh);
 	if(comma != -1 )
 	{
 		tempValue = realValue.substr(0,comma); 
 		devValue = realValue.substr(comma);
 		devValue = removeCharacter(devValue,thausandSepCh);
 		devValue = removeCharacter(devValue,decimalSepCh);
 		devValue = decimalSepCh+devValue;
 		if( devValue.length > 3)
 		{
 			devValue = devValue.substr(0,3);
 		}
 	}else{
 		tempValue = realValue;
 	}

	tempValue = removeCharacter(tempValue,thausandSepCh);
 		
 	var result = "";
 	var len = tempValue.length;
 	while (len > 3){
		result = thausandSepCh+tempValue.substr(len-3,3)+result;
		len -=3;
	}
	result = tempValue.substr(0,len)+result;
	return result+devValue; 
 }
 
 /*
 *	Automaticly converts the value in the textbox to upper
 *	and it also converts the Turkish characters to the closest letter in the alphabet
 *
 */
 function allCharsToUpper(value)
 {
 	var tempValue = "";
 	var len = value.length;
 	for(i=0; i<len; i++)
 	{
 		var chr = value.substr(i,1);
 		chr = chr.toUpperCase();
 		if( chr == 'Ý') {chr = 'I';	}
 		else if( chr == 'Ð') {chr = 'G';}
 		else if( chr == 'Ö') {chr = 'O';}
 		else if( chr == 'Ü') {chr = 'U';}
 		else if( chr == 'Þ') {chr = 'S';}
 		else if( chr == 'Ç') {chr = 'C';}
 	 		
 		tempValue = tempValue + chr;
 	}
 	return tempValue;
 }