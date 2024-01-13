class Cart {
    #cartData = {};
    #cartContainer = document.querySelector('.offcanvas-minicart_wrapper');
    #totalAmount = 0;

    constructor() {}

    static init() {
        return new Cart();
    }

    async update() {
        try {
            const req = await fetch('/ajax/get-cart');

            // goodsList
            // resouces/ajax_responses/ajax_get_cart.json
            const goodsList = await req.json();

            //console.log(goodsList);

            if (goodsList.error) {
                console.error(goodsList)
                return alert('Что-то пошло не так!');
            }

            this.#cartData = goodsList.data;
            this.#totalAmount = this.#cartData.meta.total_amount ?? 0;

            document.querySelector('.minicart-btn .quantity').textContent = this.#cartData?.goods?.length ?? 0;
        } catch (err) {
            throw new Error('Error fetching cart', {cause: err});
        }
    }

    toggleNoticeEmptyCart() {
        if (this.#cartData.goods.length === 0) {
            this.#cartContainer.querySelector('#notice-empty').classList.remove('d-none');
        } else {
            this.#cartContainer.querySelector('#notice-empty').classList.add('d-none');
        }
    }

    makeContent() {
        // Creating of products list
        const listContainer = this.#cartContainer.querySelector('.minicart-list');

        const makeProductItem = ({id, title, preview, price, count}) => {
            return `
            <li class="minicart-product">
                <a class="product-item_remove" href="#"><i class="pe-7s-close" data-tippy="Remove" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" onclick="Cart.removeProduct(${id}, this, event)"></i></a>
                <a href="#" class="product-item_img">
                    <img class="img-full" src="${preview}" alt="Product Image">
                </a>
                <div class="product-item_content">
                    <a class="product-item_title" href="#">${title}</a>
                    <span class="product-item_quantity">${count} x ${price} ₽</span>
                </div>
            </li>
            `;
        };
        //console.log(this.#cartData);
        listContainer.innerHTML = this.#cartData.goods.map((item) => {
            return makeProductItem({
                id: item.goodsData.id,
                title: item.goodsData.name,
                preview: item.goodsData.preview_small,
                price: item.goodsData.total_amount,
                count: item.goodsData.count,
            });
        }).join('');

        this.toggleNoticeEmptyCart();

        this.#cartContainer.querySelector('.minicart-item_total .ammount').textContent = `${this.#totalAmount} ₽`;
    }

    async removeProduct(id, elem, e) {
        e.preventDefault();

        try {
            const req = await fetch('/ajax/remove-product-cart', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id}),
            });

            const result = await req.json();

            if (result.success) {
                elem.parentNode.parentNode.remove();

                await this.update();
                this.toggleNoticeEmptyCart();
            }

            if (result.error) {
                alert('Что-то пошло не так!');
            }
        } catch (e) {
            alert('Что-то пошло не так!');
            throw new Error('Error removing product from cart', {cause: e});
        }
    }
}
