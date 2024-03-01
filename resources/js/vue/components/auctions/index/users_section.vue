<template>
  <div class="auction-users-container flex">
    <div class="last-winners">
      <div class="table-header w-full">Latest Winners</div>

      <div class="winners-tabel-container w-full">
        <table class="w-full" border="0">
          <thead>
            <tr>
              <th>User</th>
              <th>Bids Placed</th>
              <th>Final Price</th>
            </tr>
          </thead>

          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
          <tr>
            <td>Sara Jones</td>
            <td>341</td>
            <td>$2300</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="participaints flex flex-col">
      <div class="table-header">
        <h2>Participaints</h2>
      </div>
      <div class="participaints-table">
        <div class="participaints-tabel-container w-full">
          <table class="w-full" border="0">
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-4.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-11.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-8.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-1.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-3.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-10.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
            <tr>
              <div class="size">
                <div class="pic-container">
                  <div class="border-wrap">
                    <img
                      class="user_img"
                      :src="'/storage/images/user_profiles/150-8.jpg'"
                    />
                  </div>
                </div>
                <div class="winner-info">
                  <h3>Flora timony</h3>
                  <h4>Current Heighest bidder</h4>
                  <h4><ion-icon name="pin"></ion-icon> florida</h4>
                </div>
              </div>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
</script>
<style scoped lang="scss">
.auction-users-container {
  padding: 0 4rem;
  gap: 4rem;

  .table-header {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 2rem;
    color: #2b184f;
  }

  .last-winners,
  .participaints {
    width: 50%;
  }
}

.last-winners {
  width: 100%;
}
.participaints-table {
  border: 1.5px solid #444;
  padding: 1rem;
  border-radius: 15px;
}
.winners-tabel-container {
  border-radius: 10px;
  display: inline-block;
  height: 20rem;

  overflow: auto;
  width: 100%;

  table th {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
  }

  /* == Just general styling, not relevant :) == */

  table {
    width: 100%;
    border-collapse: collapse;

    th {
      background-color: #5a3e94;
      color: #fff;
    }

    th,
    td {
      padding: 1em 0.5em;
    }
  }

  table tr {
    color: #212121;
  }

  table tr:nth-child(odd) {
    background-color: #bbdefb;
  }

  table tr:nth-child(even) {
    background-color: #e7e7e7;
  }
}

.participaints-tabel-container {
  border-radius: 10px;
  display: inline-block;
  height: 20rem;

  overflow: auto;
  width: 100%;

  table th {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
  }

  /* == Just general styling, not relevant :) == */

  table {
    width: 100%;
    border-collapse: collapse;

    tr .size {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 1rem;
      padding-left: 0.6rem;
      margin-bottom: 0;
      border-bottom: none;
      padding-bottom: 0;
      padding: 0.5rem 0;

      .pic-container {
        position: relative;
        display: flex;
        justify-content: start;
        gap: 0.5rem;
        flex-direction: column;
        align-items: center;
        margin-bottom: 1rem;

        .title {
          // padding-top: 1.5rem;
          z-index: 1;

          .name {
            font-size: 1.1rem;
            color: #fff;
            font-weight: 500;
          }

          .winner {
            font-size: 0.8rem;
            color: #ddd;
          }
        }

        .border-wrap {
          background: linear-gradient(
            to right,
            rgb(99 80 215),
            rgb(236 236 236)
          );

          border-radius: 100px;

          .user_img {
            width: 6rem;
            border-radius: 200px;
            height: 6rem;
            filter: grayscale(100%);
            box-shadow: 0 3px 5px rgb(115 114 114);
            color: white;
            padding: 0.15rem;
            text-align: center;
          }
        }

        .quote-icon {
          opacity: 0.071;
          position: absolute;
          top: 0;
          right: -1rem;
          width: 5rem;
          height: 5rem;
        }
      }

      h3 {
        color: #4838ab;
        margin-right: 10px;
        letter-spacing: 1px;
        font-size: 1.2rem;
        font-weight: 600;
      }

      h4 {
        color: #444;
        margin-right: 10px;
        letter-spacing: 0.7px;
        font-size: 0.8rem;
        font-weight: 500;
      }
    }

    th {
      background-color: #1976d2;
      color: #fff;
    }

    th,
    td {
      padding: 1em 0.5em;
    }
  }

  table tr {
    color: #212121;
    box-shadow: 0 1px 1px;
  }

  table tr:nth-child(odd) {
    // background-color: #d1d1d181;
  }

  table tr:nth-child(even) {
    // background-color: #6969690a;
  }
}
</style>