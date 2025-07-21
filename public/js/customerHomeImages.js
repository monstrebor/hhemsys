window.carousel = function () {
    return {
        current: 0,
        interval: null,
        images: [
            'https://cdn.pixabay.com/photo/2017/12/10/14/47/pizza-3010062_1280.jpg',
            'https://cdn.pixabay.com/photo/2017/03/10/13/57/cooking-2132874_1280.jpg',
            'https://cdn.pixabay.com/photo/2017/05/07/08/56/pancakes-2291908_1280.jpg',
            'https://cdn.pixabay.com/photo/2022/03/19/12/33/side-dish-7078451_1280.jpg',
            'https://cdn.pixabay.com/photo/2015/04/08/13/13/food-712665_1280.jpg',
            'https://cdn.pixabay.com/photo/2018/10/14/18/29/meatloaf-3747129_1280.jpg',
            'https://cdn.pixabay.com/photo/2020/03/22/16/18/bread-4957679_1280.jpg',
            'https://cdn.pixabay.com/photo/2017/01/11/11/33/cake-1971552_1280.jpg',
            'https://cdn.pixabay.com/photo/2018/01/31/09/57/coffee-3120750_1280.jpg',
            'https://cdn.pixabay.com/photo/2022/06/23/09/41/food-and-drink-industry-7279411_1280.jpg',
            'https://cdn.pixabay.com/photo/2022/08/27/14/08/mix-grill-7414547_1280.jpg',
            'https://cdn.pixabay.com/photo/2017/05/31/02/56/food-photography-2358904_1280.jpg',
        ],
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
            }, 500); // must match transition duration
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
