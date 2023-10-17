var denote_height;

if (window.addEventListener) {
	window.addEventListener("load", denote_iframe_load, false);
} else {
	window.attachEvent("onload",denote_iframe_load);
}

function denote_iframe_load() {
	if (document.height)
		height = document.height;
	else
		height = document.body.clientHeight;

    denote_height = height + 100;
    denote_iframe = document.createElement("iframe");
    denote_iframe.style.display = "none";
	denote_iframe.src = "http://www.denoteapp.com/load/navigate/?height=" + denote_height + "&location=" + encodeURIComponent(document.location.href);
    document.getElementsByTagName("body")[0].appendChild(denote_iframe);
    
    denoteHeightTimer = setInterval('height = document.body.clientHeight + 100; if (height != denote_height) { denote_height = height; dhf = document.getElementById("denote_height_frame"); if (dhf) { dhf.parentNode.removeChild(dhf); } denote_iframe = document.createElement("iframe"); denote_iframe.id = "denote_height_frame";	denote_iframe.style.display = "none"; denote_iframe.src = "http://www.denoteapp.com/load/set-height/?height=" + height; document.getElementsByTagName("body")[0].appendChild(denote_iframe); }',500);
}