$('#addFiles').on('click', function(event){
	event.preventDefault();	
	addFileField();
});

function addFileField(){	
	$(".filesList").append('<input type="file" name="loadFile[]" class="loadFile">');
}

function sendForm(){
	// Получаем данные с формы
	var form = document.forms.mailForm;

	var formData = new FormData(form);
	var xhr = new XMLHttpRequest();

	xhr.open("POST", "../email/scripts/mailForm.php");

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			data = xhr.responseText;
			if(data == "true"){
				$("#result").html("<p>Принято!</p>");
			}else{
				$("#result").html(data);
			}
		}
	};

	xhr.send(formData);	
}