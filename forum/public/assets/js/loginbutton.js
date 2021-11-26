document.getElementById('button').addEventListener("click",function() {
    document.querySelector('.bg-modal').style.display = 'flex';
});

document.querySelector('.close').addEventListener("click",function() {
    document.querySelector('.bg-modal').style.display = 'none';
});

document.getElementById('button2').addEventListener("click",function() {
    document.querySelector('.bg-modal2').style.display = 'flex';
});

document.querySelector('.close2').addEventListener("click",function() {
    document.querySelector('.bg-modal2').style.display = 'none';
});