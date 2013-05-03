// Gumby is ready to go
Gumby.ready(function() {
	console.log('Gumby is ready to go...', Gumby.debug());

	// placeholder polyfil
	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
		$('input, textarea').placeholder();
	}
});

// Oldie document loaded
Gumby.oldie(function() {
	console.log("Oldie");
});

// Document ready
$(function() {

    //alert('wowafeaf');
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/tomorrow_night_bright");
    editor.getSession().setMode("ace/mode/markdown");

    setTimeout(function() {
        $('#editor').slideDown();
    }, 2000);

});

