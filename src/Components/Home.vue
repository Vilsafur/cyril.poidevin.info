<template>
  <div class="home">
    <div class="tagCloud">
      <img :src="competences">
    </div>
    <div class="other">
      <div class="logo">
        <img :src="html5">
        <img :src="css3">
        <img :src="js">
        <img :src="php">
        <img :src="nodejs">
      </div>
    </div>

  </div>
  </template>

<script>
export default {
  data: function() {
    return {
      competences: "./dist/assets/picts/competences.png",
      html5: "./dist/assets/picts/logo/html5.png",
      css3: "./dist/assets/picts/logo/css3.png",
      js: "./dist/assets/picts/logo/js.png",
      nodejs: "./dist/assets/picts/logo/nodejs.png",
      php: "./dist/assets/picts/logo/php.png"
    }
  }
}
</script>

<style>
.home {
  display: flex;
  align-items: flex-end;
  align-content: center;
  justify-content: space-between;
  flex-flow: row wrap;
  width: 100%;
  padding: 20px;
}
.home div {
  padding: 20px 0;

}
.home .tagCloud {
  order: 2;
}

.home .other {
  align-self: flex-start;
  display: flex;
  align-items: center;
  align-content: center;
  flex-flow: row wrap;
  order: 1;
}

.logo {
  display: flex;
  align-items: center;
  align-content: center;
  flex-flow: row wrap;
}

.logo img {
  max-width: 10%;
  height: auto;
}

@media (max-width: 1200px) {
  .home {
    height: auto;
  }
  .logo img {
    margin: auto;
  }

  .home .tagCloud img{
    width: 100%;
  }
}
</style>
