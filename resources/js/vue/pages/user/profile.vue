<template>
         <!-- <page-title :title="'Profile'" ></page-title> -->

    <div class="center-container flex flex-col">
        <div class="header-container flex justify-around items-center">
            <div class="header-section flex">
                <div class="icon">
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
                <div class="content-section flex flex-col">
                    <p>Total Bids Placed</p>
                    <p>7431</p>
                </div>
            </div>
            <div class="header-section flex">
                <div class="icon"><ion-icon name="trophy"></ion-icon></div>
                <div class="content-section flex flex-col">
                    <p>Auction Wins</p>
                    <p>14</p>
                </div>
            </div>
            <div class="header-section flex">
                <div class="icon"><ion-icon name="alarm"></ion-icon></div>
                <div class="content-section flex flex-col">
                    <p>Heighest Bidder</p>
                    <p>04 : 32 : 19</p>
                </div>
            </div>
        </div>
        <div class="profile-container">
            <div class="section-head">
                <h2>Edit Profile</h2>
                <hr class="header-hr" />
            </div>
            <div class="edit-form">
                <div class="edit-row under_line">
                    <label>UserName</label><input type="text" placeholder="username" />
                </div>
                <div class="edit-row under_line">
                    <label>Email</label><input type="email" placeholder="email@yahoo.com" />
                </div>
                <div class="edit-row under_line">
                    <label>Birth Date</label><input type="text" placeholder="username" />
                </div>
                <div class="edit-row under_line">
                    <label>Password</label><input type="text" placeholder="username" />
                </div>
                <div class="edit-row under_line">
                    <label>Bio</label><textarea></textarea>
                </div>
                <div class="edit-row">
                    <button class="spin" id="spin">
                        <span>Submit</span>
                        <span>
                            <svg viewBox="0 0 24 24">
                                <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                            </svg>
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        $("button").click(function () {

            var target = $(this);
            if (target.hasClass("done")) {
                // Do nothing

            } else {
                target.addClass("processing");
                setTimeout(function () {
                    target.removeClass("processing");
                    target.addClass("done");
                }, 2200);
                setTimeout(function () {
                    target.removeClass("done");
                }, 4000);
            }
        });
    },
};
</script>

<style lang="scss" scoped>
.header-hr {
    height: 4px;
    // background: linear-gradient(99deg, rgba(176, 141, 255, 0.78) 0%, rgba(45, 20, 89, 0.8744091387) 100%);
    border: none;
    margin-top: 0.8rem;
    border-radius: 50px;
    background: linear-gradient(-45deg, #492B89, #782B89, #2B3D89, #2B8978);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
   
    transition: all .3s ease;

}

.header-container {
    // background-color:var(--color-primary-tint-4) ;
    padding: 2rem;
  box-shadow: 1px 1px 6px #aaa;
  color: var(--color-primary-tint-5);

}

.header-section {
    align-items: center;
    gap: 1rem;
    font-size: 1.5rem;
    font-weight: 500;


    .icon {
        border-right: 3px solid  var(--color-primary-tint-5);
        padding-right: 1rem;

    }

    ion-icon {
        font-size: 5.5rem;
  filter: drop-shadow(5px 5px 5px var(--color-secondary-tint-2));
  color: var(--color-primary-tint-5);
    }
}

.section-head {
    padding: 3rem;
    font-size: 1.5rem;
    font-weight: 500;
}

.edit-form {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 2rem;


    .edit-row {
        display: flex;
        align-items: start;
        justify-content: space-between;
        width: 60%;
        position: relative;

        flex-direction: row;



        // submit style

        // ----------
        @keyframes spin {
            0% {
                transform: rotateZ(0);
            }

            100% {
                transform: rotateZ(720deg);
            }
        }

        $color: #1ecd97;



        button {
            position: relative;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;

            padding: 0;
            width: 250px;
            height: 50px;
            border-radius: 25px;
            background-color: transparent;
            outline: 0;
            cursor: pointer;
            overflow: hidden;
            margin: auto;
            margin-top: 2rem;
        }

        .spin {
            border: 2px solid $color;
            color: $color;
            font-weight: 600;
            transition: all 200ms ease-in-out;

            span {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                transition: opacity 200ms ease-in-out;

                &:last-child {
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 0;
                }
            }

            svg {
                height: 30px;
                fill: $color;
            }

            &:hover {
                background-color: $color;
                color: #fff;
            }

            &.done,
            &.processing {
                pointer-events: none;
                cursor: default;
            }

            &.processing {
                width: 50px;
                border-width: 4px;
                border-right-color: #bbb;
                border-bottom-color: #bbb;

                animation: spin;
                animation-delay: 200ms;
                animation-duration: 2s;
                animation-timing-function: ease-in-out;
                animation-iteration-count: 1;

                &:hover {
                    background-color: transparent;
                }

                span:first-child {
                    opacity: 0;
                }
            }

            &.done {
                &:hover {
                    background-color: transparent;
                }

                span:first-child {
                    opacity: 0;
                }

                span:last-child {
                    opacity: 1;
                }
            }
        }


        // **********





        label {
            font-size: 1.3rem;
            font-weight: 500;
            color: #666;
        }

        input {
            border: none;
            background: #fff;
            transition: all 0.3s ease;
            border-radius: 10px;
            width: 75%;
            padding: 1rem;
            
        }

        textarea {
            border: none;
            border-radius: 10px;
            width: 75%;
            background: #fff;
        }


    }


    .under_line::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #333;
        bottom: 0;
        left: 0;
        transform: scale(0);
        transition: 0.2s all ease-out;
    }

    .under_line:hover::after {
        transform: scale(1);
    }  
}

input[type="text"]::placeholder,
input[type="email"]::placeholder{
    font-size: 1.1rem;
}

input[type="text"],
input[type="email"],
textarea {
    width: 97%;

    outline: none;
    border: none;
    padding: 10px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    color: #474747;
    font: 12px Century Gothic;

}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border: 1px solid #c17aff;
    -webkit-box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    -moz-box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    box-shadow: 21px 18px 7px 1px rgba(173, 173, 173, 0.82);
    transform: scale(1.05);
    -webkit-transition: ease .6s;
    -moz-transition: ease .6s;
    -o-transition: ease .6s;
    -ms-transition: ease .6s;
    transition: ease .6s;

}
// input[type="text"]:focus,
// input[type="email"]:focus,
// textarea:focus,
//  .under_line::after {
//         transform: scale(1);
//     }

textarea {
    height: 200px;

    width: 97%;
}
</style>
