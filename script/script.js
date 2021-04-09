function check() {
	var myMatrix = document.getElementById("input-field").value.split("\n");
	var a_value = document.getElementById("a-input").value.split("\n");
	var b_value = document.getElementById("b-input").value.split("\n");
	$.ajax({
		url: '/script.php',         
		method: 'get',             
		data: {
			matrix: myMatrix,
			a: a_value,
			b: b_value,
		},    
		success: function(data){   
			document.getElementById("result").innerHTML = data;         
		}
	});
}