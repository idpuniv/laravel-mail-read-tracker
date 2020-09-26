@extends('layouts.main')
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
                    <textarea id="compose-textarea" name="body" class="form-control" required="true" style="height: 300px" >
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
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment" id="file-input">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>

              <div>
              <output id="Filelist"></output>
              </div>
              

                <!-- image preview section -->
                <!-- image preview section -->
                <!-- image preview section -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>{{__('Draft')}}</button>
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
              $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                    $.ajax({
                    url: "{{route('mail.suggest')}}",       
                    dataType: "json",
                    type: "POST",
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
<script>
$(document).ready(function(){

    $('#file-input').click(function() //set file input value to null
    {
      this.value = null;
    })

    $('#file-input').change(function() //detect file selection
    {
        var file_url = this.value;
        var file_name = file_url.TrimEnd('\\');
        alert(file_name);
        // if file is valid 
        // display thumb and upload with progress bar
    })
});
</script>
  @endsection
