@extends('layouts.main')
@section('style')
<style>
  .btn-rm{
    color:red;
    position:relative;
    left:-15px;
    top:-35px;
  }
  .fa-redo-alt{
    position:relative;
    left:50px;
   
  }
  .fa-redo-alt:hover{
    color:yellow;
  }

  .uploadProgress{
    position:relative;
    top:65px;
    left:-65px;
    height:10px;
    border:solid green;
  }

  .thumb {
            height: 80px;
            width: 100px;
            border: 1px solid #000;
        }

        ul.thumb-Images li {
            width: 120px;
            float: left;
            display: inline-block;
            vertical-align: top;
            height: 120px;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            font-size: 0;
        }

            .img-wrap .close {
                position: absolute;
                top: 2px;
                right: 2px;
                z-index: 100;
                background-color: #D0E5F5;
                padding: 5px 2px 2px;
                color: #000;
                font-weight: bolder;
                cursor: pointer;
                opacity: .5;
                font-size: 23px;
                line-height: 10px;
                border-radius: 50%;
            }

            .img-wrap:hover .close {
                opacity: 1;
                background-color: #ff0000;
            }

        .FileNameCaptionStyle {
            font-size: 12px;
        }
  
</style>
@endsection
@section('content')
    <!-- Main content -->
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">{{__('Compose New Message')}}</h3>
              </div>
              <!-- /.card-header -->
              <form method="POST" action="{{route('mail.send')}}" enctype="multipart/form-data" accept-charset="UTF-8">
              	@csrf
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" name="receiver_addr" id="email" placeholder="{{__('To')}}:" required="true" autocomplete="false">
                  <div id="emailList"></div>
                </div>
               
                <div class="form-group">
                  <input class="form-control" name="subject" placeholder="{{__('Subject')}}:" required="true" value='{{ isset($drafts) ? $drafts->subject : "" }}'>
                </div>
                <div class="form-group">
                  <!-- message area -->
                  <!-- message area -->
                  <!-- message area -->
                  <!-- message area -->
                    <textarea rows="10" id="compose-textarea" name="body" class="form-control" required="true" style="height: 300px" >
                     {{ isset($drafts) ? $drafts->body : '' }}
                    </textarea>
                </div>

                <!-- <div class="form-group">
                  <div class="btn btn-default btn-file fileinput-button">
                    <i class="fas fa-paperclip"></i>{{__('Attachments')}}
                    <input type="file" name="file" id="images" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br/>
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
                <output id="Filelist"></output> -->

                <div class="form-group">
                  <div class="btn btn-default btn-file fileinput-button">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="files[]" id="files" multiple accept="file_extension|audio/*|video/*|image/*|media_type,">
                    <input type="hidden" name="fileName[]" value="">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>

                <output id="Filelist"></output>
                 
              </div>
              

                <!-- image preview section -->
                <!-- image preview section -->
                <!-- image preview section -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" id="btn-drafts" class="btn btn-default"><i class="fas fa-pencil-alt"></i>{{__('Draft')}}</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>{{__('Send')}}</button>
                </div>
                <button type="reset" class="btn btn-default" id="btn-discard"><i class="fas fa-times"></i>{{__('Discard')}}</button>
              </div>

              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    <!-- /.content -->
  </div>
  @endsection
  @section('notification')
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible hidden">
       {{__(Session::get('success'))}}!!
    </div>
    @endif

    @if(Session::has('failed'))
    <div class="alert alert-danger alert-dismissible hidden">
       {{__(Session::get('failed'))}}!!
    </div>
    @endif
  @endsection

  @section('script')
  <script src="{{asset('js/uploadFile.js')}}"></script>
  <script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
  </script>

<script>
    $(document).ready(function () {
        $('#email').typeahead({
            source: function () {
              
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url: "{{route('mail.suggest')}}",       
                    dataType: "json",
                    type: "POST",
                    data:{_token:_token}
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    },
                    error: function()
                    {
                      console.log('error');
                    }
                });
            }
        });
    });
 </script>
<script>
//contact autocompetion
    $(document).ready(function(){

    $('#email').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
              $('#emailList').fadeIn();  
                        $('#emailList').html(data);
              }
            });
            }
        });

        $(document).on('click', 'li', function(){  
            $('#email').val($(this).text());  
            $('#emailList').fadeOut();  
        });  

    });
  </script>


