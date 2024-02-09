(function() {
  // initialize the Ddf object
  // more info on initialization options here: https://codyhouse.co/ds/components/info/drag-drop-file

  // new-article page
  var articleDdf = document.getElementsByClassName('js-ddf--article')[0];
  if( articleDdf ) {
    var ddfObj = new Ddf({element: articleDdf, showFiles: true, upload: true, replaceFiles: false});
    ddfObj.element.addEventListener('filesUploaded', function(event){
      // this is a demo function used to show a loader next to the uploaded file name. Replace it with your custom loading function
      for(var i = 0; i < ddfObj.progress.length; i++) {
        (function(i){  
          var delta = i*200;
          setTimeout(function(){
            if(ddfObj.progress[i]) showLoader(ddfObj.progress[i]);
          }, delta);
        })(i);
      }
    });

    function showLoader(progressBar) {
      if(!progressBar) return;
      var progress = 0;
      var intervalId = setInterval(function(){
        progress = progress + 5;
        if(progress > 100) {
          progress = 100;
          clearInterval(intervalId);
          return;
        }
        progressBar.dispatchEvent(new CustomEvent('updateProgress', {detail: {value: progress, duration: 80}}));
      }, 100);
    };
  }

  // new-asset page
  var assetDdf = document.getElementsByClassName('js-ddf--asset')[0];
  if( assetDdf ) {
    new Ddf({element: assetDdf, showFiles: true, upload: false, replaceFiles: false});
  }
}());