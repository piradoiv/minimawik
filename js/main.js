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

var Editor,
    Watchdog;

// Document ready
$(function() {

    //alert('wowafeaf');
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/tomorrow_night_bright");
    editor.getSession().setUseWrapMode(true);
    editor.getSession().setMode("ace/mode/markdown");
    editor.on('change', function(e) {
        updateDocument(editor.getValue());
        window.clearTimeout(Watchdog);
        Watchdog = setTimeout(saveDocument, 1500);
    });

    Editor = editor;

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
    var editorLayer = $('#editorLayer');
    var contentLayer = $('#contentLayer');
    editorLayer.fadeIn();
    contentLayer.removeClass('push_two');

    $('.btnEditPage, #footerSeparator').fadeOut();
    $('#btnCloseEditor').fadeIn();

    Gumby.initialize('fixed');
}

function hideEditor() {
    var editorLayer = $('#editorLayer');
    var contentLayer = $('#contentLayer');
    editorLayer.fadeOut(function() {
        contentLayer.addClass('push_two');
    });

    $('.btnEditPage, #footerSeparator').fadeIn();
    $('#btnCloseEditor').fadeOut();

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

function saveDocument() {
    console.log("Storing document...");
    var data = {
        title: $('#content h1:first').html(),
        markdown: Editor.getValue()
    };

    $.post(document.URL, data, function(success) {
        console.log(success);
        console.log("Document saved");
    });
}