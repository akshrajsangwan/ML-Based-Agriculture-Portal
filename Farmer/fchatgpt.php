<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
    header("location: ../index.php");
}
$query4 = "SELECT * from farmerlogin where email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);
?>

<!DOCTYPE html>
<html lang="en">
<?php require ('fheader.php'); ?>

<style>
    .chat-container {
        height: 65vh;
        overflow-y: auto;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #e9ecef;
    }
    
    .message {
        margin-bottom: 15px;
        padding: 12px 18px;
        border-radius: 15px;
        position: relative;
        font-size: 0.95rem;
        line-height: 1.5;
        max-width: 80%;
    }

    .message pre {
        white-space: pre-wrap;
        margin: 0;
        font-family: 'Inter', sans-serif;
    }

    .right-side {
        background-color: #184d36;
        color: white;
        float: right;
        clear: both;
        border-bottom-right-radius: 2px;
    }

    .left-side {
        background-color: #ffffff;
        color: #333;
        float: left;
        clear: both;
        border: 1px solid #e0e0e0;
        border-bottom-left-radius: 2px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .popup {
        position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%);
        background-color: #333; color: white; padding: 10px 20px;
        border-radius: 5px; display: none; z-index: 1000;
    }
    
    .copy-btn {
        cursor: pointer; opacity: 0.6; float: right; margin-top: 5px;
    }
    .copy-btn:hover { opacity: 1; }
</style>

<body class="bg-white" id="top">
  <?php include ('fnav.php'); ?>

  <div class="wrapper" style="margin-top: 30px;">
    <div class="container">
        
      <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card glass-card" style="overflow: hidden;">
                <div class="card-header bg-white border-0 d-flex align-items-center">
                    <img src="../assets/img/chatgpt.svg" class="rounded-circle mr-3" width="40" alt="AI"> 
                    <h4 class="mb-0 text-dark font-weight-bold">Farm AI Assistant</h4>
                    <div class="ml-auto">
                        <button class="btn btn-sm btn-outline-danger" onclick="clearContent()">
                            <i class="fas fa-trash-alt mr-1"></i> Clear
                        </button>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="chat-container" id="chatbox">
                        <div class="text-center text-muted mt-5">
                            <i class="fas fa-robot fa-3x mb-3 opacity-5"></i>
                            <p>Ask me anything about crops, fertilizers, or weather!</p>
                        </div>
                        <span id="copy-popup" class="popup">Copied to clipboard!</span>
                    </div>
                </div>

                <div class="card-footer bg-white border-top p-3">
                    <div class="input-group input-group-lg">
                        <input id="userInput" type="text" class="form-control" placeholder="Type your question here..." style="border-radius: 30px 0 0 30px; font-size: 1rem;">
                        <div class="input-group-append">
                            <button id="sendButton" class="btn btn-success" type="button" style="border-radius: 0 30px 30px 0; padding-left: 25px; padding-right: 25px;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>

  <?php require("footer.php");?>

  <script src="[https://code.jquery.com/jquery-3.6.0.min.js](https://code.jquery.com/jquery-3.6.0.min.js)"></script>
  <script src="[https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js](https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js)"></script>
  <script src="[https://cdn.staticfile.org/markdown-it/13.0.1/markdown-it.min.js](https://cdn.staticfile.org/markdown-it/13.0.1/markdown-it.min.js)"></script>
  <script src="[https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js](https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js)"></script>

  <script>
    function clearContent(){
        document.getElementById('chatbox').innerHTML = '<div class="text-center text-muted mt-5"><i class="fas fa-robot fa-3x mb-3 opacity-5"></i><p>Ask me anything about crops, fertilizers, or weather!</p></div>';
        messages = [];
    }
    
    const apiKey = "sk-xxxxxxxxxxxxxxxxxxxxxxxxxx";   // Keep your API key
    const chatbox = $("#chatbox");
    const userInput = $("#userInput");
    const sendButton = $("#sendButton");
    let messages = [];

    function scrollToBottom() {
        const chatContainer = document.getElementById("chatbox");
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    sendButton.on("click", () => {
        const message = userInput.val();
        if (message) {
            // Remove placeholder if it exists
            if(chatbox.find('.fa-robot').length > 0) chatbox.empty();

            messages.push({
                "role": "user",
                "content": message
            });
            
            const displaytext = window.markdownit().render(message);
            let userMessageHtml = '<div class="clearfix"><div class="message right-side shadow-sm">' + displaytext + '</div></div>';
            chatbox.append(userMessageHtml);
            scrollToBottom();
            
            userInput.val("");
            sendButton.html('<i class="fas fa-spinner fa-spin"></i>');
            sendButton.prop("disabled", true);
            fetchMessages();
        }
    });

    userInput.on("keydown", (event) => {
        if (event.keyCode === 13 && !event.ctrlKey && !event.shiftKey) {
            event.preventDefault();
            sendButton.click();
        }
    });

    function fetchMessages() {
        var settings = {
            url: "[https://api.openai.com/v1/chat/completions](https://api.openai.com/v1/chat/completions)",
            method: "POST",
            timeout: 0,
            headers: {
                "Authorization": "Bearer " + apiKey,
                "Content-Type": "application/json"
            },
            data: JSON.stringify({
                model: "gpt-3.5-turbo",
                messages: messages
            })
        };
        $.ajax(settings).done(function(response) {
            const message = response.choices[0].message;
            messages.push({
                "role": message.role,
                "content": message.content
            });
            
            const htmlText = window.markdownit().render(message.content);
            const msgId = CryptoJS.MD5(htmlText);
            
            const botMessageHtml = `
                <div class="clearfix">
                    <div class="message left-side">
                        <div id="${msgId}">${htmlText}</div>
                        <i class="far fa-copy text-muted copy-btn" id="${msgId}-copy" title="Copy"></i>
                    </div>
                </div>`;             

            chatbox.append(botMessageHtml); 
            
            // Copy function
            document.getElementById(`${msgId}-copy`).addEventListener("click", function() {
                var textToCopy = document.getElementById(msgId).innerText;
                navigator.clipboard.writeText(textToCopy).then(function() {
                    var copyPopup = document.getElementById("copy-popup");
                    copyPopup.style.display = "block";
                    setTimeout(() => { copyPopup.style.display = "none"; }, 2000);
                });
            });
            
            scrollToBottom();
            sendButton.html('<i class="fas fa-paper-plane"></i>');
            sendButton.prop("disabled", false);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            sendButton.html('<i class="fas fa-paper-plane"></i>');
            sendButton.prop("disabled", false);
            let errorText = "Error: " + (jqXHR.responseJSON ? jqXHR.responseJSON.error.message : "Unknown error");
            let errorMessage = '<div class="clearfix"><div class="message left-side text-danger">' + errorText + '</div></div>';
            chatbox.append(errorMessage);
            scrollToBottom();
        });
    }
  </script>
  
</body>
</html>