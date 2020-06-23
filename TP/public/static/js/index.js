var IndexVue = new Vue({
    el: '#IndexApp',
    data: {
        'JumpUrl': "",
    },
    methods: {
        changeUrl: function(res) {
            this.JumpUrl = res;
        },
    },
    updated() {
        console.log(1111)
    },
})