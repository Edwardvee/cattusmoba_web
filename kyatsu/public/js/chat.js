window.addEventListener("load", () => {
    const msgerForm = document.getElementById("form");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");

// Icons made by Freepik from www.flaticon.com
const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
const BOT_NAME = "BOT";
const PERSON_NAME = "Sajad";
const CSRF = document.getElementById("csrf-parent").lastChild.value;

    document.getElementById("form").addEventListener("submit", event => {
        event.preventDefault();
      
        const msgText = msgerInput.value;
        if (!msgText) return;
      /* Todo el codigo del envio*/
      fetch("/message/sent", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
            "Accept": "application/json; charset=utf-8",
            "Follow": "false",
            "CSRFToken": CSRF
        },
        body: JSON.stringify({
          content: msgText,
          chat_uuid: new URL(window.location.href).pathname.split("/")[2],
          _token: CSRF
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.error(error);
      });
        //appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
        msgerInput.value = "";
      });
      
      function appendMessage(name, img, side, text) {
        //   Simple solution for small apps
        const msgHTML = `
          <div class="msg ${side}-msg">
            <div class="msg-img" style="background-image: url(${img})"></div>
      
            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">${name}</div>
                <div class="msg-info-time">${formatDate(new Date())}</div>
              </div>
      
              <div class="msg-text">${text}</div>
            </div>
          </div>
        `;
      
        msgerChat.insertAdjacentHTML("beforeend", msgHTML);
        msgerChat.scrollTop += 500;
      }
      
      /*
      function botResponse() {
        const r = random(0, BOT_MSGS.length - 1);
        const msgText = BOT_MSGS[r];
        const delay = msgText.split(" ").length * 100;
      
        setTimeout(() => {
          appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
        }, delay);
      }
      */
      
      // Utils
      function get(selector, root = document) {
        return root.querySelector(selector);
      }
      
      function formatDate(date) {
        const h = "0" + date.getHours();
        const m = "0" + date.getMinutes();
      
        return `${h.slice(-2)}:${m.slice(-2)}`;
      }
      
      /*
      function random(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
      }
      */
    });

