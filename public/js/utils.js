var whenDocumentReadyDo = function(functionToRun){
    // in case the document is already rendered
    if (document.readyState!=='loading') run();
    // modern browsers
    else if (document.addEventListener) document.addEventListener('DOMContentLoaded', functionToRun);
    // IE <= 8
    else document.attachEvent('onreadystatechange', function(){
        if (document.readyState==='complete') functionToRun();
    });
}


