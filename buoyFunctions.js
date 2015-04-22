// "building the pipe"
// fn tells client what to do with the response back from the server
function get(url, fn) {
	var req = new XMLHttpRequest();
	req.open("GET", url, true);
	req.onreadystatechange = function() {
		if (req.readyState === 4 && req.status === 200) {
			fn(req);
		}
	}
	req.send(null);
}

function signUp() {
	// not actually sending the email, but assigning the frame value to the query string to be sent to the .php file
	var email_js = document.getElementById('email_id').value;
	var createdPassword_js = document.getElementById('createdPassword_id').value;
	var createdPassword1_js = document.getElementById('createdPassword1_id').value;


	if(email_js == null || createdPassword_js == null || createdPassword1_js == null) {
		alert("Please enter a valid email address.")
	}
	else if(createdPassword_js == null) {
		alert("Please enter a password.")
	}
	else if(createdPassword1_js == null) {
		alert("Please retype your password.")
	}
	else if(createdPassword_js !== createdPassword1_js) {
		alert("Your passwords do not match.")
	}
	else {
		var url = "http://www.vsn3.dreamhosters.com/buoy_code_SteveVince/signup_ac.php?email=" + email_js + "@pitt.edu" + 
																				"&createdPassword=" + createdPassword_js +
																				"&createdPassword1=" + createdPassword1_js;
		// alert(url);
		alert(	"Your Buoy registration information has been sent to " + email_js + "." + 
				"\r\n\r\nThanks for signing up!");
		get(url, function (req) {
			//result back from the server is stored in req.responseText as a string
			var res = req.responseText;
			// alert(res);
		});
	}
}

function showText() {
        var popup_message = document.getElementById("user_text").value;
  
    
        var txt = "show Photo!";
        console.log(popup_message);
        window.open("http://"+String(popup_message));   
}