<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

	<!-- Product -->
	<form class="bg0 p-t-75 p-b-85 m-t-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5">Action</th>
								</tr>

								<tr class="table_row" v-for="item in cartItems" :key="item.id">
									<td class="column-1">
										<div class="how-itemcart1">
											<img :src="`/storage/images/${item.thumbnail_image}`" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ item.name }}</td>
									<td class="column-3">${{ item.price }}</td>
									<td class="column-4">
										<div v-if="item.quantity > 0">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" @click="decrementQuantity(item)">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" :value="item.quantity" readonly>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" @click="incrementQuantity(item)">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
											</div>
										</div>
										<div v-else>
											<span class="out-of-stock">Out of Stock</span>
										</div>
									</td>
									<td class="column-5">${{ (item.price * item.quantity).toFixed(2) }}</td>
                  <td class="column-5">
                    <button class="btn btn-danger" @click="removeFromCart(item.id)">
                      <i class="zmdi zmdi-delete"></i>
                    </button>
                  </td>
								</tr>

							
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input v-model="couponCode" class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" @click="applyCoupon">
									Apply coupon
								</div>
							</div>

							
						</div>
						
						<div v-if="discount > 0" class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<span class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5">
								Applied Coupon: {{ couponCode }} ({{ discountType === 'fixed' ? '$' + discount : discount + '%' }} discount)
								</span>
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" @click="removeCoupon">
								Remove coupon
								</div>
							</div>
						</div>
						<div v-if="errorMessage" class="alert alert-danger" role="alert">
						{{ errorMessage }}
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<h6 class=" pb-3">Discount Coupons:-</h6>
							<div  v-for="coupon in userCoupon" :key="coupon.id" @click="selectCoupon(coupon)" class="w-full d-flex  justify-content-between align-items-center border py-2 px-4">
								<span class=" ">
									{{ coupon.code }}
								</span>
								<span class=" ">
									${{ coupon.discount }}({{coupon.type=="fixed"?"FLAT":"%"}})
								</span>
								<div  class=" bor13 hov-btn3 pointer p-1 px-3 " @click="copyToClipboard(coupon.code)">
								Copy Code
								</div>
							</div>
						</div>
						<div v-if="copySuccess" class="alert alert-success mt-3">
						{{ copySuccess }}
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
                  ${{ totalWithoutTax }}
								</span>
							</div>
						</div>
            <div class="flex-w flex-t bor12 p-b-13 p-t-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Tax:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
                  ${{ tax }}
								</span>
							</div>
						</div>
						<div v-if="discount > 0" class="flex-w flex-t bor12 p-t-15 p-b-30">
              <div class="size-208 w-full-ssm">
                <span class="stext-110 cl2">Discount:</span>
              </div>
              <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                <span class="mtext-110 cl2">
                 - {{ discountType === 'fixed' ? '$' + discount : discount + '%' }}
                </span>
              </div>
            </div>

			<form @submit.prevent="submitShippingDetails" class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div  class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<!-- <p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p> -->
								<div class="pb-3">
								<select class="border p-1 w-full" v-model="country" name="country" id="country" required>
									<!-- <option value="">Select Country</option> -->
									<option value="India">India</option>
								</select>
								</div>
								<div class="pb-3">
									<select  class="border p-1 w-full" id="state" v-model="selectedState" @change="updateDistricts" required>
										<option value="null" disabled>Select State</option>
									<option v-for="state in states" :key="state.name" :value="state.name">
										{{ state.name }}
									</option>
									</select>
								</div>
								<div class="pb-3">
									<select class="border p-1 w-full" id="district" v-model="selectedDistrict" required>
										<option value="null" disabled>Select District</option>
									<option v-for="district in availableDistricts" :key="district" :value="district">
										{{ district }}
									</option>
									</select>
								</div>
								<div class="pb-3">
									<input class="border w-full p-1" placeholder="Enter Address" type="text" id="address" v-model="address" required>
								</div>
								<div class="pb-3">
									<input class="border w-full p-1" placeholder="Enter pincode" type="text" id="pincode" v-model="pincode" required>
								</div>
								
								
							</div>
						</div>
						
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>
							
							<div class="size-209 ps-3 p-t-1">
								<span class="mtext-110 cl2">
									${{ cartTotal }}
								</span>
							</div>
						</div>
						
						<button :disabled="isAnyProductOutOfStock" type="submit"  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</form>
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
import swal from 'sweetalert';
import Navbar from '../layout/navbar.vue';
import axios from 'axios';
import { th } from 'vuetify/locale';
export default {
  name: 'ShoppingCart',
  components: {
    Navbar
  },
  mounted() {
    this.updateCartTotalWithDiscount();
	this.getCoupon();
	const script = document.createElement('script');
    script.src = 'https://checkout.razorpay.com/v1/checkout.js';
    script.async = true;
    document.body.appendChild(script);
  },
    
  created() {
	
  },

  methods: {
	selectCoupon(coupon) {
      this.selectedCoupon = coupon;
    },
	copyToClipboard(value) {
            navigator.clipboard.writeText(value).then(() => {
                this.copySuccess = 'Copied to clipboard!';
                setTimeout(() => this.copySuccess = '', 2000); // Clear the success message after 2 seconds
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        },
	async applyCoupon() {
      try {
        const response = await axios.post('/api/apply-coupon', { code: this.couponCode },{headers: {
    'Authorization': `Bearer ${localStorage.getItem('token')}` // Adjust based on how you store your token
  		}});
        const coupon = response.data.coupon;
        this.discount = coupon.discount;
        this.discountType = coupon.type;
		this.errorMessage = ''; 
        this.updateCartTotalWithDiscount();
      } catch (error) {
		this.couponCode ='';
		this.errorMessage = error.response.data.message || 'Invalid coupon code';
        console.error(error.response.data.message);
      }
    },
	removeCoupon() {
      this.couponCode = '';
      this.discount = 0;
      this.discountType = '';
	  this.errorMessage = '';
      this.updateCartTotalWithDiscount();
    },
	async getCoupon() {
      try {
		const user=JSON.parse(localStorage.getItem('user'));
        const response = await axios.post('/api/get-coupon', { id: user.id },{headers: {
    'Authorization': `Bearer ${localStorage.getItem('token')}` // Adjust based on how you store your token
  		}});
        const coupon = response.data.coupons;
        this.userCoupon = coupon;
        this.updateCartTotalWithDiscount();
      } catch (error) {
        console.error(error.response.data.message);
      }
    },
    updateCartTotalWithDiscount() {
      const cartStore = useCartStore();
      console.log(cartStore.cartItems)
      let total = cartStore.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
      let tax = cartStore.cartItems.reduce((sum, item) => sum + (item.price * item.quantity*item.taxRate), 0);
      if (this.discountType === 'fixed') {
        total -= this.discount;
      } else if (this.discountType === 'percent') {
        total -= total * (this.discount / 100);
      }
      this.cartTotal = total.toFixed(2);
      
      this.tax=tax;
      this.totalWithoutTax=parseInt(total) + parseInt(this.discount);
      // this.subtotal=total-tax;
      
      
    },
    incrementQuantity(item) {
      const cartStore = useCartStore();
      if (item.quantity < item.stock) {
        cartStore.incrementItemQuantity(item.id);
      }
    },
    decrementQuantity(item) {
      const cartStore = useCartStore();
      if (item.quantity > 1) {
        cartStore.decrementItemQuantity(item.id);
      }
    },
    removeFromCart(itemId) {
      const cartStore = useCartStore();
      cartStore.removeItem(itemId);
    },
	proceedToCheckout() {
      this.showShippingForm = true;
    },
    async submitShippingDetails() {
		if (!this.selectedState || !this.selectedDistrict || !this.address || !this.pincode) {
			swal({
        title: "Vaildation Error",
        text: "Please Fill Shipping details",
        icon: "error",
			});
        return;
      }
	// 	const shippingDetails = {
    //     address: this.address,
    //     country: this.country,
    //     state: this.selectedState,
    //     city: this.selectedDistrict,
    //     pincode: this.pincode,
	// 	discount:this.discountInINR,
	// 	couponCode:this.couponCode,
	// 	total:this.cartTotal,
    //   };
	
	  try {
        const cartStore = useCartStore();
        const user = JSON.parse(localStorage.getItem('user'));

        // Step 1: Create order on the server
        const response = await axios.post('/api/create-order-payment', {
          user_id: user.id,
          total_amount: this.cartTotal,
          delivery_fee: 0,
          address: this.address,
          country: this.country,
          state: this.selectedState,
          city: this.selectedDistrict,
          pincode: this.pincode,
          cart_items: cartStore.cartItems,
          couponCode: this.couponCode,
        }, {
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`
          }
        }).catch(error => {
			console.error(error.response.data.error);
			const errorMessage=error.response.data.error;
              swal({
                title: "Payment Failed!",
                text: errorMessage,
                icon: "error",
              });
        });
		

        const { order_id, amount ,address,city,country,state,pincode,couponCode,total_amount} = response.data;

            // Fetch Razorpay key from backend
            const razorpayResponse = await axios.get('/api/razorpay-key');
            const razorpayKey = razorpayResponse.data.key;

        // Step 2: Initialize Razorpay payment
        const self = this;
        const options = {
          key: razorpayKey, // Replace with your Razorpay key
          amount: amount,
          currency: 'INR',
          name: 'Your Store Name',
          description: 'Purchase Description',
          order_id: order_id,
          handler: async function (response) {
            try {
              const paymentData = {
                  user_id: user.id, 
                user_name: user.name, 
                user_email: user.email, 
                total_amount: total_amount,
                delivery_fee: 0, 
                address: address,
                country: country,
                state: state,
                city: city,
                pincode: pincode,
                couponCode: couponCode,
                cart_items: cartStore.cartItems,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_signature: response.razorpay_signature,
              };
             
              // Verify payment on the server
              await axios.post('/api/verify-payment', paymentData,{
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`
          }
        });

              swal({
                title: "Payment Successful!",
                text: "Your payment has been processed.",
                icon: "success",
                button: "View Orders",
              }).then(() => {
                self.$router.push('/MyOrders');
              });

            } catch (error) {
              console.error(error);
              swal({
                title: "Payment Failed!",
                text: error.response,
                icon: "error",
              });
            }
          },
          prefill: {
            name: user.name,
            email: user.email,
            contact: "87787474838",
          },
          theme: {
            color: "#3399cc",
          },
        };

        const rzp = new Razorpay(options);
        rzp.open();

      } catch (error) {
        console.error(error);
        swal({
          title: "Order Not Placed!",
          text: error.response.data.error,
          icon: "error",
        });
      }
    //   this.$router.push({ name: 'PaymentGateway',query: shippingDetails  });
    }
	,updateDistricts() {
		console.log(this.selectedDistrict,this.selectedState)
      const state = this.states.find(state => state.name === this.selectedState);
      this.availableDistricts = state ? state.districts : [];
    },
  },
  computed: {
	
    cartItems() {
      const cartStore = useCartStore();
      return cartStore.cartItems;
    },
	cartTotal() {
      const cartStore = useCartStore();
      let total = cartStore.cartItems.reduce((sum, item) => sum + (item.price * item.quantity * item.taxRate)+(item.price * item.quantity), 0);
      if (this.discountType === 'fixed') {
		this.discountInINR=this.discount;
        total -= this.discount;
      } else if (this.discountType === 'percent') {
		this.discountInINR=total * (this.discount / 100);
        total -= total * (this.discount / 100);
      }
      return total.toFixed(2);
    },
	isAnyProductOutOfStock() {
      return this.cartItems.some(item => item.quantity <= 0);
    }
  },
  data(){
    return{
		copySuccess: '',
	  userCoupon:[],selectedCoupon: null,
	  discountInINR:0,
	  errorMessage: '',
    totalWithoutTax:0,
    subtotal:0,
    tax:0,
      couponCode: '',
      discount: 0,
      discountType: '',
      picon1:picon1U,
      picon2:picon2U,
      picon3:picon3U,
      picon4:picon4U,
      picon5:picon5U,
	  showShippingForm: false,
      address: '',
      country: '',
      state: '',
      city: '',
      pincode: '',
	  states: [
      {
        name: "Andhra Pradesh",
        districts: ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "YSR Kadapa"]
      },
      {
        name: "Arunachal Pradesh",
        districts: ["Anjaw", "Changlang", "East Kameng", "East Siang", "Itanagar", "Kurung Kumey", "Lohit", "Lower Dibang Valley", "Lower Subansiri", "Papum Pare", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang"]
      },
      {
        name: "Assam",
        districts: ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Sivasagar", "Sonitpur", "South Salmara-Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"]
      },
      {
        name: "Bihar",
        districts: ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"]
      },
      {
        name: "Chhattisgarh",
        districts: ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir-Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"]
      },
      {
        name: "Goa",
        districts: ["North Goa", "South Goa"]
      },
      {
        name: "Gujarat",
        districts: ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"]
      },
      {
        name: "Haryana",
        districts: ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"]
      },
      {
        name: "Himachal Pradesh",
        districts: ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul and Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"]
      },
      {
        name: "Jharkhand",
        districts: ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahibganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"]
      },
      {
        name: "Karnataka",
        districts: ["Bagalkot", "Ballari", "Belagavi", "Bengaluru Rural", "Bengaluru Urban", "Bidar", "Chamarajanagar", "Chikballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kalaburagi", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysuru", "Raichur", "Ramanagara", "Shivamogga", "Tumakuru", "Udupi", "Uttara Kannada", "Vijayapura", "Yadgir"]
      },
      {
        name: "Kerala",
        districts: ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"]
      },
      {
        name: "Madhya Pradesh",
        districts: ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Niwari", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"]
      },
      {
        name: "Maharashtra",
        districts: ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"]
      },
      {
        name: "Manipur",
        districts: ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"]
      },
      {
        name: "Meghalaya",
        districts: ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"]
      },
      {
        name: "Mizoram",
        districts: ["Aizawl", "Champhai", "Hnahthial", "Khawzawl", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Saitual", "Serchhip"]
      },
      {
        name: "Nagaland",
        districts: ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Noklak", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"]
      },
      {
        name: "Odisha",
        districts: ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Deogarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"]
      },
      {
        name: "Punjab",
        districts: ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Ferozepur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Nawanshahr", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "SAS Nagar", "Tarn Taran"]
      },
      {
        name: "Rajasthan",
        districts: ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Sri Ganganagar", "Tonk", "Udaipur"]
      },
      {
        name: "Sikkim",
        districts: ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"]
      },
      {
        name: "Tamil Nadu",
        districts: ["Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kallakurichi", "Kancheepuram", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet", "Salem", "Sivaganga", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tirupathur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"]
      },
      {
        name: "Telangana",
        districts: ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhupalpally", "Jogulamba Gadwal", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahabubnagar", "Mancherial", "Medak", "Medchal-Malkajgiri", "Mulugu", "Nagarkurnool", "Nalgonda", "Narayanpet", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"]
      },
      {
        name: "Tripura",
        districts: ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"]
      },
      {
        name: "Uttar Pradesh",
        districts: ["Agra", "Aligarh", "Amethi", "Ambedkar Nagar", "Amroha", "Auraiya", "Ayodhya", "Azamgarh", "Badaun", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kushinagar", "Lakhimpur Kheri", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Prayagraj", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"]
      },
      {
        name: "Uttarakhand",
        districts: ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"]
      },
      {
        name: "West Bengal",
        districts: ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"]
      }
    ],
	  country: "India",
      selectedState: null,
      selectedDistrict: null,
      availableDistricts: [],
    };
  }
};

</script>
<style scoped>
.out-of-stock {
  color: red;
  font-weight: bold;
}

</style>