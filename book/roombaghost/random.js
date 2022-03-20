const random = [
  "/ctlg/book/roombaghost/001.jpeg",
  "/ctlg/book/roombaghost/002.png",
  "/ctlg/book/roombaghost/003.png",
  "/ctlg/book/roombaghost/004.jpeg"
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
  