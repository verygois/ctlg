const random = [
  "/ctlg/book/bugbuspiano/001.png",
  "/ctlg/book/bugbuspiano/002.png",
  "/ctlg/book/bugbuspiano/003.jpeg",
  "/ctlg/book/bugbuspiano/004.jpeg",
  "/ctlg/book/bugbuspiano/005.jpeg"
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
  