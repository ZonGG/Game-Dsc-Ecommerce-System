function validate()
{
	atpos = document.myForm.Email.value.indexOf("@");
	dotpos = document.myForm.Email.value.lastIndexOf(".");
	
	var first = document.myForm.FirstName.value;
	var last = document.myForm.LastName.value;
	var pnum = document.myForm.PhoneNum.value;
	
	if (document.myForm.FirstName.value == "")
	{
		alert("Please provide your first name.");
		document.myForm.FirstName.focus();
		return false;
	}	
	if(first[0] != first[0].toUpperCase()){
		alert("The first character of your first name should be uppercase.");
		document.myForm.FirstName.focus();
		return false;
	}
	if (document.myForm.LastName.value == "")
	{
		alert("Please provide your last name.");
		document.myForm.LastName.focus();
		return false;
	}
	if(last[0] != last[0].toUpperCase()){
		alert("The first character of your last name should be uppercase.");
		document.myForm.LastName.focus();
		return false;
	}
	
	if(document.myForm.PhoneNum.value == "")
	{
		alert("Please insert your mobile number.");
		document.myForm.PhoneNum.focus();
		return false;
	}
	
	if(!(/^(01)[0-46-9]*[0-9]$/).test(document.myForm.PhoneNum.value) ){
			alert("Please enter your mobile number in format 01X-XXX XXXXX.");
			document.myForm.PhoneNum.focus();
		return false;
	}	
	
	if( pnum.length > 10 || pnum.length < 7){
		alert("Your enter you number in correct digits length in format 01X XXX XXXXX.");
		document.myForm.PhoneNum.focus();
		return false;
	}
	if (document.myForm.Email.value == "")
	{
		alert("Please provide your email.");
		document.myForm.Email.focus();
		return false;
	}	
	if(atpos < 1 || (dotpos - atpos < 2))
	{
		alert("Please enter correct email in correct format.");
		document.myForm.Email.focus();
		return false;
    }
    if(document.myForm.Gender.value != "male" && document.myForm.Gender.value != "female")
	{
		alert("Please select your gender.");
		return false;
    }
	else{
		alert("The profile is successfully edited! Thank you.");
		return true;
    }
}