@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
      <div class="codex-breadcrumb">
        <div class="breadcrumb-contain">
          <div class="left-breadcrumb">
            <!-- <h1>Default</h1> -->
            <div class="status-filter flex  my-3 mb-5 pb-5">
<label for="timeFilter ">Filter : </label>
<form action="{{route('admin.dashboard')}}" method="get">
<select  id="timeFilter"  name="timeFilter" onchange="this.form.submit()" class="border mx-3 p-2">
<option value="" {{ request('timeFilter') === '' ? 'selected' : '' }}>All Time</option>
    <option value="0" {{ request('timeFilter') === '0' ? 'selected' : '' }}>Last Week</option>
    <option value="1" {{ request('timeFilter') === '1' ? 'selected' : '' }}>Last Month</option>
    <option value="2" {{ request('timeFilter') === '2' ? 'selected' : '' }}>Last Year</option>
    
 
</select>
</form>
</div>
          </div>
          <div class="right-breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0);">Default</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body common-dash">
    <div class="grid grid-cols-12 page-gap">
        <div class="col-span-12 2xl:col-span-4 md:col-span-12 sm:col-span-12">
            <div class="grid grid-cols-12 cdx-gap">
                <div class="col-span-6 md:col-span-6 sm:col-span-6">
                    <div class="card earning-chart animated-shap">
                        <div class="card-header">
                            <h4>Total Earning</h4>
                        </div>
                        <div class="card-body">
                            <div class="earning-detail">
                                <h3>${{ number_format($totalEarnings, 2) }} <span>items</span></h3>
                                <!-- Update the percentage based on your logic -->
                                <h5 class="text-success">22% this Week<i class="fa fa-angle-up"></i></h5>
                            </div>
                            <div id="earning-charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-span-6 md:col-span-6 sm:col-span-6">
                    <div class="card product-chart animated-shap">
                        <div class="card-header">
                            <h4>Total Product Sold</h4>
                        </div>
                        <div class="card-body">
                            <div class="prochart-detail">
                                <h3>{{ $totalProductsSold }}<span>items</span></h3>
                                <!-- Update the percentage based on your logic -->
                                <h5 class="text-danger">22% this Week<i class="fa fa-angle-down"></i></h5>
                            </div>
                            <div id="product-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 2xl:col-span-6">
            <div class="card recent-ordertbl">
                <div class="card-header">
                    <h4>Recent Orders</h4>
                </div>
                <div class="card-body">                  
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <!-- <th>Vendor</th> -->
                                    <!-- <th>Rate</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $key=>$order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <div class="media">
                                           
                                            <div class="media-body">{{ $order->order->user_name }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>${{ number_format($order->total_price, 2) }}</td>
                                  
                                    <td><span class="badge badge-{{ $order->order_status == 'Delivered' ? 'secondary' : 'info' }}">{{ $order->order_status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 2xl:col-span-7">        
            <div class="card project-summarytbl">
                <div class="card-header">
                    <h4>Top Products Sold</h4>
                </div>
                <div class="card-body">                  
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Ordered</th>
                                    <!-- <th>Total Revenue</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topProducts as $product)
                                <tr>
                                    <td>#{{ $product->product_id }}</td>
                                    <td>{{ $product->product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->order_count }} Times</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- theme body end-->
    </div>
@endsection

@section('custom-js')
<script>
    var earningsData = @json($earningsData);

    var options = {
        series: [{
            name: 'Earnings',
            data: earningsData.map(item => item.total) // Use total earnings per date
        }],
        chart: {
            height: 155,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {     
            curve: 'smooth',           
            width: 2,
        },
        grid: {
            show: false,      
        },
        colors: [Codexomee.themeprimary], // Ensure this is defined
        yaxis: {
            labels: {
                show: false
            },
        },
        xaxis: {
          categories: earningsData.map(item => item.date), // Use date for the x-axis
            labels: {
                show: true,
                style: {
                fontSize: '8px' // Adjust this value to change the font size
            },
                formatter: function(value) {
                    // Format the date for display on the x-axis
                    return value;
                }
            },
            // title: {
            //     text: 'Date'
            // }
        },   
        responsive: [
            {
                breakpoint: 1536,
                options: {
                    chart: {
                        height: 174
                    }
                },
            },
            {
                breakpoint: 1400,
                options: {
                    chart: {
                        height: 151
                    }
                },
            },
            {
                breakpoint: 1280,
                options: {
                    chart: {
                        height: 141
                    }
                },
            }
        ] 
    };

    var chart = new ApexCharts(document.querySelector("#earning-charts"), options);
    chart.render();
</script>
<script>
    var productData = @json($data);

var options = {
    series: [{
        name: 'Orders',
        data: productData.map(item => item.orders) // Use total earnings per date
    }],
    chart: {
        height: 155,
        type: 'area',
        toolbar: {
            show: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {     
        curve: 'smooth',           
        width: 2,
    },
    grid: {
        show: false,      
    },
    colors: [Codexomee.themeprimary], // Ensure this is defined
    yaxis: {
        labels: {
            show: false
        },
    },
    xaxis: {
      categories: productData.map(item => item.productName), // Use date for the x-axis
        labels: {
            show: true,
            style: {
            fontSize: '8px' // Adjust this value to change the font size
        },
            formatter: function(value) {
                // Format the date for display on the x-axis
                return value;
            }
        },
        // title: {
        //     text: 'Date'
        // }
    },   
    responsive: [
        {
            breakpoint: 1536,
            options: {
                chart: {
                    height: 174
                }
            },
        },
        {
            breakpoint: 1400,
            options: {
                chart: {
                    height: 151
                }
            },
        },
        {
            breakpoint: 1280,
            options: {
                chart: {
                    height: 141
                }
            },
        }
    ] 
};

var chart = new ApexCharts(document.querySelector("#product-charts"), options);
chart.render();

</script>
<!-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    const timeFilterSelect = document.getElementById('timeFilter');
    
    function fetchChartData(timeFilter) {
      $.ajax({
            url: '{{route("admin.dashboard") }}', // Replace with your route to update order status
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
                timeFilter: timeFilter
            },
            success: function(response) {
            
                
            },
            error: function(xhr) {
                alert('An error occurred while updating the status.');
            }
        });
    }
            // Initial fetch
    fetchChartData(timeFilterSelect.value);

// Fetch data when the filter value changes
timeFilterSelect.addEventListener('change', function() {
    fetchChartData(this.value);
});
});
</script> -->
@endsection