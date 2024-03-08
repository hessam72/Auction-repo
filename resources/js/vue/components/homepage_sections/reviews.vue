<template>
  <div id="reviews" class="section-seperator">
    <div class="divider"></div>
    <span class="and">
      <ion-icon name="quote"></ion-icon>
      <!-- <ion-icon name="heart"></ion-icon> -->
    </span>
    <div class="divider"></div>
  </div>
  <div class="section-container">
    <h2 class="section-title">
      What our
      <h2 style="display: inline; color: var(  --color-secondary)">Clients say?</h2>
    </h2>

    <main>
      <div style="position: relative" class="review_slider">
        <div class="buttons">
          <div class="previous">
            <ion-icon name="arrow-dropleft-circle"></ion-icon>
          </div>
          <div class="next">
            <ion-icon name="arrow-dropright-circle"></ion-icon>
          </div>
        </div>
        <TransitionGroup name="list" tag="ul">
          <div :key="1" class="review_slide">
            <div class="testimonial">
              <blockquote>
                “ I’ve been interested in coding for a while but never taken the
                jump, until now. I couldn’t recommend this course enough. I’m
                now in the job of my dreams and so excited about the future. ”
              </blockquote>
              <p class="author">
                Tanya Sinclair
                <span>UX Engineer</span>
              </p>
            </div>

            <div class="slider-img">
              <img
                src="https://alcs-slider.netlify.app/images/image-tanya.jpg"
                alt="Author Image"
              />
            </div>
          </div>

          <div :key="2" class="review_slide">
            <div class="testimonial">
              <blockquote>
                “ If you want to lay the best foundation possible I’d recommend
                taking this course. The depth the instructors go into is
                incredible. I now feel so confident about starting up as a
                professional developer. ”
              </blockquote>
              <p class="author">
                John Tarkpor
                <span>Junior Front-end Developer</span>
              </p>
            </div>

            <div class="slider-img">
              <img
                src="https://alcs-slider.netlify.app/images/image-john.jpg"
                alt="Author Image"
              />
            </div></div
        >
      
       
      
      </TransitionGroup>
      </div>
    </main>
    <!-- <div class="more-container">
            <button class="more-btn">
                View All <ion-icon name="share-alt"></ion-icon>
            </button>
        </div> -->
  </div>
</template>
<script>
export default {
  mounted: function () {
    const next = document.querySelector(".next");
    const prev = document.querySelector(".previous");
    const slides = document.querySelectorAll(".review_slide");

    let index = 0;
    display(index);

    function display(index) {
      slides.forEach((slide) => {
        slide.style.display = "none";
      });
      slides[index].classList.add('show');
      slides[index].style.display = "flex";
    }

    function nextSlide() {
      index++;
      if (index > slides.length - 1) {
        index = 0;
      }
      display(index);
    }

    function prevSlide() {
      index--;
      if (index < 0) {
        index = slides.length - 1;
      }
      display(index);
    }

    next.addEventListener("click", nextSlide);
    prev.addEventListener("click", prevSlide);
  },
};
</script>

<style lang="scss" scoped>
main {
  width: 100%;
  max-width: 1440px;
  // padding: 16px;

  .review_slider {
    .buttons {
      div ion-icon {
        color: #6350d7;
        font-size: 1.8rem;
      }
      z-index: 1;
      right: 50%;
      top: 261px;
      width: 80px;
      height: 40px;
      position: absolute;
      border-radius: 50px;
      transform: translateX(50%);
      // background-color: pink;

      .previous,
      .next {
        width: 50%;
        height: 100%;
        position: absolute;
        background-repeat: no-repeat;
        background-position: center;
        cursor: pointer;
      }

      .previous {
        left: 0;
        //background-image: url("https://alcs-review_slider.netlify.app/images/icon-prev.svg");

        &:hover {
          transform: scale(1.25);
        }
      }

      .next {
        right: 0;
        //background-image: url("https://alcs-review_slider.netlify.app/images/icon-next.svg");

        &:hover {
          transform: scale(1.25);
        }
      }
    }

    .review_slide {
      display: flex;
      margin: 0 auto;
      text-align: center;
      align-items: center;
      justify-content: center;
      flex-direction: column-reverse;
      width: 100%;
      background-color: #f000;
      border: none;
      box-shadow: none;
      .testimonial {
        padding: 32px 51px;
        background-size: 60px;
        background-position: top;
        background-repeat: no-repeat;
        background-image: url(https://alcs-slider.netlify.app/images/pattern-quotes.svg);

        blockquote {
          font-size: 18px;
          font-weight: 300;
          line-height: 24px;
          margin-bottom: 36px;
        }

        .author {
          font-size: 15px;
          // font-weight: $font-700;

          span {
            display: block;
            color: skyblue;
            font-weight: 500;
          }
        }
      }

      .slider-img {
        width: 100%;
        padding: 30px;
        display: flex;
        margin-bottom: 40px;
        align-items: center;
        justify-content: center;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url(https://alcs-slider.netlify.app/images/pattern-bg.svg);

        img {
          width: 240px;
          display: block;
          border-radius: 10px;
          box-shadow: 0px 16px 40px 0px rgba(135, 105, 210, 0.4);
        }
      }

      .active {
        opacity: 1;
        transform: translateX(0) scale(1);
        transition-delay: 0.4s;
      }
    }
  }
}

.hide {
  display: none;
}
.list-enter-active,
.list-leave-active {
  transition: all 0.5s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: translateX(30px);
}


.show{
  animation: slide-in-fwd-center .8s linear 0s 1 normal none;
}


@media screen and (min-width: 600px) {
  main {
    max-width: 800px;

    .review_slider {
      .buttons {
        top: 280px;
      }
    }
  }
}

@media screen and (min-width: 900px) {
  main {
    width: 100%;
    max-width: 1054px;
    // padding: 64px 64px 64px 0;
    margin: auto;
    .review_slider {
      .buttons {
        right: 20%;
        // top: 75%;
      }

      .review_slide {
        position: relative;
        text-align: left;
        display: flex;
        flex-direction: row;

        .testimonial {
          padding: 32px 0 0 0;
          background-size: 80px;
          background-position: 19% -7%;
          transform: translateX(100px);

          blockquote {
            font-size: 24px;
            line-height: 30px;
          }

          .author {
            span {
              display: contents;
            }
          }
        }

        .slider-img {
          padding: 55px;

          img {
            width: 400px;
          }
        }
      }
    }
  }
}
</style>
