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

