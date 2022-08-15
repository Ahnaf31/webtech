		"use strict"

	/*ASCII code: 65-90>> UPPERCASE
			8>>   Backspace,
			95>>  underscore[_]*/

	function onlyalphabets(e)
	{
		var name=e.which||e.keycode;
			if((name>=65 && name<=90) || (name==95) || (name>=97 && name<=122) || name==8)
			{
				return true;
			}
			else
			{
				return false;
			}
	}

	function Lcheck()
	{
		var name = document.getElementById('name').value;
		var pass = document.getElementById('password').value;

		if(name == "")
		{
			alert('PLEASE FILL THE USERNAME to proceed');
			return false;
		}
		if(name.length<4)
		{
			alert('Name must be at least 4 characters to be valid in this field');
			return false;
		}
		if(name.length>15)
		{
			alert('Name must be less than 15 characters to be valid in this field');
			return false;
		}

		if(pass == "")
		{
			alert('PLEASE FILL THE PASSWORD area to proceed');
			return false;
		}
		if(pass.length<6)
		{
			alert('PASSWORD must contain at least 6 characters to be valid in this field');
			return false;
		}
		
		else
		{
			header("location: ../view/adminDashboard.php");
		}

	}