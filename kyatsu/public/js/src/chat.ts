declare var chat_user_uuid: String;

window.addEventListener("load", () => {
    //Form
    const msgerForm: HTMLFormElement = <HTMLFormElement>document.getElementById("form")!;
    const msgerInput: HTMLInputElement = <HTMLInputElement>document.querySelector(".msger-input");
    const msgerChat: HTMLDivElement = <HTMLDivElement>document.querySelector(".msger-chat");

    // Icons made by Freepik from www.flaticon.com
    //const BOT_IMG: String = "https://image.flaticon.com/icons/svg/327/327779.svg";
    const PERSON_IMG: String = "https://image.flaticon.com/icons/svg/145/145867.svg";
    //const BOT_NAME: String = "BOT";
    const PERSON_NAME: String = "Sajad";
    const CHAT_UUID: String = new URL(window.location.href).pathname.split("/")[2];

    const CSRF: String = document.getElementById("csrf-parent")!.lastChild!.nodeValue!;

    msgerForm.addEventListener("submit", event => {
        event.preventDefault();
        const msgText = msgerInput.value;
        if (!msgText) return;
        fetch("/message/sent", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json; charset=utf-8",
            "Follow": "false"
          },
          body: JSON.stringify({
            content: msgText,
            chat_uuid: new URL(window.location.href).pathname.split("/")[2],
            chat_user: chat_user_uuid,
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
        appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
        msgerInput.value = "";
    });
          
    function appendMessage(name: String, img: String | URL , side: string, text: String): void {
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

    function formatDate(date: Date) {
      const h = "0" + date.getHours();
      const m = "0" + date.getMinutes();

      return `${h.slice(-2)}:${m.slice(-2)}`;
    }
});

