<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import Layout from "@/Layouts/Common.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
    success: { type: Boolean, default: false }
});

const form = useForm({
    name: null,
    address: null,
    email: null,
    phone: null,
    notes: null
});

const submit = () => {
    form.post(route("home.goods.order.store"), {
        onFinish: () => {},
    });
};

const navLinks = [[route("home.index"), "Главная"]];

const goods = ref(null);
const cartData = ref(null);

const loadCart = async () => {
    const req = await fetch('/ajax/get-cart');
    cartData.value = (await req.json()).data;
    goods.value = cartData.value.goods;
};

loadCart();
</script>

<template>
    <Layout :links="navLinks" title="Оформление заказа">
        <div class="checkout-area section-space-y-axis-100">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            <h3>
                                Returning customer?
                                <span id="showlogin">Click here to login</span>
                            </h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text mb-1">
                                        Quisque gravida turpis sit amet nulla
                                        posuere lacinia. Cras sed est sit amet
                                        ipsum luctus.
                                    </p>
                                    <form action="javascript:void(0)">
                                        <p class="form-row-first">
                                            <label class="mb-1"
                                                >Username or email
                                                <span class="required"
                                                    >*</span
                                                ></label
                                            >
                                            <input type="text" />
                                        </p>
                                        <p class="form-row-last">
                                            <label
                                                >Password
                                                <span class="required"
                                                    >*</span
                                                ></label
                                            >
                                            <input type="text" />
                                        </p>
                                        <p class="form-row">
                                            <input
                                                type="checkbox"
                                                id="remember_me"
                                            />
                                            <label for="remember_me"
                                                >Remember me</label
                                            >
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <h3>
                                Have a coupon?
                                <span id="showcoupon"
                                    >Click here to enter your code</span
                                >
                            </h3>
                            <div
                                id="checkout_coupon"
                                class="coupon-checkout-content"
                            >
                                <div class="coupon-info">
                                    <form action="javascript:void(0)">
                                        <p class="checkout-coupon">
                                            <input
                                                placeholder="Coupon code"
                                                type="text"
                                            />
                                            <input
                                                class="coupon-inner_btn"
                                                value="Apply Coupon"
                                                type="submit"
                                            />
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div v-if="success" class="fs-3">
                    <i class="pe-7s-check"></i> <span class="text-success">Ваш заказ успешно оформлен</span><br>
                    Ожидайте, мы скоро с вами свяжемся!
                </div>
                <div class="row" v-if="!success">
                    <div class="col-lg-6 col-12">
                        <BreezeValidationErrors class="mb-4"/>
                        <form @submit.prevent="submit">
                            <div class="checkbox-form">
                                <h3>Форма оформления заказа</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <BreezeLabel for="name" value="Имя"/>
                                            <BreezeInput name="name" v-model="form.name" autofocus type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <BreezeLabel for="address" value="Адрес доставки" />
                                            <BreezeInput name="address" v-model="form.address" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <BreezeLabel for="email" value="Email Адрес" />
                                            <BreezeInput name="email" v-model="form.email" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <BreezeLabel for="phone" value="Номер мобильного телефона" />
                                            <BreezeInput name="phone" v-model="form.phone" placeholder="+79621100022" type="text"/>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div
                                            class="checkout-form-list create-acc"
                                        >
                                            <BreezeCheckbox id="cbox"/>
                                            <BreezeLabel for="cbox" value="Создать аккаунт"/>
                                        </div>
                                        <div
                                            id="cbox-info"
                                            class="checkout-form-list create-account"
                                        >
                                            <p>
                                                Create an account by entering
                                                the information below. If you
                                                are a returning customer please
                                                login at the top of the page.
                                            </p>
                                            <label
                                                >Account password
                                                <span class="required"
                                                    >*</span
                                                ></label
                                            >
                                            <input
                                                placeholder="password"
                                                type="password"
                                            />
                                        </div>
                                    </div> -->
                                </div>
                                <div class="different-address">
                                    <!--<div class="ship-different-title">
                                        <h3>
                                            <label
                                                >Ship to a different
                                                address?</label
                                            >
                                            <input
                                                id="ship-box"
                                                type="checkbox"
                                            />
                                        </h3>
                                    </div>-->
                                    <div class="order-notes">
                                        <div
                                            class="checkout-form-list checkout-form-list-2"
                                        >
                                            <label>Комментарий к заказу</label>
                                            <textarea id="checkout-mess" type="textarea" name="notes" v-model="form.notes" placeholder="Заметка к заказу, например просьбы для доставщика"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Ваш заказ</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">
                                                Продукт
                                            </th>
                                            <th class="cart-product-total">
                                                Стоимость
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item" v-for="({goodsData, options}, index) in goods" :key="index">
                                            <td class="cart-product-name">
                                                {{ goodsData.name }}<strong
                                                    class="product-quantity"
                                                >
                                                    × {{ goodsData.count }}</strong
                                                >
                                            </td>
                                            <td class="cart-product-total">
                                                <span class="amount"
                                                    >{{ goodsData.total_amount }} ₽</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Итого</th>
                                            <td>
                                                <strong
                                                    ><span class="amount"
                                                        >{{ cartData?.meta?.total_amount ?? 0 }} ₽</span
                                                    ></strong
                                                >
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <!-- <div id="accordion">
                                        <div class="card">
                                            <div
                                                class="card-header"
                                                id="#payment-1"
                                            >
                                                <h5 class="panel-title">
                                                    <a
                                                        href="#"
                                                        class=""
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne"
                                                        aria-expanded="true"
                                                    >
                                                        Direct Bank Transfer.
                                                    </a>
                                                </h5>
                                            </div>
                                            <div
                                                id="collapseOne"
                                                class="collapse show"
                                                data-bs-parent="#accordion"
                                            >
                                                <div class="card-body">
                                                    <p>
                                                        Make your payment
                                                        directly into our bank
                                                        account. Please use your
                                                        Order ID as the payment
                                                        reference. Your order
                                                        won’t be shipped until
                                                        the funds have cleared
                                                        in our account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div
                                                class="card-header"
                                                id="#payment-2"
                                            >
                                                <h5 class="panel-title">
                                                    <a
                                                        href="#"
                                                        class="collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwo"
                                                        aria-expanded="false"
                                                    >
                                                        Cheque Payment
                                                    </a>
                                                </h5>
                                            </div>
                                            <div
                                                id="collapseTwo"
                                                class="collapse"
                                                data-bs-parent="#accordion"
                                            >
                                                <div class="card-body">
                                                    <p>
                                                        Make your payment
                                                        directly into our bank
                                                        account. Please use your
                                                        Order ID as the payment
                                                        reference. Your order
                                                        won’t be shipped until
                                                        the funds have cleared
                                                        in our account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div
                                                class="card-header"
                                                id="#payment-3"
                                            >
                                                <h5 class="panel-title">
                                                    <a
                                                        href="#"
                                                        class="collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseThree"
                                                        aria-expanded="false"
                                                    >
                                                        PayPal
                                                    </a>
                                                </h5>
                                            </div>
                                            <div
                                                id="collapseThree"
                                                class="collapse"
                                                data-bs-parent="#accordion"
                                            >
                                                <div class="card-body">
                                                    <p>
                                                        Make your payment
                                                        directly into our bank
                                                        account. Please use your
                                                        Order ID as the payment
                                                        reference. Your order
                                                        won’t be shipped until
                                                        the funds have cleared
                                                        in our account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="order-button-payment">
                                        <input
                                            value="Разместить заказ"
                                            type="submit"
                                            @click.prevent="submit"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
