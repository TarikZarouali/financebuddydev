(function() {
    // change the HTML data-theme value when the page is loaded (to prevent change of color flash) - the theme selector behaviour is handled by the _1_theme-switch.js component
    var selectedTheme = checkColorTheme();
  
    if(selectedTheme) document.getElementsByTagName("html")[0].setAttribute('data-theme', selectedTheme);
  
    function checkColorTheme() { // check if the user previously selected a color theme
      return (localStorage.getItem('colorTheme') !== null) ? localStorage.getItem('colorTheme') : false;
    };
  }());