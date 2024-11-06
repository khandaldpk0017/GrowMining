<template>
  <nav v-if="totalPages > 1" aria-label="Page navigation">
    <ul class="pagination">
      <li :class="['page-item', { disabled: currentPage === 1 }]">
        <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">
          &laquo;
        </a>
      </li>
      <li v-for="page in pages" :key="page" :class="['page-item', { active: page === currentPage }]">
        <a class="page-link" href="#" @click.prevent="changePage(page)">
          {{ page }}
        </a>
      </li>
      <li :class="['page-item', { disabled: currentPage === totalPages }]">
        <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">
          &raquo;
        </a>
      </li>
    </ul>
  </nav>
</template>


<script>
export default {
  props: {
    currentPage: {
      type: Number,
      default: 1,
    },
    totalPages: {
      type: Number,
      required: true,
    }
  },
  computed: {
    pages() {
      const pages = [];
      const startPage = Math.max(1, this.currentPage - 2);
      const endPage = Math.min(this.totalPages, this.currentPage + 2);
      
      for (let i = startPage; i <= endPage; i++) {
        pages.push(i);
      }
      
      return pages;
    }
  },
  methods: {
    changePage(page) {
      if (page !== this.currentPage && page >= 1 && page <= this.totalPages) {
        this.$emit('page-changed', page);
      }
    }
  }
}
</script>

<style>
.pagination {
  display: flex;
  justify-content: center;
}

.page-item {
  margin: 0 2px;
}

.page-item.disabled .page-link {
  pointer-events: none;
  color: #6c757d;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.page-item.active .page-link {
  z-index: 1;
  color: #fff;
  background-color: #6f42c1;
  border-color: #6f42c1;
}
</style>
