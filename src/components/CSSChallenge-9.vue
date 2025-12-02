<script setup>
import { ref } from 'vue';

const isRunning = ref(false)
function toggleRunning() {
  isRunning.value = !isRunning.value
}
</script>

<template>
  <main class="css-challenge">
    <div class="css-title">
      <h1>CSS challenge 9</h1>
      <h2>CSS animaties</h2>
    </div>
    <ul>
      <li aria-label="name-and-duration" piste="blauw">
        <div>💩</div>
      </li>

      <li aria-label="iteration-count" piste="blauw">
        <div>💋</div>
      </li>

      <li aria-label="3-keyframes" piste="blauw">
        <div>🧨</div>
      </li>

      <li aria-label="5-keyframes" piste="blauw">
        <div>💙</div>
      </li>

      <li aria-label="delay" piste="blauw">
        <div>🐢</div>
      </li>

      <li aria-label="timing-function" piste="blauw">
        <div>😵‍💫🐢</div>
      </li>

      <li aria-label="transform-origin" piste="blauw">
        <div>🌴</div>
      </li>

      <li aria-label="play-state" piste="blauw">
        <div>🦋</div>
      </li>

      <li aria-label="direction" piste="blauw">
        <div>🏀</div>
      </li>

      <li aria-label="fill-mode" piste="blauw">
        <div>🫧</div>
      </li>
    </ul>

    <ul>
      <!-- <li aria-label="flip me" piste="blauw">
        <button>flip me</button>
      </li> -->

      <!-- <li aria-label="dblclick" piste="blauw">
        <div>🐢</div>
        <button>double click</button>
      </li> -->

      <!-- <li aria-label="like-it" piste="blauw">
        <button>♥︎</button>
      </li> -->
      <!-- 
      <li aria-label="svg-it" piste="blauw">
        <button>
          <svg viewBox="0 0 48 48">
            <path
              d="M24,8.44528C19.73506-1.44339,6.41095,3.62669,6.41283,14.91084c.00212,12.75522,12.22596,24.20123,17.58717,30.20216,5.24858-5.9673,17.43778-17.44694,17.43778-30.23531,0-11.25101-12.98674-16.26412-17.43778-6.43242Z"
            />
          </svg>
        </button>
      </li> -->

      <li aria-label="running" piste="rood">
        <button  @click="toggleRunning" :class="{running: isRunning}">running</button>
      </li>

      <li aria-label="dots" piste="rood">
        <button @click="toggleRunning" :class="{running: isRunning}">
          <span>dots</span>
          <dot></dot>
          <dot></dot>
          <dot></dot>
        </button>
      </li>

      <li aria-label="slang" piste="rood">
        <button @click="toggleRunning" :class="{running: isRunning}">
          <span>slang</span>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
        </button>
      </li>

      <li aria-label="cirkel" piste="rood">
        <button @click="toggleRunning" :class="{running: isRunning}">
          <span>cirkel</span>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
          <dot></dot>
        </button>
      </li>

      <!-- <li aria-label="plop" piste="zwart">
        <div>🫧</div>
        <button>plop</button>
      </li> -->

      <!-- <li aria-label="again" piste="zwart">
        <div>👻</div>
        <button>again</button>
      </li> -->
      <!-- 
      <li aria-label="wait-for-it" piste="zwart">
        <div>🍄‍🟫</div>
        <button>
          <span>wait for it</span>
          <dot></dot>
          <dot></dot>
          <dot></dot>
        </button>
      </li> -->

      <!-- <li aria-label="zeg-poef" piste="zwart">
        <div>🎈</div>
        <p>zeg 'poef'</p>
      </li> -->
    </ul>
  </main>
</template>


<style scoped>
/*********************/
/* name-and-duration */
/*********************/

@keyframes --name-and-duration-animation {
  0% {
    /* // JOUW CODE HIER
		// 0 graden draaien (normaal) */
    rotate: 0deg;
  }
  100% {
    /* // JOUW CODE HIER
		// 180 graden draaien (op zijn kop) */
    rotate: 180deg;
  }
}

li[aria-label="name-and-duration"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration */
  animation-name: --name-and-duration-animation;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}

/*******************/
/* iteration-count */
/*******************/

