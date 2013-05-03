

<div class="container">
    <div class="row">
        <div class="hidden six columns" id="editorLayer" gumby-fixed="top">
            <div id="editor"><?= $markdown ?></div>
            <a id="btnCloseEditor" href="#">Close editor</a>
        </div>
        <div class="push_two six columns" id="contentLayer">
            <div id="content"><?= $content ?></div>
        </div>
    </div>
</div>