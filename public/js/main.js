
// ナビゲーションボタン
{
  const body = document.querySelector('.body');
  console.log(body);
  const hBtn = document.querySelector('.sp-nav');
  console.log(hBtn);
  const overlay = document.querySelector('.overlay');
  console.log(overlay);
  const firstLine = document.querySelector('.first-line');
  console.log(firstLine);
  const centerLine = document.querySelector('.center-line');
  console.log(centerLine);
  const lastLine = document.querySelector('.last-line');
  console.log(lastLine);
  hBtn.addEventListener( 'click', function() {
      overlay.classList.toggle('swing');
      firstLine.classList.toggle('swing');
      centerLine.classList.toggle('swing');
      lastLine.classList.toggle('swing');
      body.classList.toggle('body_hidden');
  });
}


// QRコード表示
const buttonOpen = document.getElementById('modalOpen');
const modal = document.getElementById('easyModal');
const buttonClose = document.getElementsByClassName('modalClose')[0];

buttonOpen.addEventListener('click', modalOpen);
function modalOpen() {
  modal.style.display = 'block';
}

buttonClose.addEventListener('click', modalClose);
function modalClose() {
  modal.style.display = 'none';
}

addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
// for (let i = 0; i < buttonOpen.length; i++ ) {

//   buttonOpen[i].addEventListener('click', modalOpen);
//   function modalOpen() {
//     modal[i].style.display = 'block';
//   }
  
//   buttonClose.addEventListener('click', modalClose);
//   function modalClose() {
//     modal.style.display = 'none';
//   }
  
//   addEventListener('click', outsideClose);
//   function outsideClose(e) {
//     if (e.target == modal) {
//       modal.style.display = 'none';
//     }
//   }
// }



// 前ページに戻るボタン
// const back = document.getElementById('btn_back');
// back.addEventListener('click', (e) => {
// history.back();
// return false;
// });

// リアルタイム検索
  // function inputChange(event) {
  //   console.log(event.currentTarget.value);
  // }
  // let search_select = document.getElementById('search_select');
  // search_select.addEventListener('change', inputChange);

// セレクトタグ
// var Element = document.getElementById("time_select");
// for (var i = 17; i<= 21; i++) {
//   var option = document.createElement("option");
//   option.value = i + ":00";
//   option.innerText = i + ":00";
//   Element.appendChild(option);
// }
// var Element = document.getElementById("num_select");
// for (var i = 1; i<= 5; i++) {
//   var option = document.createElement("option");
//   option.value = i;
//   option.innerText = i + "人";
//   Element.appendChild(option);
// }


