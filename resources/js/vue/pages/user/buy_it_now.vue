<template>
  <div class="b-main-container">
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <div class="mb-3">
      <div class="relative mb-4 flex w-full flex-wrap items-stretch">
        <input
          id="advanced-search-input"
          type="search"
          class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
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
    <div id="datatable"></div>
  </div>
</template>
<script>
import { Datatable } from "tw-elements";
export default {
  mounted() {
    const customDatatable = document.getElementById("datatable");

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
        name: "Tiger Nixon",
        position: "System Architect",
        office: "Edinburgh",
        phone: "+48000000000",
        email: "tiger.nixon@gmail.com",
      },
      {
        name: "Sonya Frost",
        position: "Software Engineer",
        office: "Edinburgh",
        phone: "+53456123456",
        email: "sfrost@gmail.com",
      },
      {
        name: "Tatyana Fitzpatrick",
        position: "Regional Director",
        office: "London",
        phone: "+42123432456",
        email: "tfitz@gmail.com",
      },
    ];
    new Datatable(
      customDatatable,
      {
        columns: [
          { label: "Name", field: "name" },
          { label: "Position", field: "position" },
          { label: "Office", field: "office" },
          { label: "Contact", field: "contact", sort: false },
        ],
        rows: data.map((row) => {
          return {
            ...row,
            contact: `
            <button
              type="button"
              data-te-ripple-init
              data-te-ripple-color="dark"
              data-te-number=${row.phone}
              class="call-btn inline-block rounded-full border border-primary p-1.5 mr-1 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#3B71CA" viewBox="0 0 24 24" stroke-width="1.3" stroke="#3B71CA" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
            </button>
            <button
              type="button"
              data-te-ripple-init
              data-te-ripple-color="light"
              data-te-email=${row.email}
              class="message-btn inline-block rounded-full border border-primary bg-primary text-white p-1.5 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B71CA" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </button>`,
          };
        }),
      },
      { hover: true }
    );

    // search script
    const instance = new Datatable(document.getElementById("datatable"), data);
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
}
#datatable {
  div {
    border-radius: 15px;
  }
}
</style>