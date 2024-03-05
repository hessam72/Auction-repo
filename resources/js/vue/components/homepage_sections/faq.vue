<template>
  <div id="help" class="section-seperator">
    <div class="divider"></div>
    <span class="and">
      <ion-icon name="help"></ion-icon>
    </span>
    <div class="divider"></div>
  </div>
  <div class="section-container">
    <h2 class="section-title">Frequently Asked Questions</h2>
    <div class="accordion">
      <div class="accordion-item">
        <input type="checkbox" id="accordion1" />
        <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and why is it
          important for
          online businesses?</label>
        <div class="accordion-item-desc">
          SEO, or Search Engine Optimization, is the practice of optimizing a
          website to improve its visibility on search engines like Google. It
          involves various techniques to enhance a site's ranking in search
          results. SEO is crucial for online businesses as it helps drive
          organic traffic, increases visibility, and ultimately leads to higher
          conversions.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion2" />
        <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it take to see
          results from
          SEO efforts?</label>
        <div class="accordion-item-desc">
          The timeline for seeing results from SEO can vary based on several
          factors, such as the competitiveness of keywords, the current state of
          the website, and the effectiveness of the SEO strategy. Generally, it
          may take several weeks to months before noticeable improvements occur.
          However, long-term commitment to SEO is essential for sustained
          success.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion3" />
        <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key components of a
          successful
          SEO strategy?</label>
        <div class="accordion-item-desc">
          A successful SEO strategy involves various components, including
          keyword research, on-page optimization, quality content creation, link
          building, technical SEO, and user experience optimization. These
          elements work together to improve a website's relevance and authority
          in the eyes of search engines.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion4" />
        <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How does mobile optimization impact
          SEO?</label>
        <div class="accordion-item-desc">
          Mobile optimization is crucial for SEO because search engines
          prioritize mobile-friendly websites. With the increasing use of
          smartphones, search engines like Google consider mobile responsiveness
          as a ranking factor. Websites that provide a seamless experience on
          mobile devices are more likely to rank higher in search results.
        </div>
      </div>

    </div>

    <div class="more-container">
       <router-link :to="{name:'help'}">
      <button class="more-btn">
        More Questions? <ion-icon name="share-alt"></ion-icon>
      </button> </router-link>
    </div>
  </div>
</template>
  
<script>
export default {};
</script>
  
<style lang="scss" scoped>
.accordion {
  display: flex;
  flex-direction: column;
  font-family: "Sora", sans-serif;
  max-width: 80%;
  min-width: 320px;
  margin: 50px auto;
  padding: 0 50px;
}

.accordion h1 {
  font-size: 32px;
  text-align: center;
}

.accordion-item {
  margin-top: 16px;
  border: 1px solid #fcfcfc;
  border-radius: 6px;
  background: #ffffff;
  box-shadow: 0 4px 8px #80808085;
  border-radius: 30px;
}

.accordion-item .accordion-item-title {
  position: relative;
  margin: 0;
  display: flex;
  width: 100%;
  font-size: 15px;
  cursor: pointer;
  justify-content: space-between;
  flex-direction: row-reverse;
  padding: 14px 20px;
  box-sizing: border-box;
  align-items: center;
}

.accordion-item .accordion-item-desc {
  display: none;
  font-size: 14px;
  line-height: 22px;
  font-weight: 300;
  color: #444;
  border-top: 1px dashed #ddd;
  padding: 10px 20px 20px;
  box-sizing: border-box;
}

.accordion-item input[type="checkbox"] {
  position: absolute;
  height: 0;
  width: 0;
  opacity: 0;
}

.accordion-item input[type="checkbox"]:checked~.accordion-item-desc {
  display: block;
}

.accordion-item input[type="checkbox"]:checked~.accordion-item-title .icon:after {
  content: "-";
  font-size: 20px;
}

.accordion-item input[type="checkbox"]~.accordion-item-title .icon:after {
  content: "+";
  font-size: 20px;
}

.accordion-item:first-child {
  margin-top: 0;
}

.accordion-item .icon {
  margin-left: 14px;
}

@media screen and (max-width: 767px) {
  .accordion {
    padding: 0 16px;
  }

  .accordion h1 {
    font-size: 22px;
  }
}


</style>