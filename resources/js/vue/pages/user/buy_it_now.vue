<template>
       <page-title :title="'Buy Now Offers'" ></page-title>

  <div class="b-main-container">
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <div class="mb-3">
      <div class="relative mb-4 flex w-full flex-wrap items-stretch">
        <input
          id="advanced-search-input"
          type="search"
          class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 
          bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6]
           text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3]
            focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)]
             focus:outline-none 
             "
          placeholder="Search"
          aria-label="Search"
          aria-describedby="button-addon1"
        />

        <!--Search button-->
        <button
          class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
          type="button"
          id="advanced-search-button"
          data-te-ripple-init
          data-te-ripple-color="light"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="h-5 w-5"
          >
            <path
              fill-rule="evenodd"
              d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
      </div>
    </div>
    <div id="buy_now_table"></div>
  </div>
</template>
<script>
import { Datatable } from "tw-elements";
export default {
  mounted() {
    const customDatatable = document.getElementById("buy_now_table");

    const setActions = () => {
      document.querySelectorAll(".call-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          console.log(`call ${btn.attributes["data-te-number"].value}`);
        });
      });

      document.querySelectorAll(".message-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          console.log(
            `send a message to ${btn.attributes["data-te-email"].value}`
          );
        });
      });
    };

    customDatatable.addEventListener("render.te.datatable", setActions);
    const data = [
      {
        auction: "Tiger Nixon",
        price: "$1200",
        bids_to_claim: "128",
        expire_date: "23 / 12 / 05",
      
      },
      {
        auction: "Sonya Frost",
        price: "$1300",
        bids_to_claim: "29",
        expire_date: "23 / 12 / 05",
       
      },
      {
        auction: "Tatyana Fitzpatrick",
        price: "$1270",
        bids_to_claim: "75",
        expire_date: "23 / 12 / 05",
       
      }, {
        auction: "Tiger Nixon",
        price: "$1200",
        bids_to_claim: "128",
        expire_date: "23 / 12 / 05",
      
      },
      {
        auction: "Sonya Frost",
        price: "$1300",
        bids_to_claim: "29",
        expire_date: "23 / 12 / 05",
       
      },
      {
        auction: "Tatyana Fitzpatrick",
        price: "$1270",
        bids_to_claim: "75",
        expire_date: "23 / 12 / 05",
       
      },
    ];
    new Datatable(
      customDatatable,
      {
        columns: [
          { label: "Auction", field: "auction" },
          { label: "Price", field: "price" },
          { label: "Bids To Claim", field: "bids_to_claim" },
          { label: "Expire Date", field: "expire_date", sort: false },
          { label: "Buy", field: "contact", sort: false },
        ],
        rows: data.map((row) => {
          return {
            ...row,
            contact: `
            <button style="cursor:pointer;" 
              type="button"
              data-te-ripple-init
              data-te-ripple-color="dark"
              data-te-number=${row.phone}
              class="buy-in-now-btn call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <ion-icon  name="cart"></ion-icon>
            </button>
           `,
          };
        }),
      },
      { hover: true }
    );
    // search script
    const instance = new Datatable(document.getElementById("buy_now_table"), data);
    const advancedSearchInput = document.getElementById(
      "advanced-search-input"
    );

    const search = (value) => {
      let [phrase, columns] = value.split(" in:").map((str) => str.trim());

      if (columns) {
        columns = columns.split(",").map((str) => str.toLowerCase().trim());
      }

      instance.search(phrase, columns);
    };

    document
      .getElementById("advanced-search-button")
      .addEventListener("click", (e) => {
        search(advancedSearchInput.value);
      });

    advancedSearchInput.addEventListener("keydown", (e) => {
      if (e.keyCode === 13) {
        search(e.target.value);
      }
    });
  },
};
</script>
<style lang="scss" scoped>
.b-main-container {
  padding: 3rem 2rem;
}
#advanced-search-input {
  background-color: #fff;
    border-radius: 50px;
    overflow: clip;
    box-shadow: 0 3px 5px #999;
    width: 100%;
    padding: 0.7rem;
    padding-left: 1.5rem;
}
#advanced-search-button {
  position: absolute;
  right: -2px;
  border-top-right-radius: 50px;
  border-bottom-right-radius: 50px;
  height: 100%;
  z-index: 3;
}
#buy_now_table {
  div {
    border-radius: 15px;
  }
}

</style>
<style lang="scss">
.buy-in-now-btn{
  transition:all .3s ease;
  ion-icon{
    border-radius: 50px;
    width: 2rem;
    height: 2rem;
    color: #3a71ca;
    padding: 0 .3rem;
    transition:all .3s ease;
  }
  ion-icon:hover{
    background-color:#3a71ca;
    color:#fff !important;
  }
}
.buy-in-now-btn:hover{
  background-color:#3a71ca;
  color:#fff !important;
}
#buy_now_table{ 
  margin-top: 3rem;
  div:first-child{
   
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
}
  
</style>