@keyframes --iteration-count-animation {
  /* // JOUW CODE HIER
	// van 1x naar 2x zo groot (met scale) */
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(2);
  }

  100% {
    transform: scale(1);
  }
}

li[aria-label="iteration-count"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration
	// nu ook: animation-iteration-count */
  animation-name: --iteration-count-animation;
  animation-duration: 1s;
  animation-iteration-count: 3;
}

/***************/
/* 3-keyframes */
/***************/

@keyframes --3-keyframes {
  /* // JOUW CODE HIER
	// drie keyframes: 1x zo groot, 2x zo groot en 1x zo groot (met scale) */
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(2);
  }

  100% {
    transform: scale(1);
  }
}

li[aria-label="3-keyframes"]:hover div {
  /* // nodig: animation-name, animation-duration en animation-iteration-count */
  animation-name: --3-keyframes;
  animation-duration: 1s;
  animation-iteration-count: 3;
}

/***************/
/* 5-keyframes */
/***************/

@keyframes --5-keyframes-animation {
  /* // JOUW CODE HIER
	// 0% normale maat
	// 25% .7 x zo groot
	// 50% 1.5 x zo groot
	// 75% .7 x zo groot
	// 100% normale maat */
  0% {
    transform: scale(1);
  }
  25% {
    transform: scale(0.7);
  }
  50% {
    transform: scale(1.5);
  }
  75% {
    transform: scale(0.7);
  }
  100% {
    transform: scale(1);
  }
}

li[aria-label="5-keyframes"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count (oneindig) */
  animation-name: --5-keyframes-animation;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}

/*********/
/* delay */
/*********/

@keyframes --delay-animation {
  /* // JOUW CODE HIER
	// drie keyframes: normaal, .1em omhoog (met translate) en weer normaal */
  0% {
    translate: 0 0;
  }
  50% {
    translate: 0 -5px;
  }
  100% {
    translate: 0 0;
  }
}

li[aria-label="delay"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count
	// nu ook: animation-delay */
  animation-name: --delay-animation;
  animation-duration: 0.2s;
  animation-iteration-count: 10;
  animation-delay: 2.5s;
}

/*******************/
/* timing-function */
/*******************/

/* // JOUW CODE HIER
// twee keyframes: een rondje draaien */
@keyframes --timing-animation {
  0% {
    rotate: 0deg;
  }
  100% {
    rotate: 360deg;
  }
}

li[aria-label="timing-function"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count
	// nu ook: animation-timing-function */
  animation-name: --timing-animation;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

/********************/
/* transform-origin */
/********************/

/* // JOUW CODE HIER
// van 0turn naar 1turn draaien */
@keyframes --origin-animation {
  0% {
    rotate: 0deg;
  }
  100% {
    rotate: 360deg;
  }
}

li[aria-label="transform-origin"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count, animation-timing-function
	// nu ook: transform-origin */
  animation-name: --origin-animation;
  animation-duration: 10s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
  transform-origin: bottom;
}

/**************/
/* play-state */
/**************/

/* // JOUW CODE HIER
// drie keyframes: normaal, 1em omhoog (met translate) en weer normaal */
@keyframes --play-state-animation {
  0% {
    translate: 0 4rem;
  }

  50% {
    translate: 0 -4rem;
  }

  100% {
    translate: 0 4rem;
  }
}

li[aria-label="play-state"] div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count, animation-timing-function
	// nu ook: animation-play-state */
  animation-name: --play-state-animation;
  animation-duration: 60s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
  animation-play-state: running;
}

li[aria-label="play-state"]:hover div {
  /* // JOUW CODE HIER
	// nu ook: animation-play-state */

  animation-play-state: paused;
}

/*************/
/* direction */
/*************/

/* // JOUW CODE HIER
// drie keyframes: normaal, 1em omhoog (met translate) */
@keyframes --direction-animation {
  0% {
    translate: 0 0;
    animation-timing-function: ease-out;
  }
  100% {
    translate: 0 -1em;
    animation-timing-function: ease-in;
  }
}

