<script setup>
import { ref } from "vue";
const rotationX = ref(0);
const rotationY = ref(0);

const images = [
  "/i-love-web/img/panorama/front.png",
  "/i-love-web/img/panorama/right.png",
  "/i-love-web/img/panorama/behind.png",
  "/i-love-web/img/panorama/left.png",
  "/i-love-web/img/panorama/up.png",
  "/i-love-web/img/panorama/bottom.png",
];

function onMouseMove(e) {
  const x = e.clientX / window.innerWidth;
  const y = e.clientY / window.innerHeight;

rotationY.value = (x - 0.5) * 360
rotationX.value = (y - 0.5) * -180
}
</script>

<template>
  <div class="scene" @mousemove="onMouseMove">
    <div
      class="cube"
      :style="{
transform: `translate(-50%, -50%) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`      }"
    >
      <div
        class="face front"
        :style="{ backgroundImage: `url(${images[0]})` }"
      ></div>
      <div
        class="face right"
        :style="{ backgroundImage: `url(${images[1]})` }"
      ></div>
      <div
        class="face back"
        :style="{ backgroundImage: `url(${images[2]})` }"
      ></div>
      <div
        class="face left"
        :style="{ backgroundImage: `url(${images[3]})` }"
      ></div>
      <div
        class="face top"
        :style="{ backgroundImage: `url(${images[4]})` }"
      ></div>
      <div
        class="face bottom"
        :style="{ backgroundImage: `url(${images[5]})` }"
      ></div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.scene {
  width: 100dvw;
  height: 100dvh;
  perspective: 256px;
  overflow: hidden;
  .cube {
    width: 1024px;
    height: 1024px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform-style: preserve-3d;
    transition: transform 0.1s ease-out;
    .face {
      width: 1024px;
      height: 1024px;
      position: absolute;
      background-size: cover;
      background-position: center;
    }
  }
}


.front  { transform: rotateY(0deg)    translateZ(-512px); }
.right  { transform: rotateY(-90deg)  translateZ(-512px); } 
.back   { transform: rotateY(180deg)  translateZ(-512px); }
.left   { transform: rotateY(90deg)   translateZ(-512px); } 
.top    { transform: rotateX(-90deg)  translateZ(-512px); }
.bottom { transform: rotateX(90deg)   translateZ(-512px); }
</style>