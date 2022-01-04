document.getElementById('button').addEventListener("click",function() {
    document.querySelector('.bg-modal-login').style.display = 'flex';
});

document.querySelector('.close').addEventListener("click",function() {
    document.querySelector('.bg-modal-login').style.display = 'none';
});

document.getElementById('button2').addEventListener("click",function() {
    document.querySelector('.bg-modal-register').style.display = 'flex';
});

document.querySelector('.close2').addEventListener("click",function() {
    document.querySelector('.bg-modal-register').style.display = 'none';
});