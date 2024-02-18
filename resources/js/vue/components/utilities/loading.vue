<template>
  <Transition>
    <div id="load" class="screen">
      <span class="loader"></span>
    </div>
  </Transition>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.is-invisible {
  transition: 0.3s;
  opacity: 0;
  visibility: hidden;
}

.is-visible {
  transition: 0.3s;
  opacity: 1;
  visibility: visible;
}

.screen {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #0000006e;
  display: flex;
  align-items: center;
}

.loader {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  border: 3px solid;
  border-color: #000000 #140000 transparent transparent;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
  margin: auto;
}

.loader::after,
.loader::before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  border: 3px solid;
  border-color: transparent transparent #ff3d00 #ff3d00;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  box-sizing: border-box;
  animation: rotationBack 0.5s linear infinite;
  transform-origin: center center;
}

.loader::before {
  width: 32px;
  height: 32px;
  border-color: #fff #fff transparent transparent;
  animation: rotation 1.5s linear infinite;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotationBack {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}
</style>