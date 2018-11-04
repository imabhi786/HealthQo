function navigation(){
	if(document.getElementById('navmenu').style.display=='block'){
		document.getElementById('navmenu').style.display='none';
	}
	else{
		document.getElementById('navmenu').style.display='block';
		nav=document.getElementById('navmenu');
	}
}

function openmodal(id){
	document.getElementById(id).style.display='block';
}
function closemodal(id){
	document.getElementById(id).style.display='none';
}
