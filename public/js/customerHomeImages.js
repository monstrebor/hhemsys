window.carousel = function () {
    return {
        current: 0,
        interval: null,
        isSliding: false,
        images: window.customerHomeImages || [],

        init() {
            this.interval = setInterval(() => {
                this.next();
            }, 5000);
        },

        next() {
            if (this.isSliding) return;
            this.isSliding = true;
            this.current = (this.current + 1) % this.images.length;
            setTimeout(() => {
                this.isSliding = false;
            }, 500);
        },

        prev() {
            if (this.isSliding) return;
            this.isSliding = true;
            this.current = (this.current - 1 + this.images.length) % this.images.length;
            setTimeout(() => {
                this.isSliding = false;
            }, 500);
        },

        go(i) {
            this.current = i;
        }
    };
};
