const random = [
    "/ctlg/book/reijisaito/001.png",
    "/ctlg/book/reijisaito/002.png",
    "/ctlg/book/reijisaito/003.png",
    "/ctlg/book/reijisaito/004.png",
    "/ctlg/book/reijisaito/005.png",
    "/ctlg/book/reijisaito/006.png"
  ];
  
  function randomImg(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function sentenceGenerator() {
    var sentence = `<img src="${randomImg(random)}">`;
    document.querySelector(".random").innerHTML = sentence;
  }
  window.setInterval(function() {
    sentenceGenerator();
  }, 2000);
  sentenceGenerator();
  