
// chay tung chu

var text,
    soFar;

var i=0;
    // setTimeout(abc1 ,1000);
changeWord = function(){
    if(i==0) {
        text = "Bạn muốn tìm gì?";
        soFar = ""; 
        var t = setInterval(function(){
            soFar += text.substr(0, 1),
            text = text.substr(1);
            document.getElementById("text-search").placeholder = soFar;

            if (text.length === 0) clearInterval(t);
        }, 100)
        i++;
    }else
    if(i==1) {
        text = "Tủ sách?";
        soFar = "";
    
        var t = setInterval(function(){
            soFar += text.substr(0, 1),
            text = text.substr(1);
            document.getElementById("text-search").placeholder = soFar;
 
            if (text.length === 0) clearInterval(t);
        }, 100)
        i++;
    } else 
    if(i==2) {
        text = "Sách giáo khoa?";
        soFar = "";
        var t = setInterval(function(){
            soFar += text.substr(0, 1),
            text = text.substr(1);
            document.getElementById("text-search").placeholder = soFar;
            
            if (text.length === 0) clearInterval(t);
        }, 100)
        i=0;
    }
}

setInterval(changeWord, 3000);