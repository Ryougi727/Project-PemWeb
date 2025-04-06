let soal2 = document.getElementsByClassName('soal2');
let btnPrev = document.getElementById('previous');
let btnNext = document.getElementById('next');
let btnEnd = document.getElementById('end');
let nmr = document.getElementById('no_soal');
let nmrSoal = document.getElementsByClassName('no-soal');
let navUser = document.getElementById('nav_user');
let navUjian = document.getElementById('nav_ujian');
let btnOut = document.getElementById('timeOut');

let index= 0;
tampilsoal(index);

btnNext.onclick = () =>{
    tampilsoal(index += 1);
    nmr.innerText = index + 1;
}
btnPrev.onclick = () =>{
    nmr.innerText = index ;
    tampilsoal(index -= 1);
}

function pilihSoal(no){
    tampilsoal(index = no -1);
    nmr.innerText = no;
}

function tampilsoal(index){
    if (index == 0 ){
        btnPrev.style.display = "none";
    }else{
        btnPrev.style.display = "block";
    }

    if(index === (soal2.length - 1)){
        btnNext.style.display = "none";
        btnEnd.removeAttribute('hidden');
    }else {
        btnNext.style.display = "block";
        btnEnd.setAttribute('hidden' , true);
    }

    for (let i = 0; i < soal2.length; i++){
        soal2[i].style.display = "none";
    }
    soal2[index].style.display = "block";
}

function jawab(no){
    nmrSoal[no-1].className = nmrSoal[no-1].className.replace("btn-outline-dark", "btn-success text-white");
}

navUser.classList.add('visually-hidden');
navUjian.classList.remove('visually-hidden');

let timerUjian = setInterval(countDown, 1000);

function countDown() {
    let curTime = document.getElementById("sisa");
    let arrTime = curTime.innerText.split(/[:]+/);
    let hour = parseInt(arrTime[0], 10);
    let min = parseInt(arrTime[1], 10);
    let sec = parseInt(arrTime[2], 10) - 1;

    if (sec < 0) {
        sec = 59;
        min--;
    }

    if (min < 0) {
        min = 59;
        hour--;
    }

    if (hour < 0) {
        clearInterval(timerUjian);
        curTime.innerText = "00:00:00";
        curTime.classList.add("blink");
        setTimeout(() => {
            btnOut.click();
        }, 3000);
        return;
    }

    curTime.innerText = `${hour.toString().padStart(2, "0")}:${min.toString().padStart(2, "0")}:${sec.toString().padStart(2, "0")}`;
}


function cekSecond(sec) {
     if (sec < 10 && sec >= 0) {
        sec = "0" + sec;
    }

    if (sec < 0) {
        sec = "59";
    }
    return sec;
}

