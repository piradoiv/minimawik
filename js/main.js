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
        $('#edition').slideDown();
    }, 1000);

    $('.btnEditPage').on('click', function() {
        showEditor();
        return false;
    });

    $('#btnCloseEditor').on('click', function() {
        hideEditor();
        return false;
    });

});

function showEditor() {
    $('#editor').css('display', 'inline');
    $('#content').css('float', 'right');
    $('#content').css('width', '50%');

    $('.btnEditPage').hide();
    $('#btnCloseEditor').show();
}

function hideEditor() {
    $('#editor').css('display', 'none');
    $('#content').css('float', 'left');
    $('#content').css('width', '100%');

    $('.btnEditPage').show();
    $('#btnCloseEditor').hide();
}