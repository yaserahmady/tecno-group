console.log("Inactivity script loaded");
(function () {
  var inactivityTime = function () {
    var time;
    var standbyTime = 600000; // Set inactivity time (e.g., 600000 ms = 10 minutes)

    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onscroll = resetTimer;
    document.onclick = resetTimer;
    document.onmousedown = resetTimer;
    document.ontouchstart = resetTimer;
    document.ontouchmove = resetTimer;

    function redirectToStandby() {
      localStorage.setItem("originalURL", window.location.href); // Store the current URL
      window.location.href = "/standby.html";
    }

    function resetTimer() {
      clearTimeout(time);
      time = setTimeout(redirectToStandby, standbyTime);
    }
  };

  inactivityTime();
})();
