const random = [
  "/ctlg/book/npanzer/001.jpeg",
  "/ctlg/book/npanzer/002.jpeg",
  "/ctlg/book/npanzer/003.jpeg",
  "/ctlg/book/npanzer/004.jpeg",
  "/1f/02/03.jpg",
  "/1f/02/04.jpg",
  "/1f/02/05.jpg"
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
  