<template>


    <div class="info-container relative flex flex-col">
        <OnClickOutside @trigger="close('outside')">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <ion-icon class="icon" name="help-circleddd"></ion-icon>
                            <span class="title">Menu</span>
                        </a>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'profile' }">
                            <ion-icon class="icon" name="home"></ion-icon>
                            <span class="title">Profile</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'challenges' }">
                            <ion-icon class="icon" name="gift"></ion-icon>
                            <span class="title">Challenges</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'bookmarks' }">
                            <ion-icon class="icon" name="bookmark"></ion-icon>
                            <span class="title">Bookmarks</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'wins&shipping' }">
                            <ion-icon class="icon" name="trophy"></ion-icon>
                            <span class="title">Wins & shipping</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'buy_it_now' }">
                            <ion-icon class="icon" name="cart"></ion-icon>
                            <span class="title">Buy It Now</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link @click="close('outside')" :to="{ name: 'support' }">
                            <ion-icon class="icon" name="help-circle"></ion-icon>
                            <span class="title">Support</span>
                        </router-link>
                    </li>
                   
                </ul>

            </div>
            <div class="toggle"></div>
        </OnClickOutside>
        <div class="size">
            <div class="pic-container relative">
                <ion-icon class="edit-icon" name="create"></ion-icon>
                <div class="border-wrap">
                    <img class="user_img" :src="'/storage/images/user_profiles/150-11.jpg'" />
                </div>
            </div>
            <hr class="pic-hr" />
            <div class="user-info">
                <div class="row"><ion-icon name="contact"></ion-icon>
                    <p>Sara Connor</p>
                </div>
                <hr />
                <div class="row"><ion-icon name="at"></ion-icon>
                    <p>Sara@email.com </p>
                </div>
                <hr />
                <div class="row"><ion-icon name="gift"></ion-icon>
                    <p>02/12/24 </p>
                </div>
                <hr />
                <div class="row"><ion-icon name="pin"></ion-icon>
                    <p>Miami </p>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { onMounted } from "vue";
import { OnClickOutside } from "@vueuse/components";

function close() {
    //   document.getElementById("sidenav-6").style.transform = "translateX(-100%)";
    console.log('closing')
    $(".navigation").removeClass("active");
}

onMounted(() => {
    // // sticky filters
    // init_sticky_nav();
    // sidebar
    $(".toggle").click(function () {
        console.log(82628)
        $(".navigation").toggleClass("active");
    });




});
</script>
<script>
export default {
   
}
</script>
<style lang="scss" scoped>
.edit-icon{
    font-size: 1.5rem;
    padding: 0.6rem;
    border-radius: 60px;
    background-color: #c17aff;
    color: #dedede;
    position: absolute;
    bottom: -0.4rem;
    right: -0.5rem;
    box-shadow: 0 2px 8px #eee;
    cursor: pointer;
    transition: all .3 ease;
}
.edit-icon:hover{
    background-color: #dedede;

    color: #c17aff;

}
.info-container {

    width: 25%;
    padding: 2rem 0;
    border-right: 3px solid #846cbc;
    background-color: #27184a;
    padding-left: 3rem;
    color: #fff;

}

.size {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 1rem;
    padding-left: 0.6rem;
    margin-bottom: 1rem;
    // border-bottom: 1.8px solid #999;
    padding-bottom: 0.8rem;
    flex-direction: column;
    .pic-hr {
        height: 4px;
        background: linear-gradient(99deg, rgb(176 141 255 / 78%) 0%, rgba(45, 20, 89, 0.8744091386554622) 100%);
        border: none;
        border-radius: 30px;
        width: 70%;
        margin: auto;

    }

}

.pic-container {
    position: relative;
    display: flex;
    justify-content: start;
    gap: 0.5rem;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1rem;

    .title {
        // padding-top: 1.5rem;
        z-index: 1;

        .name {
            font-size: 1.1rem;
            color: #fff;
            font-weight: 500;
        }

        .winner {
            font-size: 0.8rem;
            color: #ddd;
        }
    }

    .border-wrap {

        background: linear-gradient(to right, rgb(99 80 215), rgb(236 236 236));

        border-radius: 100px;

        .user_img {
            width: 8rem;
            border-radius: 200px;
            height: 8rem;
            // filter: grayscale(100%);
            box-shadow: 0 3px 5px rgb(115 114 114);
            color: white;
            padding: 0.15rem;
            text-align: center;
        }
    }

    .quote-icon {
        opacity: 0.071;
        position: absolute;
        top: 0;
        right: -1rem;
        width: 5rem;
        height: 5rem;
    }
}

