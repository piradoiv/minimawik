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
    editor.getSession().setUseWrapMode(true);
    editor.getSession().setMode("ace/mode/markdown");
    editor.on('change', function(e) {
        updateDocument(editor.getValue());
    });

    $('.btnEditPage, a[title="Edit this page"]').on('click', function() {
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

    $('.btnEditPage, #footerSeparator').hide();
    $('#btnCloseEditor').show();

    Gumby.initialize('fixed');
}

function hideEditor() {
    $('#editor').css('display', 'none');
    $('#content').css('float', 'left');
    $('#content').css('width', '100%');

    $('.btnEditPage, #footerSeparator').show();
    $('#btnCloseEditor').hide();
}

function updateDocument(data) {
    // Update contents
    var converter = new Showdown.converter();
    var html = converter.makeHtml(data);
    $('#content').html(html);

    // Update title
    var title = $('#content h1:first').html();
    if (title === undefined) {
        title = "Untitled";
    }

    document.title = title;
}