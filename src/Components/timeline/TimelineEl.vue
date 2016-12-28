<template>
  <li :class='name'>
    <input class='radio' :class="orientation" :id='id' :name='name' type='radio' :checked='checked'>
    <div class="relative" :class="orientation">
      <label :for='id' :class="orientation">{{ title }}</label>
      <span class='date' :class="orientation">{{ date }}</span>
      <span class='circle' :class="orientation"></span>
    </div>
    <div class='content' :class="orientation">
      <slot></slot>
    </div>
  </li>
</template>

<script>
  export default {
    props: {
      title: String,
      date: String
    },
    data () {
      return {
        index: 0
      }
    },
    computed: {
      orientation () {
        return this.$parent.orientation
      },
      name () {
        return this.$parent.name
      },
      checked () {
        return this.index === this.$parent.index
      },
      id () {
        return this.name + this.index
      }
    }
  }
</script>

<style>
.date {
  position: absolute;
  line-height: 20px;
  font-size: 0.95em;
}
.date.vertical {
  margin-top: -10px;
  top: 50%;
  left: -158px;
}
.date.horizontal {
  text-align: center;
  top: -55px;
  left: 0;
  right: 0;
}

.circle {
  width: 10px;
  height: 10px;
  background: #48b379;
  border: 5px solid #eee9dc;
  border-radius: 50%;
  display: block;
  position: absolute;
}

.circle.vertical {
  margin-top: -10px;
  top: 50%;
  left: -44px;
}

.circle.horizontal {
  margin: 0 auto;
  top: -14px;
  left: 0;
  right: 0;
}

.content {
  border-width: 2px;
  border-style: solid;
  border-radius: 0.5em;
  position: relative;
  overflow: hidden;
  border-color: transparent;
}

.content.vertical {
  max-height: 20px;
  padding: 50px 20px 0;
}

.content.horizontal {
  width: 200px;
  max-height: 0;
  margin-top: 40px;
  vertical-align: top;
  padding: 50px 15px 15px;
  transition: width 0.4s linear, max-height 0.4s linear;
}

.content:before, .content:after {
  content: "";
  width: 0;
  height: 0;
  border: medium solid transparent;
  position: absolute;
  pointer-events: none;
}

.content.vertical:before, .content.vertical:after {
  right: 100%;
}

.content.horizontal:before, .content.horizontal:after {
  bottom: 100%;
}

.content.vertical:before {
  border-right-color: inherit;
  border-width: 20px;
  top: 50%;
  margin-top: -20px;
}

.content.horizontal:before {
  border-bottom-color: inherit;
  border-width: 15px;
  left: 50%;
  margin-left: -15px;
}

.content:after {
  border-bottom-color: #48b379;
}
.content.vertical:after {
  border-width: 17px;
  top: 50%;
  margin-top: -17px;
}

.content.horizontal:after {
  border-width: 12px;
  left: 50%;
  margin-left: -12px;
}

.content p {
  max-height: 0;
  color: transparent;
  text-align: justify;
  word-break: break-word;
  hyphens: auto;
  overflow: hidden;
}

label {
  font-size: 1.3em;
  position: absolute;
  z-index: 100;
  cursor: pointer;
  max-width: 280px;
}

label.vertical {
  top: 20px;
  transition: transform 0.2s linear;
}

label.horizontal {
  width: 200px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  display: block;
  top: 60px;
  left: 15px;
}

.radio {
  display: none;
}

.radio:checked + .relative label {
  cursor: auto;
}

.radio:checked + .relative label.vertical {
  transform: translateX(42px);
}
.radio:checked + .relative label.horizontal {
  width: 400px;
  transition: width 0.3s linear 0.2s;
}

.radio:checked + .relative .circle {
  background: #f98262;
}

.radio:checked ~ .content {
  border-color: #eee9dc;
}

.radio:checked ~ .content.vertical {
  max-height: 400px;
  margin-right: 20px;
  transform: translateX(20px);
  transition: max-height 0.4s linear, border-color 0.5s linear, transform 0.2s linear;
}

.radio:checked ~ .content.horizontal {
  max-height: 180px;
  width: 400px;
}

.radio:checked ~ .content p {
  max-height: 200px;
  color: #eee9dc;
  transition: color 0.3s linear 0.3s;
}

@media screen and (max-width: 767px) {
  label.vertical {
    width: 85%;
    font-size: 1.1em;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    display: block;
    transform: translateX(18px);
  }

  .content.vertical {
    padding-top: 45px;
    border-color: #eee9dc;
  }
  .content.vertical:before, .content.vertical:after {
    border: solid transparent;
    bottom: 100%;
  }
  .content.vertical:before {
    border-bottom-color: inherit;
    border-width: 17px;
    top: -16px;
    left: 50px;
    margin-left: -17px;
  }
  .content.vertical:after {
    border-bottom-color: #48b379;
    border-width: 20px;
    top: -20px;
    left: 50px;
    margin-left: -20px;
  }
  .content.vertical p {
    font-size: 0.9em;
    line-height: 1.4;
  }

  .circle.vertical, .date.vertical {
    display: none;
  }
}
</style>