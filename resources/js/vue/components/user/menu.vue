<template>
  <OnClickOutside @trigger="close('outside')">
    <div id="menu" class="search-section-container temp-sticky">
      <div class="user-section-title">
        <h2>{{ format_page_title(page_title) }}</h2>
      </div>
      <div class="bid-container flex justify-center items-center gap-2">
        <ion-icon name="cash"></ion-icon>
        <p>127 bids</p>
      </div>
    </div>
  </OnClickOutside>
 
</template>

<script setup>
import { onMounted } from "vue";
import { Select, initTE } from "tw-elements";
import { Sidenav } from "tw-elements";
import { OnClickOutside } from "@vueuse/components";

function close() {
  // document.getElementById("sidenav-6").style.transform = "translateX(-100%)";
}
const props = defineProps({
  page_title: String,
});
onMounted(() => {
  // close nav on click outside

  initTE({ Select });
  initTE({ Sidenav });
});
</script>

<script>
export default {
  props: ["page_title"],
  data() {
    return {
      min: 1,
      max: 100,
    };
  },
  mounted() {
    //  alert(this.page_title)
    console.log(this.page_title);
  },

  methods: {
    open_filters() {
      // document.getElementById('backdrop').style.display = "block";
    },
    format_page_title(val) {
      var title = val.replace(/_/g, " ");
      title = title.replace(/&/g, " & ");
      title = title.charAt(0).toUpperCase() + title.slice(1);
      return title;
    },
  },
  emits: [],
  props: [],
  watch: {},
};
</script>

<style scoped lang="scss">
* {
  transition: all 0.3s ease;
}

.user-section-title {
  font-size: 1.6rem;
  font-weight: 600;
  letter-spacing: 1.1px;
  padding-left: 1rem;
  color: #fff;
  text-shadow: 0 3px 2px #523d77;
  // background-color: #c17aff;
  // clip-path: polygon(0 0, 73% 0, 100% 100%, 0 100%);
  padding-right: 5rem;
  position: absolute;
  height: 100%;
  display: flex;
  align-items: center;
  left: 0;
}

.bid-container {
  font-size: 1.7rem;
  font-weight: 500;
  color: #555;
}

.custom-btn {
  width: 90%;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: "Lato", sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, 0.5),
    7px 7px 20px 0px rgba(0, 0, 0, 0.1), 4px 4px 5px 0px rgba(0, 0, 0, 0.1);
  outline: none;

  a {
    display: flex;
    width: 100%;
    text-align: center;
    justify-content: space-around;
    align-items: center;
  }
}

/* 7 */
.btn-7 {
  // background: linear-gradient(0deg, #8b58ffa0 0%, rgba(45,20,89,0.8744091386554622) 100%);
  line-height: 42px;
  padding: 0;
  border: none;
  border-radius: 10px;
  background: #806cb24a;
  color: #444;
}

.btn-7 span {
  position: relative;
  display: flex;
  width: 100%;
  height: 100%;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 0.5rem;
  font-size: 1.5rem;
  border-radius: 10px;

  ion-icon {
    font-size: 2rem;
  }
}

.btn-7:before,
.btn-7:after {
  position: absolute;
  content: "";
  right: 0;
  bottom: 0;
  background: #8b58ffa0;
  box-shadow: -7px -7px 20px 0px rgba(255, 255, 255, 0.9),
    -4px -4px 5px 0px rgba(255, 255, 255, 0.9),
    7px 7px 20px 0px rgba(0, 0, 0, 0.2), 4px 4px 5px 0px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

.btn-7:before {
  height: 0%;
  width: 2px;
}

.btn-7:after {
  width: 0%;
  height: 2px;
}

.btn-7:hover {
  color: #6c43cbf7;
  background: transparent;
}

.btn-7:hover:before {
  height: 100%;
}

.btn-7:hover:after {
  width: 100%;
}

.btn-7 span:before,
.btn-7 span:after {
  position: absolute;
  content: "";
  left: 0;
  top: 0;
  background: #8b58ffa0;
  box-shadow: -7px -7px 20px 0px rgba(255, 255, 255, 0.9),
    -4px -4px 5px 0px rgba(255, 255, 255, 0.9),
    7px 7px 20px 0px rgba(0, 0, 0, 0.2), 4px 4px 5px 0px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

.btn-7 span:before {
  width: 2px;
  height: 0%;
}

.btn-7 span:after {
  height: 2px;
  width: 0%;
}

.btn-7 span:hover:before {
  height: 100%;
}

.btn-7 span:hover:after {
  width: 100%;
}

.menu-container {
  width: 90%;
  margin: auto;
  padding: 1rem;
  background-color: #242424;
  border-radius: 20px;
  font-size: 1.4rem;
  font-weight: 400;
  color: #fff;

  p {
    margin-left: -40%;
  }

  ion-icon {
    font-size: 1.8rem;
  }
}

.backdrop {
  display: none;
}

.sticky {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  animation-name: enter_from_top;
  animation-duration: 1s;

  transform: translate(0, 0);
}

.temp-sticky {
  position: relative;
  z-index: 99;
}

.seperator {
  color: #666;
  background-color: #bcbcbc;
  height: 2px;
  width: 95%;
  text-align: center;
  margin: auto;
  margin-top: 1rem;
}

.filter-item-header {
  display: flex;
  justify-content: left;
  align-items: center;
  gap: 1rem;
}

.filters-icon {
  font-size: 1.7rem;
}

.filter-header {
  font-size: 1.7rem;
}

#sidenav-6 {
  // height: 40rem !important;
  // top: 21.2rem;
  padding-top: 3rem;
  // overflow: scroll;
  transform: translateX(-150%);
  box-shadow: rgb(0, 0, 0) 0px 1px 7px;
  border-right: 4px solid #806cb2;
  background-color: rgb(253 252 255);
  backdrop-filter: blur(2px);
  padding-bottom: 0.5rem;
  width: 320px !important;
  transition: all 0.7s cubic-bezier(0.53, -0.57, 0.37, 1.44) 0s !important;
}

.filter_item {
  gap: 1rem;
  font-size: 1.3rem;
  color: #333;
  padding: 0 1rem;
}

.cat-label {
  font-size: 1rem;
  color: #333;
}

.cat-select {
  color: #333;
}

.filter-hr {
  width: 100%;
  background-color: #0000009c;
  height: 3px;
}

.search-section-container {
  display: flex;
  align-items: center;
  justify-content: right;
  padding: 1rem;
  padding-right: 3.5rem;
  backdrop-filter: blur(9px);
  // box-shadow: 0 2px 10px;
  background: linear-gradient(
    94deg,
    var(--color-primary) 0%,
    rgba(145, 145, 146, 0.192) 100%
  );
}
</style>

