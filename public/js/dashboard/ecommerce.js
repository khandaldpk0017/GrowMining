 // over revenue start
  var options = {
    series: [{
      name: "Revenue",          
      data: [55, 30, 60, 48, 35, 20, 60],
  }],
    chart: {
    height: 319,
    type: 'area',
    parentHeightOffset: 0,
    parentWidthOffset: 0,  
    toolbar:{
      show: false
    },
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',           
    width: 2,
  },   
  legend:{
    position: 'top',
    show: false,
  },
  colors: [Codexomee.themeprimary],
  fill: {   
    gradient: {     
      type: "vertical",     
      gradientToColors: undefined, 
      inverseColors: true,
      opacityFrom: 0.6,
      opacityTo: 0,     
      colorStops: []
    }
  },
  grid:{     
    padding:{
      top: 0,
      bottom:0,
      left:0,
      right: 0
    }
  },
   yaxis:{     
      tickAmount:10,
      min:10.00,
      max:80.00,
      labels:{
        offsetX:-15,
        style: {
          colors: '#262626',
          fontSize: '14px',              
          fontWeight: 500, 
          fontFamily: 'Roboto, sans-serif'   
        }              
      },
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],      
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
  responsive:[
    {
      breakpoint: 1366,
        options:{
            chart:{
              height: 315
            }
        },
      },
      {
      breakpoint: 481,
        options:{
            chart:{
              height: 270
            }
        },
      },
    ] 
  };
  var chart = new ApexCharts(document.querySelector("#over-revenue"), options);
  chart.render();
// over revenue end





// Earning Revenue start
 var options = {
  series:[{
    name: 'eraning revenue',
    data: [35,70,59,34,50,75,50,35,60,30,65,35],
  },
  {
    name: 'eraning revenue',
    data: [20,60,40,30,48,36,40,15,30,50,25,38],
  }
  ],
  chart:{
    type: 'bar',
    height: 346,
    stacked:true,
    parentHeightOffset: 0,
    parentWidthOffset: 0,  
    toolbar:{
      show: false,
    },
  },
    colors: [Codexomee.themeprimary,Codexomee.themesecondary],
    plotOptions: {
      bar:{        
        borderRadius: 2,
        horizontal: false,
        columnWidth: '35%',       
      },
    },
    dataLabels:{
      enabled:false
    },       
    legend:{
      show: false,
    },  
    stroke:{
      curve: 'smooth',
    },     
    grid:{     
      padding:{
        top: 0,
        bottom:0,
        left:0,
        right: 0
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep','Oct','Nov','Dec'], 
      axisTicks: {
        show:false
      },
      axisBorder:{
        show:false
      },
      labels:{
        offsetY:5,
        style:{
          colors: '#262626',
          fontSize: '14px',              
          fontWeight: 500, 
          fontFamily: 'Roboto, sans-serif'                 
        },
      },
    },
    yaxis:{
      axisTicks: {
        show:false
      },
      axisBorder:{
        show:false
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
    },
    responsive:[
      {
        breakpoint:1366,
        options:{
          chart:{
            height: 415
          }
        },
      },
      {
        breakpoint:481,
        options:{
          chart:{
            height:290
          }
        },
      }      
    ]         
  };
  var chart = new ApexCharts(document.querySelector("#earning-revenue"), options);
  chart.render();  
// Earning Revenue end


// sale by category start
  var options = {
      labels: ['Electronics 8.1k','Women’s 10.9 k', 'Women’s 10.9 k', 'Phones 3.0 k'],
      series: [40, 35, 20, 50],
      chart: {
        type: 'donut',
        height: 346 ,
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
                allowMultipleDataPointsSelection: true,
                filter: {
                    type: 'darken',
                    value: 1,
                }
            },
        },
      plotOptions: {
        pie: {
          startAngle: -90,
          endAngle: 270
        },
      },
      stroke: {
        width: 0,
      },
      legend:{
        position:'bottom',       
        horizontalAlign: 'left', 
        offsetX: 0,
        offsetY: 0,
        colors: '#262626',
        fontSize: '14px',              
        fontWeight: 500, 
        fontFamily: 'Roboto, sans-serif',
        onItemClick: {
          toggleDataSeries: true
        },
        onItemHover: {
          highlightDataSeries: false
        },       
      },
      dataLabels: {
        enabled: false,
      },
    colors: [Codexomee.themeprimary,Codexomee.themesecondary,Codexomee.themeinfo,Codexomee.themewarning],
    responsive:[
      {
        breakpoint:1366,
        options:{
          chart:{
            height: 380
          }
        },
      },
      {
        breakpoint:481,
        options:{
          chart:{
            height:320
          }
        },
      }

    ]
  };
  var chart = new ApexCharts(document.querySelector("#sale-category"), options);
  chart.render();
// sale by category end