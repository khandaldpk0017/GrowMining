<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

	<!-- Product -->
	<form class="bg0 p-t-75 p-b-85 m-t-40">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-10 col-xl-7  m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2">Name</th>
									<th class="column-3">Quantity</th>
									<th class="column-4">Price</th>
									<th class="column-5">Tax</th>
									<th class="column-5">Total</th>
									<th class="column-5">Status</th>
								</tr>

								<tr class="table_row" v-for="product in orderProducts" :key="product.id">
									<td class="column-1">
										<div class="how-itemcart1">
											<img :src="`/storage/images/${product.thumbnail_image}`" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ product.product_name }}</td>
									<td class="column-3">{{ product.product_quantity }}</td>
									<td class="column-4">${{ product.product_unit_price }}</td>
									<td class="column-5">{{ product.tax }}</td>
									<td class="column-5">${{ product.total_price }}</td>
									<td class="column-5" @click="status(product)"> <button type="button" :class="product.product_name==activeProduct?'bg-active':''" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Show</button>   </td>
									
								</tr>

							
							</table>
						</div>

					
					</div>
				</div>

				<div v-if="statusModal" class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="text-uppercase p-l-10">
							 Product : <span class="mtext-109 cl2 p-b-30">{{ productName }}</span>
						</h4>
					<Progressbar :currentStatus="statusName" />
					</div>
				</div>
			</div>
			
		</div>
	</form>

	
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img :src="picon1" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon2" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon3" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon4" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img :src="picon5" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	

<!--===============================================================================================-->	
	
	
<!--===============================================================================================-->


</body>

</template>
  <!-- <button @click="logout">Logout</button> -->

<script>
import { useCartStore } from '../../store/cart';
import picon1U from '../../../../public/images/icons/icon-pay-01.png';
import picon2U from '../../../../public/images/icons/icon-pay-02.png';
import picon3U from '../../../../public/images/icons/icon-pay-03.png';
import picon4U from '../../../../public/images/icons/icon-pay-04.png';
import picon5U from '../../../../public/images/icons/icon-pay-05.png';
// component
import Progressbar from './Progressbar.vue';
import Navbar from '../layout/navbar.vue';
import axios from 'axios';
export default {
	
  name: 'OrderProducts',
  components: {
    Navbar,
	Progressbar
  },
   
  created() {
	const query = this.$route.query;
	this.orderId = query.order_id || '';
	
	this.fetchOrderProducts();
  },
  methods: {
    fetchOrderProducts() {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      
      axios.post(`/api/order-products`,{'orderId':this.orderId},{headers})
        .then(response => {
          this.orderProducts = response.data;
        })
        .catch(error => {
          console.error("There was an error fetching the order products:", error);
        });
	
    },
	status(product){
		this.statusModal=true;
		this.activeProduct=product.product_name;
		this.statusName=product.order_status;
		this.productName=product.product_name;
	}
  },
  
  data(){
    return{
		activeProduct:null,
		productName:'',
		statusModal:false,
		statusName:'',
		orderProducts: [] ,
	  orderId:'',
      picon1:picon1U,
      picon2:picon2U,
      picon3:picon3U,
      picon4:picon4U,
      picon5:picon5U,
	 
    };
  }
};

</script>
<style scoped>
.out-of-stock {
  color: red;
  font-weight: bold;
}
.bg-active {
  border-color: #717fe0;
  background-color: #717fe0;
  color: #fff;
}
</style>