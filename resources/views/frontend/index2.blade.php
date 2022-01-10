<html>
    <head>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Concert+One&display=swap");

*,
::before,
::after {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html {
  font-size: 62.5%;
}

body {
  font-family: "Concert One", cursive;
}

.container {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.clock {
  width: 35rem;
  height: 35rem;
  background-color: #acacac;
  border-radius: 50%;
  border: 0.5rem solid #666;
  box-shadow: 0.5rem 0.5rem 1rem #999, -0.5rem -0.5rem 1rem #999;
  position: relative;
}

.numbers {
  width: inherit;
  height: inherit;
  position: relative;
}

.numbers div {
  position: absolute;
  font-size: 2.5rem;
  color: #fff;
  text-shadow: 0.2rem 0.2rem 0.2rem #222;
}

.twelve {
  top: 1rem;
  left: 50%;
  transform: translateX(-50%);
}

.three {
  right: 2rem;
  top: 50%;
  transform: translateY(-50%);
}

.six {
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
}

.nine {
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
}

.arrows {
  width: inherit;
  height: inherit;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.arrows::before {
  content: "";
  width: 2.5rem;
  height: 2.5rem;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0.2rem 0.2rem 0.5rem #777;
  z-index: 10;
}

.arrows div {
  width: 0.7rem;
  height: 13rem;
  background-color: #f8e800;
  position: absolute;
  bottom: 50%;
  box-shadow: 0.2rem 0.2rem 0.5rem #777;
  border-radius: 100% 100% 0 0;
  transform-origin: bottom center;
}

.arrows .hour {
  height: 10rem;
  transform: rotate(90deg);
}

.arrows .second {
  background-color: #f7b195;
  transform: rotate(270deg);
}

        </style>
    </head>
    <body>
        <main class="container">
  <div class="clock">
    <div class="numbers">
      <div class="twelve">12</div>
      <div class="three">3</div>
      <div class="six">6</div>
      <div class="nine">9</div>
    </div>
    <div class="arrows">
      <div class="hour"></div>
      <div class="minute"></div>
      <div class="second"></div>
    </div>
  </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function(){
            
            const hour = document.querySelector(".hour");
const minute = document.querySelector(".minute");
const second = document.querySelector(".second");

function setDate() {
  const now = new Date();

  const getSecond = now.getSeconds();
  const getMinute = now.getMinutes();
  const getHour = now.getHours();

  //move the second arrow
  const secondDegree = (getSecond / 60) * 360;
  second.style.transform = `rotate(${secondDegree}deg)`;

  //move the minute arrow
  const minuteDegree = (getMinute / 60) * 360;
  minute.style.transform = `rotate(${minuteDegree}deg)`;

  //move the hour arrow
  const hourDegree = (getHour / 12) * 360;
  hour.style.transform = `rotate(${hourDegree}deg)`;
}

setInterval(setDate, 1000);

        })
    </script>
    </body>
</html>