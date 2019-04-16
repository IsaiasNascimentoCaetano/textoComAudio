var audio;
var audio2;

function play(path,type){

    if(type == 1){

        audio = document.getElementById("audioLoop");
        audio.src = path;
        audio.play();

    }
    else{

        audio2 = document.getElementById("audioEfect");
        audio2.src = path;
        audio2.play();

    }

}
