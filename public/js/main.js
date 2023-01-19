var editor = document.querySelector("#editor");

ace.edit(editor, {
    theme: 'ace/theme/cobalt',
    mode: 'ace/mode/c_cpp',
    enableBasicAutocompletion: true
})

var editor = ace.edit("editor");

editor.setValue("#include <stdio.h>\nint main(){\n\n\t\n\n\treturn 0;\n}");

var position = {row: 3, column: 1};

editor.moveCursorToPosition(position);
editor.clearSelection();
editor.textInput.focus();

document.getElementById("myform").addEventListener("submit", function(e) {
    var code = ace.edit("editor").getValue();
    document.getElementById("code").value = code;
});