.user-info {
    text-align: center;
    padding-left: 0.7rem;
    display: flex;
    flex-direction: column;
    gap: 1.3rem;
    margin-top: 2rem;

    hr {
        height: 4px;
        background: linear-gradient(99deg, rgb(176 141 255 / 78%) 0%, rgba(45, 20, 89, 0.8744091386554622) 100%);
        border: none;
        border-radius: 30px;

    }

    .row {
        display: flex;
        justify-content: left;
        align-items: center;
        gap: 1rem;
        font-size: 1.3rem;
        font-weight: 500;

        ion-icon {
            font-size: 2.5rem;
            background: linear-gradient(99deg, rgba(139, 88, 255, 0.6279105392156863) 0%, rgba(45, 20, 89, 0.8744091386554622) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    }

}



</style>

<style scoped lang="scss">
// side bar css


.navigation {
    position: absolute;
    inset: 20px;
    background: #27184aa6;
    width: 80px;
    border-left: 10px solid rgba(17, 34, 17, 0.1333333333);
    overflow: hidden;
    box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.25);
    transition: 0.5s;
    z-index: 99;
    left: 0;
    height: 100%;
    top: 0;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    overflow-y: scroll;
    -ms-overflow-style: none;
    scrollbar-width: none;
    backdrop-filter: blur(9px);


}

.navigation::-webkit-scrollbar {
    display: none;
    /* Safari and Chrome */
}

.navigation ul li {
    margin: .5rem 0;
}

.navigation.active {
    width: 100%;
    // border-radius: 20px;
}

.toggle {
    position: absolute;
    left: 3%;
    width: 60px;
    height: 60px;
    background: #f1e1ff;
    border-radius: 50%;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 99;
    color: #c17aff;
}

.toggle:hover {
    background: #9d2cff;
    transition: all 0.3s ease;
}

.toggle::before,
.toggle::after {
    content: "";
    position: absolute;
    width: 26px;
    height: 3px;
    border-radius: 3px;
    background: #282828;
    transition: 1s;
}

.toggle::before {
    transform: translateY(-5px);
}

.toggle::after {
    transform: translateY(5px);
}

.navigation.active .toggle::before {
    transform: translateY(0px) rotate(-405deg);
}

.navigation.active .toggle::after {
    transform: translateY(0px) rotate(225deg);
}

.navigation ul {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.navigation ul li {
    position: relative;
    list-style: none;
    width: 100%;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}

.navigation ul li:hover {
    background: #c17aff;
    color: #222;
}

.navigation ul li:nth-child(1) {
    top: 20px;
    margin-bottom: 40px;
    background: none;
}
.navigation ul li:not(:first-child){
    margin:2rem 0;
}
.navigation ul li:not(:first-child):hover::before,
.navigation ul li:not(:first-child):hover::after {
    content: "";
    position: absolute;
    right: 0;
    width: 20px;
    height: 20px;
    background: transparent;
}

.navigation ul li:not(:first-child):hover::before {
    top: -20px;
    border-bottom-right-radius: 20px;
    box-shadow: 7.5px 7.5px 0 7.5px #c17aff;
}

.navigation ul li:not(:first-child):hover::after {
    bottom: -20px;
    border-top-right-radius: 20px;
    box-shadow: 7.5px -7.5px 0 7.5px #c17aff;
}

.navigation ul li a {
    position: relative;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: #c17aff;
    font-weight: 400;
}

.navigation ul li:hover:not(:first-child) a {
    color: #f1f1f1;
}

.navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 50px;
    height: 50px;
    line-height: 70px;
    text-align: center;
    margin-right: 1rem;
    margin-left: 0.3rem;
    margin-top: 0.3rem;
}

.navigation ul li a .icon i {
    font-size: 1.75em;
}

.navigation ul li a .title {
    position: relative;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 60px;
    text-align: start;
    white-space: nowrap;
    font-size: 1.3rem;
    font-weight: 500;
}

/* Themes */


.purple {
    background-color: #c17aff;
}

.theme.select {
    outline: 1px solid rgba(193, 122, 255, 0.37);
    border: 3px solid #b055ff;
    animation: outline 2.5s linear infinite;
}

.purple.select {
    border-color: #fff;
}

@keyframes outline {
    0% {
        outline-width: 1px;
    }

    50% {
        outline-width: 5px;
    }

    80% {
        outline-width: 2px;
    }

    100% {
        outline-width: 1px;
    }
}

body.darked {
    background-color: #111;
}

body.lighted,
body.lighted .toggle {
    background-color: #9d2cff;
}

body.lighted .navigation {
    background-color: #f1f1f1;
}

body.lighted .navigation ul li a {
    color: #9d2cff;
}

body.lighted .toggle::after,
body.lighted .toggle::before {
    background: #f1f1f1;
}

body.lighted .navigation ul li:not(:first-child):hover {
    background: #9d2cff;
}

body.lighted .navigation ul li:not(:first-child):hover::before {
    box-shadow: 7.5px 7.5px 0 7.5px #9d2cff;
}

body.lighted .navigation ul li:not(:first-child):hover::after {
    box-shadow: 7.5px -7.5px 0 7.5px #9d2cff;
}

body.purpled {
    background-color: #f1f1f1;
}

body.purpled .navigation {
    background-color: #9d2cff;
}

body.purpled .navigation ul li a {
    color: #f1f1f1;
}

body.purpled .navigation ul li:not(:first-child):hover {
    background: #f1f1f1;
}

body.purpled .navigation ul li:not(:first-child):hover a {
    color: #9d2cff;
}

body.purpled .navigation ul li:not(:first-child):hover::before {
    box-shadow: 7.5px 7.5px 0 7.5px #f1f1f1;
}

body.purpled .navigation ul li:not(:first-child):hover::after {
    box-shadow: 7.5px -7.5px 0 7.5px #f1f1f1;
}

body.purpled .toggle {
    background: #f1f1f1;
}

body.purpled .toggle::after,
body.purpled .toggle::before {
    background: #9d2cff;
}

/* Tutorial Link */

.watch {
    text-decoration: none;
    color: #fff;
    background: #ff0000;
    cursor: pointer;
    padding: 10px 22px;
    font-size: 22px;
    font-family: cursive;
    border-radius: 8px;
    position: absolute;
    bottom: 15px;
    right: 30px;
}

 .router-link-exact-active{
    color:#fff !important;
    ion-icon{
        color: #fff;
  background-color: #c17aff;
  border-radius: 50px;
  padding: .4rem;
  margin-left: 0rem !important;
    }
}
</style>
