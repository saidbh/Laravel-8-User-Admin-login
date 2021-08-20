document.getElementById('client').addEventListener('change', e =>{
	//
	var select1 = document.getElementById('client');
    document.getElementById('clientname').value = select1.options[select1.selectedIndex].text;
	
});
document.getElementById('dev').addEventListener('change', e =>{
	//
	var select2 = document.getElementById('dev');
    document.getElementById('devname').value = select2.options[select2.selectedIndex].text;
	
});



//
// Registration script start here
document.getElementById('pwd2').addEventListener('keyup', e => {
	
if(document.getElementById('pwd').value != document.getElementById('pwd2').value)
{
	//
	document.getElementById('pwd2').classList.remove('is-valid');
	document.getElementById('pwd2').classList.add('is-invalid');
	
}else
{
	//
	document.getElementById('pwd2').classList.remove('is-invalid');
	document.getElementById('pwd2').classList.add('is-valid');
		
	//axios start
	document.getElementById('btnsub').addEventListener('click', e =>{
	//
	
		//get elements and test
	let route = document.getElementById('regroute').value;
	let name = document.getElementById('name').value;
	let email = document.getElementById('email').value;
	let pwd = document.getElementById('pwd').value;
	let pwd2 = document.getElementById('pwd2').value;
	let select1 = document.getElementById('select').options[select.selectedIndex].value;
	let token = document.getElementById('token').value;
	//get elements and test end
	
	e.preventDefault();
	// POST request for remote image in node.js
axios({
  method: 'post',
  url: route,
    data: {
    name: name,
	email: email,
    password: pwd,
	repassword: pwd2,
	type: select1,
	'_token': token,
	},
}).then(function (response) {
    //
	if(response.data.data === true){
		//
		document.getElementById('errormsg').innerHTML ='<div class=\"alert alert-success\">User Registred successfuly !</div>';
			document.getElementById('name').value ="";
	        document.getElementById('email').value="";
	        document.getElementById('pwd').value="";
	        document.getElementById('pwd2').value="";
		//
	}else
	{
		//
		document.getElementById('errormsg').innerHTML ='<div class=\"alert alert-danger\">User Not Registred !</div>';
		//
			document.getElementById('name').value ="";
	        document.getElementById('email').value="";
	        document.getElementById('pwd').value="";
	        document.getElementById('pwd2').value="";
	}
  }).catch(function (error) {
    console.log(error);
  });
	
});
//axios end
	
}

});
// Registration script end here