<!DOCTYPE html>

<html>

<head>

    <title>PHP Laravel 5.6 - How to delete multiple row with checkbox using Ajax? - HDTuto.com</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <link href="{{ asset('css/global.css') }}" rel="stylesheet"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>



<div class="container">

    <h3>PHP Laravel 5.6 - How to delete multiple row with checkbox using Ajax? - HDTuto.com</h3>

    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

    @endif

    <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete All</button>

    <table class="table table-bordered">

        <tr>

            <th><input type="checkbox" id="check_all"></th>

            <th>S.No.</th>

            <th>Category Name</th>

            <th>Category Details</th>

            <th width="100px">Action</th>
        </tr>
        @if($categories->count())

            @foreach($categories as $key => $category)

                <tr id="tr_{{$category->id}}">

                    <td><input type="checkbox" class="checkbox" data-id="{{$category->id}}"></td>

                    <td>{{ ++$key }}</td>

                    <td>{{ $category->category_name }}</td>

                    <td>{{ $category->category_details }}</td>

                    <td>

                        <form method="GET" action="{{route('category.destroy', $category->id)}}" style="display:inline">


                             <button class="btn btn-danger btn-xs" data-toggle="confirmation" data-placement="left">Delete</button>

                        </form>

                    </td>

                </tr>

            @endforeach

        @endif

    </table>

    <!-- load files test -->
    <!-- load files test -->
    <!-- load files test -->
    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data" id="upload" class="upload">
		<fieldset>
			<legend>Upload files</legend>
			<input type="file" id="file" name="file[]" required multiple>
			<input type="submit" id="submit" name="submit" value="Upload">
		</fieldset>
		<div class="bar">
			<span class="bar-fill" id="pb"><span class="bar-fill-text" id="pt"></span></span>
		</div>
		<div id="uploads" class="uploads">
			Uploaded file links will appear here.
		</div>

		<script src="js/upload.js"></script>
		<script>

		document.getElementById('submit').addEventListener('click', function(e){
			e.preventDefault();

			var f = document.getElementById('file'),
				pb = document.getElementById('pb'),
				pt = document.getElementById('pt');

			app.uploader({
				files: f,
				progressBar: pb,
				progressText: pt,
				processor: "{{route('upload')}}",

				finished: function(data){
					var uploads = document.getElementById('uploads'),
						succeeded = document.createElement('div'),
						failed = document.createElement('div'),

						anchor,
						span,
						x;

					if(data.failed.length){
						failed.innerHTML = '<p>Unfortunately, the following files failed to upload:</p>'
					}

					uploads.innerText = '';

					for(x = 0; x < data.succeeded.length; x = x + 1){
						anchor = document.createElement('a');
						anchor.href = 'uploads/' + data.succeeded[x].file;
						anchor.innerText = data.succeeded[x].name;
						anchor.target = '_blank';

						succeeded.appendChild(anchor);
					}

					for(x = 0; x < data.failed.length; x = x + 1){
						span = document.createElement('span');
						span.innerText = data.failed[x].name;

						failed.appendChild(span);
					}

					uploads.appendChild(succeeded);
					uploads.appendChild(failed);
				},

				error: function(){
					console.log('Not working.');
				}
			});			
		});
		
		</script>
	</form>

</body>

<!-- upload script section -->
<!-- upload script section -->


<a href="javascript:doClick()" class="BrowseFile Button" >File browsing</a>

<input type="file" name="files[]" id="fileElem" multiple="multiple" accept="image/*" style="display:none;" onchange="handleFiles(this.files)">

<script>
  
  function handleFiles(files) {
    var formData = new FormData($('.EditUserInfo')[0]);
    $.ajax({
        url: 'insert_image',
        type: 'POST',
        dataType: 'json',
        maxNumberOfFiles: 1,
        autoUpload: false,
        xhr: function() {
            myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
            }
            return myXhr;
        },
        success: function(result) {
            console.log($.ajaxSettings.xhr().upload);

            alert('upload is done');

        },
        "error": function(x, y, z) {
            alert("An error has occured:\n" + JSON.stringify(x) + "\n" + JSON.stringify(y) + "\n" + JSON.stringify(z));
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });

    function progressHandlingFunction(e) { // ***** I mean here. **** //
        if (e.lengthComputable) {
            
             alert('img size: '+e.loaded);

            //var percentComplete = Math.round(e.loaded * 100 / e.total);
            //$('.progress').text(percentComplete.toString() + '%');
            
        }
    }
}
</script>
<!-- upload script section -->
<!-- upload script section -->
<!-- upload script section -->

<script type="text/javascript">

    $(document).ready(function () {



        $('#check_all').on('click', function(e) {

         if($(this).is(':checked',true))  

         {

            $(".checkbox").prop('checked', true);  

         } else {  

            $(".checkbox").prop('checked',false);  

         }  

        });



         $('.checkbox').on('click',function(){

            if($('.checkbox:checked').length == $('.checkbox').length){

                $('#check_all').prop('checked',true);

            }else{

                $('#check_all').prop('checked',false);

            }

         });



        $('.delete-all').on('click', function(e) {



            var idsArr = [];  

            $(".checkbox:checked").each(function() {  

                idsArr.push($(this).attr('data-id'));

            });  



            if(idsArr.length <=0)  

            {  

                alert("Please select atleast one record to delete.");  

            }  else {  



                if(confirm("Are you sure, you want to delete the selected categories?")){  



                    var strIds = idsArr.join(","); 



                    $.ajax({

                        url: "{{ route('category.multiple-delete') }}",

                        type: 'GET',

                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        data: 'ids='+strIds,

                        success: function (data) {

                            if (data['status']==true) {

                                $(".checkbox:checked").each(function() {  

                                    $(this).parents("tr").remove();

                                });

                                alert(data['message']);

                            } else {

                                alert('Whoops Something went wrong!!');

                            }

                        },

                        error: function (data) {

                            alert(data.responseText);

                        }

                    });



                }  

            }  

        });



        $('[data-toggle=confirmation]').confirmation({

            rootSelector: '[data-toggle=confirmation]',

            onConfirm: function (event, element) {

                element.closest('form').submit();

            }

        });   

    

    });

</script>

<script src="{{asset('js/upload')}}"></script>

</html>