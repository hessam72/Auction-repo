<template>
    <div class="info-container flex flex-col">
        <div class="size">
            <div class="pic-container">
                <div class="border-wrap">
                    <img class="user_img" :src="'/storage/images/user_profiles/150-11.jpg'" />
                </div>
            </div>
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

<script></script>

<style lang="scss" scoped>
.info-container {
   
   
    width: 20%;
    padding: 2rem 0;
    border-right: 3px solid #846cbc;
    background-color: #eee;

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
    gap: 2rem;
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
        gap: 1.5rem;
        font-size: 1.5rem;
        font-weight: 500;

        ion-icon {
            font-size: 2rem;
            background: linear-gradient(99deg, rgba(139, 88, 255, 0.6279105392156863) 0%, rgba(45, 20, 89, 0.8744091386554622) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    }

}
</style>