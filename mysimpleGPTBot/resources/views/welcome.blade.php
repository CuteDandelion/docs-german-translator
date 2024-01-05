<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        introMessage: "✋ Hi ! I'm a GPT powered german learning bot. Try asking question or start uploading oA SMALL PDF FILE to see what i can do !!!",
        desktopHeight: 1000,
        desktopWidth : 1000,
        userId : ""
    };

</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var fileContainer;
var files;
var filetype;


setInterval(function () {
    // Get the iframe content
    var iframeContent = $("#chatBotManFrame").contents();

    // Check if the last message is by the visitor. If yes, show the indicator
    if (iframeContent.find("ol.chat li:last-child").hasClass('visitor')) {
        iframeContent.find("ol.chat").append('<li class="indicator"><div class="loading-dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div></li>');
    } else {
        // If the last message is by the bot and the indicator is shown, remove the indicator from the conversation
        if (iframeContent.find("ol.chat li:last-child").hasClass('indicator') && iframeContent.find("ol.chat li:nth-last-child(2)").hasClass('chatbot')) {
            iframeContent.find("ol.chat li .loading-dots").parent().remove();
        }
    }
}, 10);



const botmanInterval00 = setInterval(setupAttachInput, 10);
    function setupAttachInput(){
        if(window.botmanChatWidget != "undefined"){
           if (document.getElementById('chatBotManFrame') != null){
              const iframe = document.getElementById('chatBotManFrame');
              if (iframe.contentDocument && iframe.contentDocument.readyState === 'complete') {
                   const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                   if (iframeDocument.getElementsByClassName('attachment-icon').length === 0){
                   var userID = generateUUID();
                   window.botmanChatWidget.whisper('_USER_'+userID);
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

                   const filelist = document.createElement("div");
                   filelist.id = "fileList";
                   filelist.className = "#fileList";
                   filelist.backgroundColor='#f5f5f5';
                   filelist.padding="10px";
                   filelist.border="1px solid #ddd";
                   filelist.borderRadius="5px";
                   filelist.marginBottom="10px";
                   filelist.display="none";
                   filelist.style.float="up";

                   // Insert the attachment icon before the existing text input
                   userText.insertAdjacentElement("beforebegin", attachmentIcon);
                   userText.insertAdjacentElement("beforebegin",filelist);

                   fileContainer = iframeDocument.getElementById('fileList');
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
          files = selectedFiles;
          /*const fileNames = Array.from(selectedFiles).map(file => file.name);
          fileContainer.innerHTML = "Uploaded Files: " + fileNames.join(", ");
          fileContainer.style.display = "block";*/ 
          sendFile(selectedFiles[0],'file');
   }

   function sendFile(file, filetype){
        //console.log(file);
        window.botmanChatWidget.sayAsBot('This may take a while, so go grab a drink and i will get back to you soon !!');
        var formData = new FormData();
        formData.append("driver", "web");
        formData.append("attachment",filetype);
        formData.append("interactive", 0);
        formData.append("file", file);
        formData.append("name",file.name);
        formData.append("lastModified",file.lastModified);
        
        $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        
        $.ajax({
                url: '/botman',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle the bot's response here
                    console.log(response);
                    //var respLen = response.messages.length;
                    window.botmanChatWidget.sayAsBot('Perfect!! '+file.name+' successfully received');
                    window.botmanChatWidget.whisper('_FILEOPTS_');
                },
                error: function(xhr, status, error) {
                    // Handle the error and log it to the console
                    console.log('AJAX Error:', status, error);
                    window.botmanChatWidget.sayAsBot('Oops!! I am having trouble receiving '+file.name+'. Try reuploading and making sure that it is a PDF and the size is small!!');
                }
            });
        
        
   }

   function generateUUID() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0,
            v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
  }



</script>>
</html>
