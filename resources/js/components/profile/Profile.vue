<!-- resources/js/components/Home.vue -->

<template>

    <body >
        
        <!-- Header -->
        <Navbar />
    
     
    
    
        <!-- Content page -->
        <section class="bg0 p-t-0 p-b-10">
          <div class="container  p-5 pt-0 ">
              <h5 style="font-weight: bold;" class="pb-3 pt-0">Your Profile</h5>
                <form action="" @submit="submitWithdrawDetails">
                <div class="py-2 ">
                  <label for="">Name</label>
                  <input type="text" class="border w-full p-1 px-3" v-model="name" required>
                </div>
                <div class="py-2">
                  <label for="">Email</label>
                  <input type="email" class="border w-full p-1 px-3" v-model="email" required>
                </div>
                <div class="py-2">
                  <label for="">Mobile</label>
                  <input type="number" class="border w-full p-1 px-3" v-model="mobile" required>
                </div>
              
                <div class="py-2">
                  <label for="">Account Number</label>
                  <input type="number" class="border w-full p-1 px-3" v-model="accountNumber" required>
                </div>
                <div class="py-2">
                  <label for="">IFSC Code</label>
                <input type="text" class="border w-full p-1 px-3" v-model="ifscCode" required>
                </div>
                <div>
                  <label for=""></label>
                <input  type="submit" class="border m-t-30 p-1 px-3 bg-success" value="Save">
                </div>
              
              </form>
                
            </div>
        </section>	
    
        
        <!-- Footer -->
        <footer class="bg3 p-t-5 p-b-10 fixed-bottom web-footer">
		<div class="container">
			

			<div class="py-2">
				<div class="flex-c-m flex-w  nav-footer">
					
						<router-link to="/" active-class="text-white" class=" pr-2 " ><i class="zmdi zmdi-home" style="font-size: 25px;"></i></router-link> 
					
|
					
						<router-link to="/Wallet" active-class="text-white" class=" px-2"><i class="zmdi zmdi-balance-wallet" style="font-size: 25px;"></i></router-link>
					
|
					
						<router-link to="/Refer" active-class="text-white" class=" px-2"><i class="zmdi zmdi-money" style="font-size: 25px;"></i></router-link>
					
|
						<router-link to="/Levels" active-class="text-white" class=" px-2"><i class="zmdi zmdi-trending-up" style="font-size: 25px;"></i></router-link> 
					
            |
						<router-link to="/Coming-soon" active-class="text-white" class=" px-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="25px" height="25px">
  <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm7.062 6.898c.265 1.007.421 2.05.451 3.113L16.6 12.82l-.947-1.707 1.04-2.253h2.37zM12 4.075c.686 0 1.355.073 2.003.208l.788 2.272h-2.79l-1.397-1.612A7.977 7.977 0 0112 4.075zm-4.22 2.15l1.756 1.746-1.04 2.253-2.048-.829c.43-.997.99-1.916 1.645-2.67.213-.22.439-.424.687-.6zM4.487 9.93l2.184.885L7.62 12l-1.687 2.197-2.062-.463a7.936 7.936 0 01-.231-2.02c.067-.618.184-1.22.348-1.785zm.928 7.702l1.524-.53L9.385 17.9l-.72 2.486a7.969 7.969 0 01-2.276-2.753zm3.59 4.156l.85-2.936 2.346-.628 2.345.628.85 2.936a7.92 7.92 0 01-6.39 0zm7.186-.93l-.72-2.487 2.446-1.796 1.523.53a7.965 7.965 0 01-2.275 2.753zM19.03 16.43l-2.063.463L15.28 14 17.5 11.06l2.184-.885c.164.566.28 1.167.348 1.785.057.648.028 1.31-.002 1.97zm-3.02-6.048l-1.407 3.05.964 1.738h-5.134l.963-1.738-1.407-3.05 1.32-2.86h2.35l1.32 2.86z" />
</svg>

</router-link> 
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
    
    import Navbar from '../layout/navbar.vue';
    import axios from 'axios';
    export default {
      name: 'Profile',
      components: {
        Navbar
      },
      created() {
        
      },
      methods: {
        redirectToTelegram () {
  window.location.href = 'https://t.me/+917014245339'; // Replace with your Telegram link
},
        fetchWalletBalance() {
            const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get('/api/wallet',{headers})
        .then(response => {
          
          this.accountNumber = response.data.account_number;
          this.ifscCode = response.data.ifsc_code;
          this.name = response.data.name;
          this.email = response.data.email;
          this.mobile = response.data.mobile;
        })
        .catch(error => {
          console.error('Failed to fetch wallet balance', error);
        });
    },
    submitWithdrawDetails() {
      

      if (!this.accountNumber) {
        if (!this.accountNumber || !this.ifscCode) {
          alert('Please fill in your account details.');
          return;
        }
      }

 
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        axios.post('/api/wallet/updateAcDetails', {
        
          account_number: this.accountNumber ,
          ifsc_code:  this.ifscCode,
          name:  this.name,
          email:  this.email,
          mobile:  this.mobile,
        },{headers})
        .then(response => {
          this.accountNumber = response.data.account_number;
          this.ifscCode = response.data.ifsc_code;
          this.name = response.data.name;
          this.email = response.data.email;
          this.mobile = response.data.mobile;
          alert(response.data.message);
         
        })
        .catch(error => {
          if (error.response && error.response.status === 400) {
            alert(error.response.data.message);
          } else {
            console.error('Failed to withdraw money', error);
          }
        });
      
    }
      },
      computed: {
        
        },
        mounted() {
   this.userInfo=JSON.parse(localStorage.getItem('user'));
   this.fetchWalletBalance();
  },
      data() {
        return {
         picon1:picon1U,
         picon2:picon2U,
         picon3:picon3U,
         picon4:picon4U,
         picon5:picon5U,
         baseUrl: 'http://127.0.0.1:8000/register', // Replace with your website's URL
         referralCode: JSON.parse(localStorage.getItem('user')).refer_code, // Replace with the actual referral code of the user
         copySuccess: '',
         userInfo:{},
         accountNumber: '', // Initially empty, will be fetched from backend
      ifscCode: '',
      name:'',
      email:'',
      mobile:'',
        };
      },
    };
    
    </script>
    <style scoped>
    
    .modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
}
    </style>