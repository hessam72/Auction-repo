<template>
     <!-- <QuillEditor v-model="text" theme="snow" /> -->
    <div class="product-info-container flex flex-col">
        <div class="product-header flex items-center justify-between">
            <h2>{{ product.title }}</h2>
            <h2>${{ product.price }}</h2>
        </div>
        <div class="product-content">
            <QuillEditor  :content="generateRichText(product.description)" :readOnly="true"  contentType="delta" theme="" />
            <!-- <p>{{ generateRichText(product.description) }}</p> -->
        </div>
    </div>
</template>
<script>
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
export default {
    props: ["product" , "text"],
    mounted() {
        // this.generateRichText(this.product.description)
    },
    data() {
        return {
            richTexh:{},
        }
    },
    methods: {
        generateRichText(data) {
            
            var d = JSON.parse(data);

            var contents = [];
            for (var i = 0; i < d.ops.length; i++) {
                if (d.ops[i].insert === null) {
                    // continue;
                    contents.push({
                        insert: "\n",
                        attributes: d.ops[i].attributes,
                    });
                } else if (d.ops[i].attributes === undefined) {
                    contents.push({
                        insert: d.ops[i].insert,
                    });
                } else if (
                    d.ops[i].insert === null ||
                    d.ops[i].attributes === undefined
                ) {
                    contents.push({
                        insert: "\n",
                    });
                } else {
                    contents.push({
                        insert: d.ops[i].insert,
                        attributes: d.ops[i].attributes,
                    });
                }
            }
            console.log("contents");
            console.log(contents);
            return contents;
        },
    },
    components:{
        QuillEditor
    }
};
</script>
<style scoped lang="scss">
.product-info-container {
    padding-top: 3rem;
    border-top: 1.5px solid #777;
    width: 95%;
    margin: 3rem auto;
    background-color: #fcfcfc;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 3px 10px #aaa;
    .product-header {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 2rem;
    }
    .product-content {
        p {
            font-size: 1.25rem;
            line-height: 2.5rem;
            text-align: justify;
        }
    }
}
</style>
