<template>
  <div class="w_s-main-container">
    <div class="mb-3">
      <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
      <!--Pills navigation-->
      <ul style="border-bottom: 3px solid #666;" class="mb-5 flex list-none flex-col flex-wrap pl-0 md:flex-row" role="tablist" data-te-nav-ref>
        <li role="presentation">
          <button type="button"
            class="tab-btn my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 
            text-xs font-medium uppercase leading-tight text-neutral-700
            data-[te-nav-active]:!bg-neutral-800 data-[te-nav-active]:text-neutral-50 dark:bg-neutral-500 dark:text-neutral-700 dark:data-[te-nav-active]:!bg-neutral-900
             dark:data-[te-nav-active]:text-neutral-50 md:mr-4"
            id="pills-home-tab04" data-te-toggle="pill" data-te-target="#pills-home04" data-te-nav-active role="tab"
            aria-controls="pills-home04" aria-selected="true">
            Wins
          </button>
        </li>
        <li role="presentation">
          <button type="button"
          class="tab-btn my-2 block rounded bg-neutral-100 px-7 pb-3.5 pt-4 
            text-xs font-medium uppercase leading-tight text-neutral-700
            data-[te-nav-active]:!bg-neutral-800 data-[te-nav-active]:text-neutral-50 dark:bg-neutral-500 dark:text-neutral-700 dark:data-[te-nav-active]:!bg-neutral-900
             dark:data-[te-nav-active]:text-neutral-50 md:mr-4"id="pills-profile-tab04" data-te-toggle="pill" data-te-target="#pills-profile04" role="tab"
            aria-controls="pills-profile04" aria-selected="true">
            Shipping
          </button>
        </li>
       
      </ul>

      <!--Pills content-->
      <div class="mb-6">
        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
          id="pills-home04" role="tabpanel" aria-labelledby="pills-home-tab04" data-te-tab-active>
         <h2 class="tab-header"> Won Products</h2>
          <div id="wins_table"></div>
        </div>
        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
          id="pills-profile04" role="tabpanel" aria-labelledby="pills-profile-tab04">
          <h2 class="tab-header"> Shiped Products</h2>
          <div id="delivered_table"></div>
        </div>
       
      </div>
    </div>
   
  </div>
</template>

<script>
import { Datatable } from "tw-elements";
import { Tab, initTE } from "tw-elements";
export default {
  mounted() {
    initTE({ Tab });


    // wins product configurations
    const customDatatable = document.getElementById("wins_table");
    const setActions = () => {
      document.querySelectorAll(".call-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          console.log(
            `call ${btn.attributes["data-te-number"].value}`
          );
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
        product: "Tiger Nixon",
        price: "$1200",
        bids: "231",
      },
      {
        product: "Sonya Frost",
        price: "$1300",
        bids: "131",
      },
      {
        product: "Tatyana Fitzpatrick",
        price: "$1270",
        bids: "268",
      },
    ];
    new Datatable(
      customDatatable,
      {
        columns: [
          { label: "Product", field: "product" },
          { label: "Final Price", field: "price" },
          { label: "Bids Placed", field: "bids" },

          { label: "Checkout", field: "contact", sort: false },
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
              class="wins-btn call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <ion-icon  name="cart"></ion-icon>
            </button>
           `,
          };
        }),
      },
      { hover: true }
    );
    // customDatatable.removeClass();


     // delivered product configurations
     const deliveredDatatable = document.getElementById("delivered_table");
    const setDelActions = () => {
      document.querySelectorAll(".call-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          console.log(
            `call ${btn.attributes["data-te-number"].value}`
          );
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
    deliveredDatatable.addEventListener("render.te.datatable", setDelActions);
    const del_data = [
      {
        product: "Tiger Nixon",
        price: "$1200",
        date:"23 / 04 / 15",
        status:"delivered",
        address: "lorem impson dollar smit....",
      },
      {
        product: "Sonya Frost",
        price: "$1300",
        date:"23 / 04 / 15",
        status:"pending",
        address: "lorem impson dollar smit....",
      },
      {
        product: "Tatyana Fitzpatrick",
        price: "$1270",
        date:"23 / 04 / 15",
        status:"delivered",
        address: "lorem impson dollar smit....",
      },
    ];
    new Datatable(
      deliveredDatatable,
      {
        columns: [
          { label: "Product", field: "product" },
          { label: "Price", field: "price" },
          { label: "date", field: "date" },
          { label: "address", field: "address" },
          { label: "status", field: "status" },

          
        ],
        rows: del_data.map((row) => {
          return {
            ...row,
           
          };
        }),
      },
      { hover: true }
    );
    // deliveredDatatable.removeClass();
  },
};
</script>

<style lang="scss" scoped>
.w_s-main-container {
  padding: 3rem 2rem;
}
.tab-btn{
  width: 14rem;
    height: 4rem;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    font-size: 1.3rem;
    letter-spacing: 1px;
    // color: #555;
    bottom: -0.5rem;
    position: relative;
}
#advanced-search-input {
  background-color: #fff;
  border-radius: 15px;
  overflow: clip;
  box-shadow: 0 3px 5px #999;
  width: 100%;
}

#advanced-search-button {
  position: absolute;
  right: 0px;
  border-top-right-radius: 15px;
  border-bottom-right-radius: 15px;
  height: 100%;
  z-index: 3;
}

#wins_table {
  div {
    border-radius: 15px;
  }
}
.tab-header{
  font-size: 1.5rem;
    font-weight: 500;
    margin: 3rem 0 2rem 0;
}
</style>

<style lang="scss">
.wins-btn {
  transition: all 0.3s ease;
  box-shadow: 0 2px 6px #13a028;
  border: 1px solid #0b5716;

  ion-icon {
    border-radius: 50px;
    width: 2rem;
    height: 2rem;
    color: #13a028;
    padding: 0 0.3rem;
    transition: all 0.3s ease;
  }

  ion-icon:hover {
    background-color: #13a028;
    color: #fff !important;
  }
}

.wins-btn:hover {
  background-color: #13a028;
  color: #fff !important;
}
#delivered_table , #wins_table{
  div:first-child{
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }
}
</style>
