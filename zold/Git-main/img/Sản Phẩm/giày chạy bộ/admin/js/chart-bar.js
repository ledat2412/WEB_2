const doanhThu = [
    "Doanh thu: 18,5 Triệu",
    "Doanh thu: 5,1 Triệu",
    "Doanh thu: 9,8 Triệu",
    "Doanh thu: 19,5 Triệu",
    "Doanh thu: 4,7 Triệu",
];

const giaBan = [
    "Giá bán: 1,980,000đ",
    "Giá bán: 1,953,000đ",
    "Giá bán: 967,000đ",
    "Giá bán: 1,340,000đ",
    "Giá bán: 2,455,000đ"
];

const soluong = [
    "Số lượng: 30",
    "Số lượng: 20",
    "Số lượng: 25",
    "Số lượng: 1",
    "Số lượng: 10"
];


const ctx = document.getElementById('chart-bar');
new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['ARPU001-6V', 'ABAS081-1', 'ARZS003-13', 'ARHT020-9V', 'ABAS073-7'],
      datasets: [{
        label: 'Doanh thu',
        // data chỗ này là số lượng giày bán ra mỗi mặt hàng
        data: [30,20,25,1,10],
        borderWidth: 1,
        backgroundColor: 
        [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(201, 203, 207, 1)'
        ],
        borderColor:
        [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(201, 203, 207, 1)'
        ]
      }]
    },
    options: {
        responsive: true, // tự động điều chỉnh khi thay đổi kích thước trang
        maintainAspectRatio: false, //Không giữ tỉ lệ khi điều chỉnh kích thước
        scales: {
        y: {
            
            beginAtZero: true,
            borderColor: 'black',
            grid: {
                color: 'transparent',
            }
        },
        x: {
            borderColor: 'black',
            grid: {
                color: 'transparent'
            }
        }
      },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 18
                    }
                }
            },
            tooltip: {
                enabled: true,
                boxWidth: 30,
                boxHeight: 30,
                bodySpacing: 15, // Khoảng cách giữa các dòng trong tooltip
                callbacks: {
                    label: function(tooltipItem) {
                        const doanhThugiay = doanhThu[tooltipItem.dataIndex];
                        const giaBangiay = giaBan[tooltipItem.dataIndex];
                        const soLuonggiay = soluong[tooltipItem.dataIndex]; 
                        return [
                            `${giaBangiay}`,
                            `${soLuonggiay}`,
                            `${doanhThugiay}`
                        ];
                    }
                }

            }
        }
    }
  });

// Title: Cho phép thêm tiêu đề cho biểu đồ và tùy chỉnh vị trí, kích thước chữ, màu sắc, v.v.
// Legend: Quản lý chú thích của biểu đồ, hiển thị thông tin về các dataset (dữ liệu) của biểu đồ.
// Tooltip: Hiển thị thông tin chi tiết khi người dùng di chuột đến các điểm dữ liệu trên biểu đồ.
// Filler: Cho phép lấp đầy màu giữa đường và trục, dùng cho các biểu đồ đường (line chart) hoặc radar.
// Decimation: Giúp giảm số lượng dữ liệu khi hiển thị nhiều điểm, tối ưu hóa hiệu suất biểu đồ.