function check() {
	var myMatrix = document.getElementById("input-field").value.split("\n");
	$.ajax({
		url: 'script.php',         
		method: 'get',             
		data: {
			matrix: myMatrix,
		},    
		success: function(data){   
			document.getElementById("result").innerHTML = data;         
		}
	});
}