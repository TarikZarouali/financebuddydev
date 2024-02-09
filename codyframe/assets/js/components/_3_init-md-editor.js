(function() {
  // initialize the MdEditor object
  // more info on initialization options here: https://codyhouse.co/ds/components/info/markdown-editor
  var mdEditor = document.getElementsByClassName('md-editor'); // your markdown editor element
  if(mdEditor.length > 0) new MdEditor(mdEditor[0]);
}());