<script>
//save email to drafts
$(document).on({
  ajaxStart: function(){
      $("body").addClass("loading"); 
  },
  ajaxStop: function(){ 
      $("body").removeClass("loading"); 
  }    
});

    $(document).ready(function(){
    $('#btn-drafts').click(function(){ 
            var _token = $('input[name="_token"]').val();
            var subject = $('input[name="subject"]').val();
            var body = $('textarea[name="body"]').val();
            $.ajax({
              url:"{{ route('mail.store') }}",
              method:"POST",
              data:{subject:subject, body:body,  _token:_token},
              dataType:"json",
              success:function(data){
                 $('input[name="subject"]').val() = '';
                 $('textarea[name="body"]').val() = "";
              }
            });
            
        });

        $(document).on('click', 'li', function(){  
            $('#email').val($(this).text());  
            $('#emailList').fadeOut();  
        });  

    });
  </script>

<script>
//empty field when click on discard
    $(document).ready(function(){
        $('#btn-discard').click(function(){ 
            $('input[name="_token"]').val() = '';
            $('input[name="subject"]').val() = '';
            $('textarea[name="body"]').val('');
        });
    });
  </script>

<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote({
      lang:'fr-FR'
    });
  });
</script>
<script>
(function ($) {
  $.extend($.summernote.lang, {
    'fr-FR': {
      font: {
        bold: 'Gras',
        italic: 'Italique',
        underline: 'Souligné',
        strike: 'Barré',
        clear: 'Effacer la mise en forme',
        height: 'Interligne',
        size: 'Taille de police'
      },
      image: {
        image: 'Image',
        insert: 'Insérer une image',
        resizeFull: 'Taille originale',
        resizeHalf: 'Redimensionner à 50 %',
        resizeQuarter: 'Redimensionner à 25 %',
        floatLeft: 'Aligné à gauche',
        floatRight: 'Aligné à droite',
        floatNone: 'Pas d\'alignement',
        dragImageHere: 'Faites glisser une image avec la souris dans ce cadre',
        selectFromFiles: 'Choisir un fichier',
        url: 'URL de l\'image'
      },
      link: {
        link: 'Lien',
        insert: 'Insérer un lien',
        unlink: 'Supprimer un lien',
        edit: 'Modifier',
        textToDisplay: 'Texte à afficher',
        url: 'URL du lien'
      },
      video: {
        video: 'Vidéo',
        videoLink: 'Lien vidéo',
        insert: 'Insérer une vidéo',
        url: 'URL de la vidéo',
        providers: '(YouTube, Vimeo, Vine, Instagram ou DailyMotion)'
      },
      table: {
        table: 'Tableau'
      },
      hr: {
        insert: 'Insérer une ligne horizontale de séparation'
      },
      style: {
        style: 'Style',
        normal: 'Normal',
        blockquote: 'Citation',
        pre: 'Code source',
        h1: 'Titre 1',
        h2: 'Titre 2',
        h3: 'Titre 3',
        h4: 'Titre 4',
        h5: 'Titre 5',
        h6: 'Titre 6'
      },
      lists: {
        unordered: 'Liste à puces',
        ordered: 'Liste numérotée'
      },
      options: {
        help: 'Aide',
        fullscreen: 'Plein écran',
        codeview: 'Afficher le code HTML'
      },
      paragraph: {
        paragraph: 'Paragraphe',
        outdent: 'Diminuer le retrait',
        indent: 'Augmenter le retrait',
        left: 'Aligner à gauche',
        center: 'Centrer',
        right: 'Aligner à droite',
        justify: 'Justifier'
      },
      color: {
        recent: 'Dernière couleur sélectionnée',
        more: 'Plus de couleurs',
        background: 'Couleur de fond',
        foreground: 'Couleur de police',
        transparent: 'Transparent',
        setTransparent: 'Définir la transparence',
        reset: 'Restaurer',
        resetToDefault: 'Restaurer la couleur par défaut'
      },
      shortcut: {
        shortcuts: 'Raccourcis',
        close: 'Fermer',
        textFormatting: 'Mise en forme du texte',
        action: 'Action',
        paragraphFormatting: 'Mise en forme des paragraphes',
        documentStyle: 'Style du document'
      },
      history: {
        undo: 'Annuler la dernière action',
        redo: 'Restaurer la dernière action annulée'
      }

    }
  });
})(jQuery);
</script>


<!-- <script>
//handle file upload
$(document).ready(function(){

    $('#file-input').click(function() //set file input value to null
    {
      this.value = null;
    })

    $('#file-input').change(function() //detect file selection
    {
        var file_url = this.value;
        // var file_name = file_url.TrimEnd('\\');
        alert(file_url);
        // if file is valid 
        // display thumb and upload with progress bar
    })
});
</script> -->


