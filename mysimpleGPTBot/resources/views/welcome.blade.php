<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to install Botman Chatbot in Laravel? - shouts.dev</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
</body>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
<style>
</style>
<script>
var botmanWidget = {
        aboutText: 'write something here',
        introMessage: "✋ Hia !I'm a GPT powered german learning bot. How can i help you today? ",
        desktopHeight: 1000,
        desktopWidth : 1000
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script>
const botmanInterval = setInterval(checkBotman, 10);
    function checkBotman(){
        if(window.botmanChatWidget != "undefined"){
           if (document.getElementById('chatBotManFrame') != null){
              const iframe = document.getElementById('chatBotManFrame');
              if (iframe.contentDocument && iframe.contentDocument.readyState === 'complete') {
                   const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                   if (iframeDocument.getElementsByClassName('attachment-icon').length === 0){
                   const userText = iframeDocument.getElementById('userText'); 
                   // Create a new attachment/upload icon element
                   const attachmentIcon = document.createElement("span");
                   attachmentIcon.innerHTML = "&#128206;";
                   attachmentIcon.className = "attachment-icon";
                   attachmentIcon.style.float = "right";
                   attachmentIcon.style.fontSize = "30px";
                   attachmentIcon.style.marginRight="5px";
                   attachmentIcon.onclick = openFileInput;
                   userText.style.width="93%";

                   // Insert the attachment icon after the existing text input
                   userText.insertAdjacentElement("beforebegin", attachmentIcon);
                   }
              }
           }
           
        }
    }

    function openFileInput() {
          const fileInput = document.createElement("input");
          fileInput.type = "file";
          fileInput.style.display = "none";
          fileInput.addEventListener("change", handleFileSelection);
          fileInput.click();
    }

   function handleFileSelection() {
          const selectedFiles = this.files;
          const fileNames = Array.from(selectedFiles).map(file => file.name).join(', ');
          console.log(fileNames);
   }
</script>
</html>
