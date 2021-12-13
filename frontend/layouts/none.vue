<template :style="{ backgroundImage: `url(~assets/background.jpg)` }">
    <div class="container centered column is-4">
        <div class="card">
            <div class="card-content centerall">
                <Nuxt /> 
            </div>
        </div>
    </div>
</template>
<style>
.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>