function positionDate(){
    var left=document.getElementsByClassName("left");
    var right=document.getElementsByClassName("right");
    var date=document.getElementsByClassName("date");
    for (var i=0;i<left.length;i++){
        if (left[i].clientHeight!=right[i].clientHeight){
            date[i].style.marginBottom="26px";
        }
    }
}