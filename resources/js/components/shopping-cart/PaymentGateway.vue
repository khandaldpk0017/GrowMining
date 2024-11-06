<!-- resources/js/components/Home.vue -->

<template>

    <body >
        
        <!-- Header -->
        <Navbar />
    
        <!-- Product -->
        <div class="container bg0 p-t-59 p-b-85 m-t-40">
            <h4> PaymentGateway</h4>
			
            <div class="d-flex py-2 ">
                <input type="checkbox" name="cod" id="cod">
                <label for="cod" class="pt-2 ps-2">Cash On delivery</label>
            </div>
            <div class="d-flex pb-2 ">
                <input type="checkbox" name="upi" id="upi">
                <label for="upi" class="pt-2 ps-2">UPI</label>
            </div>
            <button class="flex-c-m w-25 stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" @click="createOrder">Place Order</button>
		</div>
    
        
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
    
    <script>
    import swal from 'sweetalert';
  import { useCartStore } from '../../store/cart';
import axios from 'axios';
import Navbar from '../layout/navbar.vue';

export default {
  name: 'PaymentGateway',
  components: {
    Navbar
  },
  data() {
    return {
      address: '',
      country: '',
      state: '',
      city: '',
      pincode: '',
      cartTotal: 0,
      discount:0,
      totalAmount:0,
      couponCode:'',
      
    };
  },
  created() {
    const query = this.$route.query;
    this.address = query.address || '';
    this.country = query.country || '';
    this.state = query.state || '';
    this.city = query.city || '';
    this.pincode = query.pincode || '';
    this.discount = query.discount || '';
    const cartStore = useCartStore();
    this.totalAmount = query.total || '';
    this.couponCode = query.couponCode || '';
    this.cartTotal = this.calculateCartTotal(cartStore.cartItems);
  },
  methods: {
    calculateCartTotal(cartItems) {
      return cartItems.reduce((total, item) => {
        return (total + (item.price * item.quantity ))-this.discount;
      }, 0).toFixed(2);
    },
    // async createOrder() {
    //   try {
    //     const cartStore = useCartStore();
    //     const user=JSON.parse(localStorage.getItem('user'));

    //     const orderData = {
    //       user_id: user.id, 
    //       user_name: user.name, 
    //       total_amount: this.totalAmount,
    //       delivery_fee: 0, 
    //       address: this.address,
    //       country: this.country,
    //       state: this.state,
    //       city: this.city,
    //       pincode: this.pincode,
    //       cart_items: cartStore.cartItems,
    //       couponCode: this.couponCode,
    //     };

    //     const response = await axios.post('/api/create-order', orderData, {
    //       headers: {
    //         'Authorization': `Bearer ${localStorage.getItem('token')}`
    //       }
    //     });

    //     swal({
    //     title: "Order Placed!",
    //     text: "Your order has been placed successfully.",
    //     icon: "success",
    //     button: "View Orders",
    //   }).then(() => {
       
    //     this.$router.push('/MyOrders');
    //   });
       
    //   } catch (error) {
    //     console.error(error);
    //     swal({
    //     title: "Order Not Placed!",
    //     text: error.response.data.error,
    //     icon: "error",
        
    //   })
    //   }
    // }
    async createOrder() {
      try {
        const cartStore = useCartStore();
        const user = JSON.parse(localStorage.getItem('user'));

        // Step 1: Create order on the server
        const response = await axios.post('/api/create-order-payment', {
          user_id: user.id,
          total_amount: this.totalAmount,
          delivery_fee: 0,
          address: this.address,
          country: this.country,
          state: this.state,
          city: this.city,
          pincode: this.pincode,
          cart_items: cartStore.cartItems,
          couponCode: this.couponCode,
        }, {
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`
          }
        });

        const { order_id, amount ,address,city,country,state,pincode,couponCode,total_amount} = response.data;

        const orderData = {
              user_id: user.id, 
              user_name: user.name, 
              user_email: user.email, 
              total_amount: this.totalAmount,
              delivery_fee: 0, 
              address: this.address,
              country: this.country,
              state: this.state,
              city: this.city,
              pincode: this.pincode,
              couponCode: this.couponCode,
              cart_items: cartStore.cartItems
            };

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
          text: error.response,
          icon: "error",
        });
      }
    }
  },
  mounted() {
    // Load Razorpay script dynamically
    const script = document.createElement('script');
    script.src = 'https://checkout.razorpay.com/v1/checkout.js';
    script.async = true;
    document.body.appendChild(script);
  },
};
    </script>
    <style scoped>
    
    
    </style>