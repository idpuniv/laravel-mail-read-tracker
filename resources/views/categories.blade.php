<html lang="en">
<head>
<title>How to upload and display multiple images in php ajax</title>
 
<!-- Bootstrap Css -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
</head>
<body>
<style type="text/css">
#preview img{
   margin: 5px;
}
</style>
<form method='post' action='' enctype="multipart/form-data">
   <input type="file" id='files' name="files[]" multiple><br>
   <input type="button" id="submit" value='Upload'>
</form>
 
<!-- Preview -->
<div id='preview'></div>
</body>
<script>
$(document).ready(function(){
 
$('#submit').click(function(){
 
   var form_data = new FormData();
 
   // Read selected files
   var totalfiles = document.getElementById('files').files.length;
   for (var index = 0; index < totalfiles; index++) {
      form_data.append("files[]", document.getElementById('files').files[index]);
 $('#preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
   }
 
   // AJAX request
   $.ajax({
     url: 'ajaxUpload.php', 
     type: 'post',
     data: form_data,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {
        alert("Uploaded SuccessFully");
        console.log(response);
 
     }
   });
 
});
 
});
</script>
</html>