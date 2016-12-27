<template>
  <div class='page'>
    <header>
      <h1 class="name">Cyril POIDEVIN</h1>
      <nav>
        <button @click='goHome'>Accueil</button>
        <button @click='goCv'>C.V.</button>
      </nav>
    </header>
    <main>
      <transition name="custom-animate" enter-active-class="animated zoomInUp" leave-active-class="animated zoomOutDown" mode="out-in">
        <home v-if='page === "home"' key='page'></home>
      </transition>
    </main>
  </div>
</template>

<script>
import Home from './Components/Home.vue'

export default {
  components: {
    Home
  },
  data: function() {
    return {
      page: ""
    }
  },
  methods: {
    goHome: function () {
      history.pushState({page:"home"}, "home", "/")
      this.page = "home"
    },
    goCv: function () {
      history.pushState({page:"cv"}, "cv", "/cv")
      this.page = "cv"
    }
  },
  created: function() {
    let uri = window.location.pathname;
    if (uri === '/') {
      this.page = "home"
    }
    else if (uri === "/cv") {
      this.page = "cv"
    }
    else {
      window.location = "/"
    }
    window.onpopstate = function(event) {
      if(event.state == null) {
        this.page = "home"
      }
      else {
        this.page = event.state.page
        console.log(this.page)
      }
    }.bind(this)
  }
}
</script>

<style>
@font-face {
  font-family: 'Aller';
  src: url('./assets/fonts/Aller_Rg.ttf');
}

@font-face {
  font-family: 'Akashi';
  src: url('./assets/fonts/Akashi.ttf');
}

html, body {
  height: 100%;
  overflow: hidden;
}

body {
  font-family: "Aller", sans-serif;
  background: #000 url('./assets/picts/bg.jpg') no-repeat fixed center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-size: 25px;
  color: #AEB8C0;
  margin: 0;
}

.page {
  height: 100%;
  display: flex;
  flex-direction: column;
  align-content: stretch;
  align-items: stretch;
}

h1 {
  font-family: "Akashi";
}

header {
  flex: 1;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
  align-items: flex-start;
  align-content: flex-start;
  padding: 30px 30px 0 30px;
}

.name {
  order: 2;
}

nav {
  order: 1;
  display: flex;
  align-items: center;
   align-content: center;
  justify-content: flex-end;
  flex-flow: column wrap;
}

nav button {
  border: none;
  padding: 6px 10px;
  border-radius: 75%;
  border-bottom: 3px solid #0C88E7;
  background: transparent;
  cursor: pointer;
  color: inherit;
  font-weight: bold;
  font-size: 100%;
}

main {
  flex: 4;
  margin: 10px;
  padding: 0 10px;
  display: flex;
  flex-flow: row wrap;
  align-content: stretch;
  align-items: stretch;
  justify-content: center;
  background-color: rgba(250,250,250,0.2);
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
  box-shadow: -1px 2px 20px rgba(255, 255, 255, 0.6) inset;
  color: white;
  overflow: auto;
}

@media (max-width: 420px) {
    .page {
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  header {
    flex: 1;
    justify-content: center;
    align-items: center;
    align-content: center;
  }
  .name {
    order: 1;
  }

  nav {
    order: 2;
    flex-flow: row wrap;
    padding: 0;
  }

  main {
    flex: 1;
    margin: 10px;
    display: flex;
    flex-flow: row wrap;
    align-content: stretch;
    align-items: stretch;
    justify-content: center;
  }
}
</style>
