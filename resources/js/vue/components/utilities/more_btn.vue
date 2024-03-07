<template>
    <button class="button">
        <svg style="    fill: var(--color-primary-tint-0);" class="svgIcon" viewBox="0 0 512 512" height="1.2em"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm50.7-186.9L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z">
            </path>
        </svg>
        <router-link :to="{name:url_name}"> Explore</router-link>
    </button>
</template>
<script>
export default {
    props:["url_name"]
}
</script>
<style lang="scss" scoped>
.button {

    font-size: 1.3rem;
    width: 14rem;
    height: 3.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--color-primary-tint-6);
    border-radius: 30px;
    color: #eee;
    font-weight: 600;
    border: none;
    position: relative;
    cursor: pointer;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.37);
    transition-duration: 0.5s;
    margin: auto;
    margin-top: 1rem;
    gap: 0.8rem;
}

.svgIcon {
    height: 29px;
    transition-duration: 1.5s;
}

.bell path {
    fill: rgb(245, 245, 245);
}

.button:hover {
    background-color: var(--color-primary-tint-7);
    transition-duration: .5s;
}

.button:active {
    transform: scale(0.97);
    transition-duration: .2s;
}

.button:hover .svgIcon {
    transform: rotate(250deg);
    transition-duration: 1.5s;
}
</style>