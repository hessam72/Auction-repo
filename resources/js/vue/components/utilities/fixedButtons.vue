<template>
    <div class="btn-container">
        <div class="chat-btn">
            <ion-icon name="chatbubbles"></ion-icon>
        </div>
        <div @click="goToTop" class="up-btn">
            <ion-icon name="arrow-up"></ion-icon>
        </div>
    </div>
</template>
<script>
export default {
    methods:{
        goToTop(){
            window.scrollTo({top: 0, behavior: 'smooth'});

        }
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
    .up-btn:hover{
        animation: bounce2 2s ;
    }
    .chat-btn:hover{
        animation: pulse 1s infinite ease-in-out alternate;

    }

}



</style>
