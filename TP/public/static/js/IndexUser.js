var UserVue = new Vue({
    el: "#UserApp",
    data: {
        page: '',
        pageData: [],
        Npage: 1,
        SearchInfo: '',
        SearchTime: '',
    },
    methods: {
        del(e) {
            console.log(this.pageData);
            console.log(this.page);
        },
        pageJump(e) {
            var that = this;
            PageNum = $(e.target).attr('page');


            switch ($(e.target).text()) {
                case '上一页':
                    PageNum == 1 ? that.Npage = PageNum : that.Npage = PageNum - 1;
                    break;
                case '下一页':
                    PageNum == that.page ? that.Npage = that.page : that.Npage = parseInt(PageNum) + 1;
                    break;
                default:
                    if ($(e.target).text() == that.Npage) {
                        return false;
                    } else {
                        that.Npage = $(e.target).text();
                    }
                    break;
            };
            PageDate(that, this.Npage, this.SearchInfo);
            console.log(this.Npage);
            console.log(this.pageData);
        },
        SearchDate() {
            console.log(this.SearchInfo);

            PageDate(this, 1, this.SearchInfo);
        },
        SearchTime() {
            console.log(this.SearchInfo);

            PageDate(this, 1, this.SearchInfo);
        },
    },
    mounted() {
        var that = this;
        PageDate(that, 1, '');
    },
});

function PageDate(that, num, text) {
    $.post('/ThinkPHP/public/index/index/search.html', { pnum: num, text: text }, function(res) {
        console.log(num);
        that.pageData = res.pageData;
        that.page = Math.ceil(res.page / 3);
    }, 'json');
};

function TimeDate(that, num, text) {
    $.post('/ThinkPHP/public/index/index/searchTime.html', { pnum: num, text: text }, function(res) {
        console.log(num);
        that.pageData = res.pageData;
        that.page = Math.ceil(res.page / 3);
    }, 'json');
};