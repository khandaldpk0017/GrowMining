<!-- resources/js/components/Home.vue -->

<template>

<body >
	
	<!-- Header -->
	<Navbar />

	<!-- Product -->
	<section class="bg0 p-t-23 m-t-50 p-b-140">
		<div class="container d-flex justify-content-center">
			<div class="size-210  p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
			<h2 class="mtext-105 cl2 txt-center p-b-30">Create a New Ticket</h2>
    <form  @submit.prevent="createTicket">
      <div class="bor8 m-b-20 how-pos4-parent">
        <input placeholder="Subject" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" v-model="form.subject" required />
      </div>
      <div class="bor8 m-b-20 how-pos4-parent">
        <textarea placeholder="Description" class="stext-111 cl2 plh3 size-116 p-l-30 p-r-30" v-model="form.description" required></textarea>
      </div>
      <div class=" m-b-20 how-pos4-parent">
        <label  class="flex-c-m stext-101 w-50 cl0 size-121 bg-primary bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" for="image">Upload Image</label>
        <input id="image" class="d-none" type="file" @change="handleFileUpload" />
      </div>
	  <div class=" m-b-20 how-pos4-parent  d-flex ">
      <button class="flex-c-m m-b-2 stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">Submit</button>
      <button class="flex-c-m stext-101 bg-danger cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" @click="cancel()">Cancel</button>
	  </div>
    </form>
</div>
		
		</div>
	</section>

	
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

	<!-- Modal1 -->


<!--===============================================================================================-->	
	
	
<!--===============================================================================================-->


</body>

</template>
  <!-- <button @click="logout">Logout</button> -->

<script>
import { useCartStore } from '../../store/cart';
import iconCloseU from '../../../../public/images/icons/icon-close2.png';
import iconClose2U from '../../../../public/images/icons/icon-close.png';
import heart1U from '../../../../public/images/icons/icon-heart-01.png';
import heart2U from '../../../../public/images/icons/icon-heart-02.png';
import picon1U from '../../../../public/images/icons/icon-pay-01.png';
import picon2U from '../../../../public/images/icons/icon-pay-02.png';
import picon3U from '../../../../public/images/icons/icon-pay-03.png';
import picon4U from '../../../../public/images/icons/icon-pay-04.png';
import picon5U from '../../../../public/images/icons/icon-pay-05.png';

// component
import swal from 'sweetalert';
import Isotope from 'isotope-layout';
import Navbar from '../layout/navbar.vue';
import axios from 'axios';
import Pagination from '../layout/pagination.vue';
export default {
  name: 'CreateSupportTicket',
  components: { Navbar },
  data() {
    return {
		picon2:picon2U,
		picon3:picon3U,
		picon4:picon4U,
		picon5:picon5U,
		picon1:picon1U,
      form: {
        subject: '',
        description: '',
        image: null,
      },
    };
  },
  methods: {
    handleFileUpload(event) {
      this.form.image = event.target.files[0];
    },
    createTicket() {
		const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      const formData = new FormData();
      formData.append('subject', this.form.subject);
      formData.append('description', this.form.description);
      if (this.form.image) {
        formData.append('image', this.form.image);
      }

      axios.post('/api/tickets', formData,{headers})
        .then(() => {
			swal({
				title: "Ticket created!",
				text: "The Ticket created successfully",
				icon: "success",
				button: "Continue Shopping",
			}).then(() => {
				// Redirect to orders page or perform another action
				this.$router.push('/Support');
			});
        })
        .catch(error => {
          console.error('Error creating ticket:', error);
        });
    },
	cancel(){
		this.$router.push({ name: 'Home' });
	}
  },
};

</script>
<style scoped>
.product-modal{
	position: fixed;
  width: 100%;
  height: 100vh;
  top: 0;
  left: 0;
  z-index: 9000;
  overflow: auto;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  visibility: visible;
  opacity: 1;
}
.out-of-stock {
  color: red;
  font-weight: bold;
}
.disabled-button {
  background-color: #ccc; 
  cursor: not-allowed;
}
</style>