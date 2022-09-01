
    let pageFunction = {}

    $(".pageSearch").change(function() {
        page = 1
        number = $(this).val()
        pageFunction()
    });

    function showPages () {
        let show = 2;  //顯示左右幾位數字
        let str =  '<span>' + page + '</span>'; //當前頁面
        //讓頁數維持在5個數字
        if(page == 1) {
        show = 4;
        }
        if(page == 2) {
        show = 3;
        }
        if(page == total_page) {
        show = 4;
        }
        if(page == (total_page - 1)) {
        show = 3;
        }
        for (let i = 1; i <= show; i++) {
        if (page - i >= 1) {
            str = '<a href="javascript:void(0)" onClick="setPage(' + (page - i) + ')">' + (page - i) + '</a>' + str;
        }
        if (page + i <= total_page) {
            str = str + '<a href="javascript:void(0)" onClick="setPage(' + (page + i) + ')">' + (page + i) + '</a>';
        }
        }
        return str;
    }

    function setFunction(func) {
        pageFunction = func
    }

    function setPage(i) {
        page = i
        pageFunction()
    }

    function firstPage() {
        if (page !== 1) {
            page = 1
            pageFunction()
        }
    }

    function finalPage() {
        if (page !== total_page) {
            page = total_page
            pageFunction()
        }
    }

    function addPage() {
        if (page !== total_page) {
            page++
            pageFunction()
        }
    }

    function minusPage() {
        if (page !== 1) {
            page--
            pageFunction()
        }
    }
