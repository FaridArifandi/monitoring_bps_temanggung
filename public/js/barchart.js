const options = {
    colors: ['#1A56DB', '#FDBA8C'], // Warna chart
    series: [
        {
            name: 'Target',
            data: chartData.map(item => item.target) // Ambil data target dari JSON
        },
        {
            name: 'Realisasi',
            data: chartData.map(item => item.realisasi) // Ambil data realisasi dari JSON
        }
    ],
    chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        style: {
            fontFamily: "Inter, sans-serif",
        },
    },
    xaxis: {
        categories: chartData.map(item => item.nama_tim), // Nama tim sebagai kategori pada sumbu X
        labels: {
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        show: true,
        labels: {
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
        },
    },
    fill: {
        opacity: 1,
    },
};

if (
    document.getElementById("column-chart") &&
    typeof ApexCharts !== "undefined"
) {
    const chart = new ApexCharts(
        document.getElementById("column-chart"),
        options
    );
    chart.render();
}
