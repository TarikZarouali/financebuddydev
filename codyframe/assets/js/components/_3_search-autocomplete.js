(function() {
  var autocomplete = document.getElementsByClassName('js-autocomplete');
  if(autocomplete.length == 0) return;

  // static array of values - used as demo list of search results
  var searchValues = [
    {label: '+ New Article', category: 'Articles', url: 'new-article.html'},
    {label: '+ New User', category: 'Users', url: 'new-user.html'},
    {label: 'All Notifications', category: 'Notifications', url: 'notofications.html'},
    {label: 'All Articles', category: 'Articles', url: 'articles.html'},
    {label: 'All Articles', category: 'Articles', url: 'articles.html'},
    {label: 'Categories', category: 'Articles', url: 'categories.html'},
    {label: 'All Reports', category: 'Reports', url: 'reports.html'},
    {label: 'Profile', category: 'Settings', url: 'settings.html'},
    {label: 'Password', category: 'Settings', url: 'password.html'},
  ];

  // default values - visible when user has not started typing yet
  var defaultValues = [
    {label: '+ New Article', category: 'Articles', url: 'new-article.html'},
    {label: '+ New User', category: 'Users', url: 'new-user.html'},
  ];

  new Autocomplete({
    element: autocomplete[0],
    characters: 0,
    searchData: function(query, cb) {
      // This is the function used to retrieve search results. 
      // It is a demo function - you should replace it with your custom code.
      var data = defaultValues;
      if(query.length > 1) {
        data = searchValues.filter(function(item){
          return item['label'].toLowerCase().indexOf(query.toLowerCase()) > -1 || item['category'].toLowerCase().indexOf(query.toLowerCase()) > -1;
        });
      }
      // NOTE: make sure to call the callback function and pass the data array as its argument 👇
      cb(data);
    }
  });
  
}());