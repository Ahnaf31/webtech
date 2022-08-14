"use strict"
	
	function onlyalphabets(e)
	{
		var name=e.which||e.keycode;
		
		if((name>=65 && name<=90) || (name==95) || (name==32) || (name>=97 && name<=122) || (name==8))
		{
			return true;
		}
		else
		{
			return false;
		}	
	
	}
	
	function onlyalphabets2(e)
	{
		var name=e.which||e.keycode;
		
		if((name>=65 && name<=90) || (name==95) || (name>=97 && name<=122) || (name==8))
		{
			return true;
		}
		else
		{
			return false;
		}	
	
	}


		var fname=document.forms["regform"]["fname"];
		
		var fname_error=document.getElementById("fname");
		
		fname.addEventListener("blur",fnameVarify,true);
		
	function Rcheck()
	{
		
		//var fname=document.getElementById('fname').value;
		var username=document.getElementById('username').value;
		var pass=document.getElementById('password').value;
		var Cpass=document.getElementById('Cpassword').value;
		var email=document.getElementById('email').value;
		var gender=document.getElementById('gender').value;
		var nid=document.getElementById('nid').value;
		


									if(fname.value == "" )
									{
										//alert('required to fill up all the fields');
										fname.style.border="15px solid red";
										fname_error.textContent="full name is required";
										return false;
									}
									if(WordCount(fname.value)<2)
									{
										fname_error.style.color="green";
										fname_error.textContent="full name must contain at least 2 words";
										return false;
									}
								
								function fnameVarify()
						{
							if(fname.value !== "" )
									{
										fname.style.border="1px solid #5E6E66";
										fname_error.textContent="";
										return true;
										
									}
							
						}
						function WordCount(str)
									{ 
									  return str.split(" ").length;
									}
									
		if(fname.length<4)
		{
			alert('Name must be at least 4 characters to be valid in this field');
			return false;
		}
		if(fname.length>15)
		{
			alert('Name must be less than 15 characters to be valid in this field');
			return false;
		}



		/*if(fname == "")
		{
			alert('PLEASE FILL THE FULLNAME to proceed');
			return false;
		}*/
		if(username == "")
		{
			alert('PLEASE FILL THE USERNAME to proceed');
			return false;
		}
		if(username.length<4)
		{
			alert('Name must be at least 4 characters to be valid in this field');
			return false;
		}
		if(username.length>15)
		{
			alert('Name must be less than 15 characters to be valid in this field');
			return false;
		}
		if(pass == "")
		{
			alert('PLEASE FILL THE password to proceed');
			return false;
		}
		if(Cpass == "")
		{
			alert('PLEASE CONFIRM THE password to proceed');
			return false;
		}
		if(pass != Cpass)
		{
			alert('PLEASE Confirm that You entered the same password twice to proceed');
			return false;
		}
		if(pass.length<6)
		{
			alert('PASSWORD must contain at least 6 characters to be valid in this field');
			return false;
		}
		if(pass.length>15)
		{
			alert('15 characters are STRONG enough to make PASSWORD valid in this field');
			return false;
		}
		if(email == "")
		{
			alert('PLEASE FILL THE email to proceed');
			return false;
		}
		if((email.charAt(email.length-4) != '.') && (email.charAt(email.length-3) != '.'))
		{
			alert('WARNING:  [[[ .com  ]]] should be given to make email valid');
			return false;
		}
		
		if(gender == "")
		{
			alert('PLEASE FILL THE gender to proceed');
			return false;
		}
		if(nid == "")
		{
			alert('PLEASE FILL THE nid to proceed');
			return false;
		}
		if(nid.length<12)
		{
			alert('12 characters required for NID');
			return false;
		}
		
		else
		{
				header("location: ../view/tenantDashboard.php");
		}
			
	}
		