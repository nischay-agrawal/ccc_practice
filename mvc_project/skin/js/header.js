function setActive(){
    var links = document.getElementsByClassName('nav-links');
    for(var i=0;i<links.length;i++){
        if(links[i].getAttribute('href') == window.location.href.replace('http://localhost', '')){
            links[i].classList.add('active');
        }
    }
}