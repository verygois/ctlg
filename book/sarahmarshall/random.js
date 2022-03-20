const random = [
  "/ctlg/book/sarahmarshall/001.jpg",
  "/ctlg/book/sarahmarshall/002.jpg",
  "/ctlg/book/sarahmarshall/003.jpg",
  "/1f/02/07.jpg",
  "/1f/02/08.jpg"
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
  