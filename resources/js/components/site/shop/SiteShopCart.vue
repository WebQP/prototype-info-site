<template>
    <div v-if="listProducts.cartList && listProducts.cartList.length > 0" class="table-responsive">
        <table class="table table-bordered shopping-cart">
            <thead>
            <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">Model</td>
                <td class="text-left">Quantity</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Total</td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in listProducts.cartList">
                <td class="text-center">
                    <a :href="item.slug">
                        <img :src="item.image_1" class="img-thumbnail" width="100">
                    </a>
                </td>
                <td class="text-left">
                    <a :href="item.slug">
                        {{item.name}}
                    </a>
                </td>
                <td class="text-left">
                    {{item.unique_code}}
                </td>
                <td class="text-left">
                    <div class="input-group btn-block">
                        <button class="btn btn-primary" @click="minusCart(item.id)">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="count-cart">{{item.countCart}}</span>
                        <button class="btn btn-primary" @click="plusCart(item.id)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button class="btn btn-danger"  @click="removeCart(item.id)">
                            <i class="fa fa-times-circle"></i>
                        </button>
                    </div>
                </td>
                <td class="text-right">${{item.price}}</td>
                <td class="text-right">${{item.sum}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div v-if="listProducts.cartList && listProducts.cartList.length > 0" class="row">
        <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="text-right"><strong>Total:</strong></td>
                    <td class="text-right">${{listProducts.cartSum}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h2 v-else>There are no products in the basket</h2>
    <div class="buttons clearfix">
        <div class="pull-left">
            <a href="/" class="btn btn-default">
                Continue Shopping
            </a>
        </div>
        <div v-if="listProducts.cartList && listProducts.cartList.length > 0" class="pull-right">
            <a href="/checkout" class="btn btn-primary">
                Checkout
            </a>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            listProducts: [],   //Список товаров в корзине
        }
    },

    created() {
        this.getListProducts();
    },

    methods: {
        //Получаем данные страницы
        getListProducts() {
            let apiUrl = '/shop-cart/list';
            axios
                .get(apiUrl)
                .then(response => {
                    if(response.status === 200){
                        this.listProducts = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
            },

        plusCart(id){
            let apiUrl = '/shop-cart/plus';
            let method = 'POST'
            axios.post(apiUrl, {
                productID: id,
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    this.listProducts = response.data;
                }
            }).catch(error => {
                console.log(error);
            });
        },

        minusCart(id){
            console.log(id);
            let apiUrl = '/shop-cart/minus';
            let method = 'POST'
            axios.post(apiUrl, {
                productID: id,
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    this.listProducts = response.data;
                }
            }).catch(error => {
                console.log(error);
            });
        },

        removeCart(id){
            console.log(id);
            let apiUrl = '/shop-cart/remove';
            let method = 'POST'
            axios.post(apiUrl, {
                productID: id,
                '_method': method,
            }).then(response => {
                if(response.status === 200){
                    this.listProducts = response.data;
                }
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
