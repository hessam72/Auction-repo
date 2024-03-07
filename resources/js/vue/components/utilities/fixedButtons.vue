<template>
    <div class="btn-container">
        <!-- <div class="chat-btn">
            <ion-icon name="chatbubbles"></ion-icon>
        </div> -->
        <ul>
  <li style="--i:#56CCF2;--j:#2F80ED;">
    <span class="icon">💬</span>
    <span class="title">Live Chat</span>
  </li>
</ul>

        <!-- <div id="up_btn" @click="goToTop" class="up-btn hidden">
            <ion-icon name="arrow-up"></ion-icon>
        </div> -->
        <button id="up_btn" @click="goToTop" class="button">
            <svg class="svgIcon" viewBox="0 0 384 512">
                <path
                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                </path>
            </svg>
        </button>

    </div>
</template>

<script>
import { init_sticky_up_button } from "@/modules/utilities/sticky.js";

export default {
    methods: {
        goToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });

        }
    },
    mounted() {
         init_sticky_up_button();
    }
};
</script>

<style lang="scss" scoped>
.btn-container {
    display: flex;
    justify-content: space-between;

    z-index: 9999;
    position: fixed;
    height: 5rem;
    width: 100%;
    bottom: 1.5rem;
    align-items: center;
    padding: 1rem 2rem;
    z-index: 2;

    div {
        padding: 1.5rem;
        border-radius: 90px;
        background-color: #e8e8e899;
        width: 6rem;
        height: 6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #351d62;
        box-shadow: 0 2px 10px #4b6fa8;
        cursor: pointer;
        transition: all .3s ease;

    }

    div:hover {
        background-color: #271849d1;
        color: #fff;
        box-shadow: 0 10px 20px #5d8bd4;

    }

    .up-btn:hover {
        animation: bounce2 2s;
    }

    .chat-btn:hover {
        animation: pulse 1s infinite ease-in-out alternate;

    }

    .hidden {


        display: none;
    }

}
.button {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 0px 4px rgba(180, 160, 255, 0.253);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
}

.svgIcon {
  width: 12px;
  transition-duration: 0.3s;
}

.svgIcon path {
  fill: white;
}

.button:hover {
  width: 140px;
  border-radius: 50px;
  transition-duration: 0.3s;
  background: linear-gradient(45deg, var(--color-primary-tint-7), var(--color-secondary));
  align-items: center;
}

.button:hover .svgIcon {
  /* width: 20px; */
  transition-duration: 0.3s;
  transform: translateY(-200%);
}

.button::before {
  position: absolute;
  bottom: -20px;
  content: "Back to Top";
  color: white;
  /* transition-duration: .3s; */
  font-size: 0px;
}

.button:hover::before {
  font-size: 13px;
  opacity: 1;
  bottom: unset;
  /* transform: translateY(-30px); */
  transition-duration: 0.3s;
}


// chat btn
ul {
  position: relative;
  display: flex;
  gap: 25px;
}

ul li {
  position: relative;
  list-style: none;
  width: 60px;
  height: 60px;
   background-color: rgb(20, 20, 20);
  border-radius: 60px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
    box-shadow: 0px 0px 0px 4px rgba(180, 160, 255, 0.253);
  transition: 0.5s;
}

ul li:hover {
  width: 180px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0);
}

ul li::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 60px;
  background: linear-gradient(45deg, var(--color-primary-tint-7), var(--color-secondary));
  opacity: 0;
  transition: 0.5s;
}

ul li:hover::before {
  opacity: 1;
}

ul li::after {
  content: "";
  position: absolute;
  top: 10px;
  width: 100%;
  height: 100%;
  border-radius: 60px;
  background: linear-gradient(45deg, var(--color-primary-tint-7), var(--color-secondary));
  transition: 0.5s;
  filter: blur(15px);
  z-index: -1;
  opacity: 0;
}

ul li:hover::after {
  opacity: 0.5;
}

ul li .icon {
  color: #777;
  font-size: 1.75em;
  transition: 0.5s;
  transition-delay: 0.25s;
}

ul li:hover .icon {
  transform: scale(0);
  color: #fff;
  transition-delay: 0s;
}

ul li span {
  position: absolute;
}

ul li .title {
  color: #fff;
  font-size: 1.1em;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  transform: scale(0);
  transition: 0.5s;
  transition-delay: 0s;
}

ul li:hover .title {
  transform: scale(1);
  transition-delay: 0.25s;
}

</style>
