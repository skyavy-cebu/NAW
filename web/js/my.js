function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}
 
function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
 
function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function is_numeric(input){
   return (input - 0) == input && input.length > 0;
}

//onkeypress="return numberonly(this, event)"
function numberonly(myfield, e, dec){
	var key;
	var keychar;

	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || 
		(key==9) || (key==13) || (key==27) )
	   return true;

	// numbers
	else if ((("0123456789.").indexOf(keychar) > -1))
	   return true;

	// decimal point jump
	else if (dec && (keychar == "."))
	   {
	   myfield.form.elements[dec].focus();
	   return false;
	   }
	else
	   return false;
}

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}

function is_email(email){      
	var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailReg.test(email); 
}

//onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"
function onenter(e,form){
	var key=e.keyCode || e.which;
	if (key==13){
		form.submit();
	}
}

function xconfirm(value){
  if(!value){
    value = 'Are you sure you want to DELETE?';
  }
	var agree=confirm(value);
	if (agree)
		return true ;
	else
		return false ;
}

function redirect(path){
	var newURL = window.location.protocol + '//' + window.location.host + '/' + path;
	window.location = newURL;
}

$(document).bind("ajaxSend", function(){
    $("body").css("cursor", "progress");
}).bind("ajaxComplete", function(){
    $("body").css("cursor","auto");
});

function strip_tags(OriginalString){
	return OriginalString.replace(/(<([^>]+)>)/ig,"");
}

function url_title(name){
	var name = name.replace(/[^A-Za-z0-9 ]/g,'');
	/* Replace multi spaces with a single space */
	name = name.replace(/\s{2,}/g,' ');
	/* Replace space with a '-' symbol */
	name = name.replace(/\s/g, "-");
	name = name.replace(/(<([^>]+)>)/ig,"");
	return name.toLowerCase();
}

function change_url(url){ 
	if(!is_ie()){
		history.pushState({},'',url);
	}
}

//no spam
$(document).ready(function(){
	$('a.email').each(function(index) {
		email = $(this).text();
		if(email){
			email = email.replace(/-at-/i, "@");
			email = email.replace(/-dot-/i, ".");
			email = email.replace(/-dot-/i, ".");
			email = email.replace(/-dot-/i, ".");
			$(this).text(email);
			$(this).attr('href','mailto:'+email);
		}
	});
});

function scrollTop(){
	$("html, body").animate({ scrollTop: 0 }, 'slow');
}

$(document).ready(function(){
  $('input:text[value=""]:visible:enabled:first').focus();
});