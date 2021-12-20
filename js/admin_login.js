function validate()
{

	var id = document.myForm.AdminID.value;
	var pass = document.myForm.Password.value;


	if (id.length != 10)
	{
		alert("Your ID has to be 10 digits. For example: 1000000001");
		document.myForm.FirstName.focus();
		return false;
	}
	if( pass == "" )
	{alert( "Please enter your password!" );return false;
  }

	}
