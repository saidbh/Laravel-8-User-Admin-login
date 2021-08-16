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