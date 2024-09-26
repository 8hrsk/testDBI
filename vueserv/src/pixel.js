if (document.cookie.indexOf("test=visited") === -1) {
//   fetch('http://localhost:3000/vueserv/app.php/set', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'plain/text'
//     },
//     mode: 'no-cors',
//     body: "url=" + window.location.href
//   });

    console.log("First visit");
    
} else {
    console.log("Already visited");
}