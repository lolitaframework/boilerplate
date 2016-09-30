var LolitaFramework;
(function (LolitaFramework) {
    var HomeSearch = (function () {
        function HomeSearch() {
            var _this = this;
            this.ajax = null;
            this.handler = null;
            this.tmpl = null;
            this.ajax = window.wp.ajax;
            this.tmpl = window.wp.template('search-item');
            jQuery(document).on('keyup', '.b-search-form__input', function (e) { return _this.searchInputKeyup(e); });
        }
        HomeSearch.prototype.searchInputKeyup = function (e) {
            var _this = this;
            var value;
            value = jQuery(e.currentTarget).val();
            if (this.handler) {
                clearTimeout(this.handler);
            }
            this.handler = setTimeout(function () { return _this.search(value); }, 1000);
        };
        HomeSearch.prototype.search = function (value) {
            var _this = this;
            var promise;
            promise = this.ajax.post({
                action: 'search',
                nonce: window.lolita_framework.LF_NONCE,
                s: value
            });
            promise.done(function (response) { return _this.searchDone(response); });
        };
        HomeSearch.prototype.searchDone = function (response) {
            jQuery('.w-search-block__results').empty();
            console.log(response.items);
        };
        return HomeSearch;
    }());
    LolitaFramework.HomeSearch = HomeSearch;
    window.LolitaFramework.home_search = new HomeSearch();
})(LolitaFramework || (LolitaFramework = {}));
//# sourceMappingURL=lf.js.map