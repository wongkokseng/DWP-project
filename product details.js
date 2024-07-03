const image = document.getElementById('productImg');
const btn = document.getElementsByClassName('btn');

btn[0].addEventListener('click', function(){
    image.src = './img/1.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
btn[1].addEventListener('click', function(){
    image.src = './img/2.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
btn[2].addEventListener('click', function(){
    image.src = './img/3.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
