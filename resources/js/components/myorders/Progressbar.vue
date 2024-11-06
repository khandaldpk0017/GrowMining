<template>
    <div class="status-progress">
      <div
        v-for="(status, index) in statuses"
        :key="index"
        :class="['status-item', { active: index <= currentStatusIndex }]"
      >
      <div class="status-circle"></div>
      <div v-if="index < statuses.length - 1" class="status-line"></div>
      <div class="status-label">{{ status }}</div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      currentStatus: {
        type: String,
        required: true
      }
    },
    data() { 
      return {
        statuses: ['Received', 'Dispatched', 'Shipped', 'Out for Delivery', 'Delivered']
      };
    },
    computed: {
      currentStatusIndex() {
        
      return this.statuses.indexOf(this.currentStatus);
      }
    }
  };
  </script>
  
  <style scoped>
.status-progress {
  display: flex;
  flex-direction: row;
  align-items: center;
  width: 100%; /* Adjust based on your layout */
  margin: 20px auto;
  position: relative;
}

.status-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  flex: 1;
}

.status-circle {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background-color: #ddd;
  border: 2px solid #ddd;
  z-index: 1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}

.status-label {
  margin-top: 40px;
  text-align: center;
  font-size: 8px;
}

.status-line {
  height: 4px;
  width: 100%;
  background-color: #ddd;
  position: absolute;
  top: 50%;
  left: 100%;
  transform: translate(-50%);
  z-index: 0;
}

.status-item.active .status-line,
.status-item.active .status-circle {
  background-color: #4caf50; /* Progress color */
  border-color: #4caf50;
}
</style>
