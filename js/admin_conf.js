
function changeTestDoc(data){
	onLoadFunction();
}

function onLoadFunction(){
	var x = document.getElementById("test_select").selectedIndex;
	var selectValueDoc = document.getElementsByTagName("option")[x].value;
	
	var data = document.getElementsByTagName("option")[x].getAttribute('data-allinfo');
	if(JSON.parse(data).ACTIVE == 1){
		document.getElementById("activTest").value = 1;
	}
	else{
		document.getElementById("activTest").value = 2;
	}
	
	var currentTestNumber = JSON.parse(data).NUMBER;
	document.getElementById("maxNumber").value = currentTestNumber;
	document.getElementById("maxNumber").min = currentTestNumber;
	document.getElementById("maxNumber").max = Number(currentTestNumber) + 1;
	
	var maxMOS = JSON.parse(data).MAX_MOS;
	document.getElementById("maxMOS").value = maxMOS;
	
}