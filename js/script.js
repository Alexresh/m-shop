function down()
{
  var a = document.getElementById('about');

  if ( (a.style.display == '')||(a.style.display=='none') ){
    a.style.display = 'block';
    a.style.zIndex="999";
  }
  else
    if ( a.style.display == 'block' )
    a.style.display = 'none';
}

function item(id){
  location="item.php?item="+id;
}
