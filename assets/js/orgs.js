$(document).ready(function() { 
	function loadCSS(){ 
       var file = document.createElement("link")
       file.setAttribute("rel", "stylesheet")
       file.setAttribute("type", "text/css")
       file.setAttribute("href", "http://pm.div-art.com.ua/assets/css/orgs.css");

       if (typeof file !== "undefined")
          document.getElementsByTagName("head")[0].appendChild(file)
    }
});