li[aria-label="direction"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration, animation-iteration-count, animation-timing-function
	// nu ook: animation-direction */
  animation-name: --direction-animation;
  animation-duration: 0.5s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

/*************/
/* fill-mode */
/*************/

/* // JOUW CODE HIER
// twee keyframes: van normaal naar 10x zo groot en blur met fliter */
@keyframes --fill-mode-animation {
  0% {
    transform: scale(1);
  }
  90% {
    transform: scale(10);
    filter: blur(2em);
  }
  100% {
    opacity: 0;
  }
}

li[aria-label="fill-mode"]:hover div {
  /* // JOUW CODE HIER
	// nodig: animation-name, animation-duration
	// nu ook: animation-fill-mode
	// en ook: pointer-events */
  animation-name: --fill-mode-animation;
  animation-duration: 1s;
  animation-fill-mode: forwards;
  pointer-events: none;
}

/* 2de lijst styling */

/***********/
/* running */
/***********/

@keyframes --running-animation {
  /* // JOUW CODE HIER
  // van: positioneer de achtergrond links onder
  // naar: positioneer de achtergrond rechts boven */
  0% {
    background-position: bottom left;
  }
  100% {
    background-position: top right;
  }
}

li[aria-label="running"] button.running {
  background-image: repeating-linear-gradient(
    45deg,
    crimson 0 5%,
    hotpink 0 10%
  );

  /* // JOUW CODE HIER
  // nodig: animation-name, animation-duration, animation-iteration-count, animation-timing-function
  // en maak de achtergrond 200% x 200% groot
  background-size: 200% 200%; */
  animation-name: --running-animation;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
    background-size: 200% 200%;
}

/********/
/* dots */
/********/

@keyframes --dots-animation {
  0% {
    /* // JOUW CODE HIER
    // opacity en scale beide 0 */
    opacity: 0;
    transform: scale(0);
  }
  50% {
    /* // JOUW CODE HIER
    // opacity en scale beide 1 */
    opacity: 1;
    transform: scale(1);
  }
  100% {
    /* // JOUW CODE HIER
    // opacity en scale beide 0 */
    opacity: 0;
    transform: scale(0);
  }
}

li[aria-label="dots"] button {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.25em;
}

li[aria-label="dots"] dot {
  /* // klein rond en wit */
  width: 0.5em;
  height: 0.5em;
  background-color: white;
  border-radius: 50%;
  /* 
  // JOUW CODE HIER
  // none en doorzichtig */
  display: none;
  opacity: 0;
}

li[aria-label="dots"] button.running span {
  /* // JOUW CODE HIER
  // none */
  display: none;
}

li[aria-label="dots"] button.running dot {
  /* // JOUW CODE HIER
  // block */
  display: block;

  /* // JOUW CODE HIER
  // animation-name, animation-duration, animation-iteration-count, animation-timing-function */
  animation-name: --dots-animation;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;

  &:nth-of-type(1) {
    /* // JOUW CODE HIER
    // animation-delay 0s --> meteen beginnen */
    animation-delay: 0s;
  }

  &:nth-of-type(2) {
    /* // JOUW CODE HIER
    // animation-delay .25s --> beginnen na .25s */
    animation-delay: 0.25s;
  }

  &:nth-of-type(3) {
    /* // JOUW CODE HIER */
    /* // animation-delay .5s --> beginnen na .5s */
    animation-delay: 0.5s;
  }
}

/*********/
/* slang */
/*********/

@keyframes --slang-animation {
  /* // JOUW CODE HIER
  // van normale plek
  // naar 1em omhoog (met translate) en gold
  // terug naar normale plek */
  0% {
    translate: 0 0;
    background-color: white;
  }
  50% {
    translate: 0 -1em;
    background-color: gold;
  }
  100% {
    translate: 0 0;
    background-color: white;
  }
}

li[aria-label="slang"] button {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.1em;
}

li[aria-label="slang"] dot {
  /* // klein rond en wit */
  width: 0.5em;
  height: 0.5em;
  background-color: white;
  border-radius: 50%;

  /* // JOUW CODE HIER
  // none en doorzichtig */
  display: none;
  opacity: 0;
}

li[aria-label="slang"] button.running span {
  /* // JOUW CODE HIER
  // none */
  display: none;
}

li[aria-label="slang"] button.running dot {
  /* // JOUW CODE HIER
  // block en zichtbaar */
  display: block;
  opacity: 1;

  /* // JOUW CODE HIER
  // animation-name, animation-duration, animation-iteration-count, animation-timing-function */
  animation-name: --slang-animation;
  animation-iteration-count: infinite;
  animation-timing-function: ease-in-out;
  animation-duration: 0.7s;

  /* // alle bolletjes afzonderlijk andere delay geven */
  &:nth-of-type(1) {
    /* // JOUW CODE HIER
    // nodig: animation-delay (0s)  --> meteen beginnen */

    animation-delay: 0s;
  }
  &:nth-of-type(2) {
    /* // JOUW CODE HIER */
    /* // nodig: animation-delay --> beginnen na .1s */
    animation-delay: 0.1s;
  }
  &:nth-of-type(3) {
    /* // JOUW CODE HIER
    // nodig: animation-delay --> beginnen na .2s */
    animation-delay: 0.2s;
  }
  &:nth-of-type(4) {
    /* // JOUW CODE HIER
    // nodig: animation-delay (etc..) */
    animation-delay: 0.3s;
  }
  &:nth-of-type(5) {
    /* // JOUW CODE HIER */
    animation-delay: 0.4s;
  }
  &:nth-of-type(6) {
    /* // JOUW CODE HIER */
    animation-delay: 0.5s;
  }
  &:nth-of-type(7) {
    /* // JOUW CODE HIER */
    animation-delay: 0.6s;
  }
  &:nth-of-type(8) {
    /* // JOUW CODE HIER */

    animation-delay: 0.7s;
  }
  &:nth-of-type(9) {
    /* // JOUW CODE HIER */
    animation-delay: 0.8s;
  }
  &:nth-of-type(10) {
    /* // JOUW CODE HIER */
    animation-delay: 0.9s;
  }
}

/**********/
/* cirkel */
/**********/

@keyframes --cirkel-animation {
  /* // JOUW CODE HIER
  // met transform van
  // --> 0graden draaien --> rotate()
  // --> 1.5em omhoog bewegen --> translateY()
  // met transform naar
  // --> 360graden draaien --> rotate()
  // --> 1.5em omhoog bewegen --> translateY() */
  0% {
    transform: rotate(0deg) translateY(0.75em);
    opacity: 1;
  }
  100% {
    transform: rotate(360deg) translateY(0.75em);
    opacity: 1;
  }
}

li[aria-label="cirkel"] button {
  display: grid;
  place-items: center;
}

li[aria-label="cirkel"] dot {
  /* // klein rond en wit */
  width: 0.5em;
  height: 0.5em;
  background-color: white;
  border-radius: 50%;

  /* // met zijn allen in een gridcel */
  grid-area: 1/1;
  /* 
  // JOUW CODE HIER
  // none */
  display: none;
}

li[aria-label="cirkel"] button.running span {
  /* // JOUW CODE HIER
  // none */
  display: none;
}

li[aria-label="cirkel"] button.running dot {
  /* // JOUW CODE HIER
  // block en zichtbaar */
  display: block;
  opacity: 0;

  /* // JOUW CODE HIER
  // animation-name, animation-duration, animation-iteration-count, animation-timing-function */
  animation-name: --cirkel-animation;
  animation-duration: 6s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;

  /* // elke div een eigen negatieve delay geven */
  &:nth-of-type(1) {
    /* // JOUW CODE HIER
    // nodig: animation-delay (0 seconden) */
    animation-delay: 0;
  }
  &:nth-of-type(2) {
    /* // JOUW CODE HIER
    // nodig: animation-delay (1/6 van duration) */
    animation-delay: 1s;
  }
  &:nth-of-type(3) {
    /* // JOUW CODE HIER
		// nodig: animation-delay (2/6 van duration) */
    animation-delay: 2s;
  }
  &:nth-of-type(4) {
    /* // JOUW CODE HIER */
    animation-delay: 3s;
  }
  &:nth-of-type(5) {
    /* // JOUW CODE HIER */
    animation-delay: 4s;
  }
  &:nth-of-type(6) {
    /* // JOUW CODE HIER */
    animation-delay: 5s;
  }
}

/* standaard styling */

button {
  width: 7.5em;
  height: 2.5em;

  appearance: none;
  border: none;
  border-radius: 1.25em;
  background-color: purple;
  color: white;
  font: inherit;
}

button:hover {
  cursor: pointer;
}

button:focus-visible {
  outline: dotted 0.125rem white;
  outline-offset: -0.25rem;
}

button:active {
  translate: 0 1px;
  transition-delay: 0.15s;
}
</style>