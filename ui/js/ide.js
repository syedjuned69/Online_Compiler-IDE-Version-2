let editor;
editor = ace.edit("editor");
window.onload = function() {
    editor = ace.edit("editor");
    // editor.setTheme("ace/theme/monokai");
    editor.setTheme("ace/theme/chrome");
    editor.session.setMode("ace/mode/c_cpp");
    editor.session.setValue("#include<stdio.h>\n\nint main(){\n\n//code here\nreturn 0;\n}");
}

function changetheme(){
    let mode = $("#mode").val();
    if(mode=='dark'){
        editor.setTheme("ace/theme/monokai");
    }
    if(mode=='light'){
        editor.setTheme("ace/theme/chrome");
    }
}

function changeLanguage() {

    let language = $("#languages").val();

    if(language == 'c')
    {
        editor.session.setValue("#include<stdio.h>\n\nint main(){\n\n//code here\nreturn 0;\n}"); 
        editor.session.setMode("ace/mode/c_cpp");
    }
    else if(language == 'cpp')
    {
        let defaultcpp = '#include<iostream>\nusing namespace std;\n\nint main(){\n\n//code here\nreturn 0;\n}';
        editor.session.setMode("ace/mode/c_cpp");
        editor.session.setValue(defaultcpp);
    }
    else if(language == 'python'){
        editor.session.setMode("ace/mode/python");
        editor.session.setValue("#code here");
    }
    // else if(language == 'php')editor.session.setMode("ace/mode/php");
    // else if(language == 'node')editor.session.setMode("ace/mode/javascript");
}
// (document.getElementById("f1").value) = "hii";
function executeCode() {
    // document.getElementById("test").innerText = document.getElementById("idata").value;
    // console.log(document.getElementById("idata").value);
    $.ajax({

        url: "http://localhost/www/ide/app/compiler.php",

        method: "POST",
        
        data: {
            language: $("#languages").val(),
            input : $('[name="text"]').val(),
            code: editor.getSession().getValue()
            // input: document.getElementById("idata").value
            
        },

        success: function(response) {

            console.log(response);  
            // console.log(document.getElementById("idata").value);
            // $(".output").text(response) 
            // var x = response
            (document.getElementById("f1").value) = response;

        }
    })
}
// (document.getElementById("f1").value) = ;
