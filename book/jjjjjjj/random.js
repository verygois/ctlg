const random = [
  "/ctlg/book/jjjjjjj/001.jpeg",
  "/ctlg/book/jjjjjjj/002.jpeg",
  "/ctlg/book/jjjjjjj/003.jpeg",
  "/ctlg/book/jjjjjjj/004.jpeg"
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
  