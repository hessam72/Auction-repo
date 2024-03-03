<template>
  <input
    ref="file"
    @change="onFileChanged($event)"
    id="file"
    type="file"
    placeholder="در صورت نیاز، فایل تصویری خود را آپلود کنید"
    class="file-input"
    @click="showFileName = true"
  />

  <button @click="submitTicket">submit image</button>
</template>
  <script>
import { sendPost, sendFormData , updateFormData } from "@/modules/api.js";
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

export default {
  data() {
    return {
      is_loading: false,
      inputFile: null,
      showModal: false,
      enteredName: "",
      chosenRating: null,
      invalidInput: false,
      error: null,
      databaseUrl: "user/info",
      updateUserUrl: "user/update",
    };
  },

  computed: {
    ...mapGetters(["baseUrl", "storedAuctions", "findAuction"]),
  },

  // emits: ['survey-submit'],
  methods: {
    onFileChanged(event) {
      this.inputFile = event.target.files[0];
    },
    submitTicket() {
      let myFile = this.inputFile;
      const formData = new FormData();

      formData.append("image", myFile);
      // formData.append("_method", "PUT");
      console.log(formData.get("image"));

      sendFormData(
        this.baseUrl + "auctions/test-image",

        formData, //body
        {
          
          Accept: "application/json",
        } //headers
      )
        .then((data) => {
          console.log(data);

          //redirect to ticket list
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    // if (this.user.name === null && this.user.wallet_amount === null) {
  },
  mounted() {},

  components: {},
};
</script>
  
  <style lang="scss" scoped>
.profile-container {
  position: relative;

  ion-icon {
    position: absolute;
    padding: 0.5rem;
    background-color: #fba629;
    border-radius: 50px;
    color: #222;
    left: 0rem;
    bottom: 0;
    cursor: pointer;
  }
  .profile-pic {
    border-radius: 100px;
    width: 12rem;
    height: 12rem;
  }
}
.action-btn {
  display: flex;
  align-items: center;
  gap: 1rem;
  a,
  button {
    padding: 0.8rem 2rem;
    border: none;
    border-radius: 50px;
    cursor: pointer;
  }
}

.right {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: start;
  gap: 2rem;
  width: 25%;
  margin-top: 3rem;
  font-size: 1.6rem;
  font-weight: bold;
  border-left: 1px solid #aaa;

  & div {
    display: flex;
    align-items: center;
    justify-content: right;
    gap: 1.5rem;
    & ion-icon {
      width: 2rem;
      height: 2rem;
    }
  }
  a,
  button {
    color: #111;
    font-size: 1.5rem;
    text-decoration: none;
    padding: 1.2rem 2.2rem;
  }
  & a,
  button {
    padding: 1.2rem 2.5rem;
    border-radius: 50px;
    background-color: #fba629;
    color: #111;
    font-size: 1.6rem;
    border: none;
    cursor: pointer;
    font-weight: 700;
    transition: all 0.3s ease;
    text-align: center;
  }
  & a:hover,
  a:active {
    background-color: #da9124;
  }
  .arrange-btns {
    flex-direction: column;
    justify-content: right;
    align-items: start;
  }
}

.info {
  display: flex !important;
  flex-direction: column !important;
  justify-content: right !important;
  align-items: start !important;
  gap: 2rem;
}

// media queries
@media only screen and (min-width: 600px) {
  // computer
}

@media only screen and (max-width: 600px) {
  // mobile
  .right {
    width: 100%;
    position: relative;
    border: none;
    align-items: center;
    a,
    button {
      width: 95%;
      padding: 2rem 2.5rem;
    }
    .info {
      display: grid !important;
      grid-template-columns: 1fr 1fr;

      gap: 2rem;
    }
  }
  .right::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    left: 0;
    bottom: -20px;
    display: block;
    clear: both;
    background-color: #aaa;
  }
}
@media only screen and (max-width: 400px) {
}
</style>