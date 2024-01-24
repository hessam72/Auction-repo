<template>
  <div class="mx-8">
    <button class="animate-bounce w-6 h-6 ...">Bounce BTN</button>

    <div
      class="border border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto"
    >
      <div class="animate-pulse flex space-x-4">
        <div class="rounded-full bg-slate-200 h-10 w-10"></div>
        <div class="flex-1 space-y-6 py-1">
          <div class="h-2 bg-slate-200 rounded"></div>
          <div class="space-y-3">
            <div class="grid grid-cols-3 gap-4">
              <div class="h-2 bg-slate-200 rounded col-span-2"></div>
              <div class="h-2 bg-slate-200 rounded col-span-1"></div>
            </div>
            <div class="h-2 bg-slate-200 rounded"></div>
            <div class="h-2 bg-slate-200 rounded"></div>
          </div>
        </div>
      </div>
    </div>

    <button
      class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 ..."
    >
      Save Changes
    </button>
    <div class="grid grid-cols-4 gap-8 justify-items-center">
      <div>01</div>
      <!-- ... -->
      <div class="bg-emerald-300 size-52 grayscale">09</div>
      <div class="bg-emerald-300 size-52 shadow-xl shadow-indigo-500/50">
        09
      </div>
      <div
        class="bg-emerald-300 size-52 rounded-full items-center content-center"
      >
        09
      </div>
      <div
        class="bg-emerald-300 size-52 rounded-full items-center content-center"
      >
        09
      </div>
      <div
        class="bg-emerald-300 size-52 rounded-full items-center content-center"
      >
        09
      </div>
      <div class="bg-emerald-300 size-52">09</div>
      <div class="bg-emerald-300 size-52">09</div>
      <div>09</div>
      <div>09</div>
      <div>09</div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>