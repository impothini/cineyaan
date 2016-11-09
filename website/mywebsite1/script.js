
function validateForm()
    {
    var a=document.forms["insert_f1"]["name1"].value;
 	var b=document.forms["insert_f1"]["id1"].value;
    var c=document.forms["insert_f1"]["parts1"].value;
    var d=document.forms["insert_f1"]["ids1"].value;
    if (a==null || a=="" || b==null || b=="" )
      {
      alert("Please Fill All Required Field");
      return false;
      }
      else
    	if (c=="1" )
      {
      	if (d==null || d=="")
      	{
	  alert("Please Fill All Required Field");
      return false;
      } 	
      else
      {
      	$.post('news_insert.php', { one: in1, two: in2, three: in3 }, function(data) {
      		
      		alert( data );
      		} );
      }
      }
    }

function openYouTube(id){ 
	alert ("In function");
     //newwindow=window.open('','null','width=600, height=350, toolbar=no');
     //newwindow.document.write();
     //newwindow.document.write('<iframe width="560" height="315" src="https://www.youtube.com/embed/mf7sk4IydGo" frameborder="0" allowfullscreen></iframe>');
     <div> <iframe width="560" height="315" src="https://www.youtube.com/embed/mf7sk4IydGo" frameborder="0" allowfullscreen></iframe></div>
	//if (window.focus) {newwindow.focus()}
	//return false;
} 