<script language="javascript" type="text/javascript">



$(document).ready(function(){ 

  // function uploadFile(filenames, routeName)
  // {
  //     $.ajaxSetup({
  //         headers: {
  //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //         }
  //     });
  //     $.ajax({
  //         url: "{{route('upload')}}" ,
  //         method: "POST",
  //         dataType:"json",
  //         data:filenames,
  //         success:function(data){
  //             //return file
  //         },
  //         error:function(xhr)
  //         {
  //           //return null;
  //         }
  //       });
  // }

           
            
        

        $(document).on('click', 'li', function(){  
            $('#email').val($(this).text());  
            $('#emailList').fadeOut();  
        });  
  var i = 0;
  var fd = [];
    $("#file-input").change(function () {
      // alert('changed');
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#preview");
           
           
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
               // if (regex.test(file[0].name.toLowerCase())) {
                var r = check(file[0].name.toLowerCase())
                
                 if(r.success){ //if file is valid

                  var _token = $('input[name="_token"]').val();
                  $.ajax({
                    url:"{{ route('upload') }}",
                    method:"POST",
                    data:{filesnames:fd, _token:_token},
                    dataType:"json",
                    cache : false,
                    success:function(data){
                    console.log('success');
                    },
                  });
                   var type = r.type;
                   //remove file i reload btn
                  fd.push($(this)); //append file to form data
                  
                  // $.ajaxSetup({    //send ajax request for file upload
                  //     headers: {
                  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  //     }
                  // });
                  // $.ajax({
                  //     url: "{{route('upload')}}" ,
                  //     method: "POST",
                  //     dataType:"json",
                  //     data: fd,
                  //     success:function(data){
                  //         //return file
                  //     },
                  //     error:function(xhr)
                  //     {
                  //       //return null;
                  //     }
                  //   });

                  console.log(fd);
                    reader.onload = function (e) {
                      switch(type)
                        {
                          case 'pdf':
                          src = "{{asset('img/pdf.jpg')}}"
                          break;
                        
                          case 'word':
                          src = "{{asset('img/word.png')}}"
                          break;

                          case 'excel':
                          src = "{{asset('img/excel.jpg')}}"
                          break;
                          default: src = e.target.result;
                        }
                        //send ajx request for save file
                        //uploaded = uploadFile(file, 'upload'); //send ajax request for upolad file
                        var img = $('<span class="img'+ i + ' "><i class="fas fa-redo-alt fa-reload"></i></span><img class="imgUpload img'+ i + ' " id="img' + i +'"/><span><i class="fas fa-times btn-rm img' + i + '"></i></span><span class="uploadProgress img' + i + '"></span>');
                        img.attr("style", "height:100px;width: 100px");
                        img.attr("src", src);
                        dvPreview.append('<div class="img'+ i + '"></div>'); //add div container for each img previw
                        $('div[class="img'+ i + '"]:last').append(img);
                        i++;
                        // dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                    
                
                } 
                
                
                else {
                    alert(file[0].name + " is not a valid image file.");
                    // dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });

    $(document).on('click', '.btn-rm', function(e){
     //alert('clicked');
    var c = $(this).attr('class');
    var arrayc = c.split(" ");
    var sel = arrayc[3];
    console.log(sel);
    var index = Number(sel.substring(3,4));
    console.log(index);
    console.log(fd);
    $('div[class="'+ sel + '"]').remove(); //remove image preview
    //delete($('#file-input')[0].files.Filelist[index-1]);
    // console.log($('#file-input')[0].files);

    // $(sel:parent).remove(); 
    //$('#'.sel).remove();
  });
});
</script>


<script type="text/javascript">

//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);

//To save an array of attachments 
var AttachmentArray = [];

//counter for attachment array
var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement('ul');
ul.className = ("thumb-Images");
ul.id = "imgList";

function init() {
    //add javascript handlers for the file upload event
    document.querySelector('#files').addEventListener('change', handleFileSelect, false);

}

//the handler for file upload event
function handleFileSelect(e) {
    //to make sure the user select file/files
    if (!e.target.files) return;

    //To obtaine a File reference
    var files = e.target.files;

    // Loop through the FileList and then to render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

        //instantiate a FileReader object to read its contents into memory
        var fileReader = new FileReader();

        // Closure to capture the file information and apply validation.
        fileReader.onload = (function (readerEvt) {
            return function (e) {
                
                //Apply the validation rules for attachments upload
                ApplyFileValidationRules(readerEvt)
                console.log('loading..');
                console.log(files);

                var _token = $('input[name="_token"]').val();
                  $.ajax({
                    url:"{{ route('upload') }}",
                    method:"POST",
                    data:{filesnames:files[i], _token:_token},
                    dataType:"json",
                    cache : false,
                    success:function(data){
                    console.log('success');
                    },
                  });
                
                //Render attachments thumbnails.
                var check = CheckFileType(files[0].name.toLowerCase())
                switch(check.ftype)
                {
                  case 'pdf':
                  e.target.result = "{{asset('img/pdf.jpg')}}"
                  break;
                
                  case 'word':
                  e.target.result = "{{asset('img/word.png')}}"
                  break;

                  case 'excel':
                  e.target.result = "{{asset('img/excel.jpg')}}"
                  break;
                  
                }
                RenderThumbnail(e, readerEvt);

                //Fill the array of attachment
                FillAttachmentArray(e, readerEvt)
            };
        })(f);

        // Read in the image file as a data URL.
        // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
        // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
        fileReader.readAsDataURL(f);
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
}

//To remove attachment once user click on x button
jQuery(function ($) {
    $('div').on('click', '.img-wrap .close', function () {
        var id = $(this).closest('.img-wrap').find('img').data('id');

        //to remove the deleted item from array
        var elementPos = AttachmentArray.map(function (x) { return x.FileName; }).indexOf(id);
        if (elementPos !== -1) {
            AttachmentArray.splice(elementPos, 1);
        }

        //to remove image tag
        $(this).parent().find('img').not().remove();

        //to remove div tag that contain the image
        $(this).parent().find('div').not().remove();

        //to remove div tag that contain caption name
        $(this).parent().parent().find('div').not().remove();

        //to remove li tag
        var lis = document.querySelectorAll('#imgList li');
        for (var i = 0; li = lis[i]; i++) {
            if (li.innerHTML == "") {
                li.parentNode.removeChild(li);
            }
        }

    });
}
)

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt)
{
    //To check file type according to upload conditions
    var r = CheckFileType(readerEvt.type);
    if (r.success) {
        alert("The file (" + readerEvt.name + ") does not match the upload conditions, You can only upload jpg/png/gif files");
        e.preventDefault();
        return;
    }

    //To check file Size according to upload conditions
    if (CheckFileSize(readerEvt.size) == false) {
        alert("The file (" + readerEvt.name + ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB");
        e.preventDefault();
        return;
    }

    //To check files count according to upload conditions
    if (CheckFilesCount(AttachmentArray) == false) {
        if (!filesCounterAlertStatus) {
            filesCounterAlertStatus = true;
            alert("You have added more than 10 files. According to upload conditions you can upload 10 files maximum");
        }
        e.preventDefault();
        return;
    }
}

//To check file type according to upload conditions
// function CheckFileType(fileType) {
//     if (fileType == "image/jpeg") {
//         return true;
//     }
//     else if (fileType == "image/png") {
//         return true;
//     }
//     else if (fileType == "image/gif") {
//         return true;
//     }
//     else {
//         return false;
//     }
//     return true;
// }

//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
    if (fileSize < 32000000) {
        return true;
    }
    else {
        return false;
    }
    return true;
}

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
    //Since AttachmentArray.length return the next available index in the array, 
    //I have used the loop to get the real length
    var len = 0;
    for (var i = 0; i < AttachmentArray.length; i++) {
        if (AttachmentArray[i] !== undefined) {
            len++;
        }
    }
    //To check the length does not exceed 10 files maximum
    if (len > 9) {
        return false;
    }
    else
    {
        return true;
    }
}

//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt)
{
    var li = document.createElement('li');
    ul.appendChild(li);
    li.innerHTML = ['<div class="img-wrap"> <span class="close">&times;</span>' +
        '<img class="thumb" src="', e.target.result, '" title="', escape(readerEvt.name), '" data-id="',
        readerEvt.name, '"/>' + '</div>'].join('');

    var div = document.createElement('div');
    div.className = "FileNameCaptionStyle";
    li.appendChild(div);
    div.innerHTML = [readerEvt.name].join('');
    document.getElementById('Filelist').insertBefore(ul, null);
}

//Fill the array of attachment
function FillAttachmentArray(e, readerEvt)
{
    AttachmentArray[arrCounter] =
    {
        AttachmentType: 1,
        ObjectType: 1,
        FileName: readerEvt.name,
        FileDescription: "Attachment",
        NoteText: "",
        MimeType: readerEvt.type,
        Content: e.target.result.split("base64,")[1],
        FileSizeInBytes: readerEvt.size,
    };
    arrCounter = arrCounter + 1;
}
</script>

  @endsection
