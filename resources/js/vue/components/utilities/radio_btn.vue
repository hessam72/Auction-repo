<template>
    <div class="radio-form">
        <input
            v-model="radioValue"
            checked=""
            value="latest"
            name="hopping"
            type="radio"
            id="a"
        />
        <label for="a"><span></span>Latest</label>
        <input
            v-model="radioValue"
            value="most_popular"
            name="hopping"
            type="radio"
            id="b"
        />
        <label for="b"><span></span>Most Popular</label>
        <input
            v-model="radioValue"
            value="live"
            name="hopping"
            type="radio"
            id="c"
        />
        <label for="c"><span></span>Live</label>
        <input
            v-model="radioValue"
            value="starting_soon"
            name="hopping"
            type="radio"
            id="d"
        />
        <label for="d"><span></span> Starting Soon</label>
        <div class="worm">
            <div class="worm__segment"></div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            radioValue: "latest",
        };
    },
    methods: {
        sendValue() {},
    },
    watch: {
        radioValue(val) {
          this.$emit('setRadio' , val)
        },
    },
};
</script>
<style lang="scss" scoped>
.radio-form {
    display: block;
    position: relative;
    margin: 2rem;
    font-size: 1.2rem;
    font-weight: 400;
}

.radio-form input {
    position: fixed;
    top: -1.5em;
    left: -1.5em;
}

.radio-form label {
    cursor: pointer;
    display: block;
    font-weight: bold;
    text-shadow: 0 0.1em 0.1em rgba(0, 0, 0, 0.2);
    transition: color 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95);
}

.radio-form label:not(:last-of-type) {
    margin-bottom: 1.5em;
}

.radio-form label span {
    box-shadow: 0 0 0 0.2em currentColor inset, 0 0.2em 0.2em rgba(0, 0, 0, 0.2),
        0 0.3em 0.2em rgba(0, 0, 0, 0.2) inset;
    display: inline-block;
    margin-right: 0.5em;
    vertical-align: bottom;
    border-radius: 50%;
    width: 1.5em;
    height: 1.5em;
    transition: transform 0.2s cubic-bezier(0.5, 0, 0.5, 2),
        box-shadow 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95),
        color 0.2s cubic-bezier(0.45, 0.05, 0.55, 0.95);
}

.radio-form input:checked + label,
.radio-form input:checked + label span {
    color: #255ff4;
}

.radio-form input:checked + label,
.radio-form input:checked + label span {
    transition-delay: 0.4s;
}

.radio-form label span {
    transform: scale(1.2);
}

.radio-form .worm {
    top: 0.53em;
    left: 0.375em;
    position: absolute;
}

.radio-form .worm__segment {
    position: absolute;
    top: 0;
    left: 0;
    width: 0.75em;
    height: 0.75em;
    border-radius: 50%;
    transition: transform 0.4s cubic-bezier(0.45, 0.05, 0.55, 0.95);
}

.radio-form .worm__segment:before {
    animation-duration: 0.4s;
    animation-timing-function: cubic-bezier(0.45, 0.05, 0.55, 0.95);
    background: currentColor;
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.radio-form .worm__segment:first-child:before,
.radio-form .worm__segment:last-child:before {
    box-shadow: 0 0 1em 0 currentColor;
}

@keyframes hop1 {
    from,
    to {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-1.5em);
    }
}

@keyframes hop2 {
    from,
    to {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-1.5em);
    }
}

@keyframes hop3 {
    from,
    to {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-1.6em);
    }
}
@keyframes hop4 {
    from,
    to {
        transform: translateX(0);
    }

    50% {
        transform: translateX(-1.5em);
    }
}

.radio-form input:nth-of-type(1):checked ~ .worm .worm__segment {
    transform: translateY(0);
}

.radio-form input:nth-of-type(1):checked ~ .worm .worm__segment:before {
    animation-name: hop1;
}

.radio-form input:nth-of-type(2):checked ~ .worm .worm__segment {
    transform: translateY(3em);
}

.radio-form input:nth-of-type(2):checked ~ .worm .worm__segment:before {
    animation-name: hop2;
}

.radio-form input:nth-of-type(3):checked ~ .worm .worm__segment {
    transform: translateY(6.2em);
}

.radio-form input:nth-of-type(3):checked ~ .worm .worm__segment:before {
    animation-name: hop3;
}
.radio-form input:nth-of-type(4):checked ~ .worm .worm__segment {
    transform: translateY(9.25em);
}

.radio-form input:nth-of-type(4):checked ~ .worm .worm__segment:before {
    animation-name: hop4;
}

@media screen and (prefers-color-scheme: dark) {
    .radio-form input:checked + label,
    .radio-form input:checked + label span,
    .radio-form .worm__segment:before {
        color: var(--color-secondary);
    }
}
</style>
