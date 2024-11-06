 // earning chart start
  var options = {
    series:[{
      name: 'series1',
      data: [30, 25, 28, 20, 22, 20, 25,20,18,26,22]
    }],
    chart: {
      height: 155,
      type: 'area',
      toolbar:{
        show: false
      }
    },
    dataLabels:{
      enabled: false
    },
    stroke: {     
      curve: 'smooth',           
      width: 2,
    },
    grid:{
      show: false,      
    },
    colors: [Codexomee.themeprimary],
    yaxis:{
      labels:{
        show: false
      },
    },
    xaxis:{
      labels:{
        show: false
      },
    },   
    responsive:[   
    {
      breakpoint: 1536,
      options:{
          chart:{
            height: 174
          }
      },
    },
    {
      breakpoint:1400,
        options:{
            chart:{
              height: 151
            }
        },
      },
      {
      breakpoint:1280,
        options:{
            chart:{
              height: 141
            }
        },
      },
    ] 
  };

  var chart = new ApexCharts(document.querySelector("#earning-chart"), options);
  chart.render();
  // earning chart end



  // product chart start  
  var options = {
    series:[{
      name: 'series1',
      data: [30, 25, 28, 20, 22, 20, 25,20,18,26,22]
    }],
    chart: {
      height: 155,
      type: 'area',
      toolbar:{
        show: false
      }
    },
    dataLabels:{
      enabled: false
    },
    stroke: {     
      curve: 'smooth',           
      width: 2,
    },
    grid:{
      show: false
    },
    colors: [Codexomee.themesecondary],
    yaxis:{
      labels:{
        show: false
      },
    },
    xaxis:{
      labels:{
        show: false
      },
    },   
    responsive:[
    {
      breakpoint: 1536,
      options:{
          chart:{
            height: 174
          }
      },
    },   
    {
      breakpoint:1400,
        options:{
            chart:{
              height: 151
            }
        },
      },
      {
      breakpoint:1280,
        options:{
            chart:{
              height: 141
            }
        },
      }
    ] 
  };

  var chart = new ApexCharts(document.querySelector("#product-chart"), options);
  chart.render();
  // product chart end





  // Visitors Performance start
   var options = {
      series: [{
      name: 'New',
      data: [23, 35, 25, 32, 29, 20, 20]
    },{
      name: 'Returning',
      data: [39, 29, 25,29, 18, 22, 39]
    }],
      chart: {
      height: 287,
      type: 'area',
      parentHeightOffset: 0,
      parentWidthOffset: 0,  
      toolbar:{
        show: false
      }
    },
    dataLabels: {
      enabled: false,
    },
    grid:{     
      padding:{
        top: 0,
        bottom:0,
        left:0,
        right: 0
      }
    },
    stroke: {
      curve: 'smooth',           
      width: 2,
    },   
    legend:{
      position: 'top',
      show: false,
    },
    colors: [Codexomee.themeprimary,Codexomee.themesecondary],
    yaxis:{      
      labels: {
        
        formatter: function (y) {
          return y.toFixed(0) + "k";
        }
      },
      labels:{
        offsetX:-15,
          style: {
              colors: '#262626',
              fontSize: '14px',              
              fontWeight: 500, 
              fontFamily: 'Roboto, sans-serif'                 
          },
      },
      axisTicks: {
        show:false
        },
        axisBorder:{
          show:false
        },
        
    },  
    xaxis: {      
      categories: ["Iran", "Spain", "Canada", "China", "Japan", "Usa", "India"],
      labels:{
        offsetY:5,
          style: {
              colors: '#262626',
              fontSize: '14px',              
              fontWeight: 500, 
              fontFamily: 'Roboto, sans-serif'                 
          },
      },    
       axisTicks: {
          show:false
        },
        axisBorder:{
          show:false
        }
    },  
    responsive:[
      {
      breakpoint:420,
      options:{
          legend:{
            position: 'bottom',
          },
        },
      },   
    ]  
    };
    var chart = new ApexCharts(document.querySelector("#visitor-chart"), options);
    chart.render();
  // Visitors Performance end


  // Visitors start 
  var options = {
    series: [{
      name: 'Net Profit',
      data: [65, 38, 78, 28, 65, 24, 80]
    },{
      name: 'Free Cash Flow',
      data: [45, 45, 53, 38, 59, 20, 75]
    }],
      chart: {
      type: 'bar',
      height: 415,
      parentHeightOffset: 0,
      parentWidthOffset: 0,  
      toolbar:{
        show: false
      }
    },   
    plotOptions: {
      bar: {
        borderRadius: 2,
        horizontal: false,
        columnWidth: '50%',
        endingShape: 'rounded'
      },
    },
    legend:{
      show: false,
    },   
    colors: [Codexomee.themeprimary,Codexomee.themesecondary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    grid:{      
       padding:{
        top: 0,
        bottom:0,
        left:0,
        right: 0
      }
    }, 
    states: {
        normal: {
            filter: {
                type: 'darken',
                value: 1,
            }
        },
        hover: {
            filter: {
                type: 'darken',
                value: 1,
            }
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: 'darken',
                value: 1,
            }
        },
    },  
    yaxis:{     
      tickAmount: 10,
      min: 10,
      max: 80,
      labels:{
        offsetX:-15,
        style: {
            colors: '#262626',
            fontSize: '14px',              
            fontWeight: 500, 
            fontFamily: 'Roboto, sans-serif'                 
        },
      },
    },
    xaxis: {
      categories:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
      axisTicks: {
        show:false
      },
      axisBorder:{
        show:false
      },
      labels:{
        offsetY:5,
        style: {
            colors: '#262626',
            fontSize: '14px',              
            fontWeight: 500, 
            fontFamily: 'Roboto, sans-serif'                 
        },
      },
    },    
    fill: {
      opacity: 1
    },  
    responsive:[{
      breakpoint: 768,
      options:{
          chart:{
            height:290
          }
      },
    }]  
    };
    
    var chart = new ApexCharts(document.querySelector("#visitor-chart2"), options);
    chart.render();
    // Visitors end