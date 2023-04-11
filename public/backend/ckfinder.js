$(document).on('click', '.change-image-ckfinder', function(){
   CKFinder.popup( {
      chooseFiles: true,
      resourceType: 'Images',
      onInit: function( finder ) {
         finder.on( 'files:choose', function( evt ) {
            let file = evt.data.files.first().getUrl();
            $('.img-avatar-ckfinder').attr('src', file)
            $('.input-hidden-ckfinder').val(file)
         } );
      }
   } );
})