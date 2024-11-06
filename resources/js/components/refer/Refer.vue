<!-- resources/js/components/Home.vue -->

<template>

    <body >
        
        <!-- Header -->
        <Navbar />
    
     
    
    
        <!-- Content page -->
        <section class="bg0 p-t-80 p-b-10">
            <div class="container d-flex justify-content-center flex-column ">
                <!-- <h4 class="text-center">Refer & Earn</h4> -->
                  <!-- Full Referral Link Input -->
              <div class="w-100">
                <div class="form-group">
                <label for="fullReferralLink">Referral Link</label>
                <input 
                    type="text" 
                    v-model="fullReferralLink" 
                    class="form-control" 
                    readonly
                    id="fullReferralLink">
                <button @click="copyToClipboard(fullReferralLink)" class="btn btn-primary mt-2">Copy Link</button>
                <button @click="shareContent(fullReferralLink)" class="btn btn-primary mt-2 ml-2">Share Link</button>
                </div>

                <!-- Referral Code Input -->
                <div class="form-group mt-4">
                <label for="referralCode">Referral Code</label>
                <input 
                    type="text" 
                    v-model="referralCode" 
                    class="form-control" 
                    readonly
                    id="referralCode">
                <button @click="copyToClipboard(referralCode)" class="btn btn-primary mt-2">Copy Code</button>
                </div>

                <div v-if="copySuccess" class="alert alert-success mt-3">
                {{ copySuccess }}
                </div>
              </div>
              <div id="instructions" class="border border-dark m-1 rounded p-2" style="font-weight: bold;">
                <span><b>Instructions:</b></span> <br>
      <p>
       Earn by referring new users, join our
investment Program (Partner Program), and earn bonus based on the levels. <br>
1.    Send referral link to your friends and family. <br>
2.    Salary also credited on account when they formed a big team.<br>
<ul class="px-3" >
          <li style="list-style: circle;font-weight: bold;" v-for="salary in salaries" :key="salary.id"><h5>{{ salary.refer_count }} person in team => ₹{{ salary.salary}} perday.</h5></li>
          
         
        </ul>
3.    Referral amount credited in wallet after new user buys one product. <br>
4.    New users register with us. You get upto 10% of their top-up amount. For example, if the user you invited invests 1000, you will get 100 rupees. <br>
5. We allow you to earn commissions by referrin friends without purchasing any mining plans. <br>
        <ul class="px-3" >
          <li style="list-style: circle;font-weight: bold;"><h5>Level 1 refer commission {{ level1Commission }}%</h5></li>
          <li style="list-style: circle;font-weight: bold;"><h5>Level 2 refer commission {{ level2Commission }}%</h5></li>
          <li style="list-style: circle;font-weight: bold;"><h5>Level 3 refer commission {{ level3Commission }}%</h5></li>
         
        </ul>
       
      </p>
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
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
      name: 'Refer',
      components: {
        Navbar
      },
      created() {
       this.referCommission();
      },
      methods: {
        async shareContent(url) {
    const shareData = {
      title: 'Check this out!',
      text: 'I found something interesting for you!',
      url: url  // The link you want to share
    };

    try {
      if (navigator.share) {
        await navigator.share(shareData);
        console.log('Link shared successfully');
      } else {
        alert('Web Share API not supported in your browser.');
      }
    } catch (error) {
      console.error('Error sharing:', error);
    }
  },
        async referCommission() {
      try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.get('/api/refer-commission',{headers}).then((res)=>{
this.salaries = res.data.salary;
this.level1Commission =  res.data.data.parent;
this.level2Commission =  res.data.data.parent_of_parent;
this.level3Commission =  res.data.data.grand_parent;
});
      } catch (error) {
        console.error('Error fetching level 3 referrals:', error);
      }
    },
        redirectToTelegram () {
  window.location.href = 'https://t.me/+917014245339'; // Replace with your Telegram link
},
        copyToClipboard(value) {
            navigator.clipboard.writeText(value).then(() => {
                this.copySuccess = 'Copied to clipboard!';
                setTimeout(() => this.copySuccess = '', 2000); // Clear the success message after 2 seconds
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
      },
      computed: {
            fullReferralLink() {

            return `https://www.grow-mining.co.in/register?referral=${this.referralCode}`;
            }
        },
      data() {
        return {
         picon1:picon1U,
         picon2:picon2U,
         picon3:picon3U,
         picon4:picon4U,
         picon5:picon5U,
         baseUrl: 'https://grow-mining.com/register', // Replace with your website's URL
         referralCode: JSON.parse(localStorage.getItem('user')).refer_code, // Replace with the actual referral code of the user
         copySuccess: '',
         level1Commission:0,
          level2Commission:0,
          level3Commission:0,
          salaries:[],
        };
      },
    };
    
    </script>
