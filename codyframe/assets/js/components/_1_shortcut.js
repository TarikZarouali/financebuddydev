(function() {
  var searchInput = document.getElementsByClassName('js-search-input');
  if(searchInput.length == 0) return;
  // focus on search using '/' shortcut
  window.addEventListener('keydown', function(event){
    if( event.key && event.key.toLowerCase() == '/' ) {
      event.preventDefault();
      searchInput[0].focus();
    }
  });
}());