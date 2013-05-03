
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        height: 500px;
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="twelve columns">
            <div id="editable">
                <?= $content ?>
                <div id="editor">
# Ola k ase?
En un lugar de La Mancha de cuyo nombre no quiero acordarme...
* * *

1. Sopadé
2. Patatascon
3. 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://rawgithub.com/ajaxorg/ace-builds/master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
