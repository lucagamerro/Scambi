var app = new Vue({
  el: '#app',
  data() {
  return {
    page: 'Offro'
  };
},
methods: {
  cambia (p) {
    this.page = p
  }
}
})