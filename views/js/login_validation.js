function loginValidation()  
{  
var uid = document.registration.userid;//customer username
var passid = document.registration.passid;//customer password  
var uname = document.registration.username;//customer name  
var uadd = document.registration.address;//customer address  
//var ucountry = document.registration.country;  
var ucontact = document.registration.contact;//customer phone  
var uemail = document.registration.email;//customer email  
//var umsex = document.registration.msex;  
//var ufsex = document.registration.fsex; 
//var user = document.registration.user;
if(allLetter(uname)) 
{ 
	if(alphanumeric(uid))
	{
		if(passid_validation(passid,7,12))  
		{ 
			if(alphanumeric(uadd))
			{  
				if(ValidateEmail(uemail))   
				{
					if(allnumeric(ucontact))  
					{
						
						return true;
						//alert('Form Succesfully Submitted');  
						//window.location.reload();  
						
						
					}   
				}  
			}  
		}  
	}
}  
return false;   
} 


/*function userid_validation(uid,mx,my)  
	{  
		var uid_len = uid.value.length;  
			if (uid_len == 0 || uid_len >= my || uid_len < mx)  
			{  
				alert("Contact should not be empty / length be between "+mx+" to "+my);  
				uid.focus();  
				return false;  
			}  
		return true;  
	}  
*/	
	
function passid_validation(passid,mx,my)  
	{  
		var passid_len = passid.value.length;  
			if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
			{  
				alert("Password should not be empty / length be between "+mx+" to "+my);  
				passid.focus();  
				return false;  
			}  
		return true;  
	}  
	
function allLetter(uname)  
	{   
		var letters = /^[A-Za-z ]+$/;  
			if(uname.value.match(letters))  
			{  
				return true;  
			}  
			else  
			{  
				alert('Customer name must have alphabet characters only and not empty!');  
				uname.focus();  
				return false;  
			}  
	}
	
function alphanumeric(uadd)  
	{   
			var letters = /^[0-9a-zA-Z ]+$/;  
			if(uadd.value.match(letters))  
			{  
				return true;  
			}  
			else  
			{  
				alert('User address must have alphanumeric characters only and not empty');  
				uadd.focus();  
				return false;  
			}  
	}

function alphanumeric(uid)  
	{   
			var letters = /^[0-9a-zA-Z ]+$/;  
			if(uid.value.match(letters))  
			{  
				return true;  
			}  
			else  
			{  
				alert('Username must have alphanumeric characters only and not empty');  
				uid.focus();  
				return false;  
			}  
	}
	
	
 function allnumeric(ucontact)  
	{   
			var numbers = /^[0-9]+$/;  
			if(ucontact.value.match(numbers))  
			{  
				return true;  
			}  
			else  
			{  
				alert('Contact must have numeric characters only');  
				ucontact.focus();  
				return false;  
			}  
	} 

	
/*function countryselect(ucountry)  
	{  
			if(ucountry.value == "Default")  
			{  
				alert('Select your country from the list');  
				ucountry.focus();  
				return false;  
			}  
			else  
			{  
				return true;  
			}  
	}  
*/
function ValidateEmail(uemail)  
	{  
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			if(uemail.value.match(mailformat))  
			{  
				return true;  
			}  
			else  
			{  
				alert("You have entered an invalid email address or it is empty!");  
				uemail.focus();  
				return false;  
			}  
	} 

	
/*	
function validsex(umsex,ufsex)  
{  
	x=0;  
  
		if(umsex.checked)   
			{  
				x++;  
			} 
		
		if(ufsex.checked)  
			{  
				x++;   
			}  
	
		if(x==0)  
			{  
				alert('Select Male/Female');  
				umsex.focus();  
				return false;  
			}  
		
} 
*/

function validateMyForm ( ) { 
    	var isValid = true;
    	if ( document.form1.product_name.value == "" ) { 
	    	alert ( "Please type Product	 Name" ); 
	    	isValid = false;
    		} else if ( document.form1.price.value == "" ) { 
            alert ( "Please input Price" ); 
            isValid = false;
    		} else if ( document.form1.category.value == "" ) { 
            alert ( "Please choose Category" ); 
            isValid = false;
            } else if ( document.form1.subcategory.value == "" ) { 
            alert ( "Please choose Subcategory" ); 
            isValid = false;
            } else if ( document.form1.details.value == "" ) { 
            alert ( "Please type in Details" ); 
            isValid = false;
            } else if ( document.form1.image.value == "" ) { 
            alert ( "Please choose Image" ); 
            isValid = false;
            } else if ( document.form1.quantity.value == "" ) { 
            alert ( "Please type Quantity" ); 
            isValid = false;
    	}
    return isValid;
}