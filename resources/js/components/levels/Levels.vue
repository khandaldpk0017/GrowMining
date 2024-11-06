<!-- resources/js/components/Home.vue -->

<template>

    <body >
        
        <!-- Header -->
        <Navbar />
    
     
    
    
        <!-- Content page -->
        <section class="bg0 p-t-80 p-b-10">
         
    <div class="w-full px-3 d-flex justify-content-between py-2 pb-4 ">
        <span class="d-flex flex-column" style="font-size: 1.3em;"><b>Your Balance :</b> <p style="font-weight: bold;">  ₹{{ walletBalance }}</p></span>
        <span class="d-flex flex-column" style="font-size: 1.3em;"><b>Income by Team :</b> <p style="font-weight: bold;">₹{{ TeamBalance }}</p></span>
    </div>
    <div class="container border border-dark rounded m-1 ml-2 justify-content-center p-3 " style="width: 95%;">
        <ul class="d-flex w-full">
            <li class="w-full cursor-pointer text-center border" :class="level1 ? 'border-info' : ''" @click="showLevels(1)">
                Level 1
            </li>
            <li class="w-full cursor-pointer text-center border" :class="level2 ? 'border-info' : ''" @click="showLevels(2)">
                Level 2
            </li>
            <li class="w-full cursor-pointer text-center border" :class="level3 ? 'border-info' : ''" @click="showLevels(3)">
                Level 3
            </li>
        </ul>

        <!-- Level 1: Direct Referrals -->
        <div class="w-full px-3 py-3 text-center" v-if="level1">
            <span style="font-weight: bold;">Your Direct Referrals Members - {{ level1Referrals.length }}</span><br>
            <ul>
                <li class="text-uppercase w-full border my-1" v-for="referral in level1Referrals" :key="referral.id">
                    {{ referral.name }}
                </li>
            </ul>
        </div>

        <!-- Level 2: Referrals of Level 1 referrals -->
      <div class="w-full px-0 py-3 text-center" v-if="level2">
            <span style="font-weight: bold;">Your Referrals' Referrals Members - {{ level2Referrals.length }}</span><br>
            <ul>
                <li class="text-uppercase w-full border my-1" v-for="referral in level2Referrals" :key="referral.id">
                    {{ referral.name }}
                </li>
            </ul>
        </div>

        <!-- Level 3: Referrals of Level 2 referrals -->
        <div class="w-full px-0 py-3 text-center" v-if="level3">
            <span style="font-weight: bold;">Level 2 Referrals' Referrals Members - {{ level3Referrals.length }}</span><br>
            <ul>
                <li class="text-uppercase w-full border my-1" v-for="referral in level3Referrals" :key="referral.id">
                    {{ referral.name }}
                </li>
            </ul>
        </div>
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
      name: 'Levels',
      components: {
        Navbar
      },
      created() {
        this.fetchLevel1();
        this.referCommission();
      },
      methods: {
        async fetchLevel1() {
      try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.get('/api/referrals/level1',{headers}).then((res)=>{

          this.level1Referrals =  res.data.data;
          this.level1Balance =  res.data.balance;
        });
      } catch (error) {
        console.error('Error fetching level 1 referrals:', error);
      }
    },

    // Fetch level 2 (referrals of level 1)
    async fetchLevel2() {
      try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.get('/api/referrals/level2',{headers}).then((res)=>{

this.level2Referrals =  res.data.data;
this.level2Balance =  res.data.balance;
});
      } catch (error) {
        console.error('Error fetching level 2 referrals:', error);
      }
    },

    // Fetch level 3 (referrals of level 2)
    async fetchLevel3() {
      try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.get('/api/referrals/level3',{headers}).then((res)=>{

this.level3Referrals =  res.data.data;
this.level3Balance =  res.data.balance;
});
      } catch (error) {
        console.error('Error fetching level 3 referrals:', error);
      }
    },
    async referCommission() {
      try {
        const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
        const response = await axios.get('/api/refer-commission',{headers}).then((res)=>{

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
showLevels(level) {
      this.level1 = level === 1;
      this.level2 = level === 2;
      this.level3 = level === 3;

      if (level === 1) {
        this.fetchLevel1();
      } else if (level === 2) {
        this.fetchLevel2();
      } else if (level === 3) {
        this.fetchLevel3();
      }
    },
        fetchWalletBalance() {
            const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get('/api/wallet',{headers})
        .then(response => {
          this.walletBalance = response.data.wallet_balance;
         
        })
        .catch(error => {
          console.error('Failed to fetch wallet balance', error);
        });
    },
        fetchTEBalance() {
            const token =localStorage.getItem('token');
		const headers = { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' };
      axios.get('/api/team-earning',{headers}) 
        .then(response => {
          this.TeamBalance = response.data.team_earning;
         
        })
        .catch(error => {
          console.error('Failed to fetch wallet balance', error);
        });
    },
  
      },
      computed: {
        
        },
        mounted() {
   this.userInfo=JSON.parse(localStorage.getItem('user'));
   this.fetchWalletBalance();
   this.fetchTEBalance();
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
         level1: true,
      level2: false,
      level3: false,
      level1Referrals: [], // Level 1 referrals
      level2Referrals: [], // Level 2 referrals
      level3Referrals: [],
          walletBalance:0,
          children: [],
          level1Balance:0,
          level2Balance:0,
          level3Balance:0,
          level1Commission:0,
          level2Commission:0,
          level3Commission:0,
          TeamBalance:0,
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