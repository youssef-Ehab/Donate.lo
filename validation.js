const validateLogin = (email, password) => {
	var isEmailValid = validateMail(email.value);
	var isPasswordValid = validatePassword(password.value);
	if(!isEmailValid) {
		alert("Email not valid!");
		return false;
	} else if(!isPasswordValid) {
		alert("password not valid!");
		return false;
	} else {
		return true;
	}
}

const validateRegister = (firstName, lastName, email, password) => {
	if(firstName.value.length < 1 || lastName.value.length < 1) {
		alert("invalid name");
		return false;
	}
	var isEmailValid = validateMail(email.value);
	var isPasswordValid = validatePassword(password.value);
	if(!isEmailValid) {
		alert("Email not valid!");
		return false;
	} else if(!isPasswordValid) {
		alert("password not valid!");
		return false;
	} else {
		return true;
	}
}

const validateMail = (email) => {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validatePassword = (password) => {
	return /[A-Z]/       .test(password) &&
           /[a-z]/       .test(password) &&
           /[0-9]/       .test(password) &&
           password.length > 8;
}
const validatePayment = (number , holderName , amount, expdate)=> {
    if(number.value.length != 15) {
		alert("Card number invalid!");
		return false;
	}
	else if (holderName.value.length <1) {
		alert ("name is empty!");
		return false;
	}
	else if (amount.value<1) {
		alert("invalid data!");
		return false;
	}
    // (YYYY-MM-DD)
    var now = new Date();
    var temp= expdate.value;
    var arr= temp.split('-');
    var then=new Date(arr[0] , arr[1]-1 ,arr[2]);
    if (now < then){

        return true;
    }
    else if (now >= then) {
        alert("invalid Date");
        return false;
    }

	}
