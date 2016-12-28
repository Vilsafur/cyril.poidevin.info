<template>
  <ul class='timeline' :class='orientation'>
    <slot></slot>
  </ul>
</template>

<script>
  export default {
    props: {
      orientation: {
        type: String,
        default: 'vertical'
      },
      name: String
    },
    data () {
      return {
        index: 0,
        elements: []
      }
    },
    mounted () {
      this.elements = this.$children
      this.elements.forEach((element, i) => {
        element.index = i
      })
    }
  }
</script>

<style>
.timeline {
  list-style: none;
  font-size: 80%;
}
.timeline.vertical {
  margin: 50px 0 30px 120px;
  padding-left: 30px;
  border-left: 8px solid #eee9dc;
}
.timeline.horizontal{
  margin: 120px 0 0;
  padding: 0;
  border-top: 8px solid #eee9dc;
  display: table;
  border-spacing: 30px 0;
}
.timeline.vertical li {
  margin: 40px 0;
  position: relative;
}
.timeline.horizontal li {
  display: table-cell;
}
.timeline.horizontal li .relative {
  position: relative;
}
.timeline p {
  margin: 0 0 15px;
}
@media screen and (max-width: 767px) {
  .timeline.vertical {
    margin-left: 0;
    padding-left: 0;
    border-left: none;
  }
  .timeline.vertical li {
    margin: 50px 0;
  }
}